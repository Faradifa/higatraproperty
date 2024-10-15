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
$query = "SELECT * FROM testimonials WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $profesi = $_POST['profesi'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $target = "../../images/testimonials/" . basename($gambar);

    if (!empty($gambar)) {
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $sql = "UPDATE testimonials SET nama='$nama', profesi='$profesi', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";
    } else {
        $sql = "UPDATE testimonials SET nama='$nama', profesi='$profesi', deskripsi='$deskripsi' WHERE id=$id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php include "../layout/header-admin.php";
?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Edit Testimonial</h5>
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nama Klien:</label>
                <input type="text" name="nama" value="<?= $row['nama']; ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Profesi Klien:</label>
                <input class="form-control" type="text" name="profesi" value="<?= $row['profesi']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi" required><?= $row['deskripsi']; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar Klien:</label>
                <input class="form-control" type="file" name="gambar">
                <img src="../../images/testimonials/<?= $row['gambar']; ?>" width="70" height="70">
            </div>

            <input class="btn btn-primary" type="submit" name="submit" value="Update">
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>