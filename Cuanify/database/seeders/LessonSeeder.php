<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $this->createLessons(1, [
            ['title' => 'Apa Itu Finansial Pribadi?', 'content' => 'Pengertian dan pentingnya finansial pribadi.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 100],
            ['title' => 'Membuat Anggaran Bulanan dengan Metode 50/30/20', 'content' => 'Panduan metode 50/30/20.', 'video_url' => 'https://www.youtube.com/watch?v=QTGfkdHv9tg', 'xp' => 150],
            ['title' => 'Membangun Dana Darurat', 'content' => 'Pentingnya dan cara membangun dana darurat.', 'video_url' => 'https://www.youtube.com/watch?v=kwkR-x31VVs', 'xp' => 200],
            ['title' => 'Menabung dan Mencapai Tujuan Keuangan', 'content' => 'Strategi menabung efektif.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 150],
            ['title' => 'Mengenal Dasar-Dasar Investasi', 'content' => 'Pengantar dunia investasi.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 200],
            ['title' => 'Mengelola Utang dengan Bijak', 'content' => 'Manajemen utang produktif.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 200],
            ['title' => 'Melindungi Keuangan dengan Manajemen Risiko', 'content' => 'Manajemen risiko finansial.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 250],
            ['title' => 'Ujian Akhir Finansial Pribadi', 'content' => 'Ujian evaluasi akhir.', 'video_url' => null, 'xp' => 500],
        ]);

        $this->createLessons(2, [
            ['title' => 'Psikologi di Balik Keputusan Finansial', 'content' => 'Memahami bias kognitif.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 100],
            ['title' => 'Tracking Pengeluaran Harian', 'content' => 'Cara mencatat pengeluaran.', 'video_url' => 'https://www.youtube.com/watch?v=No2AHtzTCAw', 'xp' => 150],
            ['title' => 'Evaluasi Keuangan Bulanan', 'content' => 'Review dan penyesuaian anggaran.', 'video_url' => 'https://www.youtube.com/watch?v=9YCEzOP00xk', 'xp' => 200],
        ]);

        $this->createLessons(3, [
            ['title' => 'Menetapkan Tujuan Keuangan SMART', 'content' => 'Konsep tujuan SMART.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 100],
            ['title' => 'Asuransi dalam Perencanaan Keuangan', 'content' => 'Peran asuransi.', 'video_url' => 'https://www.youtube.com/watch?v=epq04Rj0Kw8', 'xp' => 150],
            ['title' => 'Manajemen Kekayaan Bersih (Net Worth)', 'content' => 'Cara menghitung net worth.', 'video_url' => 'https://www.youtube.com/watch?v=ys7pSh58PVg', 'xp' => 200],
        ]);

        $this->createLessons(4, [
            ['title' => 'Mengenal Dunia Investasi', 'content' => 'Pengantar investasi.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 100],
            ['title' => 'Reksa Dana untuk Pemula', 'content' => 'Cara kerja reksa dana.', 'video_url' => 'https://www.youtube.com/watch?v=FIAXLR8eiEo', 'xp' => 150],
            ['title' => 'Cara Mulai Investasi Saham dari Nol', 'content' => 'Langkah awal saham.', 'video_url' => 'https://www.youtube.com/watch?v=83zEtm5-vg0', 'xp' => 200],
        ]);

        $this->createLessons(5, [
            ['title' => 'Cara Memulai Usaha dari Nol Modal Kecil', 'content' => 'Ide bisnis modal kecil.', 'video_url' => 'https://www.youtube.com/watch?v=Il5PgaX7R7c', 'xp' => 100],
            ['title' => 'Legalitas dan Perizinan UMKM', 'content' => 'Panduan perizinan.', 'video_url' => 'https://www.youtube.com/watch?v=e3My142RlJQ', 'xp' => 150],
            ['title' => 'Membangun Bisnis Sampingan dari Nol', 'content' => 'Bisnis sampingan.', 'video_url' => 'https://www.youtube.com/watch?v=5mgtt0evMTA', 'xp' => 200],
        ]);

        $this->createLessons(6, [
            ['title' => 'Mindset Wirausaha Modern', 'content' => 'Karakter entrepreneur.', 'video_url' => 'https://www.youtube.com/watch?v=r5Uewa4Kva4', 'xp' => 100],
            ['title' => 'Business Model Canvas', 'content' => 'Analisis BMC.', 'video_url' => 'https://www.youtube.com/watch?v=obpCc6QryZY', 'xp' => 150],
            ['title' => 'Sukses Bisnis Kuliner dengan Growth Mindset', 'content' => 'Studi kasus kuliner.', 'video_url' => 'https://www.youtube.com/watch?v=177VhJBHHdk', 'xp' => 200],
        ]);

        $this->createLessons(7, [
            ['title' => 'Strategi Scale Up UMKM di Era Digital', 'content' => 'Indikator naik level.', 'video_url' => 'https://www.youtube.com/watch?v=Inu1sNjFiXs', 'xp' => 100],
            ['title' => 'Sukses Jualan di Marketplace Shopee', 'content' => 'Optimasi marketplace.', 'video_url' => 'https://www.youtube.com/watch?v=obpCc6QryZY', 'xp' => 150],
            ['title' => 'Ekspor Produk UMKM ke Luar Negeri', 'content' => 'Panduan ekspor.', 'video_url' => 'https://www.youtube.com/watch?v=bgisbTJF2lo', 'xp' => 200],
        ]);

        $this->createLessons(8, [
            ['title' => 'Digital Marketing: 10 Menit Langsung Paham', 'content' => 'Overview channel.', 'video_url' => 'https://www.youtube.com/watch?v=UcXrCRwt4mY', 'xp' => 100],
            ['title' => 'Belajar Digital Marketing dari 0', 'content' => 'Perilaku konsumen online.', 'video_url' => 'https://www.youtube.com/watch?v=aQbZdee5PXI', 'xp' => 150],
            ['title' => 'Dasar SEO dan Media Sosial', 'content' => 'Strategi terintegrasi.', 'video_url' => 'https://www.youtube.com/watch?v=IWK4UYlq1sk', 'xp' => 200],
        ]);

        $this->createLessons(9, [
            ['title' => 'Digital Marketing + Ebook Gratis', 'content' => 'Strategi konten.', 'video_url' => 'https://www.youtube.com/watch?v=2wKJwOircyU', 'xp' => 100],
            ['title' => 'Belajar Digital Marketing: Mulai dari Mana?', 'content' => 'Panduan mandiri.', 'video_url' => 'https://www.youtube.com/watch?v=hAen85MSGmU', 'xp' => 150],
            ['title' => 'Dasar Strategi Media Sosial', 'content' => 'Integrasi online.', 'video_url' => 'https://www.youtube.com/watch?v=IWK4UYlq1sk', 'xp' => 200],
        ]);

        $this->createLessons(10, [
            ['title' => 'Strategi Keuangan dan Pertumbuhan Bisnis', 'content' => 'Framework bisnis.', 'video_url' => 'https://www.youtube.com/watch?v=DxIHmfVdkBw', 'xp' => 100],
            ['title' => 'Membangun Brand di Era Digital', 'content' => 'Brand identity.', 'video_url' => 'https://www.youtube.com/watch?v=aQbZdee5PXI', 'xp' => 150],
            ['title' => 'Optimasi Digital Marketing untuk UMKM', 'content' => 'Taktik berbasis data.', 'video_url' => 'https://www.youtube.com/watch?v=UcXrCRwt4mY', 'xp' => 200],
        ]);

        $this->createLessons(11, [
            ['title' => 'Personal Branding di LinkedIn', 'content' => 'Definisi branding.', 'video_url' => 'https://www.youtube.com/watch?v=cu5HDWfuUcI', 'xp' => 100],
            ['title' => 'Optimalkan Profil LinkedIn', 'content' => 'Networking profesional.', 'video_url' => 'https://www.youtube.com/watch?v=lFEDEMlwrGs', 'xp' => 150],
            ['title' => 'Personal Branding untuk Karier Pertama', 'content' => 'Koneksi kuliah.', 'video_url' => 'https://www.youtube.com/watch?v=kkwH766Mqdw', 'xp' => 200],
        ]);

        $this->createLessons(12, [
            ['title' => 'Pondasi Kepemimpinan', 'content' => 'Karakter pemimpin.', 'video_url' => 'https://www.youtube.com/watch?v=r5Uewa4Kva4', 'xp' => 100],
            ['title' => 'Konten LinkedIn untuk Branding', 'content' => 'Komunikasi profesional.', 'video_url' => 'https://www.youtube.com/watch?v=TTSruAEwAHk', 'xp' => 150],
            ['title' => 'Generasi Muda dan Masa Depan RI', 'content' => 'Bonus demografi.', 'video_url' => 'https://www.youtube.com/watch?v=e5gGf--7YtU', 'xp' => 200],
        ]);

        $this->createLessons(13, [
            ['title' => 'Bijak Atur Finansial', 'content' => 'Literasi ekonomi.', 'video_url' => 'https://www.youtube.com/watch?v=rIzmvsNNr2Y', 'xp' => 100],
            ['title' => 'Bonus Demografi dan SDGs', 'content' => 'Potensi generasi muda.', 'video_url' => 'https://www.youtube.com/watch?v=e5gGf--7YtU', 'xp' => 150],
            ['title' => 'Inovasi untuk Ekonomi Berkelanjutan', 'content' => 'Teknologi dan SDGs.', 'video_url' => 'https://www.youtube.com/watch?v=SlNx3JIPbeA', 'xp' => 200],
        ]);

        $this->createLessons(14, [
            ['title' => 'Tantangan Ekonomi Digital', 'content' => 'Transformasi teknologi.', 'video_url' => 'https://www.youtube.com/watch?v=nIAKerimIrE', 'xp' => 100],
            ['title' => 'Transaksi Digital Generasi Muda', 'content' => 'Inovasi digital.', 'video_url' => 'https://www.youtube.com/watch?v=o4fn8U8q0ms', 'xp' => 150],
            ['title' => 'Fintech dan Inklusi Keuangan', 'content' => 'Dampak sosial.', 'video_url' => 'https://www.youtube.com/watch?v=rIzmvsNNr2Y', 'xp' => 200],
        ]);
    }

    private function createLessons(int $courseId, array $lessons): void
    {
        foreach ($lessons as $index => $lesson) {
            Lesson::updateOrCreate(
                ['course_id' => $courseId, 'lesson_order' => $index + 1], 
                [                                                        
                    'title' => $lesson['title'],
                    'content' => $lesson['content'],
                    'video_url' => $lesson['video_url'],
                    'xp_reward' => $lesson['xp'],
                    'has_quiz' => true,
                    'is_published' => true,
                ]
            );
        }
    }
}