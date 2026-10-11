<?php
require_once 'config/db.php';

// Proteksi halaman dashboard (wajib login)
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$tab = $_GET['tab'] ?? 'products';
$message = '';
$message_type = '';

// Buat folder penyimpanan gambar jika belum ada
$upload_dir = 'assets/images/uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// --- 1. PROSES CRUD: KATALOG UTAMA (products) ---
if ($tab === 'products') {
    
    // TAMBAH PRODUK
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_product') {
        $name        = trim($_POST['name']);
        $description = trim($_POST['description']);
        $price       = floatval($_POST['price']);
        $image_path  = '';

        // Proses Upload File Gambar
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $file_tmp  = $_FILES['image_file']['tmp_name'];
            $file_name = $_FILES['image_file']['name'];
            $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed   = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($file_ext, $allowed)) {
                $new_filename = uniqid('prod_', true) . '.' . $file_ext;
                $target_file  = $upload_dir . $new_filename;

                if (move_uploaded_file($file_tmp, $target_file)) {
                    $image_path = $target_file;
                } else {
                    $message = "Gagal mengunggah file gambar ke server!";
                    $message_type = "danger";
                }
            } else {
                $message = "Format file tidak didukung! Gunakan JPG, JPEG, PNG, atau WEBP.";
                $message_type = "danger";
            }
        } else {
            $message = "Harap pilih file gambar untuk diunggah!";
            $message_type = "danger";
        }

        if (!empty($name) && !empty($description) && $price > 0 && !empty($image_path)) {
            $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssds", $name, $description, $price, $image_path);
            if ($stmt->execute()) {
                $message = "Produk katalog berhasil ditambahkan!";
                $message_type = "success";
            } else {
                $message = "Gagal menambahkan produk: " . $conn->error;
                $message_type = "danger";
            }
        }
    }

    // EDIT PRODUK
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit_product') {
        $id          = intval($_POST['id']);
        $name        = trim($_POST['name']);
        $description = trim($_POST['description']);
        $price       = floatval($_POST['price']);
        $image_path  = trim($_POST['old_image']); // Default gunakan gambar lama

        // Cek jika user mengunggah file gambar baru
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            $file_tmp  = $_FILES['image_file']['tmp_name'];
            $file_name = $_FILES['image_file']['name'];
            $file_ext  = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $allowed   = ['jpg', 'jpeg', 'png', 'webp'];

            if (in_array($file_ext, $allowed)) {
                $new_filename = uniqid('prod_', true) . '.' . $file_ext;
                $target_file  = $upload_dir . $new_filename;

                if (move_uploaded_file($file_tmp, $target_file)) {
                    $image_path = $target_file;
                }
            }
        }

        if ($id > 0 && !empty($name) && !empty($description) && $price > 0 && !empty($image_path)) {
            $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
            $stmt->bind_param("ssdsi", $name, $description, $price, $image_path, $id);
            if ($stmt->execute()) {
                $message = "Produk katalog berhasil diperbarui!";
                $message_type = "success";
            } else {
                $message = "Gagal memperbarui produk: " . $conn->error;
                $message_type = "danger";
            }
        }
    }

    // HAPUS PRODUK
    if (isset($_GET['delete_product'])) {
        $id = intval($_GET['delete_product']);
        if ($id > 0) {
            $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                header("Location: dashboard.php?tab=products&msg=deleted");
                exit();
            }
        }
    }
}

// --- 2. PROSES CRUD: PROFIL CUPPING (coffee_profiles) ---
if ($tab === 'cupping') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_cupping') {
        $badge  = trim($_POST['category_badge']);
        $score  = trim($_POST['cupping_score']);
        $title  = trim($_POST['title']);
        $process= trim($_POST['process']);
        $roast  = trim($_POST['roast_level']);
        $notes  = trim($_POST['flavor_notes']);
        $price  = floatval($_POST['price']);

        if (!empty($title) && !empty($score)) {
            $stmt = $conn->prepare("INSERT INTO coffee_profiles (category_badge, cupping_score, title, process, roast_level, flavor_notes, price) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssd", $badge, $score, $title, $process, $roast, $notes, $price);
            if ($stmt->execute()) {
                $message = "Profil cupping kopi berhasil ditambahkan!";
                $message_type = "success";
            } else {
                $message = "Gagal menambahkan profil: " . $conn->error;
                $message_type = "danger";
            }
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit_cupping') {
        $id     = intval($_POST['id']);
        $badge  = trim($_POST['category_badge']);
        $score  = trim($_POST['cupping_score']);
        $title  = trim($_POST['title']);
        $process= trim($_POST['process']);
        $roast  = trim($_POST['roast_level']);
        $notes  = trim($_POST['flavor_notes']);
        $price  = floatval($_POST['price']);

        if ($id > 0 && !empty($title) && !empty($score)) {
            $stmt = $conn->prepare("UPDATE coffee_profiles SET category_badge = ?, cupping_score = ?, title = ?, process = ?, roast_level = ?, flavor_notes = ?, price = ? WHERE id = ?");
            $stmt->bind_param("ssssssdi", $badge, $score, $title, $process, $roast, $notes, $price, $id);
            if ($stmt->execute()) {
                $message = "Profil cupping kopi berhasil diperbarui!";
                $message_type = "success";
            } else {
                $message = "Gagal memperbarui profil: " . $conn->error;
                $message_type = "danger";
            }
        }
    }

    if (isset($_GET['delete_cupping'])) {
        $id = intval($_GET['delete_cupping']);
        if ($id > 0) {
            $stmt = $conn->prepare("DELETE FROM coffee_profiles WHERE id = ?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                header("Location: dashboard.php?tab=cupping&msg=deleted");
                exit();
            }
        }
    }
}

