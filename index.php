<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Bunga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Form Pemesanan Bunga</h2>
    <form action="simpan.php" method="post" autocomplete="on">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="status">Status Pelanggan:</label>
        <select id="status" name="status">
            <option value="Tetap">Tetap</option>
            <option value="Tidak Tetap">Tidak Tetap</option>
        </select>

        <label for="jenis">Jenis Bunga:</label>
        <input type="text" id="jenis" name="jenis" required>

        <label for="ukuran">Ukuran:</label>
        <select id="ukuran" name="ukuran">
            <option value="Kecil">Kecil</option>
            <option value="Sedang">Sedang</option>
            <option value="Besar">Besar</option>
        </select>

        <label for="jumlah">Jumlah:</label>
        <input type="number" id="jumlah" name="jumlah" min="1" required>

        <label for="harga">Harga Satuan (Rp):</label>
        <input type="number" id="harga" name="harga" min="0" step="1000" required>

        <label for="alamat">Alamat Pengiriman:</label>
        <textarea id="alamat" name="alamat" rows="4" required></textarea>

        <input type="submit" value="Simpan Transaksi">
    </form>
</body>
</html>
