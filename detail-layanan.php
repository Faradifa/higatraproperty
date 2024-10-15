<?php
include 'kon/koneksi.php';

// Hardcode the service_id for "jasa bangun"
$jasa_bangun_id = 1;

$query = "SELECT * FROM services WHERE id = $jasa_bangun_id";
$result = mysqli_query($conn, $query);
$service = mysqli_fetch_assoc($result);

if (!$service) {
    // Handle error, e.g. redirect to 404 page
    header("Location: 404.php");
    exit();
}
?>

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Site Metas -->
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Detail Layanan - <?= $service['description']; ?></title>
<link rel="icon" href="images/logo.png" type="image/x-icon">


<!-- slider stylesheet -->
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

<!-- bootstrap core css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

<!-- fonts style -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
<!-- <div>Icons made from <a href="https://www.onlinewebfonts.com/icon">svg icons</a>is licensed by CC BY 4.0</div> -->
<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet" />
<!-- responsive style -->
<link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
    <?php include "layout/navbar.html"; ?>
    <section class="us_section2 layout_padding">
        <div class="container tabel_harga">
            <div class="heading_container navy2 mb-4">
                <h2><?= $service['description']; ?></h2>
            </div>
            <div class="service-details mb-5">
                <h1 class="mb-3"></h1>
                <p><?= $service['description_2']; ?></p>
            </div>
            <div class="heading_container navy2 mb-5">
                <h2>TABEL HARGA <?= strtoupper($service['description']); ?></h2>
            </div>

            <div class="us_container ">
                <div class="row justify-content-center mt-5">
                    <?php
                    $pricing_query = "SELECT * FROM us_section2 WHERE service_id = $jasa_bangun_id";
                    $pricing_result = mysqli_query($conn, $pricing_query);

                    if (mysqli_num_rows($pricing_result) > 0) {
                        while ($row = mysqli_fetch_assoc($pricing_result)) {
                    ?>
                    <div class="col-md-3">
                        <div class="pricing-card">
                            <h4>
                                <div class="badge badge-secondary">
                                    <?= $row['type']; ?>
                                </div>
                            </h4>
                            <div class="price">
                                <h2>Rp. <?= $row['harga']; ?></h2>
                            </div>
                            <ul class="features list-unstyled text-left">
                                <?php
                                        $fasilitas = explode(',', $row['fasilitas']);
                                        foreach ($fasilitas as $f) {
                                            echo '<li class="d-flex align-items-center">
                                                <i class="fas fa-check-circle text-success mr-2"></i> ' . htmlspecialchars($f) . '
                                              </li>';
                                        }
                                        ?>
                            </ul>

                            <a href="https://wa.me/<?= $row['nomor_whatsapp']; ?>?text=<?= urlencode('Saya ingin pesan yang interior ' . $row['type']); ?>"
                                class="btn btn-dark btn-block btn-custom">Pesan Sekarang</a>
                        </div>
                    </div>
                    <?php
                        }
                    } else {
                        echo "<p>Tidak ada data harga untuk layanan saat ini.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>



    <!-- footer section -->

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/carousel.js"></script>

    <script src="js/index.js"></script>

</body>

</html>