<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jumlah = $_POST['jumlah'];
    $tanggal_pembayaran = $_POST['tanggal_pembayaran'];

    // Menggunakan tanda kutip di sekitar variabel string
    $sql = "INSERT INTO adminstrasi (nama, kelas, jumlah, tanggal_pembayaran) 
            VALUES ('$nama', '$kelas', '$jumlah', '$tanggal_pembayaran')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Data berhasil disimpan.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Administrasi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Form Pembayaran Administrasi</h2>

    <!-- Form dengan Bootstrap -->
    <form method="post" action="" class="mb-5">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas:</label>
            <input type="text" name="kelas" id="kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah Pembayaran:</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran:</label>
            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Bayar</button>
    </form>

    <h2 class="mb-4">Data Pembayaran</h2>

    <!-- Tabel dengan Bootstrap -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jumlah</th>
                <th>Tanggal Pembayaran</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $sql = "SELECT * FROM adminstrasi";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Menampilkan data
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['kelas']."</td>
                        <td>".$row['jumlah']."</td>
                        <td>".$row['tanggal_pembayaran']."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada data pembayaran</td></tr>";
        }
        ?>

        </tbody>
    </table>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
