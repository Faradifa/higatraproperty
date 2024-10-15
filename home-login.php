<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="icon" href="images/logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    .input-group {
        width: 100%;
    }

    .input-group input,
    .input-group button {
        border-radius: 12px;
        width: 100%;
    }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="loginbaru.png" class="img-fluid" alt="Phone image" height="300px" width="600px"
                        style="margin-left: -41px">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5">
                    <form class="form_login" action="login.php" method="post">
                        <p class="text-center h8 fw-bold mb-4 mx-1 mx-md-3 mt-3">WELCOME TO</p>

                        <img src="images/Group397.png" alt="Deskripsi gambar" width="250" height="auto"
                            class="img-fluid mb-4"
                            style="display: block; margin-left: auto; margin-right: auto; margin-bottom:50px;">

                        <div class="form-outline mb-4 input-group">
                            <input type="email" id="form1Example13" class="form-control form-control-lg py-3"
                                name="username" placeholder="E-mail" />
                        </div>

                        <div class="form-outline mb-4 input-group">
                            <input type="password" id="form1Example23" class="form-control form-control-lg py-3"
                                name="password" autocomplete="off" placeholder="Password" />
                        </div>

                        <!-- Forgot Password Link -->
                        <div class="d-flex justify-content-end mt-2">
                            <a href="forgot_password.php" class="text-decoration-none"
                                style="text-decoration: none; color: inherit;">Lupa kata sandi?</a>
                        </div>


                        <!-- Login Button -->
                        <div class="d-flex justify-content-center input-group">
                            <input type="submit" value="LOGIN" name="login"
                                class="btn btn-custom2 btn-block btn-lg text-light my-2 py-3" />
                        </div>

                        <!-- Registration Link -->
                        <!-- <div class="d-flex justify-content-center mt-3">
                            <p>Don't have an account? <a href="register.php" class="text-decoration-none"
                                    style="color: inherit;">Register</a></p>
                        </div> -->

                        <!-- Google Login Button
            <div class="d-flex justify-content-center input-group mt-3">
              <a href="YOUR_GOOGLE_AUTH_URL" class="btn btn-danger btn-block btn-lg text-light my-2 py-3">Login dengan Google</a>
            </div> -->


                    </form>

                </div>
            </div>
        </div>
    </section>
    </div>

    <script>
    function validateForm() {
        var username = document.getElementById("form1Example13").value;
        var password = document.getElementById("form1Example23").value;

        if (username === "" || password === "") {
            alert("Mohon isi semua kolom sebelum login.");
            return false; // Menghentikan form dari pengiriman
        }
        return true; // Melanjutkan pengiriman form
    }
    </script>








    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>