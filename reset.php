<?php
require_once 'config/db.php';

$username = 'admin';
$password_baru = 'admin123';
$hash_baru = password_hash($password_baru, PASSWORD_DEFAULT);

$stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $hash_baru, $username);

if ($stmt->execute()) {
    echo "<h3>Password berhasil diperbarui!</h3>";
    echo "<p>Username: <strong>admin</strong></p>";
    echo "<p>Password: <strong>admin123</strong></p>";
    echo "<a href='login.php'>Klik di sini untuk Login</a>";
} else {
    echo "Gagal memperbarui password: " . $conn->error;
}
?>