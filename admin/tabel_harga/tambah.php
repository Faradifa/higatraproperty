<?php
include '../../kon/koneksi.php';
session_start();

if (!isset($_SESSION['name']) || !isset($_SESSION['username'])) {
    header("Location: ../../home-login.php");
    exit();
}

$_SESSION['name'];
$_SESSION['username'];

// Hardcode the service_id for "jasa bangun"
$jasa_bangun_id = 1;

// Simpan ke database setelah submit
if (isset($_POST['submit'])) {
    $type = $_POST['type'];
    $harga = $_POST['harga'];
    $fasilitas = $_POST['fasilitas'];
    $fasilitasStr = implode(',', $fasilitas);
    $nomor_whatsapp = $_POST['nomor_whatsapp'];
    $pesan_otomatis = $_POST['pesan_otomatis'];

    $sql = "INSERT INTO us_section2 (type, harga, fasilitas, nomor_whatsapp, pesan_otomatis, service_id) 
            VALUES ('$type', '$harga', '$fasilitasStr', '$nomor_whatsapp', '$pesan_otomatis', $jasa_bangun_id)";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<?php include "../layout/header-admin.php"; ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h5>Tambah Type Jasa Bangun</h5>
        </div>
        <div class="card-body">
            <form method="post" action="tambah.php">
                <div class="mb-3">
                    <label for="type" class="form-label">Type:</label>
                    <input type="text" name="type" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga:</label>
                    <input type="text" name="harga" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="fasilitas" class="form-label">Fasilitas:</label>
                    <div id="fasilitasContainer">
                        <input type="text" name="fasilitas[]" class="form-control mb-2" placeholder="Masukkan fasilitas" required>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm" onclick="addFasilitasField()">Tambah Fasilitas</button>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeFasilitasField()">Hapus Fasilitas</button>
                </div>

                <div class="mb-3">
                    <label for="nomor_whatsapp" class="form-label">Nomor WhatsApp:</label>
                    <input type="text" name="nomor_whatsapp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="pesan_otomatis" class="form-label">Pesan Otomatis:</label>
                    <input type="text" name="pesan_otomatis" class="form-control" required>
                </div>

                <button type="submit" name="submit" class="btn btn-success btn-sm">Tambah</button>
            </form>
        </div>
    </div>
</div>

<?php include "../layout/footer-admin.php"; ?>

<script>
    function addFasilitasField() {
        var container = document.getElementById("fasilitasContainer");
        var input = document.createElement("input");
        input.type = "text";
        input.name = "fasilitas[]";
        input.placeholder = "Masukkan fasilitas";
        input.classList.add("form-control", "mb-2");
        container.appendChild(input);
    }

    function removeFasilitasField() {
        var container = document.getElementById("fasilitasContainer");
        if (container.children.length > 1) {
            container.removeChild(container.lastChild);
        }
    }
</script>