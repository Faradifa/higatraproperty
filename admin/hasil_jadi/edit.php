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
$query = "SELECT * FROM hasil_jadi WHERE id = $id";
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
        $target = "../../images/hasil_jadi/" . basename($gambar);
        move_uploaded_file($_FILES['gambar']['tmp_name'], $target);
        $queryUpdate = "UPDATE hasil_jadi SET id_klien = '$id_klien', gambar = '$gambar', deskripsi = '$deskripsi' WHERE id = $id";
    } else {
        // Jika tidak ada gambar baru yang diupload
        $queryUpdate = "UPDATE hasil_jadi SET id_klien = '$id_klien', deskripsi = '$deskripsi' WHERE id = $id";
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
        <h5>Edit Data</h5>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <label class="form-label" for="id_klien">Nama Klien:</label>
            <select class="form-control mb-3" name="id_klien" id="id_klien">
                <?php while ($klien = mysqli_fetch_assoc($resultKlien)): ?>
                    <option value="<?= $klien['id']; ?>" <?= $klien['id'] == $row['id_klien'] ? 'selected' : '' ?>>
                        <?= $klien['nama']; ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label class="form-label" for="gambar">Upload Gambar:</label>
            <input class="form-control mb-3" type="file" name="gambar" id="gambar">

            <label class="form-label" for="deskripsi">Deskripsi Gambar:</label>
            <textarea class="form-control mb-3" name="deskripsi" id="deskripsi" rows="5" required><?= $row['deskripsi']; ?></textarea>

            <input class="btn btn-primary" type="submit" name="submit" value="Edit Gambar">
        </form>
    </div>
</div>
<?php include "../layout/footer-admin.php"; ?>