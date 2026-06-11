# 🌍 Cuanify – SDGs Education & Economic Awareness Web

## 📖 Deskripsi

**Cuanify** adalah platform pembelajaran berbasis web yang berfokus pada edukasi ekonomi, literasi keuangan, dan pengembangan UMKM. Website ini dikembangkan untuk mendukung implementasi **Sustainable Development Goals (SDGs)**, khususnya:

* **SDG 4 – Quality Education**, dengan menyediakan materi pembelajaran ekonomi yang mudah diakses.
* **SDG 8 – Decent Work and Economic Growth**, dengan memberikan edukasi kewirausahaan dan pengelolaan keuangan yang dapat mendukung pertumbuhan ekonomi masyarakat.

Cuanify hadir sebagai media pembelajaran digital yang interaktif, modern, dan mudah digunakan oleh berbagai kalangan, terutama generasi muda.

---

## 🎯 Tujuan

* Meningkatkan literasi ekonomi masyarakat.
* Memberikan akses pembelajaran ekonomi yang fleksibel dan mudah dipahami.
* Mendukung pengembangan wawasan kewirausahaan dan UMKM.
* Meningkatkan kesadaran terhadap pentingnya pengelolaan keuangan yang baik.
* Mendukung pencapaian tujuan SDGs melalui pemanfaatan teknologi digital.

---

## 🚀 Fitur Utama

### 📚 Course Pembelajaran

* Akses berbagai materi ekonomi dan keuangan.
* Materi tersusun secara terstruktur berdasarkan topik pembelajaran.

### 📝 Quiz Interaktif

* Quiz untuk mengukur pemahaman pengguna terhadap materi yang telah dipelajari.
* Sistem penilaian otomatis.

### 📊 Progress Learning

* Monitoring perkembangan belajar pengguna.
* Riwayat course yang telah diikuti.

### 👨‍🏫 Manajemen Course

* Instructor dapat membuat dan mengelola course beserta materi pembelajaran.

### 👤 Manajemen Profil

* Pengguna dapat mengelola informasi profil pribadi.

### 🛡️ Sistem Role & Authorization

* Hak akses berbeda untuk Student, Instructor, dan Admin.

---

## 🛠️ Teknologi yang Digunakan

### Backend

* Laravel 12
* PHP 8+

### Frontend

* Blade Template Engine
* HTML5
* CSS3
* JavaScript
* Tailwind CSS

### Database

* MySQL

### Tools & Deployment

* Git
* GitHub
* Vite
* Railway

---

## 👥 Arsitektur Role

### 🎓 Student

Fitur yang tersedia:

* Registrasi dan login akun.
* Mengakses course yang tersedia.
* Mempelajari materi pembelajaran.
* Mengikuti quiz.
* Melihat progress pembelajaran.
* Mengelola profil pribadi.

### 👨‍🏫 Instructor

Fitur yang tersedia:

* Login sebagai instructor.
* Membuat course baru.
* Mengelola materi pembelajaran.
* Membuat dan mengelola quiz.
* Mengelola course yang dimiliki.
* Mengelola profil instructor.

### 🛡️ Admin

Fitur yang tersedia:

* Mengelola seluruh pengguna.
* Memverifikasi akun instructor.
* Mengelola course.
* Mengelola kategori course.
* Mengakses dashboard administrasi.
* Mengelola data sistem secara keseluruhan.

---

## 🌐 Demo / Deployment

Aplikasi dapat diakses melalui:

**https://cuanify.up.railway.app/**

---

## 🧪 Akun Testing

### Student

Email:
`test@example.com`

Password:
`password`

### Instructor

Email:
`guru1@example.com`

Password:
`password`

### Admin

Email:
`admin@cuanify.com`

Password:
`admin123`

---

## ⚙️ Instalasi Lokal

### 1. Clone Repository

```bash
git clone <repository-url>
cd Cuanify
```

### 2. Install Dependency

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Konfigurasi Database

Sesuaikan konfigurasi database pada file `.env`

```env
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### 5. Migrasi dan Seeder

```bash
php artisan migrate --seed
```

### 6. Build Asset

```bash
npm run build
```

### 7. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi akan berjalan pada:

```text
http://127.0.0.1:8000
```

---

## 👨‍💻 Struktur Tim

| Nama                         | Peran           |
| ---------------------------- | --------------- |
| Aliyah Briek Salem Guzhie    | Front Developer |
| Alvin Benyamin Singalingging | Back Develope r |
| Daradira Vonna               | Front Developer |
| Ryan Fredryck Ginting        | Back Developer  |
| Vedder Timothy Simbolon      | Project Manager |

---

## 📄 Lisensi

Proyek ini dibuat untuk memenuhi tugas mata kuliah Pemrograman Web Lanjutan dan tujuan pembelajaran akademik.
