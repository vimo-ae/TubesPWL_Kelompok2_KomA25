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
        // ==========================================
        // COURSE 1: Finansial Pribadi untuk Pemula
        // ==========================================
        Lesson::create([
            'course_id' => 1,
            'title' => 'Apa Itu Finansial Pribadi?',
            'content' => '
            <h2>Pengertian Finansial Pribadi</h2>

            <p>
                Finansial pribadi adalah ilmu yang mempelajari cara seseorang mengelola pendapatan,
                pengeluaran, tabungan, investasi, dan utang untuk mencapai tujuan keuangan yang
                diinginkan. Pengelolaan keuangan yang baik membantu seseorang memenuhi kebutuhan
                saat ini tanpa mengabaikan persiapan untuk masa depan.
            </p>

            <h2>Pentingnya Mengelola Keuangan Sejak Dini</h2>

            <p>
                Mengelola keuangan sejak dini merupakan langkah penting untuk membangun kebiasaan
                finansial yang sehat. Dengan memahami cara mengatur uang, seseorang dapat belajar
                membedakan kebutuhan dan keinginan, membuat anggaran yang tepat, serta menghindari
                perilaku konsumtif yang berlebihan.
            </p>

            <h2>Kebiasaan Finansial yang Baik</h2>

            <p>
                Beberapa kebiasaan finansial yang baik antara lain mencatat pengeluaran, menabung
                secara rutin, menyisihkan dana darurat, dan menggunakan uang sesuai prioritas.
                Kebiasaan-kebiasaan tersebut membantu menjaga kestabilan kondisi keuangan dan
                mempermudah pencapaian tujuan finansial.
            </p>

            <h2>Dampak terhadap Kualitas Hidup</h2>

            <p>
                Kebiasaan finansial yang baik dapat meningkatkan kualitas hidup karena memberikan
                rasa aman dan mengurangi risiko masalah keuangan. Seseorang yang mampu mengelola
                keuangannya dengan baik cenderung lebih siap menghadapi kebutuhan mendadak,
                memiliki perencanaan masa depan yang jelas, dan dapat mencapai tujuan hidup
                dengan lebih terarah.
            </p>

            <h2>Manfaat Mempelajari Finansial Pribadi</h2>

            <ul>
                <li>Mengontrol pengeluaran dengan lebih efektif</li>
                <li>Membantu mencapai tujuan keuangan</li>
                <li>Membangun kebiasaan menabung secara konsisten</li>
                <li>Mengurangi risiko utang yang tidak diperlukan</li>
                <li>Meningkatkan kualitas hidup dan kesejahteraan finansial</li>
            </ul>',
            'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 1,
            'title' => 'Membuat Anggaran Bulanan dengan Metode 50/30/20',
            'content' => '
<h2>Apa Itu Anggaran Bulanan?</h2>

<p>
    Anggaran bulanan merupakan rencana pengelolaan keuangan yang dibuat untuk
    mengatur bagaimana pendapatan akan digunakan selama satu bulan. Dengan
    membuat anggaran, seseorang dapat mengetahui ke mana uangnya digunakan,
    mengontrol pengeluaran, serta memastikan kebutuhan penting tetap terpenuhi.
</p>

<h2>Mengenal Metode 50/30/20</h2>

<p>
    Metode 50/30/20 adalah salah satu cara sederhana dalam mengelola keuangan.
    Metode ini membagi pendapatan menjadi tiga kategori utama, yaitu 50%
    untuk kebutuhan, 30% untuk keinginan, dan 20% untuk tabungan atau
    investasi. Pembagian ini membantu seseorang mengelola uang secara lebih
    seimbang dan terencana.
</p>

<h2>Pembagian Anggaran</h2>

<p>
    Sebanyak 50% dari pendapatan digunakan untuk kebutuhan pokok seperti
    makanan, tempat tinggal, transportasi, pendidikan, dan tagihan rutin.
    Kemudian 30% digunakan untuk memenuhi keinginan seperti hiburan,
    rekreasi, atau pembelian barang yang tidak bersifat mendesak. Sisanya,
    yaitu 20%, dialokasikan untuk tabungan, investasi, atau dana darurat.
</p>

<h2>Manfaat Membuat Anggaran</h2>

<p>
    Dengan memiliki anggaran yang jelas, seseorang dapat mengurangi risiko
    pengeluaran berlebihan, meningkatkan disiplin dalam menggunakan uang,
    serta lebih mudah mencapai tujuan keuangan jangka pendek maupun jangka
    panjang.
</p>

<h2>Keuntungan Metode 50/30/20</h2>

<ul>
    <li>Membantu mengontrol pengeluaran secara lebih efektif</li>
    <li>Mempermudah penyusunan prioritas keuangan</li>
    <li>Mendorong kebiasaan menabung secara konsisten</li>
    <li>Mengurangi risiko kehabisan uang sebelum akhir bulan</li>
    <li>Membantu mencapai tujuan keuangan dengan lebih terencana</li>
</ul>',
            'video_url' => 'https://www.youtube.com/watch?v=QTGfkdHv9tg',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 1,
            'title' => 'Membangun Dana Darurat',
            'content' => '
<h2>Pengertian Dana Darurat</h2>

<p>
    Dana darurat adalah sejumlah uang yang disisihkan dan disimpan khusus
    untuk menghadapi situasi tak terduga seperti kehilangan pekerjaan,
    kebutuhan medis mendadak, kerusakan kendaraan, atau kondisi darurat
    lainnya. Dana ini berfungsi sebagai perlindungan finansial agar tidak
    perlu berutang ketika menghadapi masalah mendesak.
</p>

<h2>Mengapa Dana Darurat Penting?</h2>

<p>
    Kehidupan sering kali menghadirkan kejadian yang tidak dapat diprediksi.
    Dengan memiliki dana darurat, seseorang dapat menghadapi kondisi tersebut
    dengan lebih tenang tanpa mengganggu anggaran kebutuhan sehari-hari atau
    tujuan keuangan yang sedang dijalankan.
</p>

<h2>Jumlah Dana Darurat yang Disarankan</h2>

<p>
    Besarnya dana darurat yang ideal bergantung pada kondisi masing-masing
    individu. Secara umum, dana darurat disarankan setara dengan tiga hingga
    enam bulan biaya hidup. Bagi seseorang yang memiliki tanggungan keluarga
    atau pekerjaan dengan pendapatan tidak tetap, jumlah tersebut dapat
    ditingkatkan untuk memberikan perlindungan yang lebih baik.
</p>

<h2>Tempat Menyimpan Dana Darurat</h2>

<p>
    Dana darurat sebaiknya disimpan pada instrumen yang aman dan mudah
    dicairkan kapan saja, seperti rekening tabungan atau deposito jangka
    pendek. Tujuannya adalah agar dana tetap tersedia saat dibutuhkan tanpa
    risiko kehilangan nilai yang besar.
</p>

<h2>Manfaat Memiliki Dana Darurat</h2>

<ul>
    <li>Memberikan rasa aman dalam menghadapi situasi tak terduga</li>
    <li>Mengurangi ketergantungan pada utang saat keadaan darurat</li>
    <li>Menjaga stabilitas kondisi keuangan pribadi</li>
    <li>Membantu fokus pada tujuan keuangan jangka panjang</li>
    <li>Meningkatkan kesiapan menghadapi risiko kehidupan</li>
</ul>',
            'video_url' => 'https://www.youtube.com/watch?v=kwkR-x31VVs',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        Lesson::create([
    'course_id' => 1,
    'title' => 'Menabung dan Mencapai Tujuan Keuangan',
    'content' => '
    <h2>Pentingnya Menabung</h2>

    <p>
        Menabung adalah kebiasaan menyisihkan sebagian pendapatan untuk
        digunakan di masa depan. Kebiasaan ini membantu seseorang
        mempersiapkan berbagai kebutuhan tanpa harus bergantung pada utang.
    </p>

    <h2>Menentukan Tujuan Keuangan</h2>

    <p>
        Tujuan keuangan dapat berupa membeli kendaraan, biaya pendidikan,
        liburan, atau persiapan pensiun. Dengan memiliki tujuan yang jelas,
        seseorang akan lebih termotivasi untuk menabung secara konsisten.
    </p>

    <h2>Strategi Menabung yang Efektif</h2>

    <p>
        Menentukan target tabungan, menyisihkan uang di awal setelah menerima
        pendapatan, dan menggunakan rekening khusus tabungan dapat membantu
        meningkatkan keberhasilan dalam mencapai tujuan keuangan.
    </p>

    <h2>Manfaat Menabung</h2>

    <ul>
        <li>Membantu mencapai tujuan keuangan</li>
        <li>Meningkatkan disiplin finansial</li>
        <li>Mengurangi ketergantungan pada utang</li>
        <li>Mempersiapkan kebutuhan masa depan</li>
    </ul>',
    'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
    'xp_reward' => 150,
    'lesson_order' => 4,
    'has_quiz' => true,
]);

        Lesson::create([
    'course_id' => 1,
    'title' => 'Mengenal Dasar-Dasar Investasi',
    'content' => '
    <h2>Apa Itu Investasi?</h2>

    <p>
        Investasi adalah kegiatan menempatkan sejumlah dana pada aset tertentu
        dengan harapan memperoleh keuntungan di masa depan.
    </p>

    <h2>Tujuan Investasi</h2>

    <p>
        Investasi dilakukan untuk meningkatkan nilai kekayaan, melawan inflasi,
        dan membantu mencapai tujuan keuangan jangka panjang.
    </p>

    <h2>Jenis Investasi</h2>

    <p>
        Beberapa jenis investasi yang umum dikenal antara lain deposito,
        reksa dana, obligasi, saham, dan emas.
    </p>

    <h2>Risiko dan Keuntungan</h2>

    <p>
        Setiap investasi memiliki risiko dan potensi keuntungan yang berbeda.
        Semakin tinggi potensi keuntungan, biasanya semakin tinggi pula
        tingkat risikonya.
    </p>

    <h2>Manfaat Investasi</h2>

    <ul>
        <li>Mengembangkan nilai uang</li>
        <li>Mengalahkan inflasi</li>
        <li>Membantu mencapai tujuan jangka panjang</li>
        <li>Membangun kekayaan secara bertahap</li>
    </ul>',
    'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
    'xp_reward' => 200,
    'lesson_order' => 5,
    'has_quiz' => true,
]);

        Lesson::create([
    'course_id' => 1,
    'title' => 'Mengelola Utang dengan Bijak',
    'content' => '
    <h2>Memahami Utang</h2>

    <p>
        Utang adalah kewajiban yang harus dibayar kembali kepada pihak lain
        sesuai kesepakatan yang telah dibuat.
    </p>

    <h2>Utang Produktif dan Konsumtif</h2>

    <p>
        Utang produktif digunakan untuk menghasilkan nilai tambah, sedangkan
        utang konsumtif digunakan untuk memenuhi keinginan sesaat.
    </p>

    <h2>Risiko Utang Berlebihan</h2>

    <p>
        Terlalu banyak utang dapat menyebabkan kesulitan keuangan dan
        mengganggu pencapaian tujuan finansial.
    </p>

    <h2>Tips Mengelola Utang</h2>

    <ul>
        <li>Meminjam sesuai kebutuhan</li>
        <li>Membayar tepat waktu</li>
        <li>Menghindari utang konsumtif berlebihan</li>
        <li>Menyusun prioritas pembayaran</li>
    </ul>',
    'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
    'xp_reward' => 200,
    'lesson_order' => 6,
    'has_quiz' => true,
]);

        Lesson::create([
    'course_id' => 1,
    'title' => 'Melindungi Keuangan dengan Manajemen Risiko',
    'content' => '
    <h2>Apa Itu Risiko Finansial?</h2>

    <p>
        Risiko finansial adalah kemungkinan terjadinya peristiwa yang dapat
        menyebabkan kerugian keuangan.
    </p>

    <h2>Contoh Risiko Finansial</h2>

    <p>
        Kehilangan pekerjaan, kecelakaan, biaya kesehatan, dan bencana alam
        merupakan contoh risiko yang dapat memengaruhi kondisi keuangan.
    </p>

    <h2>Cara Mengelola Risiko</h2>

    <p>
        Risiko dapat dikelola melalui dana darurat, asuransi, dan perencanaan
        keuangan yang matang.
    </p>

    <h2>Manfaat Manajemen Risiko</h2>

    <ul>
        <li>Mengurangi dampak kerugian finansial</li>
        <li>Meningkatkan rasa aman</li>
        <li>Menjaga stabilitas keuangan</li>
        <li>Membantu mencapai tujuan finansial</li>
    </ul>',
    'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
    'xp_reward' => 250,
    'lesson_order' => 7,
    'has_quiz' => true,
]);

        Lesson::create([
    'course_id' => 1,
    'title' => 'Ujian Akhir Finansial Pribadi',
    'content' => '
    <h2>Ujian Akhir Course</h2>

    <p>
        Selamat, Anda telah menyelesaikan seluruh materi dalam course
        Finansial Pribadi untuk Pemula.
    </p>

    <p>
        Ujian akhir ini bertujuan untuk mengukur pemahaman Anda mengenai
        konsep-konsep yang telah dipelajari, mulai dari pengelolaan keuangan,
        penyusunan anggaran, dana darurat, menabung, investasi, pengelolaan
        utang, hingga manajemen risiko.
    </p>

    <p>
        Kerjakan soal dengan teliti dan manfaatkan pengetahuan yang telah
        diperoleh dari setiap lesson sebelumnya.
    </p>

    <h2>Cakupan Materi Ujian</h2>

    <ul>
        <li>Finansial pribadi</li>
        <li>Anggaran 50/30/20</li>
        <li>Dana darurat</li>
        <li>Menabung</li>
        <li>Investasi</li>
        <li>Utang dan kredit</li>
        <li>Manajemen risiko</li>
    </ul>',
    'video_url' => null,
    'xp_reward' => 500,
    'lesson_order' => 8,
    'has_quiz' => true,
]);

        // ==========================================
        // COURSE 2: Smart Money Management
        // ==========================================
        Lesson::create([
            'course_id' => 2,
            'title' => 'Psikologi di Balik Keputusan Finansial',
            'content' => 'Memahami bias kognitif yang mempengaruhi keputusan keuangan seperti FOMO, impulse buying, dan mental accounting.',
            'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
            'pdf_file' => 'pdf/psikologi-finansial.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 2,
            'title' => 'Tracking Pengeluaran Harian',
            'content' => 'Cara mencatat pengeluaran harian secara konsisten menggunakan aplikasi atau spreadsheet untuk menemukan kebocoran anggaran.',
            'video_url' => 'https://www.youtube.com/watch?v=No2AHtzTCAw',
            'pdf_file' => 'pdf/tracking-pengeluaran.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 2,
            'title' => 'Evaluasi Keuangan Bulanan',
            'content' => 'Cara melakukan review keuangan bulanan, mengevaluasi target yang tercapai, dan menyesuaikan anggaran untuk bulan berikutnya.',
            'video_url' => 'https://www.youtube.com/watch?v=9YCEzOP00xk',
            'pdf_file' => 'pdf/evaluasi-keuangan.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 3: Financial Planning & Wealth Management
        // ==========================================
        Lesson::create([
            'course_id' => 3,
            'title' => 'Menetapkan Tujuan Keuangan SMART',
            'content' => 'Cara membuat tujuan keuangan yang SMART (Specific, Measurable, Achievable, Relevant, Time-bound) untuk jangka pendek dan panjang.',
            'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
            'pdf_file' => 'pdf/tujuan-keuangan.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 3,
            'title' => 'Asuransi dalam Perencanaan Keuangan',
            'content' => 'Peran asuransi jiwa dan kesehatan sebagai pelindung aset, serta cara memilih produk asuransi yang tepat.',
            'video_url' => 'https://www.youtube.com/watch?v=epq04Rj0Kw8',
            'pdf_file' => 'pdf/asuransi-perencanaan.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 3,
            'title' => 'Manajemen Kekayaan Bersih (Net Worth)',
            'content' => 'Cara menghitung net worth, memantau perkembangannya, dan strategi meningkatkan kekayaan bersih secara konsisten.',
            'video_url' => 'https://www.youtube.com/watch?v=ys7pSh58PVg',
            'pdf_file' => 'pdf/manajemen-net-worth.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 4: Dasar Investasi untuk Pemula
        // ==========================================
        Lesson::create([
            'course_id' => 4,
            'title' => 'Mengenal Dunia Investasi',
            'content' => 'Pengantar investasi: apa itu investasi, mengapa penting, dan risiko yang perlu dipahami sebelum mulai berinvestasi.',
            'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
            'pdf_file' => 'pdf/mengenal-investasi.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 4,
            'title' => 'Reksa Dana untuk Pemula',
            'content' => 'Cara kerja reksa dana, jenis-jenis reksa dana (pasar uang, pendapatan tetap, saham), dan cara memulai investasi reksa dana.',
            'video_url' => 'https://www.youtube.com/watch?v=FIAXLR8eiEo',
            'pdf_file' => 'pdf/reksadana-pemula.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 4,
            'title' => 'Cara Mulai Investasi Saham dari Nol',
            'content' => 'Apa itu saham, cara kerja bursa efek, dan langkah-langkah membuka rekening saham untuk pemula.',
            'video_url' => 'https://www.youtube.com/watch?v=83zEtm5-vg0',
            'pdf_file' => 'pdf/mulai-investasi-saham.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 5: Membangun UMKM dari Nol
        // ==========================================
        Lesson::create([
            'course_id' => 5,
            'title' => 'Cara Memulai Usaha dari Nol Modal Kecil',
            'content' => 'Cara menemukan ide bisnis yang potensial, memvalidasinya, dan memulai usaha dengan modal terbatas.',
            'video_url' => 'https://www.youtube.com/watch?v=Il5PgaX7R7c',
            'pdf_file' => 'pdf/mulai-usaha-modal-kecil.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 5,
            'title' => 'Legalitas dan Perizinan UMKM',
            'content' => 'Panduan mengurus NIB, izin usaha, NPWP bisnis, dan legalitas lainnya agar UMKM beroperasi secara sah.',
            'video_url' => 'https://www.youtube.com/watch?v=e3My142RlJQ',
            'pdf_file' => 'pdf/legalitas-umkm.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 5,
            'title' => 'Membangun Bisnis Sampingan dari Nol',
            'content' => 'Strategi membangun bisnis sampingan yang menguntungkan tanpa meninggalkan pekerjaan utama.',
            'video_url' => 'https://www.youtube.com/watch?v=5mgtt0evMTA',
            'pdf_file' => 'pdf/bisnis-sampingan.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 6: Fundamental Entrepreneurship
        // ==========================================
        Lesson::create([
            'course_id' => 6,
            'title' => 'Mindset Wirausaha Modern',
            'content' => 'Karakter dan pola pikir entrepreneur sukses: growth mindset, toleransi risiko, dan kemampuan beradaptasi.',
            'video_url' => 'https://www.youtube.com/watch?v=r5Uewa4Kva4',
            'pdf_file' => 'pdf/mindset-wirausaha.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 6,
            'title' => 'Business Model Canvas',
            'content' => 'Cara mengisi 9 blok Business Model Canvas untuk memetakan model bisnis secara komprehensif dan terstruktur.',
            'video_url' => 'https://www.youtube.com/watch?v=obpCc6QryZY',
            'pdf_file' => 'pdf/business-model-canvas.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 6,
            'title' => 'Sukses Bisnis Kuliner dengan Growth Mindset',
            'content' => 'Studi kasus nyata membangun bisnis kuliner dari modal kecil dengan mindset pengusaha yang tepat.',
            'video_url' => 'https://www.youtube.com/watch?v=177VhJBHHdk',
            'pdf_file' => 'pdf/bisnis-kuliner-growth.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 7: Scale Up UMKM di Era Digital
        // ==========================================
        Lesson::create([
            'course_id' => 7,
            'title' => 'Strategi Scale Up UMKM di Era Digital',
            'content' => 'Indikator bisnis siap berkembang dan strategi naik level dari UMKM kecil ke bisnis yang lebih besar.',
            'video_url' => 'https://www.youtube.com/watch?v=Inu1sNjFiXs',
            'pdf_file' => 'pdf/scaleup-umkm-digital.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 7,
            'title' => 'Sukses Jualan di Marketplace Shopee',
            'content' => 'Strategi berjualan di marketplace digital termasuk optimasi toko, manajemen pesanan, dan meningkatkan penjualan.',
            'video_url' => 'https://www.youtube.com/watch?v=obpCc6QryZY',
            'pdf_file' => 'pdf/jualan-marketplace.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 7,
            'title' => 'Ekspor Produk UMKM ke Luar Negeri',
            'content' => 'Panduan perizinan ekspor dan cara UMKM Indonesia bisa menjual produk ke pasar internasional.',
            'video_url' => 'https://www.youtube.com/watch?v=bgisbTJF2lo',
            'pdf_file' => 'pdf/ekspor-umkm.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 8: Digital Marketing untuk Pemula
        // ==========================================
        Lesson::create([
            'course_id' => 8,
            'title' => 'Digital Marketing untuk Pemula: 10 Menit Langsung Paham',
            'content' => 'Overview channel digital marketing: SEO, SEM, social media, email, content marketing, dan cara memilih channel yang tepat.',
            'video_url' => 'https://www.youtube.com/watch?v=UcXrCRwt4mY',
            'pdf_file' => 'pdf/intro-digital-marketing.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 8,
            'title' => 'Belajar Digital Marketing dari 0',
            'content' => 'Memahami konsep dasar digital marketing: bukan soal jualan, tapi memahami perilaku konsumen online.',
            'video_url' => 'https://www.youtube.com/watch?v=aQbZdee5PXI',
            'pdf_file' => 'pdf/digital-marketing-dari-nol.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 8,
            'title' => 'Dasar-Dasar SEO, Media Sosial, dan Strategi Pemasaran Online',
            'content' => 'Konsep SEO, pemasaran media sosial, dan strategi pemasaran online yang terintegrasi untuk bisnis.',
            'video_url' => 'https://www.youtube.com/watch?v=IWK4UYlq1sk',
            'pdf_file' => 'pdf/seo-sosmed-strategi.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 9: Social Media Marketing Essentials
        // ==========================================
        Lesson::create([
            'course_id' => 9,
            'title' => 'Belajar Digital Marketing untuk Pemula + Ebook Gratis',
            'content' => 'Pengenalan lengkap dunia pemasaran digital termasuk strategi konten dan cara memilih platform yang tepat.',
            'video_url' => 'https://www.youtube.com/watch?v=2wKJwOircyU',
            'pdf_file' => 'pdf/smm-platform.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 9,
            'title' => 'Belajar Digital Marketing: Mulai dari Mana?',
            'content' => 'Panduan langkah demi langkah memulai belajar digital marketing secara mandiri dan terstruktur.',
            'video_url' => 'https://www.youtube.com/watch?v=hAen85MSGmU',
            'pdf_file' => 'pdf/mulai-belajar-dmkt.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 9,
            'title' => 'Dasar-Dasar Digital Marketing: SEO, Media Sosial, dan Strategi Online',
            'content' => 'Pemahaman mendalam tentang SEO, strategi media sosial, dan integrasi pemasaran online untuk hasil maksimal.',
            'video_url' => 'https://www.youtube.com/watch?v=IWK4UYlq1sk',
            'pdf_file' => 'pdf/dasar-smm.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 10: Growth Marketing & Brand Strategy
        // ==========================================
        Lesson::create([
            'course_id' => 10,
            'title' => 'Strategi Keuangan dan Pertumbuhan Bisnis',
            'content' => 'Framework pertumbuhan bisnis yang menggabungkan strategi keuangan dan pemasaran untuk hasil optimal.',
            'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw',
            'pdf_file' => 'pdf/strategi-pertumbuhan.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 10,
            'title' => 'Membangun Brand di Era Digital',
            'content' => 'Elemen brand identity, konsistensi brand, dan strategi membangun brand yang kuat di platform digital.',
            'video_url' => 'https://www.youtube.com/watch?v=aQbZdee5PXI',
            'pdf_file' => 'pdf/brand-digital.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 10,
            'title' => 'Optimasi Digital Marketing untuk Pertumbuhan UMKM',
            'content' => 'Taktik pertumbuhan berbasis data untuk meningkatkan penjualan dan memperluas jangkauan bisnis.',
            'video_url' => 'https://www.youtube.com/watch?v=UcXrCRwt4mY',
            'pdf_file' => 'pdf/optimasi-growth.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 11: Personal Branding & Produktivitas
        // ==========================================
        Lesson::create([
            'course_id' => 11,
            'title' => 'Personal Branding: Biar Karier Melesat dan Dilirik di LinkedIn',
            'content' => 'Definisi personal branding, mengapa penting di era digital, dan 3 langkah praktis membangun personal brand yang kuat.',
            'video_url' => 'https://www.youtube.com/watch?v=cu5HDWfuUcI',
            'pdf_file' => 'pdf/personal-branding-intro.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 11,
            'title' => 'Optimalkan Personal Branding di LinkedIn',
            'content' => 'Cara mengoptimalkan profil LinkedIn, membuat konten profesional, dan membangun network yang berkualitas.',
            'video_url' => 'https://www.youtube.com/watch?v=lFEDEMlwrGs',
            'pdf_file' => 'pdf/linkedin-personal-brand.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 11,
            'title' => 'The Power of Personal Branding untuk Karier Pertama',
            'content' => 'Cara memanfaatkan personal branding sejak kuliah untuk mendapatkan koneksi profesional dan tawaran kerja.',
            'video_url' => 'https://www.youtube.com/watch?v=kkwH766Mqdw',
            'pdf_file' => 'pdf/personal-branding-karier.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 12: Leadership & Professional Growth
        // ==========================================
        Lesson::create([
            'course_id' => 12,
            'title' => 'Cara Membangun Bisnis: Pondasi Kepemimpinan',
            'content' => 'Karakter pemimpin bisnis yang sukses, cara mengambil keputusan strategis, dan membangun tim yang solid.',
            'video_url' => 'https://www.youtube.com/watch?v=r5Uewa4Kva4',
            'pdf_file' => 'pdf/pondasi-leadership.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 12,
            'title' => 'Belajar Konten LinkedIn untuk Personal Branding Profesional',
            'content' => 'Teknik komunikasi profesional, cara membuat konten di LinkedIn, dan membangun reputasi sebagai pemimpin di industri.',
            'video_url' => 'https://www.youtube.com/watch?v=TTSruAEwAHk',
            'pdf_file' => 'pdf/komunikasi-profesional.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 12,
            'title' => 'Generasi Muda, Bonus Demografi, dan Masa Depan Indonesia',
            'content' => 'Peran generasi muda sebagai pemimpin masa depan dalam memanfaatkan bonus demografi Indonesia.',
            'video_url' => 'https://www.youtube.com/watch?v=e5gGf--7YtU',
            'pdf_file' => 'pdf/leadership-generasi-muda.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 13: Ekonomi dan SDGs untuk Generasi Muda
        // ==========================================
        Lesson::create([
            'course_id' => 13,
            'title' => 'Bijak Atur Finansial: Generasi Muda Dorong Ekonomi RI',
            'content' => 'Bagaimana literasi keuangan generasi muda dapat berkontribusi pada pertumbuhan ekonomi Indonesia.',
            'video_url' => 'https://www.youtube.com/watch?v=rIzmvsNNr2Y',
            'pdf_file' => 'pdf/finansial-generasi-muda.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 13,
            'title' => 'Generasi Muda, Bonus Demografi, dan Masa Depan Indonesia',
            'content' => 'Peluang emas bonus demografi Indonesia dan bagaimana generasi muda dapat memaksimalkan potensinya.',
            'video_url' => 'https://www.youtube.com/watch?v=e5gGf--7YtU',
            'pdf_file' => 'pdf/bonus-demografi-sdgs.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 13,
            'title' => 'Inovasi Digital untuk Pertumbuhan Ekonomi Berkelanjutan',
            'content' => 'Bagaimana inovasi teknologi digital mendorong pertumbuhan ekonomi yang berkelanjutan dan inklusif.',
            'video_url' => 'https://www.youtube.com/watch?v=SlNx3JIPbeA',
            'pdf_file' => 'pdf/inovasi-ekonomi-sdgs.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);

        // ==========================================
        // COURSE 14: Ekonomi Digital dan Dampak Sosial
        // ==========================================
        Lesson::create([
            'course_id' => 14,
            'title' => 'Ekonomi Digital: Tantangan dan Peluang di Era Teknologi Baru',
            'content' => 'Potensi ekonomi digital Indonesia, transformasi bisnis berbasis teknologi, dan peluang di era digital.',
            'video_url' => 'https://www.youtube.com/watch?v=nIAKerimIrE',
            'pdf_file' => 'pdf/ekonomi-digital-intro.pdf',
            'xp_reward' => 100,
            'lesson_order' => 1,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 14,
            'title' => 'Transaksi Digital dan Peran Generasi Muda',
            'content' => 'Perkembangan transaksi digital di Indonesia dan bagaimana generasi muda dapat berinovasi di bidang ekonomi digital.',
            'video_url' => 'https://www.youtube.com/watch?v=o4fn8U8q0ms',
            'pdf_file' => 'pdf/transaksi-digital.pdf',
            'xp_reward' => 150,
            'lesson_order' => 2,
            'has_quiz' => true,
        ]);

        Lesson::create([
            'course_id' => 14,
            'title' => 'Fintech dan Inklusi Keuangan di Indonesia',
            'content' => 'Bagaimana financial technology memperluas akses keuangan dan menciptakan dampak sosial bagi masyarakat Indonesia.',
            'video_url' => 'https://www.youtube.com/watch?v=rIzmvsNNr2Y',
            'pdf_file' => 'pdf/fintech-inklusi.pdf',
            'xp_reward' => 200,
            'lesson_order' => 3,
            'has_quiz' => true,
        ]);
    }
}