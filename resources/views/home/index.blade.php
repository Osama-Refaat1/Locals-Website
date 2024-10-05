<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Locals</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('home.css');
</head>

<body>
    <!-- Topbar Start -->
        @include('home.topbar');
    <!-- Topbar End -->


    <!-- Navbar Start -->
       @include('home.navbar');
    <!-- Navbar End -->


    <!-- Carousel Start -->
       @include('home.carousel');
    <!-- Carousel End -->


    <!-- Perks Start -->
        @include('home.perks');
    <!-- Perks End -->


    <!-- Categories Start -->
       @include('home.categories');
    <!-- Categories End -->


    <!-- Offer Start -->
    @include('home.offer');
    <!-- Offer End -->


    <!-- Products Start -->
    @include('home.products');
    <!-- Products End -->


    <!-- Footer Start -->
    @include('home.footer');
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>