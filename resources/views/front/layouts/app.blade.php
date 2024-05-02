<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <title>AGRIMECHA</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="viewport"
        content="user-scalable=no, width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />

    <meta name="theme-color" content="#1D7151" />
    <meta name="msapplication-navbutton-color" content="#1D7151" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#1D7151" />

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

<body>
    <div id="app">
        <!-- start navbar -->
        <header id="top-bar" class="top-bar top-bar--style-1">
            <div class="top-bar__bg"
                style="background-color: #24292c;background-image: url({{ asset('front') }}/img/top_bar_bg-1.jpg);background-repeat: no-repeat;background-position: left bottom;">
            </div>

            <div class="container-fluid">
                <div class="row align-items-center justify-content-between no-gutters">

                    <a class="top-bar__logo site-logo" href="{{ route('front.home') }}">
                        <img class="img-fluid" src="{{ asset('front') }}/img/Agrimecha_logo.png" alt="demo" />
                    </a>

                    <a id="top-bar__navigation-toggler"
                        class="top-bar__navigation-toggler top-bar__navigation-toggler--light"
                        href="javascript:void(0);"><span></span></a>

                    <div id="top-bar__inner" class="top-bar__inner">
                        <div>
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
                                        </ul>
                                    </li>


                                    <li>
                                        <a href="{{ route('front.blog') }}">Blog</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('front.contact') }}">Contacts</a>
                                    </li>

                                    <li class="li-cart">
                                        <a href="{{ route('front.cart') }}"><i class="fontello-shopping-bag"></i><span
                                                id="cart-count" class="total li-cart1"></span></a>
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
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- end navbar -->
        <!-- start start screen -->

        @yield('content')

        <!-- start footer -->
        <footer id="footer" class="footer--style-1">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-auto">
                        <div class="footer__item">
                            <a class="site-logo" href="{{ route('front.home') }}">
                                <img class="img-fluid  lazy" src="{{ asset('front') }}/img/blank.gif"
                                    data-src="{{ asset('front') }}/img/site_logo.png" alt="demo" />
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-sm">
                        <div class="row align-items-md-center no-gutters">
                            <div class="col-12 col-md">
                                <div class="footer__item">
                                    <address>
                                        <p>
                                            Giza
                                        </p>
                                        <p><a href="https://wa.me/+201111346488">+201111346488</a></p>
                                        <p><a href="mailto:agrimecha1@gmail.com">agrimecha1@gmail.com</a></p>

                                    </address>
                                </div>
                            </div>

                            <div class="col-6 col-md-auto">
                                <div class="footer__item">
                                    <div class="social-btns">
                                        <a href="#"><i class="fontello-twitter"></i></a>
                                        <a href="#"><i class="fontello-facebook"></i></a>
                                        <a href="#"><i class="fontello-linkedin-squared"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-5 col-xl-4 offset-xl-1">
                        <div class="footer__item">
                            <h5 class=" footer__item__title h6">Get a newslatter</h5>

                            <form class="form--horizontal" method="POST"
                                action="{{ route('admin.AddSubsription.add') }}">
                                @CSRF
                                <div class="input-wrp">
                                    <input class="textfield" name="email" type="text"
                                        placeholder="Your E-mail" />
                                </div>

                                <button class="custom-btn custom-btn--medium custom-btn--style-1" type="submit"
                                    role="button">subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row flex-lg-row-reverse">
                    <div class="col-12 col-lg-6">
                        <div class="footer__item">
                            <nav id="footer__navigation" class="navigation  text-lg-right">
                                <ul>
                                    <li class="active"><a href="index.html">Home</a></li>
                                    <li><a href="{{ route('front.about') }}">About</a></li>

                                    <li>
                                        <a href="{{ route('front.productdetails') }}">Product Details</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('front.blog') }}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.contact') }}">Contacts</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    {{-- <div class="col-12 col-lg-6">
							<div class="footer__item">
								<span class="__copy">© 2019 Agro. All rights reserved. Created by <a class="__dev" href="https://themeforest.net/user/artureanec" target="_blank">Artureanec</a></span>
							</div>
						</div> --}}
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

</body>

</html>
