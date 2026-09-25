<?php require_once '../backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Aplikasi - L7Smart FH UIN Salatiga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
                <a href="tentang.php" class="active"><i class="fa-solid fa-circle-info"></i> Tentang Aplikasi</a>
            </nav>
        </div>
    </header>

    <main class="main-content">
        <div class="breadcrumb">Dashboard Utama &gt; <span>Tentang Aplikasi</span></div>

        <section style="background:white; padding:2rem; border-radius:12px; border:1px solid #e5e7eb;">
            <h2>Tentang Portal L7Smart</h2>
            <br>
            <p>L7Smart adalah Portal Layanan Publik, Konsultasi Hukum, dan Monitoring Akademik Terpadu milik <strong>Fakultas Hukum Universitas Islam Negeri Salatiga</strong>.</p>
            <br>
            <h3>Visi & Misi Modernisasi Digital</h3>
            <p>Memberikan akses transparansi data, kemudahan pendaftaran peradilan semu, serta pengarsipan dokumen elektronik yang akuntabel dan berintegritas tinggi.</p>
        </section>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>
</body>
</html>