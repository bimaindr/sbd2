<?php
include 'db.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Ambil data dari form
$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$status = $_POST['status'] ?? '';
$jenis = $_POST['jenis'] ?? '';
$ukuran = $_POST['ukuran'] ?? '';
$jumlah = (int) ($_POST['jumlah'] ?? 0);
$harga = (float) ($_POST['harga'] ?? 0);
$alamat = $_POST['alamat'] ?? '';
$total = $jumlah * $harga;

// Hitung diskon
if (strtolower($status) === 'tetap') {
    $diskon = 0.10 * $total;
} elseif ($total >= 500000) {
    $diskon = 0.05 * $total;
} else {
    $diskon = 0;
}

$total_bayar = $total - $diskon;

// Simpan pelanggan
$query1 = "INSERT INTO pelanggan (nama, email, status_pelanggan) VALUES ($1, $2, $3) RETURNING id_pelanggan";
$result1 = pg_query_params($conn, $query1, array($nama, $email, $status));

if (!$result1) {
    die("Gagal menyimpan data pelanggan: " . pg_last_error());
}

$row = pg_fetch_assoc($result1);
$id_pelanggan = $row['id_pelanggan'];

// Simpan pesanan
$query2 = "INSERT INTO pesanan (id_pelanggan, jenis_bunga, ukuran, jumlah, harga_satuan, total, diskon, total_bayar, alamat_kirim) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)";
$result2 = pg_query_params($conn, $query2, array(
    $id_pelanggan,
    $jenis,
    $ukuran,
    $jumlah,
    $harga,
    $total,
    $diskon,
    $total_bayar,
    $alamat
));

if (!$result2) {
    die("Gagal menyimpan data pesanan: " . pg_last_error());
}

echo "<h3>Transaksi berhasil disimpan!</h3>";
echo "<a href='index.php'>Kembali ke Form</a>";
?>
