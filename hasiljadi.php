<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Higatra Property
    </title>
    <link rel="icon" href="images/logo.png" type="image/x-icon">


    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />


</head>

<body>

    <?php include "layout/navbar2.html" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
    function toggleDropdown(event) {
        event.preventDefault();
        var dropdownContent = event.target.nextElementSibling;
        var icon = event.target.querySelector('i');
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            icon.classList.remove('rotate');
        } else {
            dropdownContent.style.display = "block";
            icon.classList.add('rotate');
        }
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown a')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
            var icons = document.querySelectorAll('.dropdown a i');
            icons.forEach(function(icon) {
                icon.classList.remove('rotate');
            });
        }
    }
    </script>

    <head>
        <style>
        .gallery-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Center the images */
        }

        /* .card {
                flex-basis: calc(10.333% - 20px);
                margin: 10px;
                box-sizing: border-box;
            } */

        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
            width: 100%;
        }

        .container-3 {
            display: block;
            gap: 20px;
            width: 80%;
            margin: 0 auto;
            padding-top: 50px;
        }

        h1 {
            font-size: 2em;
            color: #333;
            margin: 20px 0;
        }

        .card {
            flex-basis: calc(10.333% - 20px);

            display: inline-block;
            width: 330px;
            height: 250px;
            margin: 1%;
            background-color: #333;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            margin: 9px;
        }

        .card-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            width: 300px;
        }

        .card-img-container {
            position: relative;
        }

        .card-img-container img {
            width: 100%;
            height: auto;
            display: block;
        }

        .card img {
            /* position: inline-block; */
            width: 400px;
            height: 250px;
            display: flex;
            justify-self: center;
            align-items: center;
            /* aspect-ratio: 16 / 9; */
            object-fit: cover;
        }

        .card-button {
            background-color: #ffc107;
            color: #333;
            padding: 10px 0;
            text-decoration: none;
            display: block;
            font-weight: bold;
        }

        .card-description {
            position: absolute;
            bottom: 0px;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .card-description {
            opacity: 1;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 10px;
            left: 0;
            top: 0;
            /* width: 100%;
                height: 100%; */
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
            margin-top: auto;
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .modal-content {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: o.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* Media Query untuk tampilan lebih kecil */
        @media (max-width: 600px) {
            .card {
                max-width: 100%;
                margin: 5px;
            }
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            display: block;
            margin: auto;
            max-width: 70%;
            max-height: 100%;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
        }

        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 40px;
            user-select: none;
            -webkit-user-select: none;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        @media (max-width: 768px) {
            .card {
                flex-basis: calc(50% - 20px);
                /* 2 cards per row on smaller screens */
            }
        }

        @media (max-width: 480px) {
            .card {
                flex-basis: calc(100% - 20px);
                /* 1 card per row on very small screens */
            }
        }

        .footer .social-icons i {
            font-size: 24px;
            margin: 0 10px;
            color: white;
        }

        .social-icons a {
            font-size: 1.5em;
            margin: 0 10px;
            color: #ffffff;
            text-decoration: none;
        }

        .gallery-wrapper .card {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease-out, transform 1s ease-out;
        }

        .gallery-wrapper .card.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Gaya awal untuk card */
        .card {
            opacity: 0;
            /* Tidak terlihat pada awalnya */
            transform: translateY(20px);
            /* Bergeser ke bawah */
            transition: opacity 0.6s ease, transform 0.6s ease;
            /* Transisi saat muncul */
        }

        /* Gaya untuk card saat terlihat */
        .card.show {
            opacity: 1;
            /* Menjadi terlihat */
            transform: translateY(0);
            /* Kembali ke posisi normal */
        }
        </style>
    </head>

    <body>
        <?php
        include 'kon/koneksi.php';
        $hasil_jadi = mysqli_query($conn, "SELECT * FROM hasil_jadi");
        ?>

        <div class="container-3">
            <h1>Hasil Jadi</h1>
            <?php while ($row = mysqli_fetch_assoc($hasil_jadi)): ?>
            <div class="card">
                <img alt="<?= $row['deskripsi']; ?>" height="300" src="images/hasil_jadi/<?= $row['gambar']; ?>"
                    width="300" />
                <div class="card-description">
                    <?= $row['deskripsi']; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="modal" id="myModal">
            <span class="close" id="closeModal">&times;</span>
            <img class="modal-content" id="img01" />
        </div>

        <script>
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var closeModal = document.getElementById("closeModal");

        document.querySelectorAll('.card img').forEach(img => {
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
            }
        });

        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        // Close modal when clicking outside of the modal content
        modal.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
        </script>




        <div class="modal" id="myModal">
            <span class="close" id="closeModal">&times;</span>
            <img class="modal-content" id="img01" />
            <a class="prev" id="prevSlide">&#10094;</a>
            <a class="next" id="nextSlide">&#10095;</a>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cards = document.querySelectorAll('.card');

            // Membuat observer
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show'); // Tambahkan kelas show
                    }
                });
            }, {
                threshold: 0.1
            }); // Mulai animasi ketika 10% elemen terlihat

            // Menerapkan observer ke setiap card
            cards.forEach(card => {
                observer.observe(card);
            });
        });
        </script>




        <script>
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var closeModal = document.getElementById("closeModal");
        var prevSlide = document.getElementById("prevSlide");
        var nextSlide = document.getElementById("nextSlide");

        var groupedImages = <?= json_encode($grouped_images) ?>;
        var currentClient = '';
        var currentIndex = 0;

        document.querySelectorAll('.card img').forEach(img => {
            img.onclick = function() {
                currentClient = this.getAttribute('data-client');
                currentIndex = 0;
                openModal(currentClient, currentIndex);
            }
        });

        closeModal.onclick = function() {
            modal.style.display = "none";
        }

        prevSlide.onclick = function() {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : groupedImages[currentClient].length - 1;
            openModal(currentClient, currentIndex);
        }

        nextSlide.onclick = function() {
            currentIndex = (currentIndex < groupedImages[currentClient].length - 1) ? currentIndex + 1 : 0;
            openModal(currentClient, currentIndex);
        }

        function openModal(client, index) {
            modal.style.display = "block";
            modalImg.src = "images/gambar_3d/" + groupedImages[client][index].gambar;
        }

        modal.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
        </script>


        <!-- end partner -->
        <footer>
            <div class="footer">
                <div class="container">
                    <div class="row align-items-center row_footer">
                        <div class="col-md-3">
                            <div class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.900066300759!2d113.84915147483633!3d-7.021031992980595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e70057ed749f%3A0x92004152aeafb8ed!2sHIGATRA%20PROPERTY!5e0!3m2!1sid!2sid!4v1726040814118!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>
                        </div>
                        <div class="col-md-3 isi_footer" style="margin-top: 2%; text-align: justify;">
                            <h5>Address</h5>
                            <p class="small"><i class="fas fa-map-marker-alt"></i> Jln. Jokotole No.7000, Dusun Toros,
                                Babbalan,
                                Kec.
                                Batuan, Kabupaten Sumenep, Jawa Timur 69416</p>
                        </div>
                        <div class="col-md-3 isi_footer" style="margin-bottom: 3%; text-align: justify;">
                            <h5>Work hours</h5>
                            <p class="small"><i class="fas fa-clock"></i> Senin-Sabtu 08:00 - 16:00 WIB</p>
                        </div>
                        <div class="col-md-3 isi_footer" style="margin-bottom: 2%; text-align: justify;">
                            <h5>Contact</h5>
                            <p class="small"><i class="fas fa-envelope"></i> higatraapropertyy@gmail.com<br>
                                <i class="fas fa-phone"></i> +62 877 - 2979 - 1118
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center social-icons">
                            <a href="https://wa.me/6287849880465?text=Halo,%20saya%20tertarik%20dengan%20jasa%20Anda."
                                target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a href="https://www.instagram.com/higatra_property" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.facebook.com/username" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://www.youtube.com/@HigatraProperty" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="https://www.tiktok.com/@higatraproperty" target="_blank">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php include "layout/footer.html" ?>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/index.js"></script>


    </body>

</html>