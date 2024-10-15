<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM layanan_gambar WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $gambar = $row['gambar'];

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $target = "../../images/layanan/" . basename($gambar);
        unlink("../../images/layanan/" . $row['gambar']);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
    }

    $sql = "UPDATE layanan_gambar SET gambar='$gambar' WHERE id=$id";
    mysqli_query($conn, $sql);
    header('Location: index.php');
}
?>

<?php include "../layout/header-admin.php"; ?>
<div class="container">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5 class="card-title">Edit Gambar Layanan</h5>
        </div>
        <div class="card-body">
            <form action="edit.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar Saat Ini:</label><br>
                    <img src="../../images/layanan/<?= $row['gambar']; ?>" class="img-thumbnail" width="100">
                </div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Pilih Gambar Baru (jika ingin mengganti):</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>