<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnswerOption;

class AnswerOptionSeeder extends Seeder
{
    public function run(): void
    {
        $questionsData = [
            1 => [
                ['text' => 'Menghabiskan uang', 'is_correct' => false],
                ['text' => 'Mengembangkan nilai uang', 'is_correct' => true],
                ['text' => 'Menabung tanpa tujuan', 'is_correct' => false],
                ['text' => 'Beli BMW', 'is_correct' => false],
            ],
            2 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            3 => [
                ['text' => 'Dana untuk membeli barang mewah', 'is_correct' => false],
                ['text' => 'Dana yang disiapkan untuk keadaan tak terduga', 'is_correct' => true],
                ['text' => 'Dana untuk berlibur setiap tahun', 'is_correct' => false],
            ],
            4 => [
                ['text' => 'Pakaian, makanan, dan tempat tinggal', 'is_correct' => true],
                ['text' => 'Smartphone terbaru', 'is_correct' => false],
                ['text' => 'Liburan ke luar negeri', 'is_correct' => false],
            ],
            5 => [
                ['text' => 'Membantu mengatur pengeluaran dan tabungan', 'is_correct' => true],
                ['text' => 'Membuat pengeluaran menjadi lebih banyak', 'is_correct' => false],
                ['text' => 'Menghilangkan kebutuhan menabung', 'is_correct' => false],
            ],
            6 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            7 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            // Quiz 2
            8 => [
                ['text' => 'Menghabiskan seluruh pendapatan', 'is_correct' => false],
                ['text' => 'Mengatur penggunaan uang dengan lebih terencana', 'is_correct' => true],
                ['text' => 'Menambah jumlah utang', 'is_correct' => false],
            ],
            9 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            10 => [
                ['text' => 'Makanan dan transportasi', 'is_correct' => true],
                ['text' => 'Liburan dan hiburan', 'is_correct' => false],
                ['text' => 'Koleksi barang hobi', 'is_correct' => false],
            ],
            11 => [
                ['text' => '10%', 'is_correct' => false],
                ['text' => '20%', 'is_correct' => true],
                ['text' => '50%', 'is_correct' => false],
            ],
            12 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            13 => [
                ['text' => 'Membantu mengontrol pengeluaran', 'is_correct' => true],
                ['text' => 'Meningkatkan pengeluaran konsumtif', 'is_correct' => false],
                ['text' => 'Menghilangkan kebutuhan menabung', 'is_correct' => false],
            ],
            14 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            15 => [
                ['text' => 'Membeli barang mewah', 'is_correct' => false],
                ['text' => 'Menghadapi kebutuhan tak terduga', 'is_correct' => true],
                ['text' => 'Membayar hiburan bulanan', 'is_correct' => false],
            ],
            16 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            17 => [
                ['text' => 'Tabungan yang mudah dicairkan', 'is_correct' => true],
                ['text' => 'Barang koleksi', 'is_correct' => false],
                ['text' => 'Aset yang sulit dijual', 'is_correct' => false],
            ],
            18 => [
                ['text' => '1 bulan biaya hidup', 'is_correct' => false],
                ['text' => '3-6 bulan biaya hidup', 'is_correct' => true],
                ['text' => '12 tahun biaya hidup', 'is_correct' => false],
            ],
            19 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            20 => [
                ['text' => 'Menambah risiko utang', 'is_correct' => false],
                ['text' => 'Memberikan perlindungan saat keadaan darurat', 'is_correct' => true],
                ['text' => 'Mengurangi pendapatan', 'is_correct' => false],
            ],
            21 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            22 => [
                ['text' => 'Membantu mencapai tujuan keuangan', 'is_correct' => true],
                ['text' => 'Menghabiskan uang lebih cepat', 'is_correct' => false],
                ['text' => 'Menambah utang', 'is_correct' => false],
            ],
            23 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            24 => [
                ['text' => 'Setelah uang habis', 'is_correct' => false],
                ['text' => 'Saat menerima pendapatan', 'is_correct' => true],
                ['text' => 'Menjelang akhir tahun', 'is_correct' => false],
            ],
            25 => [
                ['text' => 'Target yang ingin dicapai secara finansial', 'is_correct' => true],
                ['text' => 'Daftar belanja harian', 'is_correct' => false],
                ['text' => 'Tagihan bulanan', 'is_correct' => false],
            ],
            26 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            27 => [
                ['text' => 'Agar tabungan lebih terpisah dari uang belanja', 'is_correct' => true],
                ['text' => 'Agar lebih mudah dihabiskan', 'is_correct' => false],
                ['text' => 'Agar tidak perlu menabung lagi', 'is_correct' => false],
            ],
            28 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            29 => [
                ['text' => 'Mengembangkan nilai uang', 'is_correct' => true],
                ['text' => 'Menghabiskan seluruh pendapatan', 'is_correct' => false],
                ['text' => 'Menghindari menabung', 'is_correct' => false],
            ],
            30 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            31 => [
                ['text' => 'Reksa Dana', 'is_correct' => true],
                ['text' => 'Tagihan listrik', 'is_correct' => false],
                ['text' => 'Belanja bulanan', 'is_correct' => false],
            ],
            32 => [
                ['text' => 'Semakin tinggi risiko, semakin tinggi potensi keuntungan', 'is_correct' => true],
                ['text' => 'Tidak ada hubungan', 'is_correct' => false],
                ['text' => 'Semakin tinggi risiko, semakin kecil keuntungan', 'is_correct' => false],
            ],
            33 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            34 => [
                ['text' => 'Untuk mencapai tujuan keuangan jangka panjang', 'is_correct' => true],
                ['text' => 'Untuk menghabiskan uang', 'is_correct' => false],
                ['text' => 'Untuk menghindari keuntungan', 'is_correct' => false],
            ],
            35 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            36 => [
                ['text' => 'Kewajiban yang harus dibayar kembali', 'is_correct' => true],
                ['text' => 'Tabungan masa depan', 'is_correct' => false],
                ['text' => 'Investasi tanpa risiko', 'is_correct' => false],
            ],
            37 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            38 => [
                ['text' => 'Pinjaman modal usaha', 'is_correct' => true],
                ['text' => 'Membeli gadget terbaru', 'is_correct' => false],
                ['text' => 'Liburan mewah', 'is_correct' => false],
            ],
            39 => [
                ['text' => 'Kesulitan keuangan', 'is_correct' => true],
                ['text' => 'Pendapatan meningkat otomatis', 'is_correct' => false],
                ['text' => 'Risiko berkurang', 'is_correct' => false],
            ],
            40 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            41 => [
                ['text' => 'Menilai kemampuan membayar', 'is_correct' => true],
                ['text' => 'Langsung meminjam sebanyak mungkin', 'is_correct' => false],
                ['text' => 'Mengabaikan bunga pinjaman', 'is_correct' => false],
            ],
            42 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            43 => [
                ['text' => 'Kemungkinan terjadinya kerugian keuangan', 'is_correct' => true],
                ['text' => 'Keuntungan yang pasti diperoleh', 'is_correct' => false],
                ['text' => 'Tabungan rutin bulanan', 'is_correct' => false],
            ],
            44 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            45 => [
                ['text' => 'Membantu menghadapi keadaan darurat', 'is_correct' => true],
                ['text' => 'Menambah risiko keuangan', 'is_correct' => false],
                ['text' => 'Mengurangi pendapatan', 'is_correct' => false],
            ],
            46 => [
                ['text' => 'Asuransi', 'is_correct' => true],
                ['text' => 'Belanja impulsif', 'is_correct' => false],
                ['text' => 'Menghabiskan tabungan', 'is_correct' => false],
            ],
            47 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            48 => [
                ['text' => 'Membantu mencapai tujuan keuangan', 'is_correct' => true],
                ['text' => 'Meningkatkan risiko', 'is_correct' => false],
                ['text' => 'Menghilangkan kebutuhan menabung', 'is_correct' => false],
            ],
            49 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            50 => [
                ['text' => 'Mengelola uang untuk mencapai tujuan keuangan', 'is_correct' => true],
                ['text' => 'Menghabiskan semua pendapatan', 'is_correct' => false],
                ['text' => 'Menghindari menabung', 'is_correct' => false],
            ],
            51 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
            52 => [
                ['text' => 'Menghadapi keadaan darurat', 'is_correct' => true],
                ['text' => 'Membeli barang mewah', 'is_correct' => false],
                ['text' => 'Meningkatkan konsumsi', 'is_correct' => false],
            ],
            53 => [
                ['text' => 'Membantu mencapai tujuan keuangan', 'is_correct' => true],
                ['text' => 'Mengurangi pendapatan', 'is_correct' => false],
                ['text' => 'Menambah utang', 'is_correct' => false],
            ],
            54 => [
                ['text' => 'True', 'is_correct' => false],
                ['text' => 'False', 'is_correct' => true],
            ],
            55 => [
                ['text' => 'Utang untuk kegiatan yang menghasilkan nilai tambah', 'is_correct' => true],
                ['text' => 'Utang untuk membeli barang konsumtif', 'is_correct' => false],
                ['text' => 'Utang tanpa tujuan', 'is_correct' => false],
            ],
            56 => [
                ['text' => 'True', 'is_correct' => true],
                ['text' => 'False', 'is_correct' => false],
            ],
        ];

        foreach ($questionsData as $questionId => $options) {
            $this->createAnswerOptions($questionId, $options);
        }
    }

    private function createAnswerOptions(int $questionId, array $options): void
    {
        foreach ($options as $option) {
            AnswerOption::updateOrCreate(
                [
                    'question_id' => $questionId,
                    'option_text' => $option['text']
                ],
                [
                    'is_correct' => $option['is_correct']
                ]
            );
        }
    }
}