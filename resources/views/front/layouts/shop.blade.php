<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriMecha</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Other meta tags -->
    <meta name="theme-color" content="#FCDB5A" />
    <meta name="msapplication-navbutton-color" content="#FCDB5A" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#FCDB5A" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Other head elements -->

    <!-- Favicons
  ================================================== -->
    <link rel="shortcut icon" href="{{ asset('front') }}/img/favicon.ico">
    <link rel="apple-touch-icon" href="{{ asset('front') }}/img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('front') }}/img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('front') }}/img/apple-touch-icon-114x114.png">

    <!-- Critical styles
  ================================================== -->
    <link rel="stylesheet" href="{{ asset('front') }}/css/critical.min.css" type="text/css">

    <!-- Load google font
  ================================================== -->
    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,500,600,700,800', 'Raleway:100,400,400i,500,500i,700,700i,900']
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- Load other scripts
  ================================================== -->
    <script type="text/javascript">
        var _html = document.documentElement,
            isTouch = (('ontouchstart' in _html) || (navigator.msMaxTouchPoints > 0) || (navigator.maxTouchPoints));

        _html.className = _html.className.replace("no-js", "js");
        _html.classList.add(isTouch ? "touch" : "no-touch");
    </script>
    <script type="text/javascript" src="{{ asset('front') }}/js/device.min.js"></script>
</head>



<body class="woocommerce-page product-page">
    <div id="app">
        <!-- start header -->
        <header id="top-bar" class="top-bar top-bar--style-2">
            <div class="top-bar__bg"
                style="background-color: #FFF;background-image: url({{ asset('front') }}/img/top_bar_bg-2.png);background-repeat: no-repeat;background-position: center bottom;">
            </div>

            <div class="container position-relative">
                <div class="row justify-content-between no-gutters">

                    <a class="top-bar__logo site-logo" href="index_4.html">
                        <img class="img-fluid" src="{{ asset('front') }}/img/Agrimecha_logo.png" alt="demo" />
                    </a>

                    <a id="top-bar__navigation-toggler"
                        class="top-bar__navigation-toggler top-bar__navigation-toggler--dark"
                        href="javascript:void(0);"><span></span></a>

                    <div id="top-bar__inner" class="top-bar__inner  text-lg-right">
                        <div>
                            <div class="d-lg-flex flex-lg-column-reverse align-items-lg-end">
                                <nav id="top-bar__navigation" class="top-bar__navigation navigation" role="navigation">
                                    <ul>
                                        <li>
                                            <a href="{{ route('front.home') }}">Home</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('front.about') }}">About</a>
                                        </li>

                                        {{-- <li>
                                            <a href="{{ route('front.productdetails') }}">Product Details</a>


                                        </li> --}}

                                        <li class="has-submenu">
                                            <a href="javascript:void(0);">Shop</a>

                                            <ul class="submenu">
                                                <li><a href="{{ route('front.shopcatalog') }}">Shop Catalog</a></li>
                                                <li><a href="{{ route('front.cart') }}">Cart</a>
                                                    <li><a href="{{ route('front.orders') }}">Your Orders</a>

                                                </ul>
                                        </li>

                                        <li>
                                            <a href="{{ route('front.blog') }}">Blog</a>
                                        </li>

                                        <li>
                                            <a href="{{ route('front.contact') }}">Contacts</a>
                                        </li>
                                        <!-- Your HTML code -->
                                        <li class="li-cart">
                                            <a href="{{ route('front.cart') }}"><i
                                                    class="fontello-shopping-bag"></i><span id="cart-count"
                                                    class="total li-cart1"></span></a>
                                        </li>
                                        <li class="li-btn">
                                            @guest
                                            <a class="custom-btn custom-btn--small custom-btn--style-4"
                                                href="{{ route('login') }}">Login</a>
                                        @else
                                            @if (auth()->user()->role == 'admin')
                                            <a class="custom-btn custom-btn--small custom-btn--style-4" href="{{ route('admin.home') }}">Admin Dashboard</a>

                                            @else
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                                <a class="custom-btn custom-btn--small custom-btn--style-4"
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                            @endif
                                        @endguest
                                        </li>

                                    </ul>

                                </nav>
                                <div class="top-bar__contacts">
                                    <span> Giza</span>
                                    <span><a href="https://wa.me/+201111346488">+201111346488</a></span>
                                    <span><a href="mailto:agrimecha1@gmail.com">agrimecha1@gmail.com</a></span>
                                    <div class="social-btns">
                                        <a class="fontello-twitter" href="#"></a>
                                        <a class="fontello-facebook" href="#"></a>
                                        <a class="fontello-linkedin-squared" href="#"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- end header -->


        @yield('shopcontent')
        <footer id="footer" class="footer footer--style-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-auto col-md-3 col-lg-2">
                        <div class="footer__item">
                            <a class="top-bar__logo site-logo" href="{{ route('front.home') }}">
                                <img class="img-fluid" src="{{ asset('front') }}/img/Agrimecha_logo.png"
                                    data-src="{{ asset('front') }}/img/AgriMecha_Logo.png" alt="demo" />
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-md-9 col-lg-6">
                        <div class="footer__item">
                            <nav id="footer__navigation" class="navigation">
                                <div class="row">
                                    <div class="col-6 col-sm-8">
                                        <h5 class="footer__item__title h6">Menu</h5>
                                        <ul>
                                            <li class="active"><a href="index.html">Home</a></li>
                                            <li><a href="{{ route('front.about') }}">About</a></li>
                                            <li>
                                                <a href="{{ route('front.blog') }}">Blog</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.contact') }}">Contacts</a>
                                            </li>
                                        </ul>

                                    </div>


                                </div>
                            </nav>
                        </div>
                    </div>

                    <div class="col-12 col-md col-lg-4">
                        <div class="footer__item">
                            <h5 class="footer__item__title h6">Contacts</h5>
                            <address>
                                <p>
                                    Giza
                                </p>
                                <p><a href="https://wa.me/+201111346488">+201111346488</a></p>
                                <p><a href="mailto:agrimecha1@gmail.com">agrimecha1@gmail.com</a></p>

                            </address>

                            <div class="social-btns">
                                <a href="#"><i class="fontello-twitter"></i></a>
                                <a href="#"><i class="fontello-facebook"></i></a>
                                <a href="#"><i class="fontello-linkedin-squared"></i></a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </footer>
        <!-- end footer -->
    </div>

    <div id="btn-to-top-wrap">
        <a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="800"></a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('front') }}/js/jquery-2.2.4.min.js"><\/script>')
    </script>

    <script type="text/javascript" src="{{ asset('front') }}/js/main.min.js"></script>
    h<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->



</body>

</html>
