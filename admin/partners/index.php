<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Query untuk mendapatkan data partner
$query = "SELECT * FROM partners";
$result = mysqli_query($conn, $query);

include "../layout/header-admin.php"; // Include header admin
?>

<div class="container mt-4">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5>Daftar Our Partners</h5>
        </div>
        <div class="card-body">
            <a href="tambah.php" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-plus"></i> Tambah Karyawan</a>
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
                        <?php $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="align-middle">
                                <td><?= $no++; ?></td>
                                <td><img src="../../images/partners/<?= $row['image_url']; ?>" width="100"></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; // Include footer admin 
?>