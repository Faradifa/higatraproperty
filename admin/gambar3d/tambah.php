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
    $target = "../../images/gambar_3d/" . basename($gambar);

    // Proses upload gambar dan insert ke database
    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $sql = "INSERT INTO gambar_3d (id_klien, gambar, deskripsi) VALUES ('$id_klien', '$gambar', '$deskripsi')";
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
        <h5>Tambah Gambar 3D</h5>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id_klien" class="form-label">Nama Klien:</label>
                <select class="form-control" name="id_klien" id="id_klien">
                    <?php while ($row = mysqli_fetch_assoc($resultKlien)): ?>
                        <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">Upload Gambar:</label>
                <input class="form-control" type="file" name="gambar" id="gambar" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="deskripsi">Deskripsi Gambar:</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required></textarea>
            </div>

            <input class="btn btn-primary" type="submit" name="submit" value="Tambah Gambar">
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>