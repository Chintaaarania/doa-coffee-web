<?php
$host     = "localhost";
$user     = "root";
$pass     = ""; // Isikan password MySQL jika ada
$dbname   = "doa_coffee";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi Database Gagal: " . $conn->connect_error);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>