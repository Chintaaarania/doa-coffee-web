<?php
// Start session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proses ganti bahasa jika tombol diklik
if (isset($_GET['lang'])) {
    $allowed_langs = ['id', 'en', 'zh'];
    if (in_array($_GET['lang'], $allowed_langs)) {
        $_SESSION['lang'] = $_GET['lang'];
    }
}

// Bahasa default adalah Indonesia (ID)
$current_lang = $_SESSION['lang'] ?? 'id';
$current_page = basename($_SERVER['PHP_SELF']);

// Helper function untuk menjaga query string saat ganti bahasa
function getLangUrl($lang) {
    $params = $_GET;
    $params['lang'] = $lang;
    return '?' . http_build_query($params);
}
?>
<!DOCTYPE html>
<html lang="<?= $current_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doa Coffee - Warm & Clean Coffee Experience</title>
    
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- File CSS Utama -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?= time(); ?>">
</head>
<body>

<header>
    <div class="container navbar">
        <!-- Logo Doa Coffee -->
        <a href="index.php" class="logo">
            <i class="fa-solid fa-mug-hot"></i> Doa Coffee
        </a>

        <!-- Navigasi Menu -->
        <ul class="nav-menu">
            <li>
                <a href="index.php" class="nav-link <?= ($current_page == 'index.php') ? 'active' : ''; ?>">
                    Beranda
                </a>
            </li>
            <li>
                <a href="tentang.php" class="nav-link <?= ($current_page == 'tentang.php') ? 'active' : ''; ?>">
                    Tentang
                </a>
            </li>
            <li>
                <a href="katalog.php" class="nav-link <?= ($current_page == 'katalog.php') ? 'active' : ''; ?>">
                    Katalog
                </a>
            </li>
            <li>
                <a href="kenali-kopi.php" class="nav-link <?= ($current_page == 'kenali-kopi.php') ? 'active' : ''; ?>">
                    Kenali Kopi
                </a>
            </li>
            <li>
                <a href="kontak.php" class="nav-link <?= ($current_page == 'kontak.php') ? 'active' : ''; ?>">
                    Kontak
                </a>
            </li>
        </ul>

        <!-- Bagian Kanan: Language Switcher & Tombol Dashboard -->
        <div style="display: flex; align-items: center; gap: 20px;">
            <!-- Ubah Bahasa (ID | EN | ZH) -->
            <div class="lang-switcher">
                <a href="<?= getLangUrl('id'); ?>" class="<?= ($current_lang == 'id') ? 'active' : ''; ?>" title="Bahasa Indonesia">ID</a>
                <span class="divider">|</span>
                <a href="<?= getLangUrl('en'); ?>" class="<?= ($current_lang == 'en') ? 'active' : ''; ?>" title="English">EN</a>
                <span class="divider">|</span>
                <a href="<?= getLangUrl('zh'); ?>" class="<?= ($current_lang == 'zh') ? 'active' : ''; ?>" title="Chinese (中文)">ZH</a>
            </div>

            <!-- Tombol Dashboard (Pengganti Pesan Sekarang) -->
            <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) : ?>
                <a href="dashboard.php" class="btn-pill btn-pill-filled">
                    <i class="fa-solid fa-user-shield" style="margin-right: 6px;"></i> Dashboard
                </a>
            <?php else : ?>
                <a href="login.php" class="btn-pill btn-pill-filled">
                    Dashboard
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>