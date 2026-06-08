<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\ProfileInstructor;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredInstructorController extends Controller
{
    /**
     * Display the instructor registration view.
     */
    public function create(): View
    {
        return view('auth.register-instructor');
    }

    /**
     * Handle an incoming instructor registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'deskripsi' => ['required', 'string', 'min:20'],
            'linkedin' => ['required', 'url', 'regex:/linkedin\.com/i'],
            'cv' => ['required', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        DB::transaction(function () use ($request) {
            
            $cvPath = null;
            if ($request->hasFile('cv')) {
                $cvPath = $request->file('cv')->store('cv_instructors', 'public');
            }

            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'instructor',
                'status_instructor' => 'pending',
            ]);

            ProfileInstructor::create([
                'user_id' => $user->user_id,
                'deskripsi' => $request->deskripsi,
                'linkedin' => $request->linkedin,
                'cv' => $cvPath,
            ]);

            event(new Registered($user));
            
            // Otomatis login setelah register jika diinginkan, 
            // Namun karena statusnya masih 'pending' verifikasi admin, disarankan langsung redirect saja.
            // Auth::login($user); 
        });

        return back()->with('success', 'Registrasi instruktur berhasil! Silakan tunggu verifikasi berkas oleh admin.');
    }
}