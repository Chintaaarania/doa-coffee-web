<?php
require_once 'config/db.php';

// Ambil semua produk dari database
$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>
<?php include 'includes/header.php'; ?>

<main class="container" style="padding-top: 30px; padding-bottom: 70px;">

    <!-- HEADER KATALOG -->
    <div style="margin-bottom: 40px;">
        <div class="subtitle-badge">DAFTAR MENU</div>
        <h1 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color); margin: 8px 0;">
            Katalog Doa Coffee
        </h1>
        <p style="color: var(--text-muted); font-size: 1rem; max-width: 550px; line-height: 1.6;">
            Pilih varian favoritmu di bawah ini, klik tombol pesan dan sistem akan langsung mengarahkan pesananmu ke WhatsApp resmi kami.
        </p>
    </div>

    <!-- GRID KATALOG DINAMIS -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
        
        <?php if ($products && $products->num_rows > 0) : ?>
            <?php while ($row = $products->fetch_assoc()) : 
                $weight = !empty($row['weight']) ? $row['weight'] : '250 Gram';
            ?>
                <div class="card" style="display: flex; flex-direction: column; justify-content: space-between; border-radius: 20px; overflow: hidden; border: 1px solid var(--border-light); background: #FFF;">
                    <div>
                        <!-- GAMBAR DENGAN BADGE GRAM -->
                        <div class="card-img-wrapper" style="position: relative; height: 220px; overflow: hidden;">
                            <img src="<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['name']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            
                            <!-- BADGE SATUAN GRAM -->
                            <span style="position: absolute; top: 12px; right: 12px; background: rgba(60, 42, 33, 0.85); color: #FFF; padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; backdrop-filter: blur(4px);">
                                <i class="fa-solid fa-weight-hanging" style="margin-right: 4px; color: var(--accent-color);"></i> <?= htmlspecialchars($weight); ?>
                            </span>
                        </div>

                        <!-- BODY CARD -->
                        <div class="card-body" style="padding: 20px;">
                            <h3 class="card-title" style="font-size: 1.25rem; font-weight: 800; color: var(--primary-color); margin-bottom: 10px;">
                                <?= htmlspecialchars($row['name']); ?>
                            </h3>
                            <p class="card-text" style="color: var(--text-dark); font-size: 0.9rem; line-height: 1.6; margin-bottom: 0;">
                                <?= htmlspecialchars($row['description']); ?>
                            </p>
                        </div>
                    </div>

                    <!-- FOOTER HARGA & TOMBOL PESAN -->
                    <div style="padding: 15px 20px 20px; display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-light);">
                        <div>
                            <span style="font-weight: 800; color: var(--primary-color); font-size: 1.15rem; display: block; line-height: 1.2;">
                                Rp <?= number_format($row['price'], 0, ',', '.'); ?>
                            </span>
                            <small style="color: var(--text-muted); font-size: 0.75rem; font-weight: 600;">/ <?= htmlspecialchars($weight); ?></small>
                        </div>

                        <a href="https://wa.me/6285232467121?text=Halo%20Doa%20Coffee,%20saya%20mau%20pesan%20<?= urlencode($row['name']); ?>%20(<?= urlencode($weight); ?>)" target="_blank" class="btn-pill btn-pill-filled" style="padding: 8px 18px; font-size: 0.85rem;">
                            <i class="fa-brands fa-whatsapp" style="margin-right: 5px;"></i> Pesan
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p style="color: var(--text-muted);">Belum ada produk yang tersedia saat ini.</p>
        <?php endif; ?>

    </div>

</main>

<?php include 'includes/footer.php'; ?>