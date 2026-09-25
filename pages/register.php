<?php require_once '../backend/conn.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>e-Register - FH UIN Salatiga</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/register.css">
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
        <div class="breadcrumb">Dashboard Utama &gt; <span>Pendaftaran Layanan</span></div>

        <section class="form-wrapper">
            <h2>Pendaftaran Layanan & Konsultasi Online</h2>
            <p>Silakan isi data dengan benar. Tiket pendaftaran akan dikirimkan langsung ke Email & WhatsApp Anda.</p>

            <form id="regFormProduction" class="form-grid">
                <div class="form-group">
                    <label>NIK / NIM (Angka Saja)</label>
                    <input type="text" name="nik_nim" id="nikNimInput" placeholder="Masukkan 16 digit NIK/NIM" required>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label>Email Pemohon</label>
                    <input type="email" name="email" placeholder="contoh@domain.com" required>
                </div>
                <div class="form-group">
                    <label>Nomor WhatsApp (Angka Saja)</label>
                    <input type="text" name="telepon" id="waInput" placeholder="08xxxxxxxxxx" required>
                </div>
                <div class="form-group full-width">
                    <label>Jenis Layanan</label>
                    <select name="jenis_layanan" required>
                        <option value="">-- Pilih Jenis Layanan --</option>
                        <option value="Konsultasi Hukum Posbakum">Konsultasi Hukum Posbakum</option>
                        <option value="Praktik Peradilan Semu">Pendaftaran Praktik Peradilan Semu</option>
                        <option value="Surat Keterangan Akademik">Permohonan Surat Keterangan Akademik</option>
                    </select>
                </div>
                <div class="form-group full-width">
                    <label>Keterangan Ringkas</label>
                    <textarea name="keterangan" rows="3" placeholder="Tuliskan detail permohonan..."></textarea>
                </div>
                <button type="submit" class="btn-primary full-width" id="btnSubmitReg">Kirim & Dapatkan Tiket</button>
            </form>

            <div id="regSuccessAlert" style="display:none; margin-top: 1rem; padding: 1rem; background: #d1fae5; color: #047857; border-radius: 8px;">
                <h4 id="resTiket"></h4>
                <p id="resMsg"></p>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p><strong>L7Smart v1.1.0</strong> &copy; Copyright 2024-2026 Fakultas Hukum UIN Salatiga</p>
    </footer>

    <script src="../assets/js/register.js"></script>
</body>
</html>