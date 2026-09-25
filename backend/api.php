<?php
// api.php
header('Content-Type: application/json');
require_once 'conn.php';

$action = $_GET['action'] ?? '';

switch($action) {
    case 'get_dokumen':
        $cat = $_GET['cat'] ?? 'all';
        $search = $_GET['search'] ?? '';

        $sql = "SELECT * FROM dokumen WHERE 1=1";
        $params = [];

        if ($cat !== 'all') {
            $sql .= " AND kategori = ?";
            $params[] = $cat;
        }

        if (!empty($search)) {
            $sql .= " AND (judul LIKE ? OR kode_dokumen LIKE ?)";
            $params[] = "%$search%";
            $params[] = "%$search%";
        }

        $sql .= " ORDER BY created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $docs = $stmt->fetchAll();

        // Count stats
        $stmtTotal = $pdo->query("SELECT COUNT(*) FROM dokumen");
        $total = $stmtTotal->fetchColumn();

        echo json_encode([
            'status' => 'success',
            'total' => $total,
            'data' => $docs
        ]);
        break;

    case 'submit_register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nik_nim = filter_var($_POST['nik_nim'], FILTER_SANITIZE_NUMBER_INT);
            $nama = htmlspecialchars($_POST['nama']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $telepon = filter_var($_POST['telepon'], FILTER_SANITIZE_NUMBER_INT);
            $jenis = htmlspecialchars($_POST['jenis_layanan']);
            $keterangan = htmlspecialchars($_POST['keterangan']);

            if (!$email || !$nik_nim || !$telepon) {
                echo json_encode(['status' => 'error', 'message' => 'Format input NIK/NIM, Email, atau No. Telp tidak valid!']);
                exit;
            }

            $tiket = "TKT-" . date('Ymd') . "-" . rand(1000, 9999);

            $stmt = $pdo->prepare("INSERT INTO pendaftaran (nomor_tiket, nik_nim, nama, email, telepon, jenis_layanan, keterangan) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$tiket, $nik_nim, $nama, $email, $telepon, $jenis, $keterangan]);

            // Simulasi Dispatcher Email/SMS/WhatsApp API
            // mail($email, "Tiket Layanan FH UIN Salatiga", "Nomor tiket Anda: " . $tiket);

            echo json_encode([
                'status' => 'success',
                'message' => 'Pendaftaran berhasil dikirim!',
                'tiket' => $tiket,
                'email_status' => 'Notifikasi detail pendaftaran telah dikirim ke ' . $email . ' dan WhatsApp ' . $telepon
            ]);
        }
        break;

    case 'submit_rating':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = htmlspecialchars($_POST['nama']);
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $telepon = filter_var($_POST['telepon'], FILTER_SANITIZE_NUMBER_INT);
            $bintang = (int)$_POST['bintang'];
            $komentar = htmlspecialchars($_POST['komentar']);

            if (!$email || $bintang < 1 || $bintang > 5) {
                echo json_encode(['status' => 'error', 'message' => 'Data penilaian tidak valid.']);
                exit;
            }

            $stmt = $pdo->prepare("INSERT INTO rating (nama, email, telepon, bintang, komentar) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nama, $email, $telepon, $bintang, $komentar]);

            echo json_encode(['status' => 'success', 'message' => 'Penilaian Anda berhasil disimpan ke database!']);
        }
        break;

    case 'get_laporan_stats':
        $total = $pdo->query("SELECT COUNT(*) FROM laporan")->fetchColumn();
        $approved = $pdo->query("SELECT COUNT(*) FROM laporan WHERE status='Approved'")->fetchColumn();
        $sent = $pdo->query("SELECT COUNT(*) FROM laporan WHERE status='Sent'")->fetchColumn();
        $draft = $pdo->query("SELECT COUNT(*) FROM laporan WHERE status='Draft'")->fetchColumn();

        $list = $pdo->query("SELECT * FROM laporan ORDER BY created_at DESC LIMIT 10")->fetchAll();

        echo json_encode([
            'status' => 'success',
            'summary' => ['total' => $total, 'approved' => $approved, 'sent' => $sent, 'draft' => $draft],
            'data' => $list
        ]);
        break;

    default:
        echo json_encode(['status' => 'invalid_action']);
        break;
}
?>