<?php
// Aktifkan error reporting saat pengembangan
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Konfigurasi koneksi PostgreSQL
$host = "localhost"; // Host database
$port = "5432"; // Port default PostgreSQL
$dbname = "db_bunga"; // Nama database
$user = "postgres"; // Username PostgreSQL
$password = "bimaindra"; // Password PostgreSQL

// String koneksi
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Eksekusi koneksi
$conn = pg_connect($conn_string);

// Validasi koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . pg_last_error($conn));
}

// Jika koneksi berhasil
echo "Koneksi ke database berhasil!";
?>
