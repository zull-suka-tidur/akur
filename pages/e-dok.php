<?php require_once '../backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>e-Dokumen Realtime - FH UIN Salatiga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/dok.css">
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
        <div class="breadcrumb">Dashboard Utama &gt; <span>e-Dokumen</span></div>

        <section class="header-banner">
            <div>
                <span class="badge-pill"><i class="fa-solid fa-box-archive"></i> ARSIP DIGITAL REALTIME</span>
                <h1>Manajemen Dokumen Elektronik</h1>
            </div>
            <div class="stat-counter">
                <div>Total Dokumen: <strong id="statTotalDoc">0</strong></div>
                <div>Status Sync: <strong style="color:var(--accent-color);">Live Database</strong></div>
            </div>
        </section>

        <div class="table-controls">
            <div class="filter-tabs">
                <button class="tab-btn active" data-cat="all">Semua</button>
                <button class="tab-btn" data-cat="Putusan">Putusan</button>
                <button class="tab-btn" data-cat="Penetapan">Penetapan</button>
                <button class="tab-btn" data-cat="Laporan">Laporan</button>
                <button class="tab-btn" data-cat="Regulasi">Regulasi</button>
            </div>
            <div class="search-filter">
                <input type="text" id="docSearchInput" placeholder="Cari Judul/Kode Dokumen...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nama Dokumen & Kode</th>
                        <th>Kategori</th>
                        <th>Tgl Terbit</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="docRealtimeBody">
                    <!-- Data di-load dinamis oleh assets/js/dok.js -->
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>

    <script src="../assets/js/dok.js"></script>
</body>
</html>