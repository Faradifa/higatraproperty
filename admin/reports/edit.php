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
$report = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM reports WHERE id = $id"));

if (isset($_POST['submit'])) {
    $report_type = $_POST['report_type'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image = $report['image_url'];

    // Jika gambar diupload, maka gunakan gambar yang baru
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $target = "../../images/reports/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    }

    $query = "UPDATE reports SET report_type = '$report_type', image_url = '$image', title = '$title' WHERE id = $id";
    mysqli_query($conn, $query);
    header('Location: index.php');
}

include "../layout/header-admin.php";
?>

<div class="container mt-4">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5>Edit Report</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="report_type" class="form-label">Tipe Laporan</label>
                    <select name="report_type" class="form-control" required>
                        <option value="bebas1" <?= $report['report_type'] == 'bebas1' ? 'selected' : ''; ?>>bebas1</option>
                        <option value="bebas2" <?= $report['report_type'] == 'bebas2' ? 'selected' : ''; ?>>bebas2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control">
                    <img src="../../images/reports/<?= $report['image_url']; ?>" width="100" class="mt-3">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="<?= $report['title']; ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>