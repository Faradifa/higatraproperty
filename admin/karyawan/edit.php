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
$karyawan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM karyawan WHERE id = $id"));

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $gambar = $karyawan['gambar'];

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $target = "../../images/karyawan/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
    }

    $sql = "UPDATE karyawan SET nama = '$nama', jabatan = '$jabatan', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $sql);
    header('Location: index.php');
}
include "../layout/header-admin.php";

?>

<div class="card m-4">
    <div class="card-header text-center">
        <h5>Update Data Karyawan</h5>
    </div>
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $karyawan['nama']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" value="<?= $karyawan['jabatan']; ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>