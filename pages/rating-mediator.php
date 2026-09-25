<?php require_once '../backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Penilaian Layanan - FH UIN Salatiga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/rating-med.css">
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
        <div class="breadcrumb">Dashboard Utama &gt; <span>Penilaian Layanan</span></div>

        <section class="rating-container">
            <div class="rating-info">
                <h3>Evaluasi Layanan Digital</h3>
                <p>Masukan Anda disimpan secara terenkripsi untuk meningkatkan kualitas pelayanan publik kami.</p>
            </div>

            <div class="rating-form-card">
                <form id="ratingRealForm">
                    <input type="hidden" name="bintang" id="starValue" value="5">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor WhatsApp</label>
                            <input type="text" name="telepon" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Beri Bintang Rating</label>
                        <div class="star-rating" id="starContainer">
                            <i class="fa-solid fa-star" data-rating="1"></i>
                            <i class="fa-solid fa-star" data-rating="2"></i>
                            <i class="fa-solid fa-star" data-rating="3"></i>
                            <i class="fa-solid fa-star" data-rating="4"></i>
                            <i class="fa-solid fa-star" data-rating="5"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ulasan / Komentar</label>
                        <textarea name="komentar" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary btn-block">Kirim Penilaian Ke Database</button>
                </form>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>

    <script src="../assets/js/rating.js"></script>
</body>
</html>