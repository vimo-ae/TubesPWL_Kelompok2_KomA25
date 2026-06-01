<x-app-layout>

<div class="min-h-screen bg-[#f7eef7] -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">

    <div class="max-w-6xl mx-auto">

        <!-- Back -->
        <a href="{{ url()->previous() }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
            ← Kembali
        </a>

        <!-- Header -->
        <div class="bg-gradient-to-r from-purple-600 via-fuchsia-600 to-indigo-700 rounded-[35px] p-8 text-white shadow-xl mb-8">

            <p class="text-sm text-purple-100 mb-2">
                Lesson
            </p>

            <h1 class="text-4xl font-extrabold mb-3">
                {{ $lesson->title }}
            </h1>

            <p class="text-purple-100 leading-relaxed">
                Pelajari materi melalui video pembelajaran dan PDF yang telah disediakan.
            </p>

        </div>

        <!-- Video -->
        @if($lesson->video)

        <div class="bg-white rounded-[30px] p-6 shadow-sm border border-purple-100 mb-8">

            <h2 class="text-2xl font-extrabold text-gray-800 mb-5">
                🎥 Video Pembelajaran
            </h2>

            <video controls class="w-full rounded-2xl shadow-lg">
                <source src="{{ asset('storage/' . $lesson->video) }}" type="video/mp4">
            </video>

        </div>

        @endif

        <!-- PDF -->
        @if($lesson->pdf)

        <div class="bg-white rounded-[30px] p-6 shadow-sm border border-purple-100">

            <div class="flex items-center justify-between mb-5">

                <h2 class="text-2xl font-extrabold text-gray-800">
                    📄 Materi PDF
                </h2>

                <a href="{{ asset('storage/' . $lesson->pdf) }}"
                   target="_blank"
                   class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-xl font-semibold transition">
                    Download PDF
                </a>

            </div>

            <iframe
                src="{{ asset('storage/' . $lesson->pdf) }}"
                class="w-full h-[800px] rounded-2xl border">
            </iframe>

        </div>

        @endif

    </div>

</div>

</x-app-layout>