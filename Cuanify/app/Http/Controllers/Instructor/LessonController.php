<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function create($courseId)
    {
        $course = Course::findOrFail($courseId);

        $lesson = new Lesson();

        return view(
            'instructor.lessons.create',
            compact('course', 'lesson')
        );
    }

    public function store(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'video_url' => 'nullable|url',
            'xp_reward' => 'required|in:30,50,100',
        ]);

        $lastOrder = Lesson::where(
            'course_id',
            $courseId
        )->max('lesson_order');

        Lesson::create([
            'course_id' => $courseId,
            'title' => $request->title,
            'content' => $request->content,
            'video_url' => $request->video_url,
            'xp_reward' => $request->xp_reward,
            'has_quiz' => $request->boolean('has_quiz'),
            'is_published' => false,
            'lesson_order' => $lastOrder + 1,
        ]);

        return redirect()
            ->route('instructor.courses.show', $courseId)
            ->with('success', 'Lesson berhasil disimpan sebagai draft.');
    }

    public function update(Request $request, $courseId, $lessonId)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'video_url' => 'nullable|url',
            'xp_reward' => 'required|in:30,50,100',
        ]);

        $lesson = Lesson::findOrFail($lessonId);

        $lesson->update([
            'title' => $request->title,
            'content' => $request->content,
            'video_url' => $request->video_url,
            'xp_reward' => $request->xp_reward,
            'has_quiz' => $request->boolean('has_quiz'),
        ]);

        return redirect()
            ->route('instructor.lessons.edit', [
                'course' => $courseId, 
                'lesson' => $lesson->lesson_id 
            ])
            ->with('success', 'Lesson berhasil diperbarui.');
    }

    public function preview($courseId, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);

        return view(
            'instructor.lessons.preview',
            compact('lesson')
        );
    }

    public function edit($courseId, $lessonId)
    {
        $course = Course::findOrFail($courseId);
        $lesson = Lesson::findOrFail($lessonId);

        return view(
            'instructor.lessons.edit',
            compact('course', 'lesson')
        );
    }

    public function destroy($courseId, $lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);

        $lesson->delete();

        return redirect()
            ->route('instructor.courses.show', $courseId)
            ->with('success', 'Lesson berhasil dihapus.');
    }

    public function publish(Course $course, Lesson $lesson)
    {
        $lesson->update([
            'is_published' => true
        ]);

        return back()->with('success', 'Hore! Materi lesson berhasil diterbitkan dan sekarang bisa dilihat oleh siswa. 🎉');
    }
}
