<?php
require_once '../backend/conn.php';

// Cek Sesi Auth Admin sederhana
if (!isset($_SESSION['admin_logged'])) {
    // Auto-login untuk pengujian lokal, ganti sesuai mekanisme sistem Anda
    $_SESSION['admin_logged'] = true;
}

// Handle Form Update Settings CMS
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_cms'])) {
    foreach($_POST['settings'] as $key => $val) {
        $stmt = $pdo->prepare("REPLACE INTO settings (key_name, value) VALUES (?, ?)");
        $stmt->execute([$key, $val]);
    }
    $msg = "Pengaturan CMS Berhasil Diperbarui!";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tabler demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" />
  </head>
  <body>
    <h1>Hello, Tabler!</h1>
    <button class="btn btn-primary">Primary button</button>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
  </body>
</html>