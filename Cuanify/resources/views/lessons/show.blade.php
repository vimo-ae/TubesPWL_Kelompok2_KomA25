<x-app-layout>

    @section('title', 'Lessons - Cuanify')


<div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-4xl mx-auto space-y-8">

        <a href="{{ route('courses.show', $course->course_id ?? $course->id) }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            ← Kembali
        </a>

        <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100 p-8 mb-8">
            
            <div class="mb-6">
                <div class="flex items-center gap-2 text-purple-600 text-sm font-bold uppercase tracking-wider mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 6v6l4 2"/>
                    </svg>
                    Materi Pembelajaran
                </div>
            
                <h1 class="text-3xl font-extrabold text-gray-900 leading-snug">
                    {{ $lesson->title }}
                </h1>
            </div>

            <div class="preview-content max-w-none text-gray-700">
                {!! $lesson->content !!}
            </div>
        </div>

        @if($lesson->video_url)
            <div class="bg-white rounded-[30px] p-6 shadow-xl border border-purple-100 mb-8">
            
                <div class="flex items-center gap-2 mb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 10l4.55-2.27a1 1 0 011.45.9v6.74a1 1 0 01-1.45.9L15 14m-6 6h6a2 2 0 002-2V6a2 2 0 00-2-2H9a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                
                    <h2 class="text-2xl font-extrabold text-gray-800">
                        Video Pembelajaran
                    </h2>
                </div>
            
                @if(str_contains($lesson->video_url, 'youtube.com') || str_contains($lesson->video_url, 'youtu.be'))
                    <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                        <iframe 
                            class="absolute top-0 left-0 w-full h-full"
                            src="{{ $lesson->embed_video_url }}" 
                            allowfullscreen>
                        </iframe>
                    </div>
                @else
                    <div class="w-full rounded-2xl overflow-hidden shadow-lg border border-gray-200">
                        <video class="w-full" controls>
                            <source src="{{ $lesson->video_url }}" type="video/mp4">
                        </video>
                    </div>
                @endif
            </div>
        @endif

        <div class="bg-white p-8 rounded-[30px] shadow-xl border border-purple-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
            
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Hadiah Penyelesaian</p>
                <div class="inline-flex items-center gap-2 bg-indigo-50 text-indigo-700 px-4 py-1.5 rounded-full font-bold text-lg border border-indigo-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 .587l3.668 7.431 8.2 1.192-5.934 5.786 1.401 8.173L12 18.896l-7.335 3.853 1.401-8.173L.132 9.21l8.2-1.192z"/>
                    </svg>
                    {{ $lesson->xp_reward }} XP
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-4">
                
                @if($lesson->has_quiz)
                    <a href="{{ route('quizzes.show', $lesson->lesson_id) }}"
                       class="inline-flex items-center justify-center bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-2xl font-bold shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12h6m-6 4h6M7 8h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Buka Quiz
                    </a>
                @endif

                @if($completed)
                    <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-800 px-6 py-3 rounded-2xl font-bold border border-emerald-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-emerald-600" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7"/>
                        </svg>
                        Sudah Selesai
                    </div>
                @else
                    <form method="POST" action="/lessons/{{ $lesson->lesson_id }}/complete">
                        @csrf
                        <button type="submit" 
                                class="bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white px-6 py-3 rounded-2xl font-bold shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none">
                                <path d="M20 6L9 17l-5-5"
                                      stroke="currentColor"
                                      stroke-width="2.5"
                                      stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                            Tandai Selesai
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