<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('client-template/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- <link href=" asset('client-template/css/bootstrap-icons.css') " rel="stylesheet">-->
  <link href="{{ asset('client-template/css/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('client-template/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('client-template/css/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{ asset('client-template/css/variables.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('client-template/css/main.css') }}" rel="stylesheet">

  <!-- cdn bootstrap icon-->
  <!-- Option 1: Include in HTML -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>

<body>

    <main>

        @include('layouts.client.navigation')

        {{ $slot }}

    </main>


    @include('layouts.client.footer')


    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>
  
    <!-- Vendor JS Files -->
    <script src="{{ asset('client-template/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client-template/js/aos.js') }}"></script>
    <script src="{{ asset('client-template/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('client-template/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('client-template/js/swiper-bundle.min.js') }}"></script><
    <script src="{{ asset('client-template/js/validate.js') }}"></script>
  
    <!-- Template Main JS File -->
    <script src="{{ asset('client-template/js/main.js') }}"></script>
  
  </body>
  
</html>