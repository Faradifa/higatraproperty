<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

$jasa_bangun_id = 1;

$query = "SELECT us.* 
          FROM us_section2 us 
          WHERE us.service_id = $jasa_bangun_id
          ORDER BY us.id";
$result = mysqli_query($conn, $query);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM us_section2 WHERE id = $id AND service_id = $jasa_bangun_id");
    header('Location: index.php');
}

?>

<?php include "../layout/header-admin.php"; ?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Tabel Harga Jasa Bangun</h5>
    </div>
    <div class="card-body">
        <a href="tambah.php" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-plus"></i> Tambah Data</a>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark align-middle">
                    <tr>
                        <th>No</th>
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
                            <td><?= $row['type']; ?></td>
                            <td><?= $row['harga']; ?></td>
                            <td><?= $row['fasilitas']; ?></td>
                            <td><?= $row['nomor_whatsapp']; ?></td>
                            <td><?= $row['pesan_otomatis']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm mb-2"><i class="fa-solid fa-pen"></i></a>
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