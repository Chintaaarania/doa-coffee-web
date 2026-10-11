<?php
session_start();
include '../config/database.php';

if(isset($_SESSION['admin_status'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); 

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    
    if(mysqli_num_rows($query) > 0){
        $_SESSION['admin_status'] = "login_sukses";
        header("Location: index.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login Admin - Doa Coffee</title></head>
<body style="font-family: Arial; background: #e0e0e0; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px;">
        <h2 style="text-align: center; color: #3E2723;">Admin Login</h2>
        <?php if(isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
        
        <form method="POST" action="">
            <label>Username</label><br>
            <input type="text" name="username" required style="width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;"><br>
            
            <label>Password</label><br>
            <input type="password" name="password" required style="width: 90%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;"><br>
            
            <button type="submit" name="login" style="width: 98%; padding: 10px; background: #3E2723; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-bottom: 15px;">Login</button>
            
            <!-- Tambahan Tombol Kembali -->
            <a href="../index.php" style="display: block; text-align: center; color: #555; text-decoration: none; font-size: 14px;">&larr; Kembali ke Halaman Publik</a>
        </form>
    </div>
</body>
</html>