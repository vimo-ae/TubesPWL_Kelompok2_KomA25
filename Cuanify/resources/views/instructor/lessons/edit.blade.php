<x-app-layout>

    @section('title', 'Edit Lesson - Cuanify')

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a id="btnBack" href="{{ route('instructor.courses.show', $course->course_id ?? $course->id) }}" 
        class="inline-block mb-4 text-indigo-600 hover:text-indigo-800 font-medium transition-all">
            ← Kembali ke Daftar Lesson
    </a>

    <div class="max-w-5xl mx-auto p-6">

        <h1 class="text-2xl font-bold mb-6">
            Edit Lesson
        </h1>

        <form
            id="lessonForm"
            action="{{ route('instructor.lessons.update', [
                'course' => $course->course_id,
                'lesson' => $lesson->lesson_id
            ]) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('instructor.lessons.form')

            <div class="flex gap-3 mt-8">

                <button
                    type="submit"
                    class="bg-gray-700 text-white px-5 py-2 rounded-lg">
                    Simpan Draft
                </button>

                <button
                    type="button"
                    id="btnPreview"
                    data-preview-url="{{ route('instructor.lessons.preview', [
                        'course' => $course->course_id,
                        'lesson' => $lesson->lesson_id
                    ]) }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">
                    Preview
                </button>

            </div>

        </form>

    </div>

</x-app-layout>

<style>
    .ck-editor__editable_inline h1 { font-size: 2.25rem !important; font-weight: 800 !important; display: block !important; margin-top: 1.5rem !important; margin-bottom: 0.5rem !important; }
    .ck-editor__editable_inline h2 { font-size: 1.875rem !important; font-weight: 700 !important; display: block !important; margin-top: 1.25rem !important; margin-bottom: 0.5rem !important; }
    .ck-editor__editable_inline h3 { font-size: 1.5rem !important; font-weight: 600 !important; display: block !important; margin-top: 1rem !important; margin-bottom: 0.5rem !important; }
    .ck-editor__editable_inline { min-height: 250px; }
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
            btnPreview.innerText = originalText;
            btnPreview.disabled = false;

            if (response.ok) {
                isFormDirty = false; 
                window.open(previewUrl, '_blank'); 
            } else {
                alert('Gagal menyimpan data otomatis sebelum memuat preview. Periksa validasi input Anda.');
            }
        })
        .catch(error => {
            btnPreview.innerText = originalText;
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