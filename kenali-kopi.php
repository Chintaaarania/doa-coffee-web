<?php 
require_once 'config/db.php';

// Ambil data profil cupping dari database
$profiles = $conn->query("SELECT * FROM coffee_profiles ORDER BY id ASC");

include 'includes/header.php'; 
?>

<main class="container" style="padding: 40px 0 70px;">
    
    <!-- HEADER HERO SECTION -->
    <div style="text-align: center; max-width: 750px; margin: 0 auto 50px;">
        <div class="subtitle-badge" style="justify-content: center;">Edukasi Kopi Argopuro</div>
        <h1 class="hero-title" style="font-size: 3rem; letter-spacing: -1px; margin-bottom: 15px;">
            Kenali Kopi Anda
        </h1>
        <p class="hero-description" style="margin: 0 auto; font-size: 1.1rem; color: var(--text-muted);">
            Dipetik langsung dari kawasan Pegunungan Argopuro, Jawa Timur. Pahami varietas biji kopi dan profil karakter rasa untuk menemukan cangkir favorit yang paling sesuai dengan selera Anda.
        </p>
    </div>


    <!-- SECTION 1: 3 JENIS KOPI (ROBUSTA, ARABIKA, EXCELSA) -->
    <section style="margin-bottom: 70px;">
        <div style="margin-bottom: 30px;">
            <div class="subtitle-badge">Varietas Kopi</div>
            <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary-color);">1. Jenis Biji Kopi</h2>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            
            <!-- 1. ROBUSTA -->
            <div class="card">
                <div class="card-img-wrapper" style="height: 200px;">
                    <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=800&q=80" alt="Kopi Robusta Argopuro">
                    <span style="position: absolute; top: 15px; right: 15px; background: rgba(60, 42, 33, 0.85); color: #FFF; padding: 6px 14px; border-radius: 50px; font-size: 0.8rem; font-weight: 700; backdrop-filter: blur(4px);">
                        300 – 900 mdpl
                    </span>
                </div>
                <div class="card-body" style="padding: 25px;">
                    <h3 class="card-title" style="font-size: 1.5rem; margin: 5px 0 12px;">Kopi Robusta</h3>
                    <p class="card-text" style="line-height: 1.7; color: var(--text-dark); margin-bottom: 15px;">
                        Tumbuh di kawasan Pegunungan Argopuro. Memiliki karakter rasa yang kuat dengan <em>body</em> tebal, terasa pekat dan mantap saat diminum.
                    </p>
                </div>
            </div>

            <!-- 2. ARABIKA -->
            <div class="card">
                <div class="card-img-wrapper" style="height: 200px;">
                    <img src="https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?auto=format&fit=crop&w=800&q=80" alt="Kopi Arabika Argopuro">
                    <span style="position: absolute; top: 15px; right: 15px; background: rgba(60, 42, 33, 0.85); color: #FFF; padding: 6px 14px; border-radius: 50px; font-size: 0.8rem; font-weight: 700; backdrop-filter: blur(4px);">
                        1.200 – 1.800 mdpl
                    </span>
                </div>
                <div class="card-body" style="padding: 25px;">
                    <h3 class="card-title" style="font-size: 1.5rem; margin: 5px 0 12px;">Kopi Arabika</h3>
                    <p class="card-text" style="line-height: 1.7; color: var(--text-dark); margin-bottom: 15px;">
                        Berasal dari dataran tinggi Argopuro dengan karakter rasa yang kompleks, beragam, manis alami, serta keasaman yang seimbang.
                    </p>
                </div>
            </div>

            <!-- 3. EXCELSA -->
            <div class="card">
                <div class="card-img-wrapper" style="height: 200px;">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=800&q=80" alt="Kopi Excelsa Argopuro">
                    <span style="position: absolute; top: 15px; right: 15px; background: rgba(60, 42, 33, 0.85); color: #FFF; padding: 6px 14px; border-radius: 50px; font-size: 0.8rem; font-weight: 700; backdrop-filter: blur(4px);">
                        300 – 800 mdpl
                    </span>
                </div>
                <div class="card-body" style="padding: 25px;">
                    <h3 class="card-title" style="font-size: 1.5rem; margin: 5px 0 12px;">Kopi Excelsa</h3>
                    <p class="card-text" style="line-height: 1.7; color: var(--text-dark); margin-bottom: 15px;">
                        Memiliki keunikan rasa eksotis yang berbeda dari Robusta maupun Arabika. Pilihan tepat bagi penikmat eksplorasi kopi Nusantara.
                    </p>
                </div>
            </div>

        </div>
    </section>


    <!-- SECTION 2: KARAKTER RASA UTAMA -->
    <section style="background-color: var(--bg-secondary); padding: 50px; border-radius: 24px; border: 1px solid var(--border-light); margin-bottom: 70px;">
        <div style="margin-bottom: 35px; text-align: center; max-width: 600px; margin-left: auto; margin-right: auto;">
            <div class="subtitle-badge" style="justify-content: center;">TASTE PROFILE</div>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary-color);">2. Karakter Rasa Utama</h2>
            <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 8px;">
                Ringkasan rasa khas masing-masing varietas kopi Doa Coffee Pegunungan Argopuro.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
            
            <!-- Card Taste Robusta -->
            <div style="background: #FFFFFF; padding: 30px; border-radius: 16px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft);">
                <div style="width: 50px; height: 50px; background-color: var(--cream-soft); color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 20px;">
                    <i class="fa-solid fa-mug-hot"></i>
                </div>
                <h3 style="font-size: 1.3rem; color: var(--primary-color); margin-bottom: 10px; font-weight: 700;">Robusta</h3>
                <p style="color: var(--text-dark); font-size: 0.95rem; line-height: 1.7;">
                    Menghadirkan karakter rasa yang kuat dan tegas dengan body tebal serta tingkat keasaman yang rendah. Profil utamanya didominasi oleh paduan cita rasa khas cokelat, kacang, dan sentuhan halus rempah.
                </p>
            </div>

            <!-- Card Taste Arabika -->
            <div style="background: #FFFFFF; padding: 30px; border-radius: 16px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft);">
                <div style="width: 50px; height: 50px; background-color: var(--cream-soft); color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 20px;">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <h3 style="font-size: 1.3rem; color: var(--primary-color); margin-bottom: 10px; font-weight: 700;">Arabika</h3>
                <p style="color: var(--text-dark); font-size: 0.95rem; line-height: 1.7;">
                    Memiliki profil rasa yang kompleks dengan keasaman seimbang, kemanisan alami, dan <em>aftertaste</em> yang bertahan lama. Setiap seduhannya kaya akan nuansa aroma <em>floral</em> serta keharuman <em>fruity</em> yang menyegarkan.

                </p>
            </div>

            <!-- Card Taste Excelsa -->
            <div style="background: #FFFFFF; padding: 30px; border-radius: 16px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft);">
                <div style="width: 50px; height: 50px; background-color: var(--cream-soft); color: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; margin-bottom: 20px;">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                </div>
                <h3 style="font-size: 1.3rem; color: var(--primary-color); margin-bottom: 10px; font-weight: 700;">Excelsa</h3>
                <p style="color: var(--text-dark); font-size: 0.95rem; line-height: 1.7;">
                    Menyajikan karakter eksotis hasil perpaduan cita rasa <em>fruity</em> dan sentuhan asam segar yang khas. Cita rasanya semakin diperkaya oleh nuansa rempah yang unik dengan ketebalan <em>body</em> yang pas.
                </p>
            </div>

        </div>
    </section>


    <!-- SECTION 3: PROFIL & SKOR CUPPING PRODUK (DINAMIS DARI DATABASE) -->
    <section>
        <div style="margin-bottom: 40px; text-align: center; max-width: 680px; margin-left: auto; margin-right: auto;">
            <div class="subtitle-badge" style="justify-content: center;">CUPPING & FLAVOR NOTES</div>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary-color);">3. Profil & Skor Cupping Produk</h2>
            <p style="color: var(--text-muted); font-size: 0.95rem; margin-top: 8px;">
                Jelajahi detail skor kualitas (cupping score) serta catatan rasa unik dari setiap varian produk kopi pilihan kami.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(310px, 1fr)); gap: 25px;">
            
            <?php if ($profiles && $profiles->num_rows > 0) : ?>
                <?php while ($row = $profiles->fetch_assoc()) : 
                    // Tentukan apakah highlight card (Specialty Wine atau Premium Reserve)
                    $is_featured = (strpos(strtolower($row['category_badge']), 'wine') !== false || strpos(strtolower($row['category_badge']), 'reserve') !== false);
                ?>
                    <div class="card" style="padding: 25px; display: flex; flex-direction: column; justify-content: space-between; <?= $is_featured ? 'border-color: var(--accent-color);' : ''; ?>">
                        <div>
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                                <span style="<?= $is_featured ? 'background: var(--primary-color); color: #FFF;' : 'background: var(--cream-soft); color: var(--primary-color);'; ?> padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700;">
                                    <?= htmlspecialchars($row['category_badge']); ?>
                                </span>
                                <span style="font-size: 0.9rem; font-weight: 800; color: var(--accent-color);">
                                    <i class="fa-solid <?= (strpos(strtolower($row['cupping_score']), 'scai') !== false) ? 'fa-trophy' : ((strpos(strtolower($row['category_badge']), 'reserve') !== false) ? 'fa-crown' : 'fa-star'); ?>"></i> 
                                    <?= htmlspecialchars($row['cupping_score']); ?>
                                </span>
                            </div>
                            
                            <h3 style="font-size: 1.25rem; font-weight: 700; color: var(--primary-color); margin-bottom: 8px;">
                                <?= htmlspecialchars($row['title']); ?>
                            </h3>
                            
                            <p style="font-size: 0.88rem; color: var(--text-muted); margin-bottom: 15px; line-height: 1.6;">
                                <strong>Proses:</strong> <?= htmlspecialchars($row['process']); ?><br>
                                <strong>Roast Level:</strong> <?= htmlspecialchars($row['roast_level']); ?>
                            </p>
                            
                            <div style="margin-bottom: 20px;">
                                <span style="font-size: 0.8rem; font-weight: 700; color: var(--primary-color); display: block; margin-bottom: 6px;">FLAVOR NOTES:</span>
                                <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                                    <?php 
                                    $notes = explode(',', $row['flavor_notes']);
                                    foreach ($notes as $note) :
                                    ?>
                                        <span style="background: #F4F1EA; color: #4A3525; padding: 3px 10px; border-radius: 6px; font-size: 0.78rem; font-weight: 600;">
                                            <?= htmlspecialchars(trim($note)); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid var(--border-light); padding-top: 12px;">
                            <span style="font-weight: 800; color: var(--primary-color);">
                                Rp <?= number_format($row['price'], 0, ',', '.'); ?>
                            </span>
                            <a href="katalog.php" class="btn-pill <?= $is_featured ? 'btn-pill-filled' : ''; ?>" style="padding: 6px 14px; font-size: 0.8rem;">
                                Detail Menu
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p style="color: var(--text-muted); text-align: center; grid-column: 1 / -1;">Belum ada data profil kopi.</p>
            <?php endif; ?>

        </div>

        <!-- CTA Ke Katalog -->
        <div style="text-align: center; margin-top: 45px;">
            <a href="katalog.php" class="btn-pill btn-pill-filled" style="padding: 12px 32px;">
                Pesan Biji Kopi di Katalog <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
            </a>
        </div>
    </section>

</main>

<?php include 'includes/footer.php'; ?>