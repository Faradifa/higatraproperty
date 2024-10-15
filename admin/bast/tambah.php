<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Query untuk mengambil nama klien dari tabel testimonials
$queryKlien = "SELECT id, nama FROM testimonials";
$resultKlien = mysqli_query($conn, $queryKlien);

if (isset($_POST['submit'])) {
    $id_klien = $_POST['id_klien'];
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $gambar = $_FILES['gambar']['name'];
    $target = "../../images/bast/" . basename($gambar);

    // Proses upload gambar dan insert ke database
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $sql = "INSERT INTO bast (id_klien, gambar, deskripsi) VALUES ('$id_klien', '$gambar', '$deskripsi')";
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>

<?php include "../layout/header-admin.php"; ?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Tambah Data</h5>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <label class="form-label" for="id_klien">Nama Klien:</label>
            <select class="form-control mb-3" name="id_klien" id="id_klien">
                <?php while ($row = mysqli_fetch_assoc($resultKlien)): ?>
                    <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                <?php endwhile; ?>
            </select>

            <label class="form-label" for="gambar">Upload Gambar:</label>
            <input class="form-control mb-3" type="file" name="gambar" id="gambar" required>

            <label class="form-label" for="deskripsi">Deskripsi Gambar:</label>
            <textarea class="form-control mb-3" name="deskripsi" id="deskripsi" rows="5" required></textarea>

            <input class="btn btn-primary" type="submit" name="submit" value="Tambah Data">
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>