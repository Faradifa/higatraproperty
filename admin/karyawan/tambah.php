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
    $jabatan = $_POST['jabatan'];
    $gambar = $_FILES['gambar']['name'];
    $target = "../../images/karyawan/" . basename($gambar);

    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target)) {
        $sql = "INSERT INTO karyawan (nama, jabatan, gambar) VALUES ('$nama', '$jabatan', '$gambar')";
        mysqli_query($conn, $sql);
        header('Location: index.php');
    }
}
?>
<?php include "../layout/header-admin.php"; ?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Tambah Data Karyawan</h5>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" name="nama" id="nama" placeholder="Nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <input type="text" name="jabatan" id="jabatan" placeholder="Jabatan" class="form-control" required>
            </div>

            <div class="mb-3">
                <input type="file" name="gambar" id="gambar" class="form-control" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>