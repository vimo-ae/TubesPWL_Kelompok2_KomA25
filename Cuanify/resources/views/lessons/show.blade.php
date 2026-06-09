<x-app-layout>

    @section('title', 'Lessons - Cuanify')


<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-4xl mx-auto">

        <a href="{{ route('courses.show', $course->course_id ?? $course->id) }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            ← Kembali
        </a>

        <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100 p-8 mb-8">
            
            <div class="border-b border-gray-100 pb-4 mb-6">
                <p class="text-sm font-bold text-purple-600 uppercase tracking-wider mb-1">Materi Pembelajaran</p>
                <h1 class="text-3xl font-extrabold text-gray-900">
                    {!! $lesson->title !!}
                </h1>
            </div>

            <div class="preview-content max-w-none text-gray-700">
                {!! $lesson->content !!}
            </div>
        </div>

        @if($lesson->video_url)
            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-purple-100 mb-8">
                <h2 class="text-2xl font-extrabold text-gray-800 mb-5 flex items-center gap-2">
                    🎥 Video Pembelajaran
                </h2>

                @if(str_contains($lesson->video_url, 'youtube.com') || str_contains($lesson->video_url, 'youtu.be'))
                    <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                        <iframe 
                            class="absolute top-0 left-0 w-full h-full"
                            src="{{ $lesson->embed_video_url }}" 
                            title="YouTube video player" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                        </iframe>
                    </div>
                @else
                    <div class="w-full rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                        <video class="w-full" controls>
                            <source src="{{ $lesson->video_url }}" type="video/mp4">
                            Browser Anda tidak mendukung pemutar video HTML5.
                        </video>
                    </div>
                @endif
            </div>
        @endif

        <div class="bg-white p-8 rounded-[30px] shadow-xl border border-purple-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Hadiah Penyelesaian</p>
                <div class="inline-flex items-center gap-2 bg-indigo-50 text-indigo-700 px-4 py-1.5 rounded-full font-bold text-lg border border-indigo-100">
                    ✨ {{ $lesson->xp_reward }} XP
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-4">
                
                @if($lesson->has_quiz)
                    <a href="{{ route('quizzes.show', $lesson->lesson_id) }}"
                       class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-2xl font-bold shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5">
                        📝 Buka Quiz
                    </a>
                @endif

                @if($completed)
                    <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-800 px-6 py-3 rounded-2xl font-bold border border-emerald-200">
                        ✅ Sudah Selesai
                    </div>
                @else
                    <form method="POST" action="/lessons/{{ $lesson->lesson_id }}/complete">
                        @csrf
                        <button type="submit" 
                                class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-6 py-3 rounded-2xl font-bold shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5 cursor-pointer">
                            🎯 Tandai Selesai
                        </button>
                    </form>
                @endif

            </div>

        </div>

    </div>
</div>

</x-app-layout>

<style>
    .preview-content h1 {
        font-size: 2.25rem !important;
        font-weight: 800 !important;
        line-height: 1.25 !important;
        margin-top: 2rem !important;
        margin-bottom: 1rem !important;
        display: block !important;
    }
    .preview-content h2 {
        font-size: 1.875rem !important;
        font-weight: 700 !important;
        line-height: 1.3 !important;
        margin-top: 1.75rem !important;
        margin-bottom: 0.75rem !important;
        display: block !important;
    }
    .preview-content h3 {
        font-size: 1.5rem !important;
        font-weight: 600 !important;
        line-height: 1.4 !important;
        margin-top: 1.5rem !important;
        margin-bottom: 0.5rem !important;
        display: block !important;
    }
    .preview-content p {
        margin-top: 0 !important;
        margin-bottom: 1.25rem !important;
        line-height: 1.75 !important;
    }
    .preview-content ul {
        list-style-type: disc !important;
        padding-left: 1.5rem !important;
        margin-bottom: 1.25rem !important;
    }
    .preview-content ol {
        list-style-type: decimal !important;
        padding-left: 1.5rem !important;
        margin-bottom: 1.25rem !important;
    }
    .preview-content li {
        margin-bottom: 0.5rem !important;
    }
    .preview-content blockquote {
        border-left: 4px solid #a855f7 !important; /* Warna ungu ungu khas tema Anda */
        padding-left: 1rem !important;
        font-style: italic !important;
        color: #4b5563 !important;
        margin: 1.5rem 0 !important;
        background-color: #f9fafb;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }
    .preview-content table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 1.5rem 0 !important;
    }
    .preview-content table td, .preview-content table th {
        border: 1px solid #e5e7eb !important;
        padding: 0.75rem !important;
    }
    .preview-content table th {
        background-color: #f9fafb !important;
    }
</style>