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
$service = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM services WHERE id = $id"));

if (isset($_POST['submit'])) {
    $image = $service['image_url'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $description_2 = mysqli_real_escape_string($conn, $_POST['description_2']);
    $link = mysqli_real_escape_string($conn, $_POST['link']); // Ambil data link

    // Jika gambar diupload, maka gunakan gambar yang baru
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "../../images/services/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $query = "UPDATE services SET image_url = '$image', description = '$description', description_2 = '$description_2', link = '$link' WHERE id = $id";
    mysqli_query($conn, $query);
    header('Location: index.php');
}

include "../layout/header-admin.php";
?>

<div class="container mt-4">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5>Edit Layanan</h5>
        </div>
        <div class="card-body bg-black text-white">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Layanan</label>
                    <input type="file" name="image" class="form-control">
                    <img src="../../images/services/<?= $service['image_url']; ?>" width="100" class="mt-3">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Layanan</label>
                    <input type="text" name="description" class="form-control" value="<?= $service['description']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description_2" class="form-label">Deskripsi Kedua</label>
                    <textarea name="description_2" class="form-control" required><?= $service['description_2']; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link Layanan</label>
                    <input type="text" name="link" class="form-control" value="<?= $service['link']; ?>"> <!-- Tambahkan field untuk link -->
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <?php include "../layout/footer-admin.php"; ?>
</div>