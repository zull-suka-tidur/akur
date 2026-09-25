# Pipeline Workflows & Instalasi L7Smart - FH UIN Salatiga

## Deskripsi System
L7Smart adalah Portal Layanan Digital Terpadu untuk Fakultas Hukum Universitas Islam Negeri Salatiga. Aplikasi ini mengintegrasikan seluruh manajemen konsultasi, antrean akademik, monitoring ruang sidang semu, e-dokumen, dan laporan administrasi secara terpusat.

## Spesifikasi Kebutuhan Sistem
- **PHP**: >= 7.4 / 8.x
- **Database**: MySQL / MariaDB
- **Web Server**: Apache / Nginx
- **Frontend**: Native HTML5, CSS3 Custom Variables, Vanilla JavaScript (ES6)

## Alur Instalasi
1. Clone atau tempatkan folder `l7smart` pada directori root web server (misal: `htdocs` atau `/var/www/html/`).
2. Impor database `l7smart_fh_uinsalatiga` ke dalam MySQL Server Anda.
3. Sesuaikan file `conn.php` untuk credentials database (host, user, password, dbname).
4. Akses aplikasi melalui browser dengan URL: `http://localhost/l7smart/`.

## Fitur Utama & Struktur Routing
- `/index.php` -> Dashboard utama dan portal navigasi terpadu.
- `/pages/desk-info.php` -> Layanan informasi & FAQs terpadu.
- `/pages/e-dok.php` -> Manajemen e-Dokumen & verifikasi digital.
- `/pages/ruang-tunggu.php` -> Pusat kendali display antrean & TV informasi.
- `/pages/ruang-sidang.php` -> Monitoring simulasi sidang peradilan semu.
- `/pages/laporan.php` -> Pusat pelaporan administrasi & statistik.
- `/pages/rating-mediator.php` -> Form penilaian kepuasan & rating mediator/dosen.
- `/pages/register.php` -> Form pendaftaran layanan/perkara online.
- `/pages/bantuan.php` -> Pusat bantuan teknis & pengaduan.