<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Input Data Diri</title>
</head>
<body>
    <h2>Form Input Data Diri</h2>
    <form method="post">
        <label>Nama: </label>
        <input type="text" name="nama"><br><br>

        <label>Tanggal Lahir: </label>
        <input type="date" name="tgl_lahir"><br><br>

        <label>Pekerjaan: </label>
        <select name="pekerjaan">
            <option value="Programmer">Programmer</option>
            <option value="Designer">Designer</option>
            <option value="Manager">Manager</option>
        </select><br><br>

        <input type="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Menghitung umur
        $tanggal_lahir = new DateTime($tgl_lahir);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($tanggal_lahir)->y;

        // Menentukan gaji berdasarkan pekerjaan
        switch ($pekerjaan) {
            case 'Programmer':
                $gaji = 8000000;
                break;
            case 'Designer':
                $gaji = 7000000;
                break;
            case 'Manager':
                $gaji = 10000000;
                break;
            default:
                $gaji = 0;
        }

        // Menampilkan hasil
        echo "<h2>Output Data</h2>";
        echo "Nama: $nama<br>";
        echo "Tanggal Lahir: $tgl_lahir<br>";
        echo "Umur: $umur tahun<br>";
        echo "Pekerjaan: $pekerjaan<br>";
        echo "Gaji: Rp. " . number_format($gaji, 0, ',', '.') . "<br>";
    }
    ?>
</body>
</html>
