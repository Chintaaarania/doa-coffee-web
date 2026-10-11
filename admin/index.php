<?php
session_start();

// Cek apakah ada session login. Jika tidak ada, tendang kembali ke login.php
if(!isset($_SESSION['admin_status'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Dashboard Admin - Doa Coffee</title></head>
<body style="font-family: Arial; margin: 0; background: #F5F5F5;">
    <div style="background: #3E2723; padding: 20px; color: white; display: flex; justify-content: space-between; align-items: center;">
        <h2 style="margin: 0;">Panel Admin Doa Coffee</h2>
        <a href="logout.php" style="color: white; text-decoration: none; background: #D32F2F; padding: 8px 15px; border-radius: 4px;">Logout</a>
    </div>
    
    <div style="padding: 30px;">
        <h3>Selamat Datang di Dashboard Administrator</h3>
        <p>Gunakan menu di bawah ini untuk mengelola konten website.</p>
        
        <div style="margin-top: 20px;">
            <!-- Nantinya tautan ini mengarah ke file CRUD produk Anda -->
            <a href="produk/index.php" style="display: inline-block; padding: 15px 25px; background: #4CAF50; color: white; text-decoration: none; border-radius: 4px;">Kelola Katalog Produk</a>
        </div>
    </div>
</body>
</html>