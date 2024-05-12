<!DOCTYPE html>
<html>
<head>
    <title>Rental Motor</title>
</head>
<body>

<h2>Rental Motor</h2>

<form method="post" action="">
    Nama Pelanggan: <input type="text" name="nama_pelanggan"><br><br>
    Pilihan Motor:
    <select name="motor_dipilih">
        <option value="Supra X">Supra X</option>
        <option value="Vario">Vario</option>
        <option value="NMax">NMax</option>
        <option value="PCX">PCX</option>
    </select><br><br>
    Lama Rental (hari): <input type="number" name="lama_rental" min="1" value="1"><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php

$motor = array(
    "Supra X" => 50000,
    "Vario" => 70000,
    "NMax" => 90000,
    "PCX" => 110000
);

$member = array("Valensio", "Ahmad", "Moldy","Vedric");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pelanggan = $_POST["nama_pelanggan"];
    $motor_dipilih = $_POST["motor_dipilih"];
    $lama_rental = $_POST["lama_rental"];
    $pajak = 10000;

    if (array_key_exists($motor_dipilih, $motor)) {
        $harga_per_hari = $motor[$motor_dipilih];
        $total_biaya_rental = $harga_per_hari * $lama_rental;

        if (in_array($nama_pelanggan, $member)) {
            echo "<p>$nama_pelanggan adalah member.</p>";
            $total_biaya_rental -= ($total_biaya_rental * 0.05);
        }

        $total_biaya = $total_biaya_rental + $pajak;

        $result = "<h3>Detail Transaksi:</h3>";
        $result .= "Nama Pelanggan: $nama_pelanggan<br>";
        $result .= "Motor Dipilih: $motor_dipilih<br>";
        $result .= "Lama Rental: $lama_rental hari<br>";
        $result .= "Biaya Rental per hari: Rp" . number_format($harga_per_hari, 2) . "<br>";
        $result .= "Total Biaya Rental: Rp" . number_format($total_biaya_rental, 2) . "<br>";
        $result .= "Pajak: Rp" . number_format($pajak, 2) . "<br>";
        $result .= "Total Biaya: Rp" . number_format($total_biaya, 2) . "<br>";

        echo $result;
    } else {
        echo "Motor yang dipilih tidak ada.";
    }
}

?>

</body>
</html>
