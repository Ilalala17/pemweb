<?php
session_start();

$error = "";

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: page2.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Username dan password harus diisi!";
    } elseif ($username === "admin" && $password === "1234") {
        $_SESSION['login']    = true;
        $_SESSION['username'] = $username;
        header("Location: page2.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="container">
    <header>
        <nav>
            <a href="index.html">Home</a>
            <a href="page2.php">About Me</a>
        </nav>
    </header>

    <div class="login-wrapper">
        <div class="login-box">
            <div class="login-icon">🌸</div>
            <h2>Selamat Datang</h2>
            <p class="subtitle">Silakan login untuk melanjutkan</p>

            <?php if (!empty($error)) echo "<div class='error-msg'>$error</div>"; ?>

            <form action="login.php" method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>

                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

    <footer>
        <p>© 2026 My Biodata Website</p>
        <div class="sosmed">
            <a href="https://instagram.com/fdiilalarosie"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://github.com/ilalala17"><i class="fa-brands fa-github"></i></a>
        </div>
    </footer>
</body>
</html>