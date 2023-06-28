
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        {{ $title }}
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('dashboard-template/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard-template/css/dash.css') }}" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('dashboard-template/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('dashboard-template/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- trix editor-->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none
        }
    </style>


</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('layouts.admin.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.admin.navigation')
        <!-- End Navbar -->

        <div class="container-fluid py-4">

            {{ $slot }}

        @include('layouts.admin.footer')
        </div>

    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard-template/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dashboard-template/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('dashboard-template/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
</body>

</html>
