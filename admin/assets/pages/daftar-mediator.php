<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- css tabler -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.6.0/dist/css/tabler.min.css"
        integrity="sha384-WLkiMEGvWxbrkZelrUJXN5Xd2tgGj7ZDMEnao/UbDfoLkmbXfZ4nDg6TEqngvS/y" crossorigin="anonymous" />
</head>

<body>
    <header class="navbar navbar-expand-md navbar-dark d-print-none" style="background-color: #174A45;">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- BEGIN NAVBAR LOGO -->
            <a href="." aria-label="Tabler" class="navbar-brand navbar-brand-autodark me-3">
                <img src="." aria-placeholder="Logo fh ">
            </a>
            <!-- END NAVBAR LOGO -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">
                            <span class="nav-link-icon">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true" focusable="false" class="icon">
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Home</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-users-group">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Mediator</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="daftar-mediator.php">Daftar Mediator</a>
                            <a class="dropdown-item" href="jadwal.php">Jadwal Mediasi</a>
                            <a class="dropdown-item" href="rating.php">Rating Mediator</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-id">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M3 7a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v10a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3l0 -10" />
                                    <path d="M7 10a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M15 8l2 0" />
                                    <path d="M15 12l2 0" />
                                    <path d="M7 16l10 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Pemohon</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="data-pemohon.php">Data Pemohon</a>
                            <a class="dropdown-item" href="berkas.php">Berkas & Dokumen</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-gavel">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M13 10l7.383 7.418c.823 .82 .823 2.148 0 2.967a2.11 2.11 0 0 1 -2.976 0l-7.407 -7.385" />
                                    <path d="M6 9l4 4" />
                                    <path d="M13 10l-4 -4" />
                                    <path d="M3 21h7" />
                                    <path
                                        d="M6.793 15.793l-3.586 -3.586a1 1 0 0 1 0 -1.414l2.293 -2.293l.5 .5l3 -3l-.5 -.5l2.293 -2.293a1 1 0 0 1 1.414 0l3.586 3.586a1 1 0 0 1 0 1.414l-2.293 2.293l-.5 -.5l-3 3l.5 .5l-2.293 2.293a1 1 0 0 1 -1.414 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Layanan Perkara</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="data-perkara.php">Data Perkara</a>
                            <a class="dropdown-item" href="laporan-perkara.php">Laporan Perkara</a>
                        </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-news">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" />
                                    <path d="M8 8l4 0" />
                                    <path d="M8 12l4 0" />
                                    <path d="M8 16l4 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Informasi Publikasi</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="berita-artikel.php">Berita & Artikel</a>
                            <a class="dropdown-item" href="pengumuman.php">Pengumuman</a>
                        </div>
                    </li>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-settings-2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.875 6.27a2.225 2.225 0 0 1 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033" />
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">Pengaturan</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="log.php">Log Sistem</a>
                            <a class="dropdown-item" href="pengaturan-portal.php">Pengaturan Portal Utama</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="navbar-nav flex-row order-md-last ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url(image.jpg)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>Nama</div>
                            <div class="mt-1 small text-secondary">Jabatan</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="akun/profile.php" class="dropdown-item">Profile</a>
                        <a href="akun/feedback.php" class="dropdown-item">Feedback</a>
                        <div class="dropdown-divider"></div>
                        <a href="akun/pengaturan.php" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.6.0/dist/js/tabler.min.js"
        integrity="sha384-nGovOW/ZWlLzx9B2bb/xwuNVzCW1N+DAqx1fmIF9MQakhUKmlW10wx2uv+I/Yguu"
        crossorigin="anonymous"></script>
</body>

</html>