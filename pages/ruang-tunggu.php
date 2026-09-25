<?php require_once '../backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pusat Display Ruang Tunggu - FH UIN Salatiga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/ruang-tunggu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="navbar">
        <div class="nav-container">
            <a href="../index.php" class="brand" style="text-decoration:none;">
                <i class="fa-solid fa-graduation-cap brand-icon"></i>
                <div class="brand-text">
                    <span class="brand-title">L7Smart</span>
                    <span class="brand-sub">FAKULTAS HUKUM UIN SALATIGA</span>
                </div>
            </a>
            <nav class="nav-links">
                <a href="../index.php"><i class="fa-solid fa-house"></i> Dashboard Utama</a>
                <a href="tentang.php"><i class="fa-solid fa-circle-info"></i> Tentang Aplikasi</a>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="breadcrumb">Dashboard Utama &gt; <span>Display TV Ruang Tunggu</span></div>

        <!-- Section Header Bersih Tanpa Tombol Bocor -->
        <section class="display-header">
            <div>
                <h2>Pusat Kendali Informasi Digital & Antrean</h2>
                <p>Status pemanggilan antrean dan informasi pelayanan akademik real-time.</p>
            </div>
        </section>

        <!-- Status Grid -->
        <div class="status-grid">
            <div class="status-card border-green">
                <span class="status-badge active">ONLINE</span>
                <h4>TV Ruang Tunggu</h4>
                <h3>Aktif</h3>
                <p>Menampilkan video edukasi & informasi</p>
            </div>
            <div class="status-card border-blue">
                <span class="status-badge active">STREAMING</span>
                <h4>TV Sidang Semu</h4>
                <h3>Aktif</h3>
                <p>Jadwal peradilan semu di laboratorium</p>
            </div>
            <div class="status-card border-orange">
                <span class="status-badge active">LIVE</span>
                <h4>Total Antrean Hari Ini</h4>
                <h3 class="stat-num">142 Orang</h3>
                <p>Total pendaftar layanan</p>
            </div>
            <div class="status-card border-gray">
                <span class="status-badge waiting">WAITING</span>
                <h4>Sisa Antrean</h4>
                <h3 class="stat-num">28 Orang</h3>
                <p>Belum dipanggil</p>
            </div>
        </div>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>
</body>
</html>