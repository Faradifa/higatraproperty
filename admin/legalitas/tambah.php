<?php
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imageName = $_FILES['image']['name'];
    $imageType = $_POST['image_type'];
    $targetDir = "../../images/Legalitas/";
    $targetFile = $targetDir . basename($imageName);

    // Upload file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        // Simpan ke database
        include '../../kon/koneksi.php';

        $stmt = $conn->prepare("INSERT INTO legalitas (image_name, image_type, image_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $imageName, $imageType, $targetFile);
        $stmt->execute();
        echo "Gambar berhasil diunggah!";
        header("Location: index.php");
    } else {
        echo "Gagal mengunggah gambar!";
    }
}
?>
<?php include "../layout/header-admin.php"; ?>
<div class="card m-4">
    <div class="card-header text-center">
        <h5>Tambah Data</h5>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Pilih Gambar:</label>
                <input class="form-control" type="file" name="image" required><br>
                <label for="" class="form-label">Tipe Gambar:</label>
                <select class="form-control" name="image_type" required>
                    <option value="landscape">Landscape</option>
                    <option value="portrait">Portrait</option>
                </select>
            </div>

            <input class="btn btn-primary" type="submit" value="Submit">
        </form>
    </div>
</div>