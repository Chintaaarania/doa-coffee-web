<?php include 'includes/header.php'; ?>
<?php include 'config/database.php'; ?>

<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$query = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$data = mysqli_fetch_array($query);

if(!$data) {
    echo "<div class='container' style='text-align: center; padding: 100px 0;'>";
    echo "<h3 style='color: #D32F2F; margin-bottom: 20px;'>Produk tidak ditemukan!</h3>";
    echo "<a href='katalog.php' class='btn-main'>Kembali ke Katalog</a>";
    echo "</div>";
    include 'includes/footer.php';
    exit;
}
?>

<div class="container">
    <div style="display: flex; gap: 50px; flex-wrap: wrap; background: #fff; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
        <div style="flex: 1; min-width: 300px;">
            <img src="assets/uploads/<?php echo $data['gambar']; ?>" alt="<?php echo $data['nama_produk']; ?>" style="width: 100%; border-radius: 16px; box-shadow: 0 10px 20px rgba(0,0,0,0.05);">
        </div>
        
        <div style="flex: 1.5; min-width: 300px;">
            <h2 style="font-size: 36px; color: #2C1E16; margin-bottom: 5px; font-weight: 800;"><?php echo $data['nama_produk']; ?></h2>
            <p style="display: inline-block; background: #F3EBE6; color: #8D6E63; padding: 6px 18px; border-radius: 30px; font-weight: 600; font-size: 14px; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px;">
                <?php echo $data['jenis']; ?>
            </p>
            
            <h3 style="color: #2C1E16; font-size: 32px; margin-bottom: 30px; font-weight: 700;">Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></h3>
            
            <h4 style="border-bottom: 2px solid #F3EBE6; padding-bottom: 10px; margin-bottom: 15px; font-size: 18px;">Deskripsi & Profil Rasa</h4>
            <p style="line-height: 1.8; font-size: 16px; color: #555;">
                <?php echo nl2br($data['deskripsi']); ?>
            </p>
            
            <div style="margin-top: 40px; display: flex; gap: 15px; flex-wrap: wrap;">
                <a href="https://wa.me/6281234567890?text=Halo%20Doa%20Coffee,%20saya%20ingin%20memesan%20<?php echo urlencode($data['nama_produk']); ?>" class="btn-wa" style="width: auto; padding: 14px 35px;" target="_blank">
                   Pesan via WhatsApp
                </a>
                <a href="katalog.php" class="btn-sec" style="padding: 14px 35px;">
                   Kembali ke Katalog
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>