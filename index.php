<?php 
include 'backend/conn.php';

$stmt = $pdo->query("SELECT content_text FROM site_content WHERE section_key = 'main_paragraph'");
$p_data = $stmt->fetch(PDO::FETCH_ASSOC);

$main_paragraph = $p_data['content_text'] ?? 'Paragraf default...';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L7Smart - Fakultas Hukum UIN Salatiga</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <!-- 1. Logo Klik Kembali ke Utama -->
            <a href="index.php" class="brand" style="text-decoration: none;">
                <i class="fa-solid fa-graduation-cap brand-icon"></i>
                <div class="brand-text">
                    <span class="brand-title">L7Smart</span>
                    <span class="brand-sub">FAKULTAS HUKUM UIN SALATIGA</span>
                </div>
            </a>
            <nav class="nav-links">
                <a href="index.php" class="active"><i class="fa-solid fa-house"></i> Dashboard Utama</a>
                <!-- 13. Link khusus Tentang Aplikasi (bukan bantuan.php) -->
                <a href="pages/tentang.php"><i class="fa-solid fa-circle-info"></i> Tentang Aplikasi</a>
                <a href="admin/login.php" class="btn-admin-nav"><i class="fa-solid fa-user-shield"></i> CMS Admin</a>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <section class="hero-section">
            <div class="badge-pill"><i class="fa-solid fa-circle"></i> PORTAL DIGITAL TERPADU</div>
            <h1>Selamat Datang di <span>AKUR</span></h1>
            <p><?php echo nl2br(htmlspecialchars($main_paragraph)); ?></p>
        </section>

        <!-- 2. Survey & Tautan Penting Interaktif (Bisa Dipencet) -->
        <section class="info-grid">
            <div class="info-card">
                <i class="fa-regular fa-clock info-icon"></i>
                <div>
                    <h4>Jam Operasional</h4>
                    <p><?= htmlspecialchars(get_setting($pdo, 'jam_operasional')); ?></p>
                </div>
            </div>
            <a href="<?= htmlspecialchars(get_setting($pdo, 'link_survei')); ?>" target="_blank" class="info-card clickable">
                <i class="fa-regular fa-star info-icon"></i>
                <div>
                    <h4>Survei Kepuasan</h4>
                    <p>Bantu kami meningkatkan kualitas layanan kami. Klik di sini.</p>
                </div>
            </a>
            <a href="<?= htmlspecialchars(get_setting($pdo, 'link_tautan_penting')); ?>" target="_blank" class="info-card clickable">
                <i class="fa-solid fa-arrow-up-right-from-square info-icon"></i>
                <div>
                    <h4>Tautan Penting</h4>
                    <p>Akses portal resmi FH UIN Salatiga. Klik di sini.</p>
                </div>
            </a>
        </section>

        <!-- 9. Menu Grid dengan Icon/Gambar Interaktif -->
        <section class="menu-grid">
            <a href="pages/desk-info.php" class="menu-card">
                <div class="card-img" style="background-image: url('assets/media/desk-info.jpg');">
                    <i class="fa-solid fa-sitemap card-icon-overlay"></i>
                    <div class="card-tag">L7 Desk Info</div>
                </div>
                <div class="card-body">
                    <h3>L7 Desk Info Pejabat</h3>
                    <p>Informasi struktur pimpinan dan tata kelola instansi.</p>
                </div>
            </a>

            <a href="pages/rating-mediator.php" class="menu-card">
                <div class="card-img" style="background-image: url('assets/media/rating.jpg');">
                    <i class="fa-solid fa-star-half-stroke card-icon-overlay"></i>
                    <div class="card-tag">L7 Rating</div>
                </div>
                <div class="card-body">
                    <h3>L7 Rating Mediator & Dosen</h3>
                    <p>Penilaian kinerja layanan, mediator, dan feedback.</p>
                </div>
            </a>

            <a href="pages/ruang-tunggu.php" class="menu-card">
                <div class="card-img" style="background-image: url('assets/media/queue.jpg');">
                    <i class="fa-solid fa-tv card-icon-overlay"></i>
                    <div class="card-tag">L7 Monitoring</div>
                </div>
                <div class="card-body">
                    <h3>L7 TV Ruang Tunggu</h3>
                    <p>Display antrean digital dan status informasi publik.</p>
                </div>
            </a>

            <a href="pages/ruang-sidang.php" class="menu-card">
                <div class="card-img" style="background-image: url('assets/media/court.jpg');">
                    <i class="fa-solid fa-gavel card-icon-overlay"></i>
                    <div class="card-tag">L7 Simulasi</div>
                </div>
                <div class="card-body">
                    <h3>L7 TV Ruang Sidang Semu</h3>
                    <p>Monitoring jadwal persidangan laboratorium hukum.</p>
                </div>
            </a>

            <a href="pages/e-dok.php" class="menu-card">
                <div class="card-img" style="background-image: url('assets/media/docs.jpg');">
                    <i class="fa-solid fa-folder-open card-icon-overlay"></i>
                    <div class="card-tag">L7 e-Arsip</div>
                </div>
                <div class="card-body">
                    <h3>L7 e-Dokumen</h3>
                    <p>Manajemen dokumen elektronik dan arsip terverifikasi.</p>
                </div>
            </a>

            <a href="pages/register.php" class="menu-card">
                <div class="card-img" style="background-image: url('assets/media/register.jpg');">
                    <i class="fa-solid fa-id-card card-icon-overlay"></i>
                    <div class="card-tag">L7 Pendaftaran</div>
                </div>
                <div class="card-body">
                    <h3>L7 e-Register</h3>
                    <p>Pendaftaran layanan konsultasi dan perkara secara daring.</p>
                </div>
            </a>

            <a href="pages/laporan.php" class="menu-card">
                <div class="card-img" style="background-image: url('assets/media/report.jpg');">
                    <i class="fa-solid fa-chart-line card-icon-overlay"></i>
                    <div class="card-tag">L7 Laporan</div>
                </div>
                <div class="card-body">
                    <h3>L7 e-Laporan</h3>
                    <p>Pusat statistik dan laporan administrasi terpadu.</p>
                </div>
            </a>

            <a href="pages/bantuan.php" class="menu-card card-help">
                <div class="card-body help-body">
                    <i class="fa-regular fa-circle-question help-icon"></i>
                    <h3>Butuh Bantuan?</h3>
                    <p>Pusat bantuan teknis dan layanan pengaduan.</p>
                    <span class="btn-help">Pusat Bantuan</span>
                </div>
            </a>
        </section>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>
    <script src="assets/js/script.js"></script>
</body>
</html>