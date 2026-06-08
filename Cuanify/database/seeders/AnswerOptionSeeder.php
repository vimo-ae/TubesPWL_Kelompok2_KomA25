<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\AnswerOption;

class AnswerOptionSeeder extends Seeder
{
    public function run(): void
    {
        // Question 1 (MCQ)
        AnswerOption::create([
            'question_id' => 1,
            'option_text' => 'Menghabiskan uang',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 1,
            'option_text' => 'Mengembangkan nilai uang',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 1,
            'option_text' => 'Menabung tanpa tujuan',
            'is_correct' => false
        ]);

        // Question 2 (True/False)
        AnswerOption::create([
            'question_id' => 2,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 2,
            'option_text' => 'False',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 3,
            'option_text' => 'Dana untuk membeli barang mewah',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 3,
            'option_text' => 'Dana yang disiapkan untuk keadaan tak terduga',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 3,
            'option_text' => 'Dana untuk berlibur setiap tahun',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 4,
            'option_text' => 'Pakaian, makanan, dan tempat tinggal',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 4,
            'option_text' => 'Smartphone terbaru',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 4,
            'option_text' => 'Liburan ke luar negeri',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 5,
            'option_text' => 'Membantu mengatur pengeluaran dan tabungan',
                    'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 5,
            'option_text' => 'Membuat pengeluaran menjadi lebih banyak',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 5,
            'option_text' => 'Menghilangkan kebutuhan menabung',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 6,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 6,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 7,
            'option_text' => 'True',
            'is_correct' => false
        ]);
        
        AnswerOption::create([
            'question_id' => 7,
            'option_text' => 'False',
            'is_correct' => true
        ]);
        
                // ==============================
        // QUIZ 2 - Anggaran 50/30/20
        // ==============================

        // Question 8
        AnswerOption::create([
            'question_id' => 8,
            'option_text' => 'Menghabiskan seluruh pendapatan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 8,
            'option_text' => 'Mengatur penggunaan uang dengan lebih terencana',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 8,
            'option_text' => 'Menambah jumlah utang',
            'is_correct' => false
        ]);

        // Question 9
        AnswerOption::create([
            'question_id' => 9,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 9,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 10
        AnswerOption::create([
            'question_id' => 10,
            'option_text' => 'Makanan dan transportasi',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 10,
            'option_text' => 'Liburan dan hiburan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 10,
            'option_text' => 'Koleksi barang hobi',
            'is_correct' => false
        ]);

        // Question 11
        AnswerOption::create([
            'question_id' => 11,
            'option_text' => '10%',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 11,
            'option_text' => '20%',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 11,
            'option_text' => '50%',
            'is_correct' => false
        ]);

        // Question 12
        AnswerOption::create([
            'question_id' => 12,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 12,
            'option_text' => 'False',
            'is_correct' => true
        ]);

        // Question 13
        AnswerOption::create([
            'question_id' => 13,
            'option_text' => 'Membantu mengontrol pengeluaran',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 13,
            'option_text' => 'Meningkatkan pengeluaran konsumtif',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 13,
            'option_text' => 'Menghilangkan kebutuhan menabung',
            'is_correct' => false
        ]);

        // Question 14
        AnswerOption::create([
            'question_id' => 14,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 14,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // ==============================
        // QUIZ 3 - Dana Darurat
        // ==============================

        // Question 15
        AnswerOption::create([
            'question_id' => 15,
            'option_text' => 'Membeli barang mewah',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 15,
            'option_text' => 'Menghadapi kebutuhan tak terduga',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 15,
            'option_text' => 'Membayar hiburan bulanan',
            'is_correct' => false
        ]);

        // Question 16
        AnswerOption::create([
            'question_id' => 16,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 16,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 17
        AnswerOption::create([
            'question_id' => 17,
            'option_text' => 'Tabungan yang mudah dicairkan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 17,
            'option_text' => 'Barang koleksi',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 17,
            'option_text' => 'Aset yang sulit dijual',
            'is_correct' => false
        ]);

        // Question 18
        AnswerOption::create([
            'question_id' => 18,
            'option_text' => '1 bulan biaya hidup',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 18,
            'option_text' => '3-6 bulan biaya hidup',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 18,
            'option_text' => '12 tahun biaya hidup',
            'is_correct' => false
        ]);

        // Question 19
        AnswerOption::create([
            'question_id' => 19,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 19,
            'option_text' => 'False',
            'is_correct' => true
        ]);

        // Question 20
        AnswerOption::create([
            'question_id' => 20,
            'option_text' => 'Menambah risiko utang',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 20,
            'option_text' => 'Memberikan perlindungan saat keadaan darurat',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 20,
            'option_text' => 'Mengurangi pendapatan',
            'is_correct' => false
        ]);

        // Question 21
        AnswerOption::create([
            'question_id' => 21,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 21,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // ==============================
        // QUIZ 4 - Menabung
        // ==============================

        // Question 22
        AnswerOption::create([
            'question_id' => 22,
            'option_text' => 'Membantu mencapai tujuan keuangan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 22,
            'option_text' => 'Menghabiskan uang lebih cepat',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 22,
            'option_text' => 'Menambah utang',
            'is_correct' => false
        ]);

        // Question 23
        AnswerOption::create([
            'question_id' => 23,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 23,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 24
        AnswerOption::create([
            'question_id' => 24,
            'option_text' => 'Setelah uang habis',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 24,
            'option_text' => 'Saat menerima pendapatan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 24,
            'option_text' => 'Menjelang akhir tahun',
            'is_correct' => false
        ]);

        // Question 25
        AnswerOption::create([
            'question_id' => 25,
            'option_text' => 'Target yang ingin dicapai secara finansial',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 25,
            'option_text' => 'Daftar belanja harian',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 25,
            'option_text' => 'Tagihan bulanan',
            'is_correct' => false
        ]);

        // Question 26
        AnswerOption::create([
            'question_id' => 26,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 26,
            'option_text' => 'False',
            'is_correct' => true
        ]);

        // Question 27
        AnswerOption::create([
            'question_id' => 27,
            'option_text' => 'Agar tabungan lebih terpisah dari uang belanja',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 27,
            'option_text' => 'Agar lebih mudah dihabiskan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 27,
            'option_text' => 'Agar tidak perlu menabung lagi',
            'is_correct' => false
        ]);

        // Question 28
        AnswerOption::create([
            'question_id' => 28,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 28,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // ==============================
        // QUIZ 5 - Dasar Investasi
        // ==============================

        // Question 29
        AnswerOption::create([
            'question_id' => 29,
            'option_text' => 'Mengembangkan nilai uang',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 29,
            'option_text' => 'Menghabiskan seluruh pendapatan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 29,
            'option_text' => 'Menghindari menabung',
            'is_correct' => false
        ]);

        // Question 30
        AnswerOption::create([
            'question_id' => 30,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 30,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 31
        AnswerOption::create([
            'question_id' => 31,
            'option_text' => 'Reksa Dana',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 31,
            'option_text' => 'Tagihan listrik',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 31,
            'option_text' => 'Belanja bulanan',
            'is_correct' => false
        ]);

        // Question 32
        AnswerOption::create([
            'question_id' => 32,
            'option_text' => 'Semakin tinggi risiko, semakin tinggi potensi keuntungan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 32,
            'option_text' => 'Tidak ada hubungan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 32,
            'option_text' => 'Semakin tinggi risiko, semakin kecil keuntungan',
            'is_correct' => false
        ]);

        // Question 33
        AnswerOption::create([
            'question_id' => 33,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 33,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 34
        AnswerOption::create([
            'question_id' => 34,
            'option_text' => 'Untuk mencapai tujuan keuangan jangka panjang',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 34,
            'option_text' => 'Untuk menghabiskan uang',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 34,
            'option_text' => 'Untuk menghindari keuntungan',
            'is_correct' => false
        ]);

        // Question 35
        AnswerOption::create([
            'question_id' => 35,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 35,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // ==============================
        // QUIZ 6 - Mengelola Utang
        // ==============================

        // Question 36
        AnswerOption::create([
            'question_id' => 36,
            'option_text' => 'Kewajiban yang harus dibayar kembali',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 36,
            'option_text' => 'Tabungan masa depan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 36,
            'option_text' => 'Investasi tanpa risiko',
            'is_correct' => false
        ]);

        // Question 37
        AnswerOption::create([
            'question_id' => 37,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 37,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 38
        AnswerOption::create([
            'question_id' => 38,
            'option_text' => 'Pinjaman modal usaha',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 38,
            'option_text' => 'Membeli gadget terbaru',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 38,
            'option_text' => 'Liburan mewah',
            'is_correct' => false
        ]);

        // Question 39
        AnswerOption::create([
            'question_id' => 39,
            'option_text' => 'Kesulitan keuangan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 39,
            'option_text' => 'Pendapatan meningkat otomatis',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 39,
            'option_text' => 'Risiko berkurang',
            'is_correct' => false
        ]);

        // Question 40
        AnswerOption::create([
            'question_id' => 40,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 40,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 41
        AnswerOption::create([
            'question_id' => 41,
            'option_text' => 'Menilai kemampuan membayar',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 41,
            'option_text' => 'Langsung meminjam sebanyak mungkin',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 41,
            'option_text' => 'Mengabaikan bunga pinjaman',
            'is_correct' => false
        ]);

        // Question 42
        AnswerOption::create([
            'question_id' => 42,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 42,
            'option_text' => 'False',
            'is_correct' => true
        ]);

        // ==============================
        // QUIZ 7 - Manajemen Risiko
        // ==============================

        // Question 43
        AnswerOption::create([
            'question_id' => 43,
            'option_text' => 'Kemungkinan terjadinya kerugian keuangan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 43,
            'option_text' => 'Keuntungan yang pasti diperoleh',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 43,
            'option_text' => 'Tabungan rutin bulanan',
            'is_correct' => false
        ]);

        // Question 44
        AnswerOption::create([
            'question_id' => 44,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 44,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 45
        AnswerOption::create([
            'question_id' => 45,
            'option_text' => 'Membantu menghadapi keadaan darurat',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 45,
            'option_text' => 'Menambah risiko keuangan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 45,
            'option_text' => 'Mengurangi pendapatan',
            'is_correct' => false
        ]);

        // Question 46
        AnswerOption::create([
            'question_id' => 46,
            'option_text' => 'Asuransi',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 46,
            'option_text' => 'Belanja impulsif',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 46,
            'option_text' => 'Menghabiskan tabungan',
            'is_correct' => false
        ]);

        // Question 47
        AnswerOption::create([
            'question_id' => 47,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 47,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 48
        AnswerOption::create([
            'question_id' => 48,
            'option_text' => 'Membantu mencapai tujuan keuangan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 48,
            'option_text' => 'Meningkatkan risiko',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 48,
            'option_text' => 'Menghilangkan kebutuhan menabung',
            'is_correct' => false
        ]);

        // Question 49
        AnswerOption::create([
            'question_id' => 49,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 49,
            'option_text' => 'False',
            'is_correct' => true
        ]);

        // ==============================
        // QUIZ 8 - Ujian Akhir
        // ==============================

        // Question 50
        AnswerOption::create([
            'question_id' => 50,
            'option_text' => 'Mengelola uang untuk mencapai tujuan keuangan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 50,
            'option_text' => 'Menghabiskan semua pendapatan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 50,
            'option_text' => 'Menghindari menabung',
            'is_correct' => false
        ]);

        // Question 51
        AnswerOption::create([
            'question_id' => 51,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 51,
            'option_text' => 'False',
            'is_correct' => false
        ]);

        // Question 52
        AnswerOption::create([
            'question_id' => 52,
            'option_text' => 'Menghadapi keadaan darurat',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 52,
            'option_text' => 'Membeli barang mewah',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 52,
            'option_text' => 'Meningkatkan konsumsi',
            'is_correct' => false
        ]);

        // Question 53
        AnswerOption::create([
            'question_id' => 53,
            'option_text' => 'Membantu mencapai tujuan keuangan',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 53,
            'option_text' => 'Mengurangi pendapatan',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 53,
            'option_text' => 'Menambah utang',
            'is_correct' => false
        ]);

        // Question 54
        AnswerOption::create([
            'question_id' => 54,
            'option_text' => 'True',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 54,
            'option_text' => 'False',
            'is_correct' => true
        ]);

        // Question 55
        AnswerOption::create([
            'question_id' => 55,
            'option_text' => 'Utang untuk kegiatan yang menghasilkan nilai tambah',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 55,
            'option_text' => 'Utang untuk membeli barang konsumtif',
            'is_correct' => false
        ]);

        AnswerOption::create([
            'question_id' => 55,
            'option_text' => 'Utang tanpa tujuan',
            'is_correct' => false
        ]);

        // Question 56
        AnswerOption::create([
            'question_id' => 56,
            'option_text' => 'True',
            'is_correct' => true
        ]);

        AnswerOption::create([
            'question_id' => 56,
            'option_text' => 'False',
            'is_correct' => false
        ]);
    }
}