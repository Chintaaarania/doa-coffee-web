<?php
require_once 'config/db.php';

// Jika sudah login, langsung alihkan ke dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, username, password, name FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id']        = $user['id'];
                $_SESSION['admin_name']      = $user['name'];
                
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Username tidak ditemukan!";
        }
    } else {
        $error = "Mohon isi username dan password!";
    }
}
?>
<?php include 'includes/header.php'; ?>

<main class="container" style="padding: 80px 0; min-height: 70vh; display: flex; justify-content: center; align-items: center;">
    <div style="background: var(--bg-secondary); border-radius: 24px; padding: 40px; width: 100%; max-width: 420px; border: 1px solid var(--border-light); box-shadow: var(--shadow-soft);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <i class="fa-solid fa-mug-hot" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 10px;"></i>
            <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--primary-color);">Admin Login</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 5px;">Masuk untuk mengelola sistem Doa Coffee</p>
        </div>

        <?php if (!empty($error)) : ?>
            <div style="background-color: #FEE2E2; color: #991B1B; padding: 12px 16px; border-radius: 12px; font-size: 0.9rem; margin-bottom: 20px; border: 1px solid #FCA5A5; text-align: center;">
                <i class="fa-solid fa-circle-exclamation" style="margin-right: 6px;"></i> <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 8px; font-size: 0.9rem;">Username</label>
                <input type="text" name="username" required placeholder="Masukkan username" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--border-light); font-size: 0.95rem; outline: none; background: #FFF;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; font-weight: 700; color: var(--primary-color); margin-bottom: 8px; font-size: 0.9rem;">Password</label>
                <input type="password" name="password" required placeholder="Masukkan password" style="width: 100%; padding: 12px 16px; border-radius: 12px; border: 1px solid var(--border-light); font-size: 0.95rem; outline: none; background: #FFF;">
            </div>

            <button type="submit" class="btn-pill btn-pill-filled" style="width: 100%; padding: 12px; font-size: 1rem; cursor: pointer;">
                Masuk Dashboard <i class="fa-solid fa-right-to-bracket" style="margin-left: 8px;"></i>
            </button>
        </form>

        <div style="text-align: center; margin-top: 20px; font-size: 0.85rem; color: var(--text-muted);">
            Default Login: <strong>admin</strong> / <strong>admin123</strong>
        </div>

    </div>
</main>

<?php include 'includes/footer.php'; ?>