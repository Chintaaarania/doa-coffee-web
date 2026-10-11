<?php
session_start();
if(!isset($_SESSION['admin_status'])){ header("Location: ../login.php"); exit; }
include '../../config/database.php';
?>
<!DOCTYPE html>
<html>
<head><title>Kelola Produk - Doa Coffee</title></head>
<body style="font-family: Arial; margin: 0; background: #F5F5F5;">
    <div style="background: #3E2723; padding: 20px; color: white; display: flex; justify-content: space-between;">
        <h2 style="margin: 0;">Kelola Katalog Produk</h2>
        <div>
            <a href="../index.php" style="color: white; text-decoration: none; margin-right: 15px;">Kembali ke Dashboard</a>
            <a href="../logout.php" style="color: white; text-decoration: none; background: #D32F2F; padding: 8px 15px; border-radius: 4px;">Logout</a>
        </div>
    </div>
    
    <div style="padding: 30px;">
        <a href="tambah.php" style="background: #4CAF50; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px;">+ Tambah Produk Baru</a>
        <br><br>
        <table border="1" style="width: 100%; border-collapse: collapse; background: white;">
            <tr style="background: #e0e0e0;">
                <th style="padding: 10px;">No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
            while($row = mysqli_fetch_array($query)){
            ?>
            <tr style="text-align: center;">
                <td style="padding: 10px;"><?php echo $no++; ?></td>
                <td><img src="../../assets/uploads/<?php echo $row['gambar']; ?>" width="50"></td>
                <td><?php echo $row['nama_produk']; ?></td>
                <td><?php echo $row['jenis']; ?></td>
                <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" style="color: blue; text-decoration: none;">Edit</a> | 
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" style="color: red; text-decoration: none;" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>