if (isset($_GET['msg']) && $_GET['msg'] === 'deleted') {
    $message = "Data berhasil dihapus dari database!";
    $message_type = "success";
}

// QUERY DATA DATABASE
$res_products = $conn->query("SELECT * FROM products ORDER BY id DESC");
$total_products = $res_products ? $res_products->num_rows : 0;

$res_cupping = $conn->query("SELECT * FROM coffee_profiles ORDER BY id DESC");
$total_cupping = $res_cupping ? $res_cupping->num_rows : 0;

// EDIT DATA FETCH
$edit_product = null;
if ($tab === 'products' && isset($_GET['edit_product'])) {
    $eid = intval($_GET['edit_product']);
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $edit_product = $stmt->get_result()->fetch_assoc();
}

$edit_cupping = null;
if ($tab === 'cupping' && isset($_GET['edit_cupping'])) {
    $eid = intval($_GET['edit_cupping']);
    $stmt = $conn->prepare("SELECT * FROM coffee_profiles WHERE id = ?");
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $edit_cupping = $stmt->get_result()->fetch_assoc();
}
?>
<?php include 'includes/header.php'; ?>

<main class="container" style="padding: 40px 0 70px; min-height: 80vh;">
    
    <!-- HEADER DASHBOARD BANNER -->
    <div style="background: var(--bg-secondary); border-radius: 24px; padding: 40px 45px; margin-bottom: 30px; border: 1px solid var(--border-light); display: flex; justify-content: space-between; align-items: center; gap: 20px; flex-wrap: wrap;">
        <div>
            <div class="subtitle-badge">PANEL KONTROL ADMIN</div>
            <h1 style="font-size: 2.3rem; font-weight: 800; color: var(--primary-color); margin: 10px 0 6px; letter-spacing: -0.5px;">
                Selamat Datang, <?= htmlspecialchars($_SESSION['admin_name'] ?? 'Admin Doa Coffee'); ?>!
            </h1>
            <p style="color: var(--text-muted); margin: 0; font-size: 0.95rem;">
                Sistem Manajemen Database Doa Coffee
            </p>
        </div>
        
        <a href="logout.php" class="btn-pill" style="padding: 10px 24px; border-color: #DC2626; color: #DC2626; text-decoration: none;">
            Logout <i class="fa-solid fa-arrow-right-from-bracket" style="margin-left: 6px;"></i>
        </a>
    </div>

    <!-- RINGKASAN STATISTIK -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 35px;">
        <div style="background: #FFF; border: 1px solid var(--border-light); border-radius: 20px; padding: 22px 28px; box-shadow: var(--shadow-soft); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <span style="color: var(--text-muted); font-weight: 700; font-size: 0.78rem; letter-spacing: 0.5px; text-transform: uppercase;">TOTAL PRODUK KATALOG</span>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color); margin-top: 4px; line-height: 1;"><?= $total_products; ?></h2>
            </div>
            <div style="width: 48px; height: 48px; background: var(--cream-soft); border-radius: 50%; display: flex; justify-content: center; align-items: center; color: var(--primary-color); font-size: 1.2rem;">
                <i class="fa-solid fa-mug-hot"></i>
            </div>
        </div>

        <div style="background: #FFF; border: 1px solid var(--border-light); border-radius: 20px; padding: 22px 28px; box-shadow: var(--shadow-soft); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <span style="color: var(--text-muted); font-weight: 700; font-size: 0.78rem; letter-spacing: 0.5px; text-transform: uppercase;">PROFIL CUPPING KOPI</span>
                <h2 style="font-size: 2.5rem; font-weight: 800; color: var(--primary-color); margin-top: 4px; line-height: 1;"><?= $total_cupping; ?></h2>
            </div>
            <div style="width: 48px; height: 48px; background: var(--cream-soft); border-radius: 50%; display: flex; justify-content: center; align-items: center; color: var(--primary-color); font-size: 1.2rem;">
                <i class="fa-solid fa-award"></i>
            </div>
        </div>

        <div style="background: #FFF; border: 1px solid var(--border-light); border-radius: 20px; padding: 22px 28px; box-shadow: var(--shadow-soft); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <span style="color: var(--text-muted); font-weight: 700; font-size: 0.78rem; letter-spacing: 0.5px; text-transform: uppercase;">STATUS DATABASE</span>
                <h2 style="font-size: 1.5rem; font-weight: 800; color: #16A34A; margin-top: 8px; display: flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-circle-check"></i> Terhubung
                </h2>
            </div>
            <div style="width: 48px; height: 48px; background: #DCFCE7; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: #16A34A; font-size: 1.2rem;">
                <i class="fa-solid fa-database"></i>
            </div>
        </div>
    </div>

    <!-- TAB NAVIGASI -->
    <div style="display: flex; gap: 12px; margin-bottom: 30px; flex-wrap: wrap;">
        <a href="dashboard.php?tab=products" class="btn-pill <?= ($tab === 'products') ? 'btn-pill-filled' : ''; ?>" style="padding: 10px 22px; font-size: 0.9rem; text-decoration: none;">
            <i class="fa-solid fa-list-check" style="margin-right: 6px;"></i> Kelola Katalog Utama
        </a>
        <a href="dashboard.php?tab=cupping" class="btn-pill <?= ($tab === 'cupping') ? 'btn-pill-filled' : ''; ?>" style="padding: 10px 22px; font-size: 0.9rem; text-decoration: none;">
            <i class="fa-solid fa-award" style="margin-right: 6px;"></i> Kelola Cupping & Kenali Kopi
        </a>
    </div>

    <!-- NOTIFIKASI PESAN -->
    <?php if (!empty($message)) : ?>
        <div style="background-color: <?= ($message_type === 'success') ? '#DCFCE7' : '#FEE2E2'; ?>; color: <?= ($message_type === 'success') ? '#166534' : '#991B1B'; ?>; padding: 14px 20px; border-radius: 14px; font-size: 0.95rem; margin-bottom: 30px; border: 1px solid <?= ($message_type === 'success') ? '#86EFAC' : '#FCA5A5'; ?>; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid <?= ($message_type === 'success') ? 'fa-circle-check' : 'fa-circle-exclamation'; ?>"></i>
            <?= htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>


    <!-- ==========================================
         TAB 1: KELOLA KATALOG UTAMA (FILE UPLOAD)
    ========================================== -->
    <?php if ($tab === 'products') : ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; align-items: start;">
            
            <!-- FORM PRODUK KATALOG (DENGAN ENCTYPE MULTIPART) -->
            <div style="background: #FFF; border-radius: 20px; padding: 30px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft);">
                <h2 style="font-size: 1.3rem; font-weight: 800; color: var(--primary-color); margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid <?= $edit_product ? 'fa-pen-to-square' : 'fa-circle-plus'; ?>"></i>
                    <?= $edit_product ? 'Edit Produk Katalog' : 'Tambah Produk Katalog'; ?>
                </h2>

                <form action="dashboard.php?tab=products" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?= $edit_product ? 'edit_product' : 'add_product'; ?>">
                    <?php if ($edit_product) : ?>
                        <input type="hidden" name="id" value="<?= $edit_product['id']; ?>">
                        <input type="hidden" name="old_image" value="<?= htmlspecialchars($edit_product['image']); ?>">
                    <?php endif; ?>

                    <div style="margin-bottom: 16px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Nama Produk</label>
                        <input type="text" name="name" required placeholder="Contoh: Arabica Wine Bondowoso" value="<?= htmlspecialchars($edit_product['name'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="margin-bottom: 16px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Harga (Rp)</label>
                        <input type="number" name="price" required placeholder="28000" value="<?= htmlspecialchars($edit_product['price'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <!-- INPUT FILE UPLOAD GAMBAR -->
                    <div style="margin-bottom: 16px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Pilih File Gambar Produk</label>
                        <input type="file" name="image_file" <?= $edit_product ? '' : 'required'; ?> accept="image/*" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none; background: #FFF;">
                        <?php if ($edit_product && !empty($edit_product['image'])) : ?>
                            <small style="color: var(--text-muted); display: block; margin-top: 5px;">
                                Gambar saat ini: <a href="<?= htmlspecialchars($edit_product['image']); ?>" target="_blank" style="color: var(--primary-color); font-weight: 700;">Lihat File</a> (Biarkan kosong jika tidak ingin mengubah gambar)
                            </small>
                        <?php endif; ?>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Deskripsi Singkat</label>
                        <textarea name="description" rows="3" required placeholder="Catatan rasa / deskripsi menu..." style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none; font-family: inherit; resize: vertical;"><?= htmlspecialchars($edit_product['description'] ?? ''); ?></textarea>
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn-pill btn-pill-filled" style="flex: 1; padding: 10px; font-size: 0.9rem; cursor: pointer; text-align: center;">
                            <i class="fa-solid fa-floppy-disk" style="margin-right: 6px;"></i> Simpan Data
                        </button>
                        <?php if ($edit_product) : ?>
                            <a href="dashboard.php?tab=products" class="btn-pill" style="padding: 10px 16px; font-size: 0.9rem; text-decoration: none;">Batal</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <!-- TABEL DAFTAR KATALOG -->
            <div style="background: #FFF; border-radius: 20px; padding: 30px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft); overflow-x: auto;">
                <h2 style="font-size: 1.3rem; font-weight: 800; color: var(--primary-color); margin-bottom: 20px;">
                    Daftar Katalog Utama (<?= $total_products; ?>)
                </h2>

                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.9rem;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--border-light); color: var(--primary-color);">
                            <th style="padding: 10px;">Gambar</th>
                            <th style="padding: 10px;">Nama & Deskripsi</th>
                            <th style="padding: 10px;">Harga</th>
                            <th style="padding: 10px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($res_products && $res_products->num_rows > 0) : ?>
                            <?php while ($row = $res_products->fetch_assoc()) : ?>
                                <tr style="border-bottom: 1px solid var(--border-light);">
                                    <td style="padding: 12px 10px;">
                                        <img src="<?= htmlspecialchars($row['image']); ?>" alt="<?= htmlspecialchars($row['name']); ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 10px;">
                                    </td>
                                    <td style="padding: 12px 10px;">
                                        <strong style="color: var(--primary-color); display: block; font-size: 0.95rem;"><?= htmlspecialchars($row['name']); ?></strong>
                                        <span style="color: var(--text-muted); font-size: 0.8rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= htmlspecialchars($row['description']); ?></span>
                                    </td>
                                    <td style="padding: 12px 10px; font-weight: 700; color: var(--primary-color); white-space: nowrap;">
                                        Rp <?= number_format($row['price'], 0, ',', '.'); ?>
                                    </td>
                                    <td style="padding: 12px 10px; text-align: center; white-space: nowrap;">
                                        <a href="dashboard.php?tab=products&edit_product=<?= $row['id']; ?>" style="color: var(--primary-color); padding: 6px 10px; background: var(--cream-soft); border-radius: 8px; font-size: 0.85rem; text-decoration: none; margin-right: 4px; display: inline-block;">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        <a href="dashboard.php?tab=products&delete_product=<?= $row['id']; ?>" onclick="return confirm('Hapus produk katalog ini?');" style="color: #DC2626; padding: 6px 10px; background: #FEE2E2; border-radius: 8px; font-size: 0.85rem; text-decoration: none; display: inline-block;">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" style="padding: 30px; text-align: center; color: var(--text-muted);">Belum ada produk katalog di database.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>


    <!-- ==========================================
         TAB 2: KELOLA PROFIL CUPPING & KENALI KOPI
    ========================================== -->
    <?php else : ?>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; align-items: start;">
            
            <div style="background: #FFF; border-radius: 20px; padding: 30px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft);">
                <h2 style="font-size: 1.3rem; font-weight: 800; color: var(--primary-color); margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                    <i class="fa-solid <?= $edit_cupping ? 'fa-pen-to-square' : 'fa-circle-plus'; ?>"></i>
                    <?= $edit_cupping ? 'Edit Profil Cupping' : 'Tambah Profil Cupping'; ?>
                </h2>

                <form action="dashboard.php?tab=cupping" method="POST">
                    <input type="hidden" name="action" value="<?= $edit_cupping ? 'edit_cupping' : 'add_cupping'; ?>">
                    <?php if ($edit_cupping) : ?>
                        <input type="hidden" name="id" value="<?= $edit_cupping['id']; ?>">
                    <?php endif; ?>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Badge Kategori</label>
                        <input type="text" name="category_badge" required placeholder="Contoh: Specialty Wine" value="<?= htmlspecialchars($edit_cupping['category_badge'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Cupping Score Text</label>
                        <input type="text" name="cupping_score" required placeholder="Contoh: Score: 85.0 (SCAI)" value="<?= htmlspecialchars($edit_cupping['cupping_score'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Nama Kopi / Judul</label>
                        <input type="text" name="title" required placeholder="Contoh: Arabica Wine Coffee" value="<?= htmlspecialchars($edit_cupping['title'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Metode Proses</label>
                        <input type="text" name="process" required placeholder="Contoh: Fermented Wine / Dry" value="<?= htmlspecialchars($edit_cupping['process'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Roast Level</label>
                        <input type="text" name="roast_level" required placeholder="Contoh: Medium-Dark" value="<?= htmlspecialchars($edit_cupping['roast_level'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="margin-bottom: 14px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Flavor Notes (Pisahkan dengan Koma)</label>
                        <input type="text" name="flavor_notes" required placeholder="Winey Aroma, Fermented Berry, Sweet Plum" value="<?= htmlspecialchars($edit_cupping['flavor_notes'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 6px; font-size: 0.85rem;">Harga (Rp)</label>
                        <input type="number" name="price" required placeholder="150000" value="<?= htmlspecialchars($edit_cupping['price'] ?? ''); ?>" style="width: 100%; padding: 10px 14px; border-radius: 10px; border: 1px solid var(--border-light); font-size: 0.9rem; outline: none;">
                    </div>

                    <div style="display: flex; gap: 10px;">
                        <button type="submit" class="btn-pill btn-pill-filled" style="flex: 1; padding: 10px; font-size: 0.9rem; cursor: pointer; text-align: center;">
                            <i class="fa-solid fa-floppy-disk" style="margin-right: 6px;"></i> Simpan Profil
                        </button>
                        <?php if ($edit_cupping) : ?>
                            <a href="dashboard.php?tab=cupping" class="btn-pill" style="padding: 10px 16px; font-size: 0.9rem; text-decoration: none;">Batal</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>

            <div style="background: #FFF; border-radius: 20px; padding: 30px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft); overflow-x: auto;">
                <h2 style="font-size: 1.3rem; font-weight: 800; color: var(--primary-color); margin-bottom: 20px;">
                    Daftar Profil Cupping Kopi (<?= $total_cupping; ?>)
                </h2>

                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.88rem;">
                    <thead>
                        <tr style="border-bottom: 2px solid var(--border-light); color: var(--primary-color);">
                            <th style="padding: 10px;">Kopi & Badge</th>
                            <th style="padding: 10px;">Score</th>
                            <th style="padding: 10px;">Harga</th>
                            <th style="padding: 10px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($res_cupping && $res_cupping->num_rows > 0) : ?>
                            <?php while ($row = $res_cupping->fetch_assoc()) : ?>
                                <tr style="border-bottom: 1px solid var(--border-light);">
                                    <td style="padding: 12px 10px;">
                                        <strong style="color: var(--primary-color); display: block; font-size: 0.92rem;"><?= htmlspecialchars($row['title']); ?></strong>
                                        <span style="color: var(--text-muted); font-size: 0.78rem; display: block; margin-top: 2px;"><?= htmlspecialchars($row['category_badge']); ?> • <?= htmlspecialchars($row['process']); ?></span>
                                    </td>
                                    <td style="padding: 12px 10px; font-weight: 700; color: var(--accent-color); white-space: nowrap;">
                                        <?= htmlspecialchars($row['cupping_score']); ?>
                                    </td>
                                    <td style="padding: 12px 10px; font-weight: 700; color: var(--primary-color); white-space: nowrap;">
                                        Rp <?= number_format($row['price'], 0, ',', '.'); ?>
                                    </td>
                                    <td style="padding: 12px 10px; text-align: center; white-space: nowrap;">
                                        <a href="dashboard.php?tab=cupping&edit_cupping=<?= $row['id']; ?>" style="color: var(--primary-color); padding: 6px 10px; background: var(--cream-soft); border-radius: 8px; font-size: 0.85rem; text-decoration: none; margin-right: 4px; display: inline-block;">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        <a href="dashboard.php?tab=cupping&delete_cupping=<?= $row['id']; ?>" onclick="return confirm('Hapus profil cupping ini?');" style="color: #DC2626; padding: 6px 10px; background: #FEE2E2; border-radius: 8px; font-size: 0.85rem; text-decoration: none; display: inline-block;">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="4" style="padding: 30px; text-align: center; color: var(--text-muted);">Belum ada profil cupping kopi di database.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    <?php endif; ?>

</main>

<?php include 'includes/footer.php'; ?>