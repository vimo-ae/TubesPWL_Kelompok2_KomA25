<x-app-layout>

    @section('title', 'Lesson Preview - Cuanify')

    <div class="max-w-4xl mx-auto p-6">

        <h1 class="text-3xl font-bold mb-6">
            {{ $lesson->title }}
        </h1>

        <div class="preview-content max-w-none">
            {!! $lesson->content !!}
        </div>

        @if($lesson->video_url)
            <div class="mt-8">
                <h2 class="font-semibold mb-2">
                    Video Pembelajaran
                </h2>

                @if(str_contains($lesson->video_url, 'youtube.com') || str_contains($lesson->video_url, 'youtu.be'))
                            <div class="relative w-full aspect-video rounded-xl overflow-hidden shadow-lg border border-gray-200">
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
                            <div class="w-full rounded-xl overflow-hidden shadow-lg border border-gray-200">
                                <video class="w-full" controls>
                                    <source src="{{ $lesson->video_url }}" type="video/mp4">
                                    Browser Anda tidak mendukung pemutar video HTML5.
                                </video>
                            </div>
                        @endif
            </div>
        @endif

        <div class="mt-8">
            <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded">
                {{ $lesson->xp_reward }} XP
            </span>
        </div>

        @if($lesson->has_quiz)
            <div class="mt-6">
                <button
                    class="bg-yellow-500 text-white px-4 py-2 rounded"
                    disabled>
                    Quiz Tersedia
                </button>
            </div>
        @endif

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
    /* Style tambahan untuk blockquote & table jika nanti tampil di preview */
    .preview-content blockquote {
        border-left: 4px solid #e2e8f0 !important;
        padding-left: 1rem !important;
        font-style: italic !important;
        color: #4a5568 !important;
        margin: 1.5rem 0 !important;
    }
    .preview-content table {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 1.5rem 0 !important;
    }
    .preview-content table td, .preview-content table th {
        border: 1px solid #cbd5e1 !important;
        padding: 0.5rem !important;
    }
</style>