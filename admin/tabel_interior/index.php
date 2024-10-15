<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Query untuk mengambil data dari tb_interior
$query = "SELECT * FROM tb_interior us ORDER BY id";
$result = mysqli_query($conn, $query);

// Proses penghapusan data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tb_interior WHERE id = $id");
    header('Location: index.php');
    exit();  // Pastikan untuk menghentikan eksekusi setelah redirect
}

?>


<?php include "../layout/header-admin.php"; ?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Tabel Harga Eksterior dan Interior</h5>
    </div>
    <div class="card-body">
        <a href="tambah.php" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark align-middle">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Type</th>
                        <th>Harga</th>
                        <th>Fasilitas</th>
                        <th>Nomor WhatsApp</th>
                        <th>Pesan Otomatis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr class="align-middle">
                            <td><?= $no++; ?></td>
                            <td><?= $row['category']; ?></td>
                            <td><?= $row['type']; ?></td>
                            <td><?= $row['harga']; ?></td>
                            <td><?= $row['fasilitas']; ?></td>
                            <td><?= $row['nomor_whatsapp']; ?></td>
                            <td><?= $row['pesan_otomatis']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                                <a href="?delete=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>