<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Ambil data berdasarkan id yang dikirim melalui URL
$id = $_GET['id'];
$query = "SELECT * FROM gambar_3d WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Ambil data nama klien untuk dropdown
$queryKlien = "SELECT id, nama FROM testimonials";
$resultKlien = mysqli_query($conn, $queryKlien);

if (isset($_POST['submit'])) {
    $id_klien = $_POST['id_klien'];
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $gambar = $_FILES['gambar']['name'];

    // Jika user mengupload gambar baru
    if ($gambar) {
        $target = "../../images/gambar_3d/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $queryUpdate = "UPDATE gambar_3d SET id_klien = '$id_klien', gambar = '$gambar', deskripsi = '$deskripsi' WHERE id = $id";
    } else {
        // Jika tidak ada gambar baru yang diupload
        $queryUpdate = "UPDATE gambar_3d SET id_klien = '$id_klien', deskripsi = '$deskripsi' WHERE id = $id";
    }

    if (mysqli_query($conn, $queryUpdate)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $queryUpdate . "<br>" . mysqli_error($conn);
    }
}
?>

<?php include "../layout/header-admin.php"; ?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Edit Gambar 3D</h5>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label" for="id_klien">Nama Klien:</label>
                <select class="form-control" name="id_klien" id="id_klien">
                    <?php while ($klien = mysqli_fetch_assoc($resultKlien)): ?>
                        <option value="<?= $klien['id']; ?>" <?= $klien['id'] == $row['id_klien'] ? 'selected' : '' ?>>
                            <?= $klien['nama']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="gambar">Upload Gambar:</label>
                <input class="form-control" type="file" name="gambar" id="gambar">
            </div>

            <div class="mb-3">
                <label class="form-label" for="deskripsi">Deskripsi Gambar:</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" required><?= $row['deskripsi']; ?></textarea>
            </div>

            <input type="submit" class="btn btn-primary" name="submit" value="Edit Gambar">
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php";
?>