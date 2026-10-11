<?php
session_start();
if(!isset($_SESSION['admin_status'])){ header("Location: ../login.php"); exit; }
include '../../config/database.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_produk'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    
    // Proses Upload Gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $path = "../../assets/uploads/".$gambar;
    
    if(move_uploaded_file($tmp, $path)){
        $query = "INSERT INTO produk (nama_produk, jenis, harga, deskripsi, gambar) VALUES ('$nama', '$jenis', '$harga', '$deskripsi', '$gambar')";
        mysqli_query($conn, $query);
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal mengupload gambar!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Produk</title></head>
<body style="font-family: Arial; padding: 30px; background: #F5F5F5;">
    <h2 style="color: #3E2723;">Tambah Produk Doa Coffee</h2>
    <form method="POST" action="" enctype="multipart/form-data" style="background: white; padding: 20px; border-radius: 5px; max-width: 500px;">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Jenis (Arabica/Robusta/dsb):</label><br>
        <input type="text" name="jenis" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Harga (Angka saja):</label><br>
        <input type="number" name="harga" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Deskripsi/Tasting Notes:</label><br>
        <textarea name="deskripsi" rows="4" style="width: 100%; padding: 8px; margin-bottom: 10px;"></textarea><br>
        
        <label>Foto Produk:</label><br>
        <input type="file" name="gambar" required style="margin-bottom: 20px;"><br>
        
        <button type="submit" name="simpan" style="background: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer;">Simpan Produk</button>
        <a href="index.php" style="text-decoration: none; margin-left: 10px; color: #333;">Batal</a>
    </form>
</body>
</html>