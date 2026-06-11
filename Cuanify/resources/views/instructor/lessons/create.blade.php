<x-app-layout>

    @section('title', 'Create Lesson - Cuanify')
    
    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            <a href="{{ route('instructor.courses.show', $course->course_id ?? $course->id) }}" 
               class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Detail Course
            </a>
            
            <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100 p-8 md:p-10">

                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Tambah Lesson Baru</h1>
                    <p class="text-gray-500 text-sm mt-1">
                        Menambahkan materi baru untuk course: <span class="text-purple-600 font-semibold">{{ $course->title }}</span>
                    </p>
                </div>

                <form
                    action="{{ route('instructor.lessons.store', $course->course_id) }}"
                    method="POST"
                    class="space-y-6">

                    @csrf

                    <div class="prose max-w-none">
                        @include('instructor.lessons.form')
                    </div>

                    <hr class="border-gray-100 my-8">

                    <div class="flex items-center gap-3 justify-end">
                        
                        <a href="{{ route('instructor.courses.show', $course->course_id ?? $course->id) }}" 
                           class="inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-bold text-sm transition duration-300">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-md transition-all duration-300 hover:-translate-y-0.5 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Simpan Draft Lesson
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
// Menghindari crash editor jika field textarea dimuat ulang oleh script lain
ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: {
            items: [
                'heading', '|', 'bold', 'italic', '|',
                'bulletedList', 'numberedList', '|',
                'link', 'blockQuote', 'insertTable', '|',
                'undo', 'redo'
            ]
        }
    })
    .catch(error => {
        console.error(error);
    });

// Handler Toggle Section Quiz dengan validasi null-pointer guard
const checkbox = document.getElementById('hasQuiz');
const quizSection = document.getElementById('quizSection');

if (checkbox && quizSection) {
    checkbox.addEventListener('change', function() {
        quizSection.classList.toggle('hidden');
    });
}
</script>