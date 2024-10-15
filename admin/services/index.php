<?php
include '../../kon/koneksi.php';
    session_start();

    if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
        header("Location: ../../home-login.php");
        exit();
    }

    $_SESSION['name'];
    $_SESSION['username'];

$query = "SELECT * FROM services";
$result = mysqli_query($conn, $query);

include "../layout/header-admin.php";
?>

<div class="container mt-4">
    <div class="card m-4">
        <div class="card-header text-center">
            <h5>Daftar Layanan</h5>
        </div>
        <div class="card-body">
            <a href="tambah.php" class="btn btn-primary btn-sm mb-2"><i class="fa-solid fa-plus"></i> Tambah Layanan</a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Deskripsi Kedua</th>
                            <th>Link</th> <!-- Tambahkan kolom link -->
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-dark">
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="align-middle">
                                <td><?= $no++; ?></td>
                                <td>
                                    <img src="../../images/services/<?= $row['image_url']; ?>" width="100">
                                </td>
                                <td><?= $row['description']; ?></td>
                                <td><?= $row['description_2']; ?></td>
                                <td><a href="<?= $row['link']; ?>" target="_blank"><?= $row['link']; ?></a></td> <!-- Tampilkan link -->
                                <td>
                                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm mb-1"><i class="fa-solid fa-pen"></i> </a>
                                    <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Apakah yakin ingin dihapus?')" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <?php include "../layout/footer-admin.php"; // Include footer admin 
    ?>
</div>