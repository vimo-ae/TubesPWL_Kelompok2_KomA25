<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect('/admin');
        }

        if ($user->role == 'instructor') {

            if ($user->status_instructor == 'pending') {

                Auth::logout();

                return back()
                    ->with('warning', 'Akun instructor masih menunggu verifikasi admin.')
                    ->withInput();;
            }

            if ($user->status_instructor == 'rejected') {

                Auth::logout();

                return back()
                    ->with('error', 'Pengajuan instructor ditolak admin.')
                    ->withInput();;
            }
        }

        return redirect('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
