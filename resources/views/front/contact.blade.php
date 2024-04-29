<!doctype html>
<html lang="en">
  <head>
  	<title>Contact Form 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('contacfront')}}/css/style.css">

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

</head>
	<body>
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

                                        <li>
                                            <a href="{{ route('front.productdetails') }}">Product Details</a>


                                        </li>

                                        <li class="has-submenu">
                                            <a href="javascript:void(0);">Shop</a>

                                            <ul class="submenu">
                                                <li><a href="{{ route('front.shopcatalog') }}">Shop Catalog</a></li>
                                                {{-- <li><a href="{{ route('front.singleproduct') }}">Single Product</a> --}}
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
                                            <a class="custom-btn custom-btn--small custom-btn--style-4"
                                                href="#">Get in Touch</a>
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

    <!-- end main -->
    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-10">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-6">
								<div class="contact-wrap w-100 p-lg-5 p-4">
									<h3 class="mb-4">Send us a message</h3>
									<div id="form-message-warning" class="mb-4"></div>
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
                              @if ($errors->any)
                              @foreach ($errors->all() as $error)
                                  <div class="alert p-1 my-1">
                                      {{ $error }}
                                  </div>
                              @endforeach
                          @endif

                                        <form class="contactForm " method='Post'
                                        action="{{ route('front.contact.sendMessage') }}">
                                        @CSRF
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                                                    <input class="textfield" id="phone" name="phone" type="tel"
                                                    placeholder="Phone Number" />												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="6" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Message" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-lg-5 p-4 img">
									<h3>Contact us</h3>
									<p class="mb-4">We're open for any suggestion or just to have a chat</p>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Address:</span> Giza</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Phone:</span> <a href="tel://+201111346488">+201111346488</a></p>
                                </p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Whatsapp:</span><a href="https://wa.me/+201111346488">+201111346488</a></p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Email:</span>                                     <a href="mailto:agrimecha1@gmail.com">agrimecha1@gmail.com</a></p>
					          </div>
				          </div>
				        	{{-- <div class="dbox w-100 d-flex align-items-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-3">
					            <p><span>Website</span> <a href="#">yoursite.com</a></p>
					          </div>
				          </div>
			          </div> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('contacfront')}}/js/jquery.min.js"></script>
    <script src="{{asset('contacfront')}}/js/popper.js"></script>
    <script src="{{asset('contacfront')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('contacfront')}}/js/jquery.validate.min.js"></script>
    <script src="{{asset('contacfront')}}/js/main.js"></script>
    <div id="btn-to-top-wrap">
        <a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="800"></a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('front') }}/js/jquery-2.2.4.min.js"><\/script>')
    </script>

    <script type="text/javascript" src="{{ asset('front') }}/js/main.min.js"></script>
