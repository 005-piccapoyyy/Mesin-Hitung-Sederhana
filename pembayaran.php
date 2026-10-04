<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="POST" action="">

    <h1>Mesin Hitung Sederhana</h1>

    <label>Nama Barang: </label>
    <input type="text" name="barang" id=""> 

    <br>

    <label>Harga Satuan: </label>
    <input type="number" name="harga" id="">

    <br>

    <label>Jumlah Pembelian:</label>
    <input type="number" name="jumlah" id="">

    <br>

    <button type="submit" name="submit">Hitung</button>
</form> 

<?php 

if (isset($_POST['submit'])) {
    $barang = $_POST['barang'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];

    // validasi inputnya menggunakan isset()
    if ($barang == "" || $harga == "" || $jumlah == "") {
        echo "<p>Semua data harus diisi</p>";
    } elseif ($harga < 0){
        echo "<p>Harga Tidak Boleh Negatif!!</p>";
    } elseif ($jumlah < 1){
        echo "<p>jumlah pembelian minimal 1!</p>";
    } else {
        // hitung total harga

        $total = $harga * $jumlah;

        // tentukan diskon

        if ($total >= 500000) {
            $persenDiskon = 15;
        } elseif ($total >= 250000){
            $persenDiskon = 10;
        } else{
            $persenDiskon = 0;
        }
        
        $diskon = $total * $persenDiskon / 100;
        $totalBayar = $total -  $diskon;

        // tampilkan hasilnya

        echo "<div class='hasil'>";
        echo "<h3>Rincian Barang</h3>";
        echo "<div class='baris'><span>Nama Barang</span><strong>" . htmlspecialchars($barang) . "</strong></div>";
        echo "<div class='baris'><span>Harga Satuan</span><strong>Rp " . number_format($harga, 0, ',', '.') . "</strong></div>";
        echo "<div class='baris'><span>Jumlah Pembelian</span><strong>" . $jumlah . " pcs</strong></div>";
        echo "</div>";

        echo "<div class='hasil'>";
        echo "<h3>Rincian Pembayaran</h3>";
        echo "<div class='baris'><span>Total Harga</span><strong>Rp " . number_format($total, 0, ',', '.') . "</strong></div>";
        $kelasBadge = ($persenDiskon > 0) ? "badge" : "badge nol";
        echo "<div class='baris'><span>Diskon <em class='" . $kelasBadge . "'>" . $persenDiskon . "%</em></span><strong class='diskon'>- Rp " . number_format($diskon, 0, ',', '.') . "</strong></div>";
        echo "<div class='baris total'><span>Total Pembayaran</span><strong>Rp " . number_format($totalBayar, 0, ',', '.') . "</strong></div>";
        echo "</div>";
    }
}
?>
</body>
</html>