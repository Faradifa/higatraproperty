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
<title>Detail Layanan Perawatan Taman</title>
<link rel="icon" href="images/logo.png" type="image/x-icon">


<!-- slider stylesheet -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
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
                <h2>Perawatan Taman</h2>
            </div>
            <div class="service-details mb-5">
                <div class="row justify-content-center">
                    <p>
                        Layanan ini mencakup perawatan taman dan area hijau secara berkala untuk menjaga keindahan dan kesehatan yang tahan lama.
                    </p>
                </div>
            </div>
            <div class="heading_container navy2 mb-5">
                <h2>TABEL HARGA JASA Perawatan Taman</h2>
            </div>

            <div class="us_container ">
                <div class="row justify-content-center mt-5">
                    <p>Tidak ada data harga untuk layanan saat ini.</p>
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