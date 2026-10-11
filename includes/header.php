<?php
// Start session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Proses ganti bahasa jika tombol diklik
if (isset($_GET['lang'])) {
    $allowed_langs = ['id', 'en', 'zh'];
    if (in_array($_GET['lang'], $allowed_langs, true)) {
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

    <!-- Efek Header Saat Scroll -->
    <style>
        header.site-header {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #fff;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        header.site-header.is-scrolled {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body>

<header class="site-header" id="site-header">
    <div class="container navbar">
        <!-- Logo Doa Coffee -->
        <a href="index.php" class="logo">
            <img
                src="assets/images/uploads/logo-doa-coffee.png"
                alt="DOA COFFEE"
                class="header-logo"
            >
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

        <!-- Language Switcher & Tombol Dashboard -->
        <div style="display: flex; align-items: center; gap: 20px;">
            <div class="lang-switcher">
                <a href="<?= htmlspecialchars(getLangUrl('id'), ENT_QUOTES, 'UTF-8'); ?>" class="<?= ($current_lang == 'id') ? 'active' : ''; ?>" title="Bahasa Indonesia">ID</a>
                <span class="divider">|</span>
                <a href="<?= htmlspecialchars(getLangUrl('en'), ENT_QUOTES, 'UTF-8'); ?>" class="<?= ($current_lang == 'en') ? 'active' : ''; ?>" title="English">EN</a>
                <span class="divider">|</span>
                <a href="<?= htmlspecialchars(getLangUrl('zh'), ENT_QUOTES, 'UTF-8'); ?>" class="<?= ($current_lang == 'zh') ? 'active' : ''; ?>" title="Chinese (中文)">ZH</a>
            </div>

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

<script>
    (() => {
        const siteHeader = document.getElementById('site-header');

        function updateHeaderBackground() {
            siteHeader.classList.toggle('is-scrolled', window.scrollY > 20);
        }

        window.addEventListener('scroll', updateHeaderBackground, {
            passive: true
        });

        updateHeaderBackground();
    })();
</script>