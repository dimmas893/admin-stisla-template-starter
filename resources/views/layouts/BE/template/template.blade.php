<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sekolah</title>

    @include('layouts.BE.template.css')

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
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.BE.template.navbar')

            @include('layouts.BE.template.sidebar')

            <!-- Main Content -->




            @yield('content')

            @include('layouts.BE.template.footer')
        </div>
    </div>


    @include('layouts.BE.template.scripts')
    <div id="loading">Loading&#8230;</div>
</body>

</html>
