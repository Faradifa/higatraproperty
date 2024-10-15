<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Higatra Property</title>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
  <?php include "layout/navbar2.html"; ?>
  <section class="hero-section">
    <div id="heroCarousel" class="carousel slide hero" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/sampul3.jpg" alt="Background Image 1">
          <div class="hero-overlay"></div>
        </div>
        <div class="carousel-item">
          <img src="images/sampul/2.png" alt="Background Image 2">
          <div class="hero-overlay"></div>
        </div>
        <div class="carousel-item">
          <img src="images/sampul/3.png" alt="Background Image 3">
          <div class="hero-overlay"></div>
        </div>
        <div class="carousel-item">
          <img src="images/sampul/4.png" alt="Background Image 3">
          <div class="hero-overlay"></div>
        </div>
        <div class="carousel-item">
          <img src="images/sampul/5.png" alt="Background Image 3">
          <div class="hero-overlay"></div>
        </div>
        <div class="carousel-item">
          <img src="images/sampul/6.png" alt="Background Image 3">
          <div class="hero-overlay"></div>
        </div>
        <div class="carousel-item">
          <img src="images/sampul/7.png" alt="Background Image 3">
          <div class="hero-overlay"></div>
        </div>
      </div>
    </div>
  </section>


  <!-- end slider section -->

  <!-- about -->
  <!-- <section class="about_section p-5">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box box_about">
            <div class="heading_container navy6">
              <h2 class="h2_about">
                TENTANG <span class="span_about">KAMI</span>
              </h2>
            </div>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which don't look even slightly believable. If you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
              the middle of text. All
            </p>

          </div>
        </div>
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.jpg" alt="">
          </div>
        </div>

      </div>
    </div>
  </section> -->
  <!-- end about -->


  <!-- inforrmasi dan layanan -->
  <?php
  include 'kon/koneksi.php';
  $layanan_gambar = mysqli_query($conn, "SELECT * FROM layanan_gambar");
  ?>

  <section class="t_section layout_padding">
    <div class="container informasi">
      <div class="heading_container navy3 mb-5">
        <h2 class="wow animate__animated animate__fadeInUp">Layanan Kami</h2>
      </div>
      <div class="row justify-content-center" style="margin-bottom: -100px;">
        <?php
        include 'kon/koneksi.php';
        $query = "SELECT * FROM services";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)): ?>
          <div class="col-6 col-sm-4 col-md-2 mb-5 img_layanan wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
            <a href="<?= $row['link']; ?>" class="service-link" target="_blank">
              <div class="service-icon">
                <img src="images/services/<?= $row['image_url']; ?>" alt="<?= $row['description']; ?>">
              </div>
              <p class="service-title"><?= $row['description']; ?></p>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

  </section>


  <!-- n inforrmasi dan layanan -->
  <!-- <div class="container-fluid cont-img">
        <div class="wrapper">
          <i id="left" class="fa-solid fa-angle-left"></i>
          <div class="carousel c_img">
            <?php while ($row = mysqli_fetch_assoc($layanan_gambar)): ?>
              <img src="images/layanan/<?= $row['gambar']; ?>" alt="img" class="caro-img" draggable="false">
            <?php endwhile; ?>
          </div>
          <i id="right" class="fa-solid fa-angle-right"></i>
        </div>
      </div> -->
  <!-- tabel section -->
  <!-- <section class="us_section2 layout_padding">
    <div class="container tabel_harga">
      <div class="heading_container navy2 mb-5">
        <h2>
          TABEL HARGA JASA BANGUN
        </h2>
      </div>

      <div class="us_container ">
        <div class="row justify-content-center">
          <div class="col-md-3">
            <div class="pricing-card">
              <h4>
                <div class="badge badge-secondary">
                  TYPE 42
                </div>
              </h4>
              <div class="price">
                <h2>Rp. 156 JT</h2>
              </div>
              <ul class="features list-unstyled text-left">
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 2 Kamar Tidur
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Full Pasir Hitam
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kusen Jati
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 1 Kamar Mandi
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Lantai Granit
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kloset Duduk/Jongkok
                </li>
              </ul>

              <button class="btn btn-dark btn-block btn-custom">Pesan Sekarang</button>

            </div>
          </div>
          <div class="col-md-3">
            <div class="pricing-card">
              <h4>
                <div class="badge badge-secondary">
                  TYPE 49
                </div>
              </h4>
              <div class="price">
                <h2>Rp. 182 JT</h2>
              </div>
              <ul class="features list-unstyled text-left">
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 2 Kamar Tidur
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Full Pasir Hitam
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kusen Jati
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 2 Kamar Mandi
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Lantai Granit
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kloset Duduk/Jongkok
                </li>
              </ul>

              <button class="btn btn-dark btn-block btn-custom">Pesan Sekarang</button>
            </div>
          </div>
          <div class="col-md-3">
            <div class="pricing-card">
              <h4>
                <div class="badge badge-secondary">
                  TYPE 56
                </div>
              </h4>
              <div class="price">
                <h2>Rp. 208 JT</h2>
              </div>
              <ul class="features list-unstyled text-left">
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 2 Kamar Tidur
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Full Pasir Hitam
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kusen Jati
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 2 Kamar Mandi
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Lantai Granit
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kloset Duduk/Jongkok
                </li>
              </ul>

              <button class="btn btn-dark btn-block btn-custom">Pesan Sekarang</button>
            </div>
          </div>
          <div class="col-md-3">
            <div class="pricing-card">
              <h4>
                <div class="badge badge-secondary">
                  TYPE 70
                </div>
              </h4>
              <div class="price">
                <h2>Rp. 256 JT</h2>
              </div>
              <ul class="features list-unstyled text-left">
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 3 Kamar Tidur
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Full Pasir Hitam
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kusen Jati
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> 2 Kamar Mandi
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Lantai Granit
                </li>
                <li class="d-flex align-items-center">
                  <i class="fas fa-check-circle text-success mr-2"></i> Kloset Duduk/Jongkok
                </li>
              </ul>

              <button class="btn btn-dark btn-block btn-custom">Pesan Sekarang</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- alasan memilih kami -->



  <section class="us_section layout_padding">
    <div class="container">
      <div class="heading_container navy">
        <h2 class="wow animate__animated animate__fadeIn">ALASAN MEMILIH KAMI</h2>
      </div>

      <div class="us_container">
        <div class="row justify-content-center align-items-center">
          <?php
          include 'kon/koneksi.php';
          $query = "SELECT * FROM reasons";
          $result = mysqli_query($conn, $query);
          while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="col-lg-4 col-md-6 text-center mt-5 wow animate__animated animate__fadeIn">
              <div class="box">
                <div class="img-box">
                  <img src="images/icons/<?= $row['icon']; ?>" alt="" style="height: 100px;">
                </div>
                <div class="detail-box mt-4" style="color: #ffff;">
                  <h5>
                    <?= $row['description']; ?>
                  </h5>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- end alasan memilih kami -->

  <!-- karyawan section -->
  <?php
  include 'kon/koneksi.php';
  ?>
  <section class="trainer_section layout_padding">
    <div class="container karyawan">
      <div class="heading_container navy4">
        <h2 class="wow animate__animated animate__fadeInUp">Karyawan</h2>
      </div>
      <div id="trainerCarousel" class="carousel slide" data-ride="carousel">
        <a class="carousel-control-prev c_prev wow animate__animated animate__fadeInUp" href="#trainerCarousel" role="button" data-slide="prev">
          <i class="fas fa-chevron-left"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next c_next wow animate__animated animate__fadeInUp" href="#trainerCarousel" role="button" data-slide="next">
          <i class="fas fa-chevron-right"></i>
          <span class="sr-only">Next</span>
        </a>

        <div class="carousel-inner">
          <?php
          $karyawan = mysqli_query($conn, "SELECT * FROM karyawan");
          $count = 0;
          while ($row = mysqli_fetch_assoc($karyawan)):
          ?>
            <?php if ($count % 3 == 0): ?>
              <div class="carousel-item <?= $count == 0 ? 'active' : ''; ?>">
                <div class="row">
                <?php endif; ?>

                <div class="col-lg-4 col-md-6 mx-auto wow animate__animated animate__fadeInUp">
                  <div class="box">
                    <div class="img-box">
                      <img src="images/karyawan/<?= $row['gambar']; ?>" alt="">
                    </div>
                    <div class="social_box justify-content-center">
                      <h5 class="text-dark mt-1"><?= $row['nama']; ?></h5>
                    </div>
                    <div class="name mt-2">
                      <h5><?= $row['jabatan']; ?></h5>
                    </div>
                  </div>
                </div>

                <?php if ($count % 3 == 2 || $count == mysqli_num_rows($karyawan) - 1): ?>
                </div>
              </div>
            <?php endif; ?>

          <?php $count++;
          endwhile; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- end karyawan section -->

  <!-- footer section -->
  <section class="i_section layout_padding2">
    <!-- <div class="footer">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-3">
            <div class="map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.900066300759!2d113.84915147483633!3d-7.021031992980595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd9e70057ed749f%3A0x92004152aeafb8ed!2sHIGATRA%20PROPERTY!5e0!3m2!1sid!2sid!4v1726040814118!5m2!1sid!2sid"
                height="100%" style="border:0;" allowfullscreen="" loading="lazy">
              </iframe>
            </div>
          </div>
          <div class="col-md-3" style="margin-top: 4%;">
            <h5>Address</h5>
            <p><i class="fas fa-map-marker-alt"></i> Jln. Jokotole No.7000, Dusun Toros, Babbalan, Kec.
              Batuan, Kabupaten Sumenep, Jawa Timur 69416</p>
          </div>
          <div class="col-md-3" style="margin-bottom: 4%;">
            <h5>Work hours</h5>
            <p><i class="fas fa-clock"></i> Senin-Sabtu 08:00 - 16:00 WIB</p>
          </div>
          <div class="col-md-4" style="margin-bottom: 2%;">
            <h5>Contact</h5>
            <p><i class="fas fa-envelope"></i> higatrapropertyv@gmail.com<br>
              <i class="fas fa-phone"></i> +62 877 - 2979 - 1118
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center social-icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-youtube"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-tiktok"></i>
          </div>
        </div>
      </div>
    </div> -->
  </section>

  <!-- Testimonial Start -->
  <?php
  include 'kon/koneksi.php';
  $query = "SELECT * FROM testimonials";
  $result = mysqli_query($conn, $query);
  ?>

  <section class="testi-section">
    <div class="container-fluid testimonial-section">
      <div class="container">
        <div class="heading_container navy5" style="color: #AA8D3F;">
          <h2 class="wow animate__animated animate__fadeInUp">TESTIMONI</h2>
        </div>

        <!-- Carousel Wrapper -->
        <div id="testiCarousel" class="carousel slide" data-ride="carousel">

          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php
            $count = 0;
            $totalItems = mysqli_num_rows($result);
            while ($count < ceil($totalItems / 3)) {
            ?>
              <li data-target="#testiCarousel" data-slide-to="<?= $count ?>" class="<?= $count == 0 ? 'active' : ''; ?>"></li>
            <?php
              $count++;
            }
            ?>
          </ol>

          <!-- Carousel Items -->
          <div class="carousel-inner">
            <?php
            mysqli_data_seek($result, 0); // Reset pointer to the beginning of the result set
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)):
            ?>
              <?php if ($count % 2 == 0): ?>
                <div class="carousel-item <?= $count == 0 ? 'active' : ''; ?>">
                  <div class="row mt-5">
                  <?php endif; ?>

                  <div class="col-lg-6 col-md-6 mb-4 wow animate__animated animate__fadeInUp">
                    <div class="testimonial-item d-flex align-items-center">
                      <div class="quote-icon">
                        <i class="fa fa-quote-left"></i>
                      </div>
                      <div class="testimonial-left">
                        <img src="images/testimonials/<?= $row['gambar']; ?>" class="img-fluid rounded-circle gambar-klien" alt="Client Image" style="width: 70px; height: 70px;">
                        <h6 class="nama-klien mt-2"><?= $row['nama']; ?></h6>
                        <small class="profesi-klien"><?= $row['profesi']; ?></small>
                      </div>
                      <div class="testimonial-right">

                        <p class="deskripsi">"<?= $row['deskripsi']; ?>"</p>
                        <a href="detail.php?id=<?= $row['id']; ?>" class="btn btn-dark mt-3 btn-detail" style="align-self: center;">Detail</a>
                      </div>
                    </div>
                  </div>


                  <?php if ($count % 2 == 1): ?>
                  </div>
                </div>
              <?php endif; ?>
            <?php
              $count++;
            endwhile;
            ?>

            <?php if ($count % 2 != 0): ?>
          </div>
        </div>
      <?php endif; ?>
      </div>
    </div>

    </div>
    </div>
  </section>
  <!-- Testimonial End -->



  <!-- partner -->
  <section class="section_partner pb-5">
    <div class="heading_container navy3 mb-2 ">
      <h2 class="wow animate__animated animate__fadeInUp">Our Partners</h2>
    </div>
    <div class="slider slider_partner">
      <div class="slider-items slider-items_partner">
        <?php
        include 'kon/koneksi.php';
        $query = "SELECT * FROM partners";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)): ?>
          <img src="images/partners/<?= $row['image_url']; ?>" alt="Partner">
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- <a href="https://wa.me/6287849880465?text=Halo,%20saya%20tertarik%20dengan%20jasa%20Anda." target="_blank" class="whatsapp-float">
    <i class="fab fa-whatsapp" style="margin-right: 10px;"></i>
    HUBUNGI KAMI!
  </a> -->
  <div class="social-media-float">
    <a href="https://wa.me/6287849880465?text=Halo,%20saya%20tertarik%20dengan%20jasa%20Anda." target="_blank" class="whatsapp-float">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://www.instagram.com/higatra_property" target="_blank" class="instagram-float">
      <i class="fab fa-instagram"></i>
    </a>
    <a href="https://www.facebook.com/username" target="_blank" class="facebook-float">
      <i class="fab fa-facebook"></i>
    </a>
    <a href="https://www.youtube.com/@HigatraProperty" target="_blank" class="youtube-float">
      <i class="fab fa-youtube"></i>
    </a>
    <a href="https://www.tiktok.com/@higatraproperty" target="_blank" class="tiktok-float">
      <i class="fab fa-tiktok"></i>
    </a>
  </div>



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
          <div class="col-md-3 isi_footer" style="margin-top: 2%;">
            <h5>Address</h5>
            <p class="small"><i class="fas fa-map-marker-alt"></i> Jln. Jokotole No.7000, Dusun Toros, Babbalan,
              Kec.
              Batuan, Kabupaten Sumenep, Jawa Timur 69416</p>
          </div>
          <div class="col-md-3 isi_footer" style="margin-bottom: 3%;">
            <h5>Work hours</h5>
            <p class="small"><i class="fas fa-clock"></i> Senin-Sabtu 08:00 - 16:00 WIB</p>
          </div>
          <div class="col-md-3 isi_footer" style="margin-bottom: 2%;">
            <h5>Contact</h5>
            <p class="small"><i class="fas fa-envelope"></i> higatraapropertyy@gmail.com<br>
              <i class="fas fa-phone"></i> +62 877 - 2979 - 1118
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col text-center social-icons">
            <a href="https://wa.me/6287849880465?text=Halo,%20saya%20tertarik%20dengan%20jasa%20Anda." target="_blank">
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



  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/carousel.js"></script>
  <script src="js/index.js"></script>

</body>

</html>