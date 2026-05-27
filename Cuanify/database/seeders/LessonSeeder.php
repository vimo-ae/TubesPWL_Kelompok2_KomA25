<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
    'course_id' => 1,
    'title' => 'Pengenalan Dasar Ekonomi',
    'content' => 'Materi ini membahas pengertian ekonomi, kebutuhan manusia, kelangkaan, serta konsep dasar dalam kegiatan ekonomi sehari-hari.',
    'video_url' => 'https://www.youtube.com/watch?v=3ez10ADR_gM',
    'pdf_file' => 'pdf/pengenalan-dasar-ekonomi.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 1,
    'title' => 'Permintaan dan Penawaran',
    'content' => 'Pada pelajaran ini siswa akan mempelajari hukum permintaan dan penawaran beserta faktor-faktor yang mempengaruhinya.',
    'video_url' => 'https://www.youtube.com/watch?v=fUjz_eiIX8k',
    'pdf_file' => 'pdf/permintaan-dan-penawaran.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 1,
    'title' => 'Sistem Ekonomi',
    'content' => 'Materi membahas berbagai jenis sistem ekonomi seperti ekonomi tradisional, pasar, komando, dan campuran.',
    'video_url' => 'https://www.youtube.com/watch?v=6mRbDEtDoyA',
    'pdf_file' => 'pdf/sistem-ekonomi.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 1,
    'title' => 'Inflasi dan Dampaknya',
    'content' => 'Pelajaran ini menjelaskan pengertian inflasi, penyebab terjadinya inflasi, dan dampaknya terhadap masyarakat.',
    'video_url' => 'https://www.youtube.com/watch?v=PHe0bXAIuk0',
    'pdf_file' => 'pdf/inflasi-dan-dampaknya.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 1,
    'title' => 'Pasar dan Jenisnya',
    'content' => 'Materi ini membahas definisi pasar serta jenis-jenis pasar berdasarkan bentuk dan waktunya.',
    'video_url' => 'https://www.youtube.com/watch?v=2f4sM1L5f3k',
    'pdf_file' => 'pdf/pasar-dan-jenisnya.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

