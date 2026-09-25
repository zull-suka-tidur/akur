<?php require_once '../backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pusat Pelaporan - FH UIN Salatiga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/laporan.css">
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
        <div class="breadcrumb">Dashboard Utama &gt; <span>Pusat Pelaporan</span></div>

        <section class="report-header">
            <div>
                <h2>Pusat Pelaporan Administrasi Realtime</h2>
                <p>Data rekapitulasi kinerja & laporan publik terintegrasi.</p>
            </div>
            <div class="btn-group">
                <button class="btn-primary" id="btnOpenReportModal"><i class="fa-solid fa-plus"></i> Buat Laporan Baru</button>
                <a href="../assets/media/panduan-laporan.pdf" download class="btn-outline" style="text-decoration:none; color:inherit;"><i class="fa-solid fa-download"></i> Unduh Panduan</a>
            </div>
        </section>

        <!-- Dynamic KPI Cards -->
        <div class="kpi-grid">
            <div class="kpi-card">
                <span class="kpi-title">TOTAL LAPORAN</span>
                <div class="kpi-value" id="kpiTotal">0</div>
            </div>
            <div class="kpi-card">
                <span class="kpi-title">APPROVED / SELESAI</span>
                <div class="kpi-value" id="kpiApproved">0</div>
            </div>
            <div class="kpi-card">
                <span class="kpi-title">MENUNGGU VERIFIKASI</span>
                <div class="kpi-value" id="kpiSent">0</div>
            </div>
            <div class="kpi-card">
                <span class="kpi-title">DRAF DISIMPAN</span>
                <div class="kpi-value" id="kpiDraft">0</div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Judul Laporan</th>
                        <th>Kategori</th>
                        <th>Pelapor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="laporanTableBody">
                    <!-- Realtime Ajax Rows -->
                </tbody>
            </table>
        </div>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>

    <script src="../assets/js/laporan.js"></script>
</body>
</html>