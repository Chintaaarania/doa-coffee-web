<?php
require_once 'config/db.php';

// Ambil semua produk dari database
$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<?php include 'includes/header.php'; ?>

<main class="container" style="padding-top: 30px; padding-bottom: 70px;">

    <!-- HEADER KATALOG -->
    <div style="margin-bottom: 40px;">
        <div class="subtitle-badge">KATALOG PRODUK</div>
        <h1 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color); margin: 8px 0;">
            Pilihan Kopi Doa Coffee
        </h1>
        <p style="color: var(--text-muted); font-size: 1rem; max-width: 550px; line-height: 1.6;">
            Pilih varian favoritmu di bawah ini, klik tombol pesan untuk menanyakan ketersediaan dan melakukan pemesanan melalui WhatsApp resmi Doa Coffee.
        </p>
    </div>

    <!-- GRID KATALOG DINAMIS DARI DATABASE -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
        
        <?php if ($products && $products->num_rows > 0) : ?>
            <?php while ($row = $products->fetch_assoc()) : ?>
                <div class="card">
                    <div class="card-img-wrapper">
                        <img src="<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['name']); ?>">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title" style="font-size: 1.15rem;"><?= htmlspecialchars($row['name']); ?></h3>
                        <p class="card-text"><?= htmlspecialchars($row['description']); ?></p>
                        <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
                            <span class="card-price" style="font-weight: 800; color: var(--primary-color); font-size: 1.05rem;">
                                Rp <?= number_format($row['price'], 0, ',', '.'); ?>
                            </span>
                            <a href="https://wa.me/6285221224989?text=Halo%20Doa%20Coffee,%20saya%20mau%20pesan%20<?= urlencode($row['name']); ?>" target="_blank" class="btn-pill btn-pill-filled" style="padding: 6px 16px; font-size: 0.85rem;">
                                <i class="fa-brands fa-whatsapp" style="margin-right: 4px;"></i> Pesan
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p style="color: var(--text-muted);">Belum ada produk yang tersedia saat ini.</p>
        <?php endif; ?>

    </div>

</main>

<?php include 'includes/footer.php'; ?>