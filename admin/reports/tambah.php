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
    $report_type = $_POST['report_type'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $image = $_FILES['image']['name'];
    $target = "../../images/reports/" . basename($image);

    // Upload gambar
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Simpan gambar ke database
        $query = "INSERT INTO reports (report_type, image_url, title) VALUES ('$report_type', '$image', '$title')";
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
            <h5>Tambah Report</h5>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="report_type" class="form-label">Tipe Laporan</label>
                    <select name="report_type" class="form-control" required>
                        <option value="bebas1">bebas1</option>
                        <option value="bebas2">bebas2</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>