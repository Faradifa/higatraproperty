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
$partner = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM partners WHERE id = $id"));

if (isset($_POST['submit'])) {
    $image = $partner['image_url'];

    // Jika gambar diupload, maka gunakan gambar yang baru
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "../../images/partners/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $query = "UPDATE partners SET image_url = '$image' WHERE id = $id";
    mysqli_query($conn, $query);
    header('Location: index.php');
}

include "../layout/header-admin.php";
?>

<div class="container mt-4">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5>Edit Partner</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Partner</label>
                    <input type="file" name="image" class="form-control">
                    <img src="../../images/partners/<?= $partner['image_url']; ?>" width="100" class="mt-3">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>