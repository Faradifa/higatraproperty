<?php
include '../../kon/koneksi.php';

session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

$query = "SELECT * FROM testimonials";
$result = mysqli_query($conn, $query);
?>

<?php include "../layout/header-admin.php";
?>
<div class="card m-4">
    <div class="card-header text-center">
        <h2>Testimonial List</h2>
    </div>
    <div class="card-body">
        <a href="tambah.php" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr class="align-middle">
                        <th>No</th>
                        <th>Nama Klien</th>
                        <th>Profesi</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr class="align-middle">
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['profesi']; ?></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td><img src="../../images/testimonials/<?= $row['gambar']; ?>" width="70" height="70"></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm mt-1"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>