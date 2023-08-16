<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('BE/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('BE/assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('BE/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('logo/logo.jpg') }}" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">


                            <div class="card-body">
                                <form method="POST" class="needs-validation" novalidate=""
                                    action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" name="email" :value="old('email')"
                                            required autofocus class="form-control" tabindex="1" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="tex" class="form-control" id="passwordInsert" name="password"
                                            tabindex="2" required>
                                        <button type="button" class="btn btn-info mt-2"
                                            id="togglePasswordInsert">Sembunyikan
                                            Password</button>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            {{-- Don't have an account? <a href="auth-register.html">Create One</a> --}}
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('BE/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('BE/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('BE/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('BE/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('BE/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('BE/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('BE/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('BE/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('BE/assets/js/custom.js') }}"></script>
    <script src="{{ asset('BE/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var togglePasswordInsert = document.getElementById("togglePasswordInsert");
            var passwordInputInsert = document.getElementById("passwordInsert");

            togglePasswordInsert.addEventListener("click", function() {
                // Check if password input is empty
                if (passwordInputInsert.value === "") {
                    iziToast.error({
                        title: 'Ups!!',
                        message: 'harap isi password terlebih dahulu',
                        position: 'topRight'
                    });
                    return;
                }

                // Toggle password visibility
                if (passwordInputInsert.type === "password") {
                    passwordInputInsert.type = "text";
                    togglePasswordInsert.textContent = "Sembunyikan Password";
                } else {
                    passwordInputInsert.type = "password";
                    togglePasswordInsert.textContent = "Tampilkan Password";
                }
            });
        });
    </script>
</body>

</html>
