<?php
$servername = "localhost";  // Sesuaikan jika server berbeda
$username = "root";         // Sesuaikan jika ada password di MySQL
$password = "";             // Tambahkan jika ada password
$dbname = "pembayaran";     // Pastikan nama database benar

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
