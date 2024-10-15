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
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $description_2 = mysqli_real_escape_string($conn, $_POST['description_2']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);  // Ambil data link
    $target = "../../images/services/" . basename($image);

    // Upload gambar
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Simpan gambar, deskripsi, deskripsi kedua, dan link ke database
        $query = "INSERT INTO services (image_url, description, description_2, link) VALUES ('$image', '$description', '$description_2', '$link')";
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
            <h5>Tambah Layanan</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Layanan</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Layanan</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="description_2" class="form-label">Deskripsi Kedua</label>
                    <textarea name="description_2" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link Layanan</label>
                    <input type="text" name="link" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <?php include "../layout/footer-admin.php"; ?>
</div>