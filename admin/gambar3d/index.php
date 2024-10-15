<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

$query = "SELECT gambar_3d.id, testimonials.nama, gambar_3d.gambar, gambar_3d.deskripsi 
          FROM gambar_3d 
          JOIN testimonials ON gambar_3d.id_klien = testimonials.id";
$result = mysqli_query($conn, $query);
?>

<?php include "../layout/header-admin.php";
?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Daftar Gambar 3D</h5>
    </div>
    <div class="card-body">
        <a href="tambah.php" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Klien</th>
                        <th>Gambar</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="align-middle">
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><img src="../../images/gambar_3d/<?= $row['gambar']; ?>" width="100"></td>
                            <td><?= $row['deskripsi']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                                <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>