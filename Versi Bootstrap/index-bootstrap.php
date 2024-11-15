<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Input Data Diri</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Input Data Diri</h2>
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
            </div>
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan:</label>
                <select class="form-control" id="pekerjaan" name="pekerjaan">
                    <option value="Programmer">Programmer</option>
                    <option value="Designer">Designer</option>
                    <option value="Manager">Manager</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
            <button type="reset" class="btn btn-secondary">Clear</button>
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

            // Menyimpan data ke dalam tabel
            echo '<div class="mt-5">';
            echo '<h2>Output Data</h2>';
            echo '<table class="table table-bordered">';
            echo '<thead><tr><th>Nama</th><th>Tanggal Lahir</th><th>Umur</th><th>Pekerjaan</th><th>Gaji</th></tr></thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . htmlspecialchars($nama) . '</td>';
            echo '<td>' . htmlspecialchars($tgl_lahir) . '</td>';
            echo '<td>' . htmlspecialchars($umur) . ' tahun</td>';
            echo '<td>' . htmlspecialchars($pekerjaan) . '</td>';
            echo '<td>Rp. ' . number_format($gaji, 0, ',', '.') . '</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>