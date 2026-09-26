<?php
require_once '../backend/conn.php';

if (!isset($_SESSION['admin_logged'])) {
  $_SESSION['admin_logged'] = true;
}

$editableSettings = ['running_text', 'jam_operasional', 'link_survei', 'link_tautan_penting'];
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cms'])) {
  $settings = $_POST['settings'] ?? [];
  $stmt = $pdo->prepare('REPLACE INTO settings (key_name, value) VALUES (?, ?)');

  foreach ($editableSettings as $key) {
    if (isset($settings[$key])) {
      $stmt->execute([$key, trim($settings[$key])]);
    }
  }

  $message = 'Pengaturan portal berhasil diperbarui.';
}

$dashboard = $pdo->query("SELECT
  (SELECT COUNT(*) FROM pendaftaran) AS total_pendaftaran,
  (SELECT COUNT(*) FROM pendaftaran WHERE status = 'Menunggu') AS pendaftaran_menunggu,
  (SELECT COUNT(*) FROM dokumen) AS total_dokumen,
  (SELECT AVG(bintang) FROM rating) AS rata_rating")->fetch();
$recentRegistrations = $pdo->query('SELECT nomor_tiket, nama, jenis_layanan, status, created_at FROM pendaftaran ORDER BY created_at DESC LIMIT 5')->fetchAll();
$settings = [];
foreach ($editableSettings as $key) {
  $settings[$key] = get_setting($pdo, $key);
}

function e($value) {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function statusClass($status) {
  return [
    'Menunggu' => 'bg-yellow-lt text-yellow',
    'Diproses' => 'bg-azure-lt text-azure',
    'Selesai' => 'bg-green-lt text-green',
  ][$status] ?? 'bg-secondary-lt text-secondary';
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin | L7Smart</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <style>
    :root {
      --tblr-body-font-family: 'DM Sans', sans-serif;
      --brand-green: #17483f;
      --brand-gold: #e3b44b;
    }
    body { background: #f5f7f6; }
    .navbar-vertical { background: var(--brand-green); }
    .navbar-vertical .navbar-brand { color: #fff; min-height: 76px; }
    .navbar-vertical .navbar-nav .nav-link { color: rgba(255,255,255,.72); }
    .navbar-vertical .navbar-nav .nav-link:hover,
    .navbar-vertical .navbar-nav .nav-link.active { color: #fff; background: rgba(255,255,255,.1); }
    .brand-mark {
      display: grid; place-items: center; width: 40px; height: 40px;
      border-radius: 8px; background: #fff; color: var(--brand-green);
      border-bottom: 3px solid var(--brand-gold); font-size: 17px; font-weight: 700;
    }
    .brand-name { color: #fff; font-size: 17px; font-weight: 700; line-height: 1.1; }
    .brand-caption { color: rgba(255,255,255,.63); font-size: 9px; letter-spacing: .04em; }
    .page-wrapper { min-height: 100vh; }
    .metric-icon { display: grid; place-items: center; width: 42px; height: 42px; border-radius: 8px; font-size: 21px; }
    .shortcut-link { color: inherit; text-decoration: none; }
    .shortcut-link:hover { color: var(--brand-green); }
    .shortcut-icon { display: grid; place-items: center; width: 38px; height: 38px; border-radius: 8px; font-size: 20px; }
    .form-label { font-weight: 600; }
    @media (min-width: 992px) {
      .navbar-vertical { position: fixed; inset: 0 auto 0 0; width: 260px; z-index: 1030; }
      .page-wrapper { margin-left: 260px; }
    }
  </style>
</head>
<body>
<div class="page">
  <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Buka navigasi">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand d-flex align-items-center gap-3" href="index.php">
        <span class="brand-mark"><i class="ti ti-scale"></i></span>
        <span class="d-flex flex-column">
          <span class="brand-name">L7Smart</span>
          <span class="brand-caption">FAKULTAS HUKUM UIN SALATIGA</span>
        </span>
      </a>
      <div class="collapse navbar-collapse" id="sidebar-menu">
        <ul class="navbar-nav pt-lg-3">
          <li class="nav-item">
            <a class="nav-link active" href="index.php" aria-current="page">
              <span class="nav-link-icon"><i class="ti ti-layout-dashboard"></i></span>
              <span class="nav-link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item"><a class="nav-link" href="../pages/register.php"><span class="nav-link-icon"><i class="ti ti-user-plus"></i></span><span class="nav-link-title">Pendaftaran</span></a></li>
          <li class="nav-item"><a class="nav-link" href="../pages/e-dok.php"><span class="nav-link-icon"><i class="ti ti-files"></i></span><span class="nav-link-title">e-Dokumen</span></a></li>
          <li class="nav-item"><a class="nav-link" href="../pages/laporan.php"><span class="nav-link-icon"><i class="ti ti-chart-bar"></i></span><span class="nav-link-title">Laporan</span></a></li>
          <li class="nav-item"><a class="nav-link" href="../pages/rating-mediator.php"><span class="nav-link-icon"><i class="ti ti-star"></i></span><span class="nav-link-title">Rating Layanan</span></a></li>
          <li class="nav-item mt-3"><a class="nav-link" href="../index.php" target="_blank" rel="noopener"><span class="nav-link-icon"><i class="ti ti-external-link"></i></span><span class="nav-link-title">Lihat Portal</span></a></li>
        </ul>
      </div>
    </div>
  </aside>

  <div class="page-wrapper">
    <header class="navbar navbar-expand-md d-print-none">
      <div class="container-xl">
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Buka navigasi">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav flex-row order-md-last ms-auto">
          <div class="nav-item d-flex align-items-center gap-2 text-secondary">
            <span class="avatar avatar-sm bg-green-lt text-green"><i class="ti ti-user-shield"></i></span>
            <span class="d-none d-sm-inline">Administrator</span>
          </div>
        </div>
        <div class="navbar-nav d-none d-md-flex">
          <span class="nav-link">Panel Administrasi</span>
        </div>
      </div>
    </header>

    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <div class="page-pretitle">L7Smart / Admin</div>
            <h1 class="page-title">Ringkasan layanan</h1>
          </div>
          <div class="col-auto ms-auto d-print-none">
            <a href="../index.php" target="_blank" rel="noopener" class="btn btn-outline-secondary"><i class="ti ti-eye me-2"></i>Pratinjau portal</a>
          </div>
        </div>
      </div>
    </div>

    <main class="page-body">
      <div class="container-xl">
        <?php if ($message): ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <div class="d-flex"><div><i class="ti ti-circle-check me-2"></i><?= e($message) ?></div></div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></a>
          </div>
        <?php endif; ?>

        <div class="row row-deck row-cards mb-3">
          <div class="col-sm-6 col-xl-3">
            <div class="card"><div class="card-body">
              <div class="d-flex align-items-center"><div class="subheader">Total pendaftaran</div><span class="metric-icon ms-auto bg-azure-lt text-azure"><i class="ti ti-users"></i></span></div>
              <div class="h1 mb-0 mt-2"><?= number_format((int) $dashboard['total_pendaftaran']) ?></div>
              <div class="text-secondary mt-1">Seluruh permohonan layanan</div>
            </div></div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card"><div class="card-body">
              <div class="d-flex align-items-center"><div class="subheader">Perlu ditindaklanjuti</div><span class="metric-icon ms-auto bg-yellow-lt text-yellow"><i class="ti ti-hourglass"></i></span></div>
              <div class="h1 mb-0 mt-2"><?= number_format((int) $dashboard['pendaftaran_menunggu']) ?></div>
              <div class="text-secondary mt-1">Status menunggu</div>
            </div></div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card"><div class="card-body">
              <div class="d-flex align-items-center"><div class="subheader">Dokumen tersedia</div><span class="metric-icon ms-auto bg-green-lt text-green"><i class="ti ti-files"></i></span></div>
              <div class="h1 mb-0 mt-2"><?= number_format((int) $dashboard['total_dokumen']) ?></div>
              <div class="text-secondary mt-1">Arsip dalam e-Dokumen</div>
            </div></div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="card"><div class="card-body">
              <div class="d-flex align-items-center"><div class="subheader">Rating layanan</div><span class="metric-icon ms-auto bg-orange-lt text-orange"><i class="ti ti-star"></i></span></div>
              <div class="h1 mb-0 mt-2"><?= $dashboard['rata_rating'] !== null ? number_format((float) $dashboard['rata_rating'], 1) . ' / 5' : 'Belum ada' ?></div>
              <div class="text-secondary mt-1">Rata-rata penilaian pengguna</div>
            </div></div>
          </div>
        </div>

        <div class="row row-cards">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header"><h3 class="card-title">Pendaftaran terbaru</h3><div class="card-actions"><a href="../pages/register.php" class="btn btn-sm btn-outline-secondary">Buka modul <i class="ti ti-arrow-up-right ms-1"></i></a></div></div>
              <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                  <thead><tr><th>No. tiket</th><th>Pemohon</th><th>Jenis layanan</th><th>Status</th><th>Waktu masuk</th></tr></thead>
                  <tbody>
                  <?php if (!$recentRegistrations): ?>
                    <tr><td colspan="5" class="text-center text-secondary py-5">Belum ada pendaftaran masuk.</td></tr>
                  <?php else: ?>
                    <?php foreach ($recentRegistrations as $registration): ?>
                      <tr>
                        <td class="text-secondary"><?= e($registration['nomor_tiket']) ?></td>
                        <td class="fw-medium"><?= e($registration['nama']) ?></td>
                        <td><?= e($registration['jenis_layanan']) ?></td>
                        <td><span class="badge <?= e(statusClass($registration['status'])) ?>"><?= e($registration['status']) ?></span></td>
                        <td class="text-secondary"><?= e(date('d M Y, H:i', strtotime($registration['created_at']))) ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="card mt-3">
              <div class="card-header"><h3 class="card-title">Pengaturan portal</h3></div>
              <form method="post">
                <div class="card-body">
                  <div class="mb-3"><label class="form-label" for="running-text">Teks sambutan</label><textarea class="form-control" id="running-text" name="settings[running_text]" rows="2"><?= e($settings['running_text']) ?></textarea></div>
                  <div class="mb-3"><label class="form-label" for="jam-operasional">Jam operasional</label><input class="form-control" id="jam-operasional" name="settings[jam_operasional]" value="<?= e($settings['jam_operasional']) ?>"></div>
                  <div class="row">
                    <div class="col-md-6 mb-3"><label class="form-label" for="link-survei">Tautan survei</label><input class="form-control" id="link-survei" type="url" name="settings[link_survei]" value="<?= e($settings['link_survei']) ?>"></div>
                    <div class="col-md-6 mb-3"><label class="form-label" for="link-penting">Tautan penting</label><input class="form-control" id="link-penting" type="url" name="settings[link_tautan_penting]" value="<?= e($settings['link_tautan_penting']) ?>"></div>
                  </div>
                </div>
                <div class="card-footer text-end"><button class="btn btn-primary" type="submit" name="update_cms"><i class="ti ti-device-floppy me-2"></i>Simpan pengaturan</button></div>
              </form>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card">
              <div class="card-header"><h3 class="card-title">Pintasan modul</h3></div>
              <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action shortcut-link" href="../pages/desk-info.php"><span class="d-flex align-items-center gap-3"><span class="shortcut-icon bg-azure-lt text-azure"><i class="ti ti-building-community"></i></span><span><span class="d-block fw-medium">Desk Info Pejabat</span><span class="text-secondary small">Struktur dan informasi pejabat</span></span><i class="ti ti-chevron-right ms-auto text-secondary"></i></span></a>
                <a class="list-group-item list-group-item-action shortcut-link" href="../pages/ruang-tunggu.php"><span class="d-flex align-items-center gap-3"><span class="shortcut-icon bg-green-lt text-green"><i class="ti ti-device-tv"></i></span><span><span class="d-block fw-medium">Ruang Tunggu</span><span class="text-secondary small">Display antrean dan informasi</span></span><i class="ti ti-chevron-right ms-auto text-secondary"></i></span></a>
                <a class="list-group-item list-group-item-action shortcut-link" href="../pages/ruang-sidang.php"><span class="d-flex align-items-center gap-3"><span class="shortcut-icon bg-orange-lt text-orange"><i class="ti ti-scale"></i></span><span><span class="d-block fw-medium">Ruang Sidang</span><span class="text-secondary small">Monitoring sidang semu</span></span><i class="ti ti-chevron-right ms-auto text-secondary"></i></span></a>
                <a class="list-group-item list-group-item-action shortcut-link" href="../pages/bantuan.php"><span class="d-flex align-items-center gap-3"><span class="shortcut-icon bg-purple-lt text-purple"><i class="ti ti-help"></i></span><span><span class="d-block fw-medium">Pusat Bantuan</span><span class="text-secondary small">Informasi dan dukungan teknis</span></span><i class="ti ti-chevron-right ms-auto text-secondary"></i></span></a>
              </div>
            </div>
            <div class="card card-sm mt-3 border-0" style="background:#e9f2ee">
              <div class="card-body d-flex gap-3">
                <span class="shortcut-icon bg-white text-green"><i class="ti ti-shield-check"></i></span>
                <div><div class="fw-semibold">Portal layanan terpadu</div><div class="text-secondary small mt-1">Fakultas Hukum UIN Salatiga</div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
</body>
</html>