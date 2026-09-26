<?php
include '../backend/conn.php';

// Proses update saat form disubmit
if (isset($_POST['update'])) {
    $new_paragraph = $_POST['main_paragraph'];
    
    // Gunakan Prepared Statement agar aman dari SQL Injection
    $stmt = $pdo->prepare("UPDATE site_content SET content_text = ? WHERE section_key = 'main_paragraph'");
    $stmt->execute([$new_paragraph]);
    
    $success = "Paragraf berhasil diperbarui!";
}

// Ambil data paragraf saat ini dari database
$stmt = $pdo->query("SELECT content_text FROM site_content WHERE section_key = 'main_paragraph'");
$p_data = $stmt->fetch(PDO::FETCH_ASSOC);
$current_paragraph = $p_data['content_text'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Dashboard Backend - Kelola Paragraf</h2>

    <?php if (isset($success)) echo "<p style='color:green;'>$success</p>"; ?>

    <form method="POST" action="">
        <label for="main_paragraph">Teks Paragraf (&lt;p&gt;):</label><br>
        <textarea id="main_paragraph" name="main_paragraph" rows="5" style="width: 400px; padding: 5px;" required><?php echo htmlspecialchars($current_paragraph); ?></textarea><br><br>
        
        <button type="submit" name="update">Simpan Perubahan</button>
    </form>

    <br>
    <a href="index.php" target="_blank">Lihat Website Utama</a>
</body>
</html>