<x-app-layout>
    
    <a href="{{ route('instructor.courses.show', $course->course_id ?? $course->id) }}" 
    class="inline-block mb-4 text-indigo-600 hover:text-indigo-800 font-medium transition-all">
        ← Kembali ke Daftar Lesson
    </a>
    
    <div class="max-w-5xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">
            Tambah Lesson - {{ $course->title }}
        </h1>

        <form
            action="{{ route('instructor.lessons.store', $course->course_id) }}"
            method="POST">

            @csrf

            @include('instructor.lessons.form')

            <div class="flex gap-3 mt-8">

                <button
                    type="submit"
                    class="bg-gray-700 text-white px-5 py-2 rounded-lg">
                    Simpan Draft
                </button>

            </div>

        </form>

    </div>

</x-app-layout>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

const checkbox = document.getElementById('hasQuiz');
const quizSection = document.getElementById('quizSection');

checkbox.addEventListener('change', function() {
    quizSection.classList.toggle('hidden');
});
</script>