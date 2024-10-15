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
    $image = $_FILES['image']['name'];
    $target = "../../images/partners/" . basename($image);

    // Upload gambar
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Simpan gambar ke database
        $query = "INSERT INTO partners (image_url) VALUES ('$image')";
        mysqli_query($conn, $query);
        header('Location: index.php');
    } else {
        echo "Gagal meng-upload gambar.";
    }
}

include "../layout/header-admin.php";
?>

<div class="container mt-4">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5>Tambah Partner</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Partner</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>