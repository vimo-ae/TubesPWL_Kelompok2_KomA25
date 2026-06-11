<x-app-layout>

    @section('title', 'Edit Lesson - Cuanify')

    <div class="min-h-screen -mx-4 sm:-mx-6 lg:-mx-8 -mt-6 p-6">
        <div class="max-w-7xl mx-auto">

            <a id="btnBack" href="{{ route('instructor.courses.show', $course->course_id ?? $course->id) }}" 
               class="inline-flex items-center gap-2 text-sm font-semibold text-purple-600 hover:text-purple-800 mb-6 transition">
                ← Kembali ke Detail Course
            </a>

            <div class="bg-white rounded-[35px] overflow-hidden shadow-xl border border-purple-100 p-8 md:p-10">

                <div class="mb-8">
                    <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Edit Materi Lesson</h1>
                    <p class="text-gray-500 text-sm mt-1">Perbarui isi materi, struktur bacaan, atau kuis evaluasi untuk modul pembelajaran ini.</p>
                </div>

                @if(session('success'))
                    <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl text-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        {{ session('success') }}
                    </div>
                @endif

                <form
                    id="lessonForm"
                    action="{{ route('instructor.lessons.update', [
                        'course' => $course->course_id,
                        'lesson' => $lesson->lesson_id
                    ]) }}"
                    method="POST"
                    class="space-y-6">

                    @csrf
                    @method('PUT')

                    <div class="prose max-w-none">
                        @include('instructor.lessons.form')
                    </div>

                    <hr class="border-gray-100 my-8">

                    <div class="flex items-center gap-3 justify-end">
                        
                        <button
                            type="button"
                            id="btnPreview"
                            data-preview-url="{{ route('instructor.lessons.preview', [
                                'course' => $course->course_id,
                                'lesson' => $lesson->lesson_id
                            ]) }}"
                            class="inline-flex items-center bg-white hover:bg-purple-50 text-purple-700 border border-purple-200 px-6 py-3 rounded-xl font-bold text-sm shadow-sm transition duration-300 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Preview Modul
                        </button>

                        <button
                            type="submit"
                            class="inline-flex items-center bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white px-6 py-3 rounded-xl font-bold text-sm shadow-md transition-all duration-300 hover:-translate-y-0.5 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Simpan Perubahan Modul
                        </button>

                    </div>

                </form>

            </div>
        </div>
    </div>

</x-app-layout>

<style>
    /* Styling Kustom Kerapihan Hasil teks Editor CKEditor 5 */
    .ck-editor__editable_inline h1 { font-size: 2.25rem !important; font-weight: 800 !important; display: block !important; margin-top: 1.5rem !important; margin-bottom: 0.5rem !important; text-rendering: optimizeLegibility; }
    .ck-editor__editable_inline h2 { font-size: 1.875rem !important; font-weight: 700 !important; display: block !important; margin-top: 1.25rem !important; margin-bottom: 0.5rem !important; }
    .ck-editor__editable_inline h3 { font-size: 1.5rem !important; font-weight: 600 !important; display: block !important; margin-top: 1rem !important; margin-bottom: 0.5rem !important; }
    .ck-editor__editable_inline { min-height: 280px; border-bottom-left-radius: 12px !important; border-bottom-right-radius: 12px !important; background-color: #f9fafb !important; p: 1rem; }
    .ck-toolbar { border-top-left-radius: 12px !important; border-top-right-radius: 12px !important; border-color: #e5e7eb !important; background-color: #ffffff !important; }
</style>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
let isFormDirty = false;
let editorInstance = null;
const form = document.getElementById('lessonForm');

ClassicEditor
    .create(document.querySelector('#editor'), {
        toolbar: {
            items: [
                'heading', '|', 'bold', 'italic', '|',
                'bulletedList', 'numberedList', '|',
                'link', 'blockQuote', 'insertTable', '|',
                'undo', 'redo'
            ]
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
            ]
        }
    })
    .then(editor => {
        editorInstance = editor;

        editor.model.document.on('change:data', () => {
            isFormDirty = true;
        });
    })
    .catch(error => {
        console.error(error);
    });

if (form) {
    form.addEventListener('input', () => {
        isFormDirty = true;
    });

    form.addEventListener('submit', () => {
        isFormDirty = false; 
    });
}

const btnBack = document.getElementById('btnBack');
if (btnBack) {
    btnBack.addEventListener('click', function(e) {
        if (isFormDirty) {
            const confirmLeave = confirm("Ada perubahan yang belum disimpan. Apakah Anda yakin ingin kembali tanpa menyimpan?");
            if (!confirmLeave) {
                e.preventDefault();
            }
        }
    });
}
window.addEventListener('beforeunload', function (e) {
    if (isFormDirty) {
        e.preventDefault();
        e.returnValue = ''; 
    }
});

const btnPreview = document.getElementById('btnPreview');
if (btnPreview) {
    btnPreview.addEventListener('click', function() {
        const previewUrl = this.getAttribute('data-preview-url');
        
        if (editorInstance) {
            document.querySelector('#editor').value = editorInstance.getData();
        }

        const formData = new FormData(form);

        const originalText = btnPreview.innerText;
        btnPreview.innerText = 'Saving...';
        btnPreview.disabled = true;

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => {
            btnPreview.innerHTML = originalText;
            btnPreview.disabled = false;

            if (response.ok) {
                isFormDirty = false; 
                window.open(previewUrl, '_blank'); 
            } else {
                alert('Gagal menyimpan data otomatis sebelum memuat preview. Periksa validasi input Anda.');
            }
        })
        .catch(error => {
            btnPreview.innerHTML = originalText;
            btnPreview.disabled = false;
            console.error('Error:', error);
            alert('Terjadi kendala jaringan saat mengamankan data.');
        });
    });
}

const checkbox = document.getElementById('hasQuiz');
const quizSection = document.getElementById('quizSection');
if (checkbox && quizSection) {
    checkbox.addEventListener('change', function() {
        quizSection.classList.toggle('hidden');
    });
}
</script>