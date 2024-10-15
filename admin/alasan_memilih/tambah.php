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
    $icon = $_FILES['icon']['name'];
    $icon_tmp = $_FILES['icon']['tmp_name'];
    move_uploaded_file($icon_tmp, "../../images/icons/" . $icon);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO reasons (icon, description) VALUES ('$icon', '$description')";
    mysqli_query($conn, $query);
    header('Location: index.php');
}

include "../layout/header-admin.php";
?>

<div class="container mt-4">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5>Tambah Alasan Memilih Kami</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon/Gambar</label>
                    <input type="file" name="icon" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>