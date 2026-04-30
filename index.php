<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

require 'koneksi.php';

$sukses   = "";
$error    = "";
$nama     = $_POST['nama']    ?? '';
$email    = $_POST['email']   ?? '';
$tanggal  = $_POST['tanggal'] ?? '';
$pesan    = $_POST['pesan']   ?? '';
$username = $_SESSION['username'] ?? 'User';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($nama) || empty($email) || empty($tanggal) || empty($pesan)) {
        $error = "Semua field wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Format email tidak valid.";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO pesan (nama, email, tanggal, pesan) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $nama, $email, $tanggal, $pesan);

        if (mysqli_stmt_execute($stmt)) {
            $sukses = "Pesan berhasil dikirim! Terima kasih, " . htmlspecialchars($nama) . " 🌸";
        } else {
            $error = "Gagal menyimpan pesan. Silakan coba lagi.";
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="container">
    <header>
        <nav>
            <a href="index.html">Home</a>
            <a href="page2.php">About Me</a>
            <a href="logout.php">Logout (<?php echo htmlspecialchars($username); ?>)</a>
        </nav>
    </header>

    <main style="padding: 100px 20px 40px;">
        <h2>Data yang dikirim:</h2>

        <?php if (!empty($sukses)): ?>
            <p style="color: green;"><?= $sukses ?></p>
            <p><strong>Nama:</strong> <?= htmlspecialchars($nama) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
            <p><strong>Tanggal:</strong> <?= htmlspecialchars($tanggal) ?></p>
            <p><strong>Pesan:</strong> <?= htmlspecialchars($pesan) ?></p>
        <?php elseif (!empty($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <a href="page2.php" class="btn">Kembali</a>
    </main>

    <footer>
        <p>© 2026 My Biodata Website</p>
        <div class="sosmed">
            <a href="https://instagram.com/fdiilalarosie"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://github.com/ilalala17"><i class="fa-brands fa-github"></i></a>
        </div>
    </footer>
</body>
</html>