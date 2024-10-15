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
    $nama = $_POST['nama'];
    $profesi = $_POST['profesi'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $target = "../../images/testimonials/" . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $sql = "INSERT INTO testimonials (nama, profesi, deskripsi, gambar) VALUES ('$nama', '$profesi', '$deskripsi', '$gambar')";
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
        <h5>Tambah Testimonial</h5>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama Klien:</label>
                <input type="text" name="nama" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Profesi Klien:</label>
                <input type="text" name="profesi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar Klien:</label>
                <input type="file" name="gambar" class="form-control" required>
            </div>
            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>