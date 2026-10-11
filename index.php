<?php include 'includes/header.php'; ?>

<main class="container">

    <!-- 1. BANNER SLIDER HIGHLIGHT (Style Fore Coffee) -->
    <section class="hero-slider-section">
        <div class="slider-wrapper" id="sliderWrapper">
            
            <!-- Slide 1 -->
            <div class="slide">
                <div>
                    <h1 class="slide-title">Cerita Kopi Pegunungan Argopuro</h1>
                    <p class="slide-desc">Mengangkat asal-usul DOA COFFEE dan potensi kopi lokal Bondowoso.</p>
                </div>
                <div class="slide-img-box">
                    <img src="assets\images\uploads\kebun.jpeg" alt="Grind The Essentials">
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide">
                <div>
                    <h1 class="slide-title">Kualitas dari Kebun hingga Cangkir</h1>
                    <p class="slide-desc">Menampilkan proses produksi, pemilihan biji kopi, dan kualitas produk DOA COFFEE.</p>
                </div>
                <div class="slide-img-box">
                    <img src="assets\images\uploads\proses.jpeg" alt="Cupping Score 85">
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide">
                <div>
                    <h1 class="slide-title">Kopi Lokal Menuju Pasar Global</h1>
                    <p class="slide-desc">Menampilkan pencapaian, pameran, kolaborasi, dan perjalanan DOA COFFEE sejak 2014.</p>
                </div>
                <div class="slide-img-box">
                    <img src="assets\images\uploads\ekspor.jpg" alt="Single Origin Bondowoso">
                </div>
            </div>

        </div>

        <!-- Tombol Panah Navigasi Slider -->
        <button class="slider-arrow prev" id="prevBtn"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="slider-arrow next" id="nextBtn"><i class="fa-solid fa-chevron-right"></i></button>

        <!-- Indicator Dots -->
        <div class="slider-dots" id="sliderDots">
            <span class="dot active" onclick="goToSlide(0)"></span>
            <span class="dot" onclick="goToSlide(1)"></span>
            <span class="dot" onclick="goToSlide(2)"></span>
        </div>
    </section>


    <!-- 2. SECTION OUR STORY (DISESUAIKAN DENGAN HALAMAN TENTANG) -->
    <section style="padding: 40px 0 60px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 50px; align-items: center;">
            
            <div style="position: relative; border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-soft);">
                <img src="https://lh3.googleusercontent.com/d/1oOR2-fWj82k0yk3RzygpAdQIiuX-FAed" alt="Suasana Doa Coffee" style="width: 100%; height: 380px; object-fit: cover; display: block;">            </div>

            <div>
                <div class="subtitle-badge">Cerita Kami</div>
                <h2 style="font-size: 2.8rem; font-weight: 800; color: var(--primary-color); line-height: 1.15; margin-bottom: 20px; letter-spacing: -1px;">
                    Our Story
                </h2>
                <p style="color: var(--text-dark); line-height: 1.8; font-size: 1.05rem; margin-bottom: 16px;">
                    Bermula sejak tahun 2014 di lereng Pegunungan Argopuro, Bondowoso, <strong>Doa Coffee</strong> mengawal setiap tahapan dengan cermat—mulai dari seleksi bibit unggul, pemetikan ceri merah pilihan, hingga proses penyangraian berpresisi tinggi.
                </p>
                <p style="color: var(--text-muted); line-height: 1.8; font-size: 0.98rem; margin-bottom: 28px;">
                    Melalui dedikasi para petani lokal Bondowoso dan standar kendali mutu terpadu, kami menghadirkan keaslian cita rasa khas Argopuro serta kehangatan doa di setiap cangkir yang Anda nikmati.
                </p>
                
                <a href="tentang.php" class="btn-pill btn-pill-filled" style="padding: 12px 28px;">
                    Selengkapnya <i class="fa-solid fa-chevron-right" style="margin-left: 8px; font-size: 0.8rem;"></i>
                </a>
            </div>

        </div>
    </section>


    <!-- 3. GALERI & DOKUMENTASI KEGIATAN -->
    <section style="padding: 20px 0 60px;">
        <div style="text-align: center; max-width: 650px; margin: 0 auto 40px;">
            <div class="subtitle-badge" style="justify-content: center;">Jejak Langkah Kami</div>
            <h2 style="font-size: 2.4rem; font-weight: 800; color: var(--primary-color); letter-spacing: -0.5px;">
                Galeri & Kegiatan Doa Coffee
            </h2>
            <p style="color: var(--text-muted); margin-top: 10px;">
                Dokumentasi perjalanan kami dalam mengenalkan cita rasa Kopi Bondowoso melalui pameran, kolaborasi, dan edukasi kopi.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px;">
            <div class="card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?auto=format&fit=crop&w=800&q=80" alt="Pameran Kopi">
                </div>
                <div class="card-body">
                    <span style="display: inline-block; background-color: var(--cream-soft); color: var(--primary-color); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; margin-bottom: 12px; width: fit-content;">Pameran</span>
                    <h3 class="card-title" style="font-size: 1.15rem;">Pameran Kopi Spesialti Nusantara</h3>
                    <p class="card-text">Partisipasi Doa Coffee dalam mengenalkan varian Arabica Wine khas Kebun Kloncing ke penikmat kopi nasional.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=800&q=80" alt="Cupping Session">
                </div>
                <div class="card-body">
                    <span style="display: inline-block; background-color: var(--cream-soft); color: var(--primary-color); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; margin-bottom: 12px; width: fit-content;">Sertifikasi</span>
                    <h3 class="card-title" style="font-size: 1.15rem;">Sesi Cupping Score SCAI</h3>
                    <p class="card-text">Dokumentasi pengujian rasa secara profesional yang berhasil meraih skor resmi 85 untuk Arabica Wine.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=800&q=80" alt="Kebun Kloncing">
                </div>
                <div class="card-body">
                    <span style="display: inline-block; background-color: var(--cream-soft); color: var(--primary-color); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; margin-bottom: 12px; width: fit-content;">Kebun Petani</span>
                    <h3 class="card-title" style="font-size: 1.15rem;">Kolaborasi Bersama Petani Bondowoso</h3>
                    <p class="card-text">Momen pendampingan dan panen bersama para petani lokal Kebun Kloncing guna menjaga mutu biji kopi.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-img-wrapper">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=800&q=80" alt="Workshop Brew">
                </div>
                <div class="card-body">
                    <span style="display: inline-block; background-color: var(--cream-soft); color: var(--primary-color); padding: 4px 12px; border-radius: 50px; font-size: 0.75rem; font-weight: 700; margin-bottom: 12px; width: fit-content;">Workshop</span>
                    <h3 class="card-title" style="font-size: 1.15rem;">Edukasi & Seduh Bersama</h3>
                    <p class="card-text">Kegiatan berbagi ilmu seputar teknik penyeduhan manual brew bersama komunitas pecinta kopi lokal.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- 4. BANNER STANDAR KUALITAS (TANPA BACKGROUND KREM / KOTAK) -->
    <section style="margin: 30px 0 70px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px; align-items: center;">
            <div>
                <div class="subtitle-badge">STANDAR KUALITAS</div>
                <h2 style="font-size: 2.3rem; font-weight: 800; color: var(--primary-color); line-height: 1.2; margin-bottom: 15px; letter-spacing: -0.5px;">
                    Eksplorasi Profil Rasa & Skor Kopi
                </h2>
                <p style="color: var(--text-dark); font-size: 1.05rem; line-height: 1.7; margin-bottom: 25px;">
                    Dipetik langsung dari kawasan Pegunungan Argopuro, Jawa Timur. Pahami varietas biji kopi dan profil karakter rasa untuk menemukan cangkir favorit yang paling sesuai dengan selera Anda.
                </p>
                <a href="kenali-kopi.php" class="btn-pill btn-pill-filled" style="padding: 12px 28px;">
                    Kenali Kopi Selengkapnya <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=700&q=80" alt="Eksplorasi Profil Rasa Doa Coffee" style="width: 100%; height: 280px; object-fit: cover; border-radius: 16px;">
            </div>
        </div>
    </section>


    <!-- 5. HIGHLIGHT STATS BAR -->
    <section style="background-color: var(--bg-secondary); padding: 40px 0; border-radius: var(--radius-card); margin-bottom: 70px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 20px; text-align: center;">
            <div>
                <h3 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color);">85</h3>
                <p style="font-weight: 700; color: var(--accent-color);">Cupping Score SCAI</p>
            </div>
            <div>
                <h3 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color);">100%</h3>
                <p style="font-weight: 700; color: var(--accent-color);">Single Origin Kloncing</p>
            </div>
            <div>
                <h3 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color);"><i class="fa-solid fa-mug-hot"></i></h3>
                <p style="font-weight: 700; color: var(--accent-color);">Fresh Roasted Daily</p>
            </div>
        </div>
    </section>


    <!-- 6. MENU UNGGULAN (DENGAN TOMBOL OUTLINE LIHAT SELENGKAPNYA) -->
    <section style="padding-bottom: 70px;">
        <div style="text-align: center; max-width: 600px; margin: 0 auto 40px;">
            <div class="subtitle-badge" style="justify-content: center;">Produk Signature</div>
            <h2 style="font-size: 2.2rem; font-weight: 800; color: var(--primary-color);">Menu Unggulan Doa Coffee</h2>
        </div>

        <div style="background-color: var(--bg-secondary); border-radius: 24px; padding: 50px 45px; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; align-items: center; border: 1px solid var(--border-light);">
            <div>
                <h3 style="font-size: 2.8rem; font-weight: 800; color: var(--primary-color); line-height: 1.15; margin-bottom: 18px; letter-spacing: -1px;">
                    Arabica Wine Bondowoso
                </h3>
                <p style="color: var(--text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 25px; max-width: 500px;">
                    Dibuat dari biji kopi Indonesia pilihan khas Kebun Kloncing untuk pengalaman minum kopi terbaik setiap hari. Diproses secara fermentasi alami dengan aroma manis khas <em>winey</em> dan <em>aftertaste</em> yang halus.
                </p>
                <a href="kenali-kopi.php" class="btn-pill" style="padding: 10px 24px; font-size: 0.95rem;">
                    Lihat Selengkapnya <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
            <div style="text-align: center;">
                <img src="assets\images\uploads\prod_6ac8a2e3452083.81343766.jpeg" alt="Arabica Wine Bondowoso" style="width: 100%; max-width: 440px; height: 320px; object-fit: cover; border-radius: 20px; box-shadow: var(--shadow-soft);">
            </div>
        </div>
    </section>


    <!-- 7. SECTION TESTIMONI -->
    <section class="testimonial-section">
        <div style="text-align: center; max-width: 600px; margin: 0 auto;">
            <div class="subtitle-badge" style="justify-content: center;">Kata Mereka</div>
            <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color);">Testimoni Pelanggan</h2>
        </div>

        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="testimonial-quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <p class="testimonial-text">
                    "Arabica Wine-nya beneran khas banget! Rasa fruity-nya segar dan aftertaste-nya lembut di tenggorokan. Pantas dapet Cupping Score 85."
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=150&q=80" alt="Pelanggan" class="testimonial-author-img">
                    <div>
                        <div class="testimonial-author-name">Anisa Rahma</div>
                        <div class="testimonial-author-role">Penikmat Manual Brew</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <p class="testimonial-text">
                    "Es Kopi Doa Utama jadi minuman favorit saya tiap sore. Manis gula arennya pas dan rasa espsresso-nya tetep kerasa strong."
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=150&q=80" alt="Pelanggan" class="testimonial-author-img">
                    <div>
                        <div class="testimonial-author-name">Budi Santoso</div>
                        <div class="testimonial-author-role">Penikmat Kopi Harian</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="testimonial-quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                <p class="testimonial-text">
                    "Sangat mengapresiasi Doa Coffee yang langsung ambil biji kopi dari petani Kebun Kloncing. Rasanya jujur dan kualitasnya terjaga!"
                </p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=150&q=80" alt="Pelanggan" class="testimonial-author-img">
                    <div>
                        <div class="testimonial-author-name">Citra Dewi</div>
                        <div class="testimonial-author-role">Komunitas Kopi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- 8. SECTION FOLLOW INSTAGRAM & TIKTOK -->
    <section class="instagram-section" style="border-radius: var(--radius-card); margin-bottom: 50px;">
        
        <!-- BLOCK INSTAGRAM -->
        <div style="margin-bottom: 60px;">
            <div class="subtitle-badge" style="justify-content: center;">Follow Kami!</div>
            <div class="instagram-handle">@doacoffee_official</div>
            
            <a href="https://instagram.com/doacoffee_official" target="_blank" class="btn-pill btn-pill-filled" style="padding: 10px 26px; margin-bottom: 30px;">
                <i class="fa-brands fa-instagram" style="margin-right: 8px;"></i> Follow Instagram
            </a>

            <div class="instagram-grid">
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1517701550927-30cf4ba1dba5?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee Feed">
                    <div class="instagram-overlay"><i class="fa-brands fa-instagram"></i></div>
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee Feed">
                    <div class="instagram-overlay"><i class="fa-brands fa-instagram"></i></div>
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee Feed">
                    <div class="instagram-overlay"><i class="fa-brands fa-instagram"></i></div>
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1534778101976-62847782c213?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee Feed">
                    <div class="instagram-overlay"><i class="fa-brands fa-instagram"></i></div>
                </div>
            </div>
        </div>

        <!-- GARIS PEMISAH HALUS -->
        <hr style="border: none; border-top: 1px solid var(--border-light); margin: 50px 0;">

        <!-- BLOCK TIKTOK -->
        <div>
            <div class="subtitle-badge" style="justify-content: center;">Tonton Konten Seru Kami!</div>
            <div class="instagram-handle">@doacoffee.id</div>
            
            <a href="https://tiktok.com/@doacoffee.id" target="_blank" class="btn-pill btn-pill-filled" style="padding: 10px 26px; margin-bottom: 30px;">
                <i class="fa-brands fa-tiktok" style="margin-right: 8px;"></i> Follow TikTok
            </a>

            <div class="instagram-grid">
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee TikTok">
                    <div class="instagram-overlay"><i class="fa-brands fa-tiktok"></i></div>
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee TikTok">
                    <div class="instagram-overlay"><i class="fa-brands fa-tiktok"></i></div>
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee TikTok">
                    <div class="instagram-overlay"><i class="fa-brands fa-tiktok"></i></div>
                </div>
                <div class="instagram-item">
                    <img src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?auto=format&fit=crop&w=500&q=80" alt="Doa Coffee TikTok">
                    <div class="instagram-overlay"><i class="fa-brands fa-tiktok"></i></div>
                </div>
            </div>
        </div>

    </section>

</main>

<!-- SCRIPT SLIDER INTERAKTIF -->
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const wrapper = document.getElementById('sliderWrapper');
    const dots = document.querySelectorAll('.dot');
    const totalSlides = slides.length;

    function updateSlider() {
        wrapper.style.transform = `translateX(-${currentSlide * 100}%)`;
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    function goToSlide(index) {
        currentSlide = index;
        updateSlider();
    }

    document.getElementById('nextBtn').addEventListener('click', () => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    });

    setInterval(() => {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }, 5000);
</script>

<?php include 'includes/footer.php'; ?>