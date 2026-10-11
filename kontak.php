<?php include 'includes/header.php'; ?>

<?php
// Data Kontak Resmi Doa Coffee Bondowoso
$no_wa1 = "6285221224989";
$no_wa2 = "6285232467121";
$username_ig = "doacoffee_official";
$username_tiktok = "doacoffee_official";
$linktree_url = "https://linktr.ee/doacoffee";
$alamat_lengkap = "DOA COFFEE BONDOWOSO, Jl. Brigpol Sudarlan, Nangkaan, Kec. Bondowoso, Kabupaten Bondowoso, Jawa Timur 68215";

// Link & Embed Google Maps
$map_link = "https://www.google.com/maps/search/?api=1&query=" . urlencode($alamat_lengkap);
$map_embed = "https://maps.google.com/maps?q=" . urlencode($alamat_lengkap) . "&t=&z=16&ie=UTF8&iwloc=&output=embed";
?>

<main class="container" style="padding: 50px 0 70px;">
    
    <!-- HEADER SECTION -->
    <div style="margin-bottom: 40px;">
        <div class="subtitle-badge">Hubungi Kami</div>
        <h1 class="hero-title" style="font-size: 2.8rem; letter-spacing: -1px; margin-bottom: 10px;">Tetap Terhubung</h1>
        <p class="hero-description" style="max-width: 650px; color: var(--text-muted); font-size: 1.05rem;">
            Punya pertanyaan seputar produk, pemesanan jumlah besar, atau ingin berkunjung langsung ke kedai kami? Hubungi kami melalui kanal media sosial resmi kami di bawah ini.
        </p>
    </div>

    <!-- GRID 5 KARTU KONTAK (WA, INSTAGRAM, TIKTOK, LINKTREE, LOKASI) -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 50px;">
        
        <!-- Card 1: WhatsApp -->
        <div class="card" style="padding: 28px 20px; text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <div style="width: 54px; height: 54px; background-color: #25D366; color: #FFF; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin: 0 auto 16px;">
                    <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                </div>
                <h3 style="color: var(--primary-color); margin-bottom: 8px; font-weight: 700; font-size: 1.15rem;">WhatsApp</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px; line-height: 1.5;">
                    Respon cepat untuk pemesanan &amp; info umum.
                </p>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <a href="https://wa.me/6285221224989?text=Halo%2C%20Doa%20Coffee%21%0ASaya%20tertarik%20dengan%20produk%20%5BNama%20Produk%5D.%20Apakah%20produknya%20masih%20tersedia%3F" target="_blank" rel="noopener noreferrer" class="btn-pill btn-pill-filled" style="padding: 8px 12px; font-size: 0.8rem;">
                    Chat (0852-2122-4989)
                </a>
                <a href="https://wa.me/6285232467121?text=Halo%2C%20Doa%20Coffee%21%0ASaya%20tertarik%20dengan%20produk%20%5BNama%20Produk%5D.%20Apakah%20produknya%20masih%20tersedia%3F" target="_blank" rel="noopener noreferrer" class="btn-pill" style="padding: 8px 12px; font-size: 0.8rem;">
                    Chat (0852-3246-7121)
                </a>
            </div>
        </div>

        <!-- Card 2: Instagram -->
        <div class="card" style="padding: 28px 20px; text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <div style="width: 54px; height: 54px; background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); color: #FFF; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin: 0 auto 16px;">
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <h3 style="color: var(--primary-color); margin-bottom: 8px; font-weight: 700; font-size: 1.15rem;">Instagram</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px; line-height: 1.5;">
                    Pembaruan harian, promo & foto kedai.
                </p>
            </div>
            <a href="https://instagram.com/<?= $username_ig; ?>" target="_blank" class="btn-pill" style="padding: 8px 12px; font-size: 0.85rem;">
                @<?= $username_ig; ?>
            </a>
        </div>

        <!-- Card 3: TikTok -->
        <div class="card" style="padding: 28px 20px; text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <div style="width: 54px; height: 54px; background-color: #000000; color: #FFF; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.7rem; margin: 0 auto 16px;">
                    <i class="fa-brands fa-tiktok"></i>
                </div>
                <h3 style="color: var(--primary-color); margin-bottom: 8px; font-weight: 700; font-size: 1.15rem;">TikTok</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px; line-height: 1.5;">
                    Konten video seru & proses nyeduh kopi.
                </p>
            </div>
            <a href="https://tiktok.com/@<?= $username_tiktok; ?>" target="_blank" class="btn-pill" style="padding: 8px 12px; font-size: 0.85rem;">
                @<?= $username_tiktok; ?>
            </a>
        </div>

        <!-- Card 4: Linktree -->
        <div class="card" style="padding: 28px 20px; text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <div style="width: 54px; height: 54px; background-color: #43E660; color: #1E1E1E; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.7rem; margin: 0 auto 16px;">
                    <i class="fa-solid fa-tree"></i>
                </div>
                <h3 style="color: var(--primary-color); margin-bottom: 8px; font-weight: 700; font-size: 1.15rem;">Linktree</h3>
                <p style="color: var(--text-muted); font-size: 0.85rem; margin-bottom: 20px; line-height: 1.5;">
                    Semua tautan penting dalam satu tempat.
                </p>
            </div>
            <a href="<?= $linktree_url; ?>" target="_blank" class="btn-pill btn-pill-filled" style="padding: 8px 12px; font-size: 0.85rem;">
                Buka Linktree
            </a>
        </div>

        <!-- Card 5: Lokasi Kedai -->
        <div class="card" style="padding: 28px 20px; text-align: center; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <div style="width: 54px; height: 54px; background-color: var(--cream-soft); color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.7rem; margin: 0 auto 16px;">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h3 style="color: var(--primary-color); margin-bottom: 8px; font-weight: 700; font-size: 1.15rem;">Lokasi Kedai</h3>
                <p style="color: var(--text-muted); font-size: 0.82rem; margin-bottom: 20px; line-height: 1.5;">
                    Jl. Brigpol Sudarlan, Nangkaan, Bondowoso.
                </p>
            </div>
            <a href="<?= $map_link; ?>" target="_blank" class="btn-pill btn-pill-filled" style="padding: 8px 12px; font-size: 0.85rem;">
                Google Maps
            </a>
        </div>

    </div>

    <!-- SECTION MAPS EMBED -->
    <section class="card" style="padding: 25px; border-radius: 24px; box-shadow: var(--shadow-soft);">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; padding-bottom: 20px;">
            <div>
                <h3 style="font-size: 1.3rem; font-weight: 800; color: var(--primary-color);">
                    <i class="fa-solid fa-map-pin" style="color: var(--accent-color); margin-right: 8px;"></i> Peta Lokasi Doa Coffee Bondowoso
                </h3>
                <p style="font-size: 0.9rem; color: var(--text-muted); margin-top: 4px;"><?= $alamat_lengkap; ?></p>
            </div>
            <a href="<?= $map_link; ?>" target="_blank" class="btn-pill btn-pill-filled" style="font-size: 0.88rem; padding: 10px 22px;">
                Petunjuk Arah <i class="fa-solid fa-arrow-up-right-from-square" style="margin-left: 6px;"></i>
            </a>
        </div>

        <div style="width: 100%; height: 420px; border-radius: 16px; overflow: hidden; position: relative; border: 1px solid var(--border-light);">
            <iframe 
                src="<?= $map_embed; ?>" 
                width="100%" 
                height="100%" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>