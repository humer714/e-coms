<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ trim($__env->yieldContent('meta_tags', 'Default meta Keywords')) }}" />
    <meta name="description" content="{{ trim($__env->yieldContent('meta_description', 'Default meta description')) }}" />
    <meta name="author" content="Fastkart">
    <link rel="icon" href="{{ asset('assets2/images/favicon/1.png')}}" type="image/x-icon">
    <title>@yield('title')</title>

   
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{ asset('assets2/css/vendors/bootstrap.css')}}">

    <!-- wow css -->
    <link rel="stylesheet" href="{{ asset('assets2/css/animate.min.css')}}">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/bulk-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/vendors/animate.css')}}">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{ asset('assets2/css/style.css')}}">

    @yield('css')
</head>

<body class="bg-effect">
    <!-- Loader Start -->
    <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- Loader End -->

    <!-- Header Start -->
    @include('layouts.header')
    <!-- Header End -->

    <!-- Content Start -->
    @yield('content')
    <!-- Content End -->

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->

    <!-- Tap to top and theme setting button start -->
    <div class="theme-option">
        <div class="setting-box">
            <button class="btn setting-button">
                <i class="fa-solid fa-gear"></i>
            </button>

            <div class="theme-setting-2">
                <div class="theme-box">
                    <ul>
                        <li>
                            <div class="setting-name">
                                <h4>Color</h4>
                            </div>
                            <div class="theme-setting-button color-picker">
                                <form class="form-control">
                                    <label for="colorPick" class="form-label mb-0">Theme Color</label>
                                    <input type="color" class="form-control form-control-color" id="colorPick"
                                        value="#0da487" title="Choose your color">
                                </form>
                            </div>
                        </li>

                        <li>
                            <div class="setting-name">
                                <h4>Dark</h4>
                            </div>
                            <div class="theme-setting-button">
                                <button class="btn btn-2 outline" id="darkButton">Dark</button>
                                <button class="btn btn-2 unline" id="lightButton">Light</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top and theme setting button end -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

     <!-- latest jquery-->
     <script src="{{asset('assets2/js/jquery-3.6.0.min.js')}}"></script>

<!-- jquery ui-->
<script src="{{asset('assets2/js/jquery-ui.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('assets2/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets2/js/bootstrap/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets2/js/bootstrap/popper.min.js')}}"></script>

<!-- feather icon js-->
<script src="{{asset('assets2/js/feather/feather.min.js')}}"></script>
<script src="{{asset('assets2/js/feather/feather-icon.js')}}"></script>

<!-- Lazyload Js -->
<script src="{{asset('assets2/js/lazysizes.min.js')}}"></script>

<!-- Slick js-->
<script src="{{asset('assets2/js/slick/slick.js')}}"></script>
<script src="{{asset('assets2/js/slick/slick-animation.min.js')}}"></script>
<script src="{{asset('assets2/js/slick/custom_slick.js')}}"></script>

<!-- Auto Height Js -->
<script src="{{asset('assets2/js/auto-height.js')}}"></script>

<!-- Timer Js -->
<script src="{{asset('assets2/js/timer1.js')}}"></script>

<!-- Fly Cart Js -->
<script src="{{asset('assets2/js/fly-cart.js')}}"></script>

<!-- Quantity js -->
<script src="{{asset('assets2/js/quantity-2.js')}}"></script>

<!-- WOW js -->
<script src="{{asset('assets2/js/wow.min.js')}}"></script>
<script src="{{asset('assets2/js/custom-wow.js')}}"></script>

<!-- script js -->
<script src="{{asset('assets2/js/script.js')}}"></script>

<!-- theme setting js -->
<script src="{{asset('assets2/js/theme-setting.js')}}"></script>


</body>



</html>