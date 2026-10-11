<?php
session_start();
session_destroy(); // Menghapus semua memori login
header("Location: login.php");
exit;
?>