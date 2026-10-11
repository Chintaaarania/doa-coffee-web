<?php
session_start();
if(!isset($_SESSION['admin_status'])){ header("Location: ../login.php"); exit; }
include '../../config/database.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_array($query);

if(isset($_POST['update'])){
    $nama = $_POST['nama_produk'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    
    // Cek apakah admin mengganti gambar
    if($_FILES['gambar']['name'] != ""){
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $path = "../../assets/uploads/".$gambar;
        
        // Hapus gambar lama
        unlink("../../assets/uploads/".$data['gambar']);
        // Upload gambar baru
        move_uploaded_file($tmp, $path);
        
        mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', jenis='$jenis', harga='$harga', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id'");
    } else {
        // Jika gambar tidak diganti
        mysqli_query($conn, "UPDATE produk SET nama_produk='$nama', jenis='$jenis', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'");
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Produk</title></head>
<body style="font-family: Arial; padding: 30px; background: #F5F5F5;">
    <h2 style="color: #3E2723;">Edit Produk</h2>
    <form method="POST" action="" enctype="multipart/form-data" style="background: white; padding: 20px; border-radius: 5px; max-width: 500px;">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?php echo $data['nama_produk']; ?>" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Jenis:</label><br>
        <input type="text" name="jenis" value="<?php echo $data['jenis']; ?>" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required style="width: 100%; padding: 8px; margin-bottom: 10px;"><br>
        
        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" rows="4" style="width: 100%; padding: 8px; margin-bottom: 10px;"><?php echo $data['deskripsi']; ?></textarea><br>
        
        <label>Foto Produk (Abaikan jika tidak ingin ganti):</label><br>
        <img src="../../assets/uploads/<?php echo $data['gambar']; ?>" width="80"><br>
        <input type="file" name="gambar" style="margin-bottom: 20px; margin-top: 5px;"><br>
        
        <button type="submit" name="update" style="background: #2196F3; color: white; padding: 10px 15px; border: none; cursor: pointer;">Update Produk</button>
        <a href="index.php" style="text-decoration: none; margin-left: 10px; color: #333;">Batal</a>
    </form>
</body>
</html>