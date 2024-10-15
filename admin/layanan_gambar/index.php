<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Hapus gambar
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $result = mysqli_query($conn, "SELECT gambar FROM layanan_gambar WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    unlink("../../images/layanan/" . $row['gambar']);
    mysqli_query($conn, "DELETE FROM layanan_gambar WHERE id=$id");
    header('Location: index.php');
}

$layanan_gambar = mysqli_query($conn, "SELECT * FROM layanan_gambar");
?>

<?php include "../layout/header-admin.php"; ?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Daftar Gambar Layanan</h5>
    </div>
    <div class="card-body">
        <a href="tambah.php" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-plus"></i> Tambah Gambar</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1; // Inisialisasi nomor urut
                    while ($row = mysqli_fetch_assoc($layanan_gambar)): ?>
                        <tr class="align-middle">
                            <td><?= $no++; ?></td> <!-- Menampilkan nomor urut -->
                            <td><img src="../../images/layanan/<?= $row['gambar']; ?>" width="100"></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>