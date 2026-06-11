<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            ['question_id' => 1, 'quiz_id' => 1, 'question_text' => 'Apa tujuan utama investasi?', 'question_type' => 'multiple_choice'],
            ['question_id' => 2, 'quiz_id' => 1, 'question_text' => 'Investasi selalu tanpa risiko', 'question_type' => 'true_false'],
            ['question_id' => 3, 'quiz_id' => 1, 'question_text' => 'Apa yang dimaksud dengan dana darurat?', 'question_type' => 'multiple_choice'],
            ['question_id' => 4, 'quiz_id' => 1, 'question_text' => 'Manakah yang termasuk kebutuhan primer?', 'question_type' => 'multiple_choice'],
            ['question_id' => 5, 'quiz_id' => 1, 'question_text' => 'Apa manfaat membuat anggaran keuangan pribadi?', 'question_type' => 'multiple_choice'],
            ['question_id' => 6, 'quiz_id' => 1, 'question_text' => 'Menabung secara rutin dapat membantu mencapai tujuan keuangan.', 'question_type' => 'true_false'],
            ['question_id' => 7, 'quiz_id' => 1, 'question_text' => 'Semua jenis investasi pasti memberikan keuntungan.', 'question_type' => 'true_false'],

            ['question_id' => 8, 'quiz_id' => 2, 'question_text' => 'Apa tujuan utama membuat anggaran bulanan?', 'question_type' => 'multiple_choice'],
            ['question_id' => 9, 'quiz_id' => 2, 'question_text' => 'Dalam metode 50/30/20, 50% pendapatan dialokasikan untuk kebutuhan.', 'question_type' => 'true_false'],
            ['question_id' => 10, 'quiz_id' => 2, 'question_text' => 'Kategori manakah yang termasuk kebutuhan dalam metode 50/30/20?', 'question_type' => 'multiple_choice'],
            ['question_id' => 11, 'quiz_id' => 2, 'question_text' => 'Berapa persen pendapatan yang dialokasikan untuk tabungan dan investasi dalam metode 50/30/20?', 'question_type' => 'multiple_choice'],
            ['question_id' => 12, 'quiz_id' => 2, 'question_text' => 'Hiburan termasuk kategori kebutuhan dalam metode 50/30/20.', 'question_type' => 'true_false'],
            ['question_id' => 13, 'quiz_id' => 2, 'question_text' => 'Apa manfaat utama menggunakan metode 50/30/20?', 'question_type' => 'multiple_choice'],
            ['question_id' => 14, 'quiz_id' => 2, 'question_text' => 'Anggaran membantu seseorang mengontrol pengeluaran.', 'question_type' => 'true_false'],

            ['question_id' => 15, 'quiz_id' => 3, 'question_text' => 'Apa tujuan utama dana darurat?', 'question_type' => 'multiple_choice'],
            ['question_id' => 16, 'quiz_id' => 3, 'question_text' => 'Dana darurat digunakan untuk kebutuhan yang tidak terduga.', 'question_type' => 'true_false'],
            ['question_id' => 17, 'quiz_id' => 3, 'question_text' => 'Di mana dana darurat sebaiknya disimpan?', 'question_type' => 'multiple_choice'],
            ['question_id' => 18, 'quiz_id' => 3, 'question_text' => 'Berapa bulan biaya hidup yang umumnya disarankan sebagai dana darurat?', 'question_type' => 'multiple_choice'],
            ['question_id' => 19, 'quiz_id' => 3, 'question_text' => 'Dana darurat hanya diperlukan oleh orang yang sudah menikah.', 'question_type' => 'true_false'],
            ['question_id' => 20, 'quiz_id' => 3, 'question_text' => 'Apa manfaat memiliki dana darurat?', 'question_type' => 'multiple_choice'],
            ['question_id' => 21, 'quiz_id' => 3, 'question_text' => 'Dana darurat dapat membantu mengurangi ketergantungan pada utang.', 'question_type' => 'true_false'],

            ['question_id' => 22, 'quiz_id' => 4, 'question_text' => 'Apa manfaat utama menabung?', 'question_type' => 'multiple_choice'],
            ['question_id' => 23, 'quiz_id' => 4, 'question_text' => 'Menabung membantu mencapai tujuan keuangan.', 'question_type' => 'true_false'],
            ['question_id' => 24, 'quiz_id' => 4, 'question_text' => 'Kapan waktu terbaik untuk menyisihkan uang tabungan?', 'question_type' => 'multiple_choice'],
            ['question_id' => 25, 'quiz_id' => 4, 'question_text' => 'Apa yang dimaksud dengan tujuan keuangan?', 'question_type' => 'multiple_choice'],
            ['question_id' => 26, 'quiz_id' => 4, 'question_text' => 'Menabung hanya diperlukan jika memiliki pendapatan besar.', 'question_type' => 'true_false'],
            ['question_id' => 27, 'quiz_id' => 4, 'question_text' => 'Mengapa rekening khusus tabungan disarankan?', 'question_type' => 'multiple_choice'],
            ['question_id' => 28, 'quiz_id' => 4, 'question_text' => 'Konsistensi merupakan faktor penting dalam menabung.', 'question_type' => 'true_false'],

            ['question_id' => 29, 'quiz_id' => 5, 'question_text' => 'Apa tujuan utama investasi?', 'question_type' => 'multiple_choice'],
            ['question_id' => 30, 'quiz_id' => 5, 'question_text' => 'Investasi dapat membantu melawan inflasi.', 'question_type' => 'true_false'],
            ['question_id' => 31, 'quiz_id' => 5, 'question_text' => 'Manakah yang termasuk instrumen investasi?', 'question_type' => 'multiple_choice'],
            ['question_id' => 32, 'quiz_id' => 5, 'question_text' => 'Apa hubungan risiko dan keuntungan dalam investasi?', 'question_type' => 'multiple_choice'],
            ['question_id' => 33, 'quiz_id' => 5, 'question_text' => 'Semua investasi memiliki risiko.', 'question_type' => 'true_false'],
            ['question_id' => 34, 'quiz_id' => 5, 'question_text' => 'Mengapa seseorang berinvestasi?', 'question_type' => 'multiple_choice'],
            ['question_id' => 35, 'quiz_id' => 5, 'question_text' => 'Deposito termasuk salah satu bentuk investasi.', 'question_type' => 'true_false'],

            ['question_id' => 36, 'quiz_id' => 6, 'question_text' => 'Apa yang dimaksud dengan utang?', 'question_type' => 'multiple_choice'],
            ['question_id' => 37, 'quiz_id' => 6, 'question_text' => 'Utang produktif digunakan untuk menghasilkan nilai tambah.', 'question_type' => 'true_false'],
            ['question_id' => 38, 'quiz_id' => 6, 'question_text' => 'Contoh utang produktif adalah?', 'question_type' => 'multiple_choice'],
            ['question_id' => 39, 'quiz_id' => 6, 'question_text' => 'Apa risiko memiliki terlalu banyak utang?', 'question_type' => 'multiple_choice'],
            ['question_id' => 40, 'quiz_id' => 6, 'question_text' => 'Membayar cicilan tepat waktu merupakan kebiasaan yang baik.', 'question_type' => 'true_false'],
            ['question_id' => 41, 'quiz_id' => 6, 'question_text' => 'Apa yang harus dilakukan sebelum berutang?', 'question_type' => 'multiple_choice'],
            ['question_id' => 42, 'quiz_id' => 6, 'question_text' => 'Utang konsumtif selalu lebih baik daripada utang produktif.', 'question_type' => 'true_false'],

            ['question_id' => 43, 'quiz_id' => 7, 'question_text' => 'Apa yang dimaksud dengan risiko finansial?', 'question_type' => 'multiple_choice'],
            ['question_id' => 44, 'quiz_id' => 7, 'question_text' => 'Kehilangan pekerjaan merupakan contoh risiko finansial.', 'question_type' => 'true_false'],
            ['question_id' => 45, 'quiz_id' => 7, 'question_text' => 'Apa manfaat dana darurat dalam manajemen risiko?', 'question_type' => 'multiple_choice'],
            ['question_id' => 46, 'quiz_id' => 7, 'question_text' => 'Manakah yang dapat membantu mengurangi risiko finansial?', 'question_type' => 'multiple_choice'],
            ['question_id' => 47, 'quiz_id' => 7, 'question_text' => 'Asuransi dapat membantu mengelola risiko.', 'question_type' => 'true_false'],
            ['question_id' => 48, 'quiz_id' => 7, 'question_text' => 'Mengapa perencanaan keuangan penting?', 'question_type' => 'multiple_choice'],
            ['question_id' => 49, 'quiz_id' => 7, 'question_text' => 'Risiko finansial dapat dihilangkan sepenuhnya.', 'question_type' => 'true_false'],

            ['question_id' => 50, 'quiz_id' => 8, 'question_text' => 'Apa tujuan utama pengelolaan finansial pribadi?', 'question_type' => 'multiple_choice'],
            ['question_id' => 51, 'quiz_id' => 8, 'question_text' => 'Metode 50/30/20 membantu mengatur anggaran keuangan.', 'question_type' => 'true_false'],
            ['question_id' => 52, 'quiz_id' => 8, 'question_text' => 'Apa fungsi dana darurat?', 'question_type' => 'multiple_choice'],
            ['question_id' => 53, 'quiz_id' => 8, 'question_text' => 'Mengapa menabung penting?', 'question_type' => 'multiple_choice'],
            ['question_id' => 54, 'quiz_id' => 8, 'question_text' => 'Investasi selalu memberikan keuntungan tanpa risiko.', 'question_type' => 'true_false'],
            ['question_id' => 55, 'quiz_id' => 8, 'question_text' => 'Apa yang dimaksud dengan utang produktif?', 'question_type' => 'multiple_choice'],
            ['question_id' => 56, 'quiz_id' => 8, 'question_text' => 'Asuransi merupakan salah satu cara mengelola risiko finansial.', 'question_type' => 'true_false'],
        ];

        foreach ($questions as $question) {
            Question::updateOrCreate(
                ['question_id' => $question['question_id']],
                $question
            );
        }
    }
}