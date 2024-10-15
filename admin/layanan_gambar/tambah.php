<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

if (isset($_POST['submit'])) {
    $gambar = $_FILES['gambar']['name'];
    $target = "../../images/layanan/" . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $sql = "INSERT INTO layanan_gambar (gambar) VALUES ('$gambar')";
        mysqli_query($conn, $sql);
        header('Location: index.php');
    } else {
        echo "Gagal mengupload gambar.";
    }
}
?>

<?php include "../layout/header-admin.php"; ?>
<div class="container m-4">
    <div class="card">
        <div class="card-header text-center">
            <h5 class="card-title">Tambah Gambar Layanan</h5>
        </div>
        <div class="card-body">
            <form action="tambah.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="gambar" class="form-label">Pilih Gambar:</label>
                    <input type="file" name="gambar" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>


<?php include "../layout/footer-admin.php"; ?>