<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'ecommerce';

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