Lesson::create([
    'course_id' => 2,
    'title' => 'Pengenalan Algoritma',
    'content' => 'Materi ini membahas pengertian algoritma, struktur dasar algoritma, dan penerapannya dalam pemrograman.',
    'video_url' => 'https://www.youtube.com/watch?v=8hly31xKli0',
    'pdf_file' => 'pdf/pengenalan-algoritma.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 2,
    'title' => 'Flowchart Dasar',
    'content' => 'Siswa akan mempelajari simbol-simbol flowchart dan cara membuat alur program sederhana.',
    'video_url' => 'https://www.youtube.com/watch?v=SWRDqTx8d4k',
    'pdf_file' => 'pdf/flowchart-dasar.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 2,
    'title' => 'Percabangan dalam Pemrograman',
    'content' => 'Materi membahas penggunaan if, else, dan switch untuk membuat keputusan dalam program.',
    'video_url' => 'https://www.youtube.com/watch?v=Zp5MuPOtsSY',
    'pdf_file' => 'pdf/percabangan.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 2,
    'title' => 'Perulangan Dasar',
    'content' => 'Pelajaran ini menjelaskan penggunaan for, while, dan do while dalam pemrograman.',
    'video_url' => 'https://www.youtube.com/watch?v=6DJtm3YnrRs',
    'pdf_file' => 'pdf/perulangan-dasar.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 2,
    'title' => 'Array dan Penggunaannya',
    'content' => 'Materi ini membahas konsep array, deklarasi array, dan implementasinya dalam program sederhana.',
    'video_url' => 'https://www.youtube.com/watch?v=RsdHwAxJ5tU',
    'pdf_file' => 'pdf/array-dan-penggunaannya.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 3: Pengantar Ilmu Ekonomi
// ==========================================
Lesson::create([
    'course_id' => 3,
    'title' => 'Konsep Dasar Ekonomi',
    'content' => 'Materi ini membahas definisi ilmu ekonomi, kelangkaan, dan pilihan rasional.',
    'video_url' => 'https://www.youtube.com/watch?v=eko1',
    'pdf_file' => 'pdf/konsep-dasar-ekonomi.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 3,
    'title' => 'Permintaan dan Penawaran',
    'content' => 'Penjelasan mengenai hukum permintaan, hukum penawaran, dan kurva yang mempengaruhinya.',
    'video_url' => 'https://www.youtube.com/watch?v=eko2',
    'pdf_file' => 'pdf/permintaan-penawaran.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 3,
    'title' => 'Keseimbangan Pasar',
    'content' => 'Siswa akan belajar bagaimana harga pasar terbentuk dari titik temu pembeli dan penjual.',
    'video_url' => 'https://www.youtube.com/watch?v=eko3',
    'pdf_file' => 'pdf/keseimbangan-pasar.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 3,
    'title' => 'Elastisitas',
    'content' => 'Membahas seberapa sensitif jumlah barang yang diminta atau ditawarkan terhadap perubahan harga.',
    'video_url' => 'https://www.youtube.com/watch?v=eko4',
    'pdf_file' => 'pdf/elastisitas.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 3,
    'title' => 'Kegagalan Pasar dan Eksternalitas',
    'content' => 'Pengenalan mengenai kondisi saat mekanisme pasar tidak bekerja secara efisien.',
    'video_url' => 'https://www.youtube.com/watch?v=eko5',
    'pdf_file' => 'pdf/kegagalan-pasar.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 4: Ekonomi Mikro
// ==========================================
Lesson::create([
    'course_id' => 4,
    'title' => 'Teori Perilaku Konsumen',
    'content' => 'Menganalisis bagaimana konsumen membuat keputusan untuk memaksimalkan utilitas mereka.',
    'video_url' => 'https://www.youtube.com/watch?v=mikro1',
    'pdf_file' => 'pdf/perilaku-konsumen.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 4,
    'title' => 'Teori Produksi',
    'content' => 'Mempelajari faktor-faktor produksi dan bagaimana perusahaan mengubah input menjadi output.',
    'video_url' => 'https://www.youtube.com/watch?v=mikro2',
    'pdf_file' => 'pdf/teori-produksi.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 4,
    'title' => 'Biaya Produksi',
    'content' => 'Pemahaman mengenai biaya tetap, biaya variabel, dan biaya marjinal dalam bisnis.',
    'video_url' => 'https://www.youtube.com/watch?v=mikro3',
    'pdf_file' => 'pdf/biaya-produksi.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 4,
    'title' => 'Pasar Persaingan Sempurna',
    'content' => 'Karakteristik pasar di mana terdapat banyak pembeli dan penjual dengan barang homogen.',
    'video_url' => 'https://www.youtube.com/watch?v=mikro4',
    'pdf_file' => 'pdf/persaingan-sempurna.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 4,
    'title' => 'Monopoli dan Oligopoli',
    'content' => 'Membahas struktur pasar yang dikuasai oleh satu atau segelintir perusahaan besar.',
    'video_url' => 'https://www.youtube.com/watch?v=mikro5',
    'pdf_file' => 'pdf/monopoli-oligopoli.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 5: Ekonomi Makro
// ==========================================
Lesson::create([
    'course_id' => 5,
    'title' => 'Pengantar Ekonomi Makro',
    'content' => 'Perbedaan makroekonomi dan mikroekonomi serta ruang lingkup makroekonomi.',
    'video_url' => 'https://www.youtube.com/watch?v=makro1',
    'pdf_file' => 'pdf/pengantar-makro.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 5,
    'title' => 'Pendapatan Nasional (PDB)',
    'content' => 'Cara menghitung Produk Domestik Bruto dan indikator kesehatan ekonomi suatu negara.',
    'video_url' => 'https://www.youtube.com/watch?v=makro2',
    'pdf_file' => 'pdf/pendapatan-nasional.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 5,
    'title' => 'Inflasi',
    'content' => 'Penyebab terjadinya kenaikan harga secara umum dan dampaknya terhadap daya beli masyarakat.',
    'video_url' => 'https://www.youtube.com/watch?v=makro3',
    'pdf_file' => 'pdf/inflasi.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 5,
    'title' => 'Pengangguran',
    'content' => 'Jenis-jenis pengangguran dan solusi pemerintah dalam menekan angka pengangguran.',
    'video_url' => 'https://www.youtube.com/watch?v=makro4',
    'pdf_file' => 'pdf/pengangguran.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 5,
    'title' => 'Kebijakan Fiskal dan Moneter',
    'content' => 'Peran pemerintah dan bank sentral dalam menjaga stabilitas ekonomi nasional.',
    'video_url' => 'https://www.youtube.com/watch?v=makro5',
    'pdf_file' => 'pdf/kebijakan-fiskal-moneter.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 6: Pengantar Akuntansi
// ==========================================
Lesson::create([
    'course_id' => 6,
    'title' => 'Persamaan Dasar Akuntansi',
    'content' => 'Pemahaman tentang Harta = Utang + Modal sebagai fondasi utama pencatatan akuntansi.',
    'video_url' => 'https://www.youtube.com/watch?v=akun1',
    'pdf_file' => 'pdf/persamaan-akuntansi.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 6,
    'title' => 'Jurnal Umum',
    'content' => 'Mempelajari cara mencatat transaksi keuangan harian menggunakan sistem debit dan kredit.',
    'video_url' => 'https://www.youtube.com/watch?v=akun2',
    'pdf_file' => 'pdf/jurnal-umum.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 6,
    'title' => 'Buku Besar (Ledger)',
    'content' => 'Langkah-langkah memindahkan data dari jurnal umum ke dalam akun-akun spesifik di buku besar.',
    'video_url' => 'https://www.youtube.com/watch?v=akun3',
    'pdf_file' => 'pdf/buku-besar.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 6,
    'title' => 'Neraca Saldo',
    'content' => 'Proses pengujian kesamaan jumlah sisi debit dan kredit pada akhir periode akuntansi.',
    'video_url' => 'https://www.youtube.com/watch?v=akun4',
    'pdf_file' => 'pdf/neraca-saldo.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 6,
    'title' => 'Laporan Keuangan Dasar',
    'content' => 'Penyusunan Laporan Laba Rugi, Laporan Perubahan Modal, dan Neraca keuangan.',
    'video_url' => 'https://www.youtube.com/watch?v=akun5',
    'pdf_file' => 'pdf/laporan-keuangan.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 7: Manajemen Keuangan
// ==========================================
Lesson::create([
    'course_id' => 7,
    'title' => 'Nilai Waktu Uang (Time Value of Money)',
    'content' => 'Membahas mengapa nilai uang saat ini lebih berharga daripada nilai uang di masa depan.',
    'video_url' => 'https://www.youtube.com/watch?v=keuangan1',
    'pdf_file' => 'pdf/time-value-of-money.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 7,
    'title' => 'Analisis Laporan Keuangan',
    'content' => 'Menggunakan rasio likuiditas, profitabilitas, dan solvabilitas untuk menilai kinerja perusahaan.',
    'video_url' => 'https://www.youtube.com/watch?v=keuangan2',
    'pdf_file' => 'pdf/analisis-keuangan.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 7,
    'title' => 'Penganggaran Modal (Capital Budgeting)',
    'content' => 'Metode evaluasi kelayakan investasi jangka panjang menggunakan NPV dan IRR.',
    'video_url' => 'https://www.youtube.com/watch?v=keuangan3',
    'pdf_file' => 'pdf/capital-budgeting.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 7,
    'title' => 'Struktur Modal',
    'content' => 'Perbandingan antara penggunaan utang dan ekuitas untuk membiayai operasional perusahaan.',
    'video_url' => 'https://www.youtube.com/watch?v=keuangan4',
    'pdf_file' => 'pdf/struktur-modal.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 7,
    'title' => 'Manajemen Modal Kerja',
    'content' => 'Strategi mengelola aset lancar dan kewajiban lancar agar operasional tetap berjalan mulus.',
    'video_url' => 'https://www.youtube.com/watch?v=keuangan5',
    'pdf_file' => 'pdf/modal-kerja.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 8: Ekonomi Pembangunan
// ==========================================
Lesson::create([
    'course_id' => 8,
    'title' => 'Konsep Pembangunan Ekonomi',
    'content' => 'Perbedaan antara pertumbuhan ekonomi secara angka dan pembangunan ekonomi secara kualitas.',
    'video_url' => 'https://www.youtube.com/watch?v=bangun1',
    'pdf_file' => 'pdf/konsep-pembangunan.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 8,
    'title' => 'Indikator Kemiskinan',
    'content' => 'Cara mengukur garis kemiskinan dan memahami siklus kemiskinan di negara berkembang.',
    'video_url' => 'https://www.youtube.com/watch?v=bangun2',
    'pdf_file' => 'pdf/indikator-kemiskinan.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 8,
    'title' => 'Ketimpangan Pendapatan',
    'content' => 'Penggunaan Rasio Gini dan Kurva Lorenz untuk melihat distribusi kekayaan di masyarakat.',
    'video_url' => 'https://www.youtube.com/watch?v=bangun3',
    'pdf_file' => 'pdf/ketimpangan-pendapatan.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 8,
    'title' => 'Demografi dan Pembangunan',
    'content' => 'Dampak ledakan penduduk dan bonus demografi terhadap pertumbuhan ekonomi suatu negara.',
    'video_url' => 'https://www.youtube.com/watch?v=bangun4',
    'pdf_file' => 'pdf/demografi.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 8,
    'title' => 'Pembangunan Berkelanjutan (SDGs)',
    'content' => 'Pentingnya menjaga keseimbangan antara pembangunan infrastruktur dan pelestarian lingkungan.',
    'video_url' => 'https://www.youtube.com/watch?v=bangun5',
    'pdf_file' => 'pdf/pembangunan-berkelanjutan.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 9: Ekonomi Internasional
// ==========================================
Lesson::create([
    'course_id' => 9,
    'title' => 'Teori Perdagangan Internasional',
    'content' => 'Mempelajari Keunggulan Mutlak dari Adam Smith dan Keunggulan Komparatif dari David Ricardo.',
    'video_url' => 'https://www.youtube.com/watch?v=inter1',
    'pdf_file' => 'pdf/teori-perdagangan.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 9,
    'title' => 'Kebijakan Perdagangan Internasional',
    'content' => 'Dampak penerapan tarif, kuota impor, dan subsidi ekspor terhadap ekonomi domestik.',
    'video_url' => 'https://www.youtube.com/watch?v=inter2',
    'pdf_file' => 'pdf/kebijakan-perdagangan.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 9,
    'title' => 'Pasar Valuta Asing',
    'content' => 'Bagaimana nilai tukar mata uang terbentuk dan faktor yang mempengaruhinya.',
    'video_url' => 'https://www.youtube.com/watch?v=inter3',
    'pdf_file' => 'pdf/pasar-valas.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 9,
    'title' => 'Neraca Pembayaran (Balance of Payments)',
    'content' => 'Mencatat arus keluar masuknya uang antar negara dalam periode tertentu.',
    'video_url' => 'https://www.youtube.com/watch?v=inter4',
    'pdf_file' => 'pdf/neraca-pembayaran.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 9,
    'title' => 'Organisasi Ekonomi Global',
    'content' => 'Peran WTO, IMF, dan Bank Dunia dalam mengatur lalu lintas ekonomi internasional.',
    'video_url' => 'https://www.youtube.com/watch?v=inter5',
    'pdf_file' => 'pdf/organisasi-global.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 10: Ekonomi Syariah
// ==========================================
Lesson::create([
    'course_id' => 10,
    'title' => 'Prinsip Dasar Ekonomi Islam',
    'content' => 'Fondasi tauhid, keadilan, dan keseimbangan dalam kegiatan ekonomi.',
    'video_url' => 'https://www.youtube.com/watch?v=syariah1',
    'pdf_file' => 'pdf/prinsip-ekonomi-islam.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 10,
    'title' => 'Larangan Riba dan Gharar',
    'content' => 'Penjelasan mengenai bahaya sistem bunga dan ketidakpastian dalam transaksi.',
    'video_url' => 'https://www.youtube.com/watch?v=syariah2',
    'pdf_file' => 'pdf/riba-dan-gharar.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 10,
    'title' => 'Sistem Bagi Hasil',
    'content' => 'Mekanisme Mudharabah dan Musyarakah sebagai alternatif pembiayaan.',
    'video_url' => 'https://www.youtube.com/watch?v=syariah3',
    'pdf_file' => 'pdf/sistem-bagi-hasil.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 10,
    'title' => 'Jual Beli dalam Islam',
    'content' => 'Aturan transaksi jual beli (Murabahah) dan instrumen syariah lainnya.',
    'video_url' => 'https://www.youtube.com/watch?v=syariah4',
    'pdf_file' => 'pdf/jual-beli-syariah.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 10,
    'title' => 'Zakat, Infaq, dan Wakaf',
    'content' => 'Instrumen sosial ekonomi dalam Islam untuk mendistribusikan kesejahteraan.',
    'video_url' => 'https://www.youtube.com/watch?v=syariah5',
    'pdf_file' => 'pdf/ziswaf.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 11: Sejarah Pemikiran Ekonomi
// ==========================================
Lesson::create([
    'course_id' => 11,
    'title' => 'Era Merkantilisme',
    'content' => 'Pemikiran bahwa kekayaan negara diukur dari cadangan emas dan perdagangan.',
    'video_url' => 'https://www.youtube.com/watch?v=sejarah1',
    'pdf_file' => 'pdf/merkantilisme.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 11,
    'title' => 'Aliran Klasik (Adam Smith)',
    'content' => 'Konsep pasar bebas dan invisible hand yang menjadi tonggak ekonomi modern.',
    'video_url' => 'https://www.youtube.com/watch?v=sejarah2',
    'pdf_file' => 'pdf/aliran-klasik.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 11,
    'title' => 'Marxisme',
    'content' => 'Kritik Karl Marx terhadap sistem kapitalisme dan konsep perjuangan kelas.',
    'video_url' => 'https://www.youtube.com/watch?v=sejarah3',
    'pdf_file' => 'pdf/marxisme.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 11,
    'title' => 'Revolusi Keynesian',
    'content' => 'Bagaimana John Maynard Keynes mengusulkan intervensi pemerintah saat krisis (Great Depression).',
    'video_url' => 'https://www.youtube.com/watch?v=sejarah4',
    'pdf_file' => 'pdf/keynesian.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 11,
    'title' => 'Ekonomi Perilaku (Behavioral Economics)',
    'content' => 'Perkembangan modern yang menggabungkan psikologi dalam pengambilan keputusan ekonomi.',
    'video_url' => 'https://www.youtube.com/watch?v=sejarah5',
    'pdf_file' => 'pdf/behavioral-economics.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 12: Pengantar Bisnis & Kewirausahaan
// ==========================================
Lesson::create([
    'course_id' => 12,
    'title' => 'Mindset Wirausaha',
    'content' => 'Menumbuhkan keberanian mengambil risiko dan inovasi dalam menciptakan peluang.',
    'video_url' => 'https://www.youtube.com/watch?v=bisnis1',
    'pdf_file' => 'pdf/mindset-wirausaha.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 12,
    'title' => 'Business Model Canvas (BMC)',
    'content' => 'Alat untuk memetakan model bisnis dari proposisi nilai hingga struktur biaya.',
    'video_url' => 'https://www.youtube.com/watch?v=bisnis2',
    'pdf_file' => 'pdf/bmc.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 12,
    'title' => 'Riset Pasar Dasar',
    'content' => 'Cara mengidentifikasi target audiens dan kebutuhan konsumen sebelum meluncurkan produk.',
    'video_url' => 'https://www.youtube.com/watch?v=bisnis3',
    'pdf_file' => 'pdf/riset-pasar.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 12,
    'title' => 'Strategi Pemasaran 4P',
    'content' => 'Menerapkan konsep Product, Price, Place, dan Promotion dalam bisnis UMKM.',
    'video_url' => 'https://www.youtube.com/watch?v=bisnis4',
    'pdf_file' => 'pdf/strategi-4p.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 12,
    'title' => 'Pitching dan Pendanaan',
    'content' => 'Teknik mempresentasikan ide bisnis kepada investor untuk mendapatkan modal awal.',
    'video_url' => 'https://www.youtube.com/watch?v=bisnis5',
    'pdf_file' => 'pdf/pitching.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 13: Ekonometrika Dasar
// ==========================================
Lesson::create([
    'course_id' => 13,
    'title' => 'Pengenalan Ekonometrika',
    'content' => 'Penggabungan teori ekonomi, matematika, dan statistika untuk analisis data ekonomi.',
    'video_url' => 'https://www.youtube.com/watch?v=metrika1',
    'pdf_file' => 'pdf/pengenalan-ekonometrika.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 13,
    'title' => 'Regresi Linear Sederhana',
    'content' => 'Mencari hubungan sebab-akibat antara satu variabel bebas dan satu variabel terikat.',
    'video_url' => 'https://www.youtube.com/watch?v=metrika2',
    'pdf_file' => 'pdf/regresi-sederhana.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 13,
    'title' => 'Regresi Berganda',
    'content' => 'Pengembangan regresi linear dengan memasukkan lebih dari satu variabel bebas.',
    'video_url' => 'https://www.youtube.com/watch?v=metrika3',
    'pdf_file' => 'pdf/regresi-berganda.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 13,
    'title' => 'Uji Asumsi Klasik',
    'content' => 'Syarat yang harus dipenuhi dalam regresi: Uji Normalitas dan Uji Linearitas.',
    'video_url' => 'https://www.youtube.com/watch?v=metrika4',
    'pdf_file' => 'pdf/asumsi-klasik.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 13,
    'title' => 'Multikolinearitas dan Heteroskedastisitas',
    'content' => 'Mendeteksi dan mengatasi masalah umum yang muncul dalam pemodelan data ekonometrika.',
    'video_url' => 'https://www.youtube.com/watch?v=metrika5',
    'pdf_file' => 'pdf/multikolinearitas.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);

// ==========================================
// COURSE 14: Pasar Modal & Investasi
// ==========================================
Lesson::create([
    'course_id' => 14,
    'title' => 'Pengenalan Pasar Modal',
    'content' => 'Fungsi Bursa Efek, sekuritas, dan peran pasar modal dalam ekonomi suatu negara.',
    'video_url' => 'https://www.youtube.com/watch?v=invest1',
    'pdf_file' => 'pdf/pengenalan-pasar-modal.pdf',
    'xp_reward' => 100,
    'lesson_order' => 1,
]);

Lesson::create([
    'course_id' => 14,
    'title' => 'Instrumen Investasi: Saham',
    'content' => 'Memahami risiko dan return dari kepemilikan ekuitas perusahaan.',
    'video_url' => 'https://www.youtube.com/watch?v=invest2',
    'pdf_file' => 'pdf/saham.pdf',
    'xp_reward' => 150,
    'lesson_order' => 2,
]);

Lesson::create([
    'course_id' => 14,
    'title' => 'Instrumen Investasi: Obligasi dan Reksadana',
    'content' => 'Alternatif investasi dengan risiko yang lebih terukur dibandingkan saham.',
    'video_url' => 'https://www.youtube.com/watch?v=invest3',
    'pdf_file' => 'pdf/obligasi-reksadana.pdf',
    'xp_reward' => 200,
    'lesson_order' => 3,
]);

Lesson::create([
    'course_id' => 14,
    'title' => 'Analisis Fundamental',
    'content' => 'Menilai harga wajar suatu saham dengan membaca laporan keuangan emiten.',
    'video_url' => 'https://www.youtube.com/watch?v=invest4',
    'pdf_file' => 'pdf/analisis-fundamental.pdf',
    'xp_reward' => 250,
    'lesson_order' => 4,
]);

Lesson::create([
    'course_id' => 14,
    'title' => 'Analisis Teknikal',
    'content' => 'Mempelajari pergerakan harga masa lalu melalui grafik candlestick untuk prediksi harga saham.',
    'video_url' => 'https://www.youtube.com/watch?v=invest5',
    'pdf_file' => 'pdf/analisis-teknikal.pdf',
    'xp_reward' => 300,
    'lesson_order' => 5,
]);
    }
}