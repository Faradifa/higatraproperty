<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Ambil data gambar berdasarkan ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM legalitas WHERE id = $id");
$row = $result->fetch_assoc();

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $imageType = $_POST['image_type'];
    $imagePath = $row['image_path']; // Defaultnya adalah path gambar lama

    // Cek jika ada gambar baru yang di-upload
    if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] == UPLOAD_ERR_OK) {
        $targetDirectory = "../../images/Legalitas/";
        $imageFileName = basename($_FILES['image_file']['name']);
        $targetFilePath = $targetDirectory . $imageFileName;

        // Pindahkan file yang di-upload ke folder tujuan
        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $targetFilePath)) {
            $imagePath = $targetFilePath; // Update dengan path gambar baru
            header("Location: index.php");
        } else {
            echo "Gagal meng-upload gambar.";
        }
    }

    // Update tipe gambar dan path gambar di database
    $stmt = $conn->prepare("UPDATE legalitas SET image_type = ?, image_path = ? WHERE id = ?");
    $stmt->bind_param("ssi", $imageType, $imagePath, $id);
    $stmt->execute();

    echo "Gambar berhasil diperbarui!";
}
?>
<?php include "../layout/header-admin.php"; ?>

<div class="card m-4">
    <div class="card-header text-center">
        <h5>Edit Gambar Legalitas</h5>
    </div>
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="image_type" class="form-label">Tipe Gambar:</label>
                <select name="image_type" id="image_type" class="form-select" required>
                    <option value="landscape" <?php echo ($row['image_type'] == 'landscape') ? 'selected' : ''; ?>>Landscape</option>
                    <option value="portrait" <?php echo ($row['image_type'] == 'portrait') ? 'selected' : ''; ?>>Portrait</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image_file" class="form-label">Gambar:</label>
                <input type="file" name="image_file" id="image_file" class="form-control" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="mb-3">
                <img id="image_preview" src="<?php echo $row['image_path']; ?>" alt="Preview Gambar" class="img-fluid" style="max-width: 150px; height: auto; margin-top: 10px;">

            </div>

            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </div>
</div>
<script>
    function previewImage(event) {
        const preview = document.getElementById('image_preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
<?php include "../layout/footer-admin.php";
?>