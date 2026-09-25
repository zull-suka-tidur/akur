<?php 
require_once '../backend/conn.php'; 
$pejabatList = $pdo->query("SELECT * FROM pejabat ORDER BY urutan ASC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Desk Info Pejabat & Pimpinan - FH UIN Salatiga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/desk-info.css">
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
        <div class="breadcrumb">Dashboard Utama &gt; <span>Desk Info Pejabat & Pimpinan</span></div>

        <section class="page-header">
            <div>
                <span class="pill-tag">Direktori Pimpinan</span>
                <h1>Struktur Organisasi & Pejabat Utama</h1>
                <p>Informasi profil pimpinan dan pengelola tata kelola akademik Fakultas Hukum UIN Salatiga.</p>
            </div>
        </section>

        <section class="pejabat-grid">
            <?php foreach($pejabatList as $p): ?>
                <div class="pejabat-card">
                    <div class="pejabat-avatar">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <div class="pejabat-info">
                        <h3><?= htmlspecialchars($p['nama']); ?></h3>
                        <span class="jabatan-badge"><?= htmlspecialchars($p['jabatan']); ?></span>
                        <p class="nip">NIP: <?= htmlspecialchars($p['nip'] ?? '-'); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>
</body>
</html>