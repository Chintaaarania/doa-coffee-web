<?php
session_start();
if(!isset($_SESSION['admin_status'])){ header("Location: ../login.php"); exit; }
include '../../config/database.php';

$id = $_GET['id'];

// Ambil nama file gambar dari database untuk dihapus dari folder uploads
$query = mysqli_query($conn, "SELECT gambar FROM produk WHERE id='$id'");
$data = mysqli_fetch_array($query);
$file_gambar = "../../assets/uploads/".$data['gambar'];

if(file_exists($file_gambar)){
    unlink($file_gambar); // Menghapus file fisik gambar
}

// Hapus data dari tabel database
mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");

header("Location: index.php");
?>