<!-- Navbar -->
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5 align-items-center">
        <!-- Logo -->
        <div class="col-lg-2 col-8">
            <a href="" class="text-decoration-none">
                <span class="h1 text-uppercase text-primary bg-dark px-2">Loc</span>
                <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">als</span>
            </a>
        </div>

        <!-- Navbar toggler for mobile -->
        <div class="col-4 d-lg-none d-flex justify-content-end ">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon">
                    <i class="fa fa-bars"></i>
                </span>
            </button>
        </div>

        <!-- Navbar content and login button -->
        <div class="col-lg-10 col-12">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                <!-- Navbar content -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                    <div class="navbar-nav py-0">
                        <a href="index.html" class="nav-item nav-link active">Home</a>
                        <a href="shop.html" class="nav-item nav-link">Shop</a>
                        <a href="detail.html" class="nav-item nav-link">Shop Detail</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <a href="cart.html" class="nav-item nav-link">My Cart</a>
                        <a href="{{url('/login')}}" class="nav-item nav-link d-lg-none">Login</a> <!-- Mobile login button -->
                        <a href="{{url('/register')}}" class="nav-item nav-link d-lg-none">Register</a> <!-- Mobile register button -->
                    </div>
                </div>

                <!-- Desktop login button (visible only on large screens) -->
                <a href="{{url('/login')}}" class="btn btn-primary d-none d-lg-block ml-auto">Login</a>
                <a href="{{url('/register')}}" class="btn btn-primary d-none d-lg-block ml-2">Register</a>
            </nav>
        </div>
    </div>
</div>
