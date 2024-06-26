@extends('front.layouts.app')
@section('content')
    <!-- start hero -->
    <div id="hero" class="jarallax" data-speed="0.7" data-img-position="50% 80%"
        style="background-image: url({{ asset('front') }}/img/markus-spiske-ZBgvVAVPeN8-unsplash.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h1 class="__title"><span>About</span> company</h1>

                    <p>
                        Our control unit ensures high-quality plant growth while minimizing resource wastage. AgriMecha
                        offers flexibility of usage, accessibility for analyzed data on the dashboard, and user-friendly
                        design, all at a competitive price point that delivers exceptional value.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end hero -->

    <!-- start main -->
    <main role="main">
        <!-- Common styles
        ================================================== -->
        <link rel="stylesheet" href="{{ asset('front') }}/css/style.min.css" type="text/css">

        <!-- Load lazyLoad scripts
        ================================================== -->
        <script>
            (function(w, d) {
                var m = d.getElementsByTagName('main')[0],
                    s = d.createElement("script"),
                    v = !("IntersectionObserver" in w) ? "8.17.0" : "10.19.0",
                    o = {
                        elements_selector: ".lazy",
                        data_src: 'src',
                        data_srcset: 'srcset',
                        threshold: 500,
                        callback_enter: function(element) {

                        },
                        callback_load: function(element) {
                            element.removeAttribute('data-src')

                            oTimeout = setTimeout(function() {
                                clearTimeout(oTimeout);

                                AOS.refresh();
                            }, 1000);
                        },
                        callback_set: function(element) {

                        },
                        callback_error: function(element) {
                            element.src =
                                "https://placeholdit.imgix.net/~text?txtsize=21&txt=Image%20not%20load&w=200&h=200";
                        }
                    };
                s.type = 'text/javascript';
                s.async =
                true; // This includes the script as async. See the "recipes" section for more information about async loading of LazyLoad.
                s.src = "https://cdn.jsdelivr.net/npm/vanilla-lazyload@" + v + "/dist/lazyload.min.js";
                m.appendChild(s);
                // m.insertBefore(s, m.firstChild);
                w.lazyLoadOptions = o;
            }(window, document));
        </script>

        <!-- start section -->
        <section class="section section--no-pb section--custom-01">
            <div class="container">
                <div class="section-heading">
                    <h2 class="__title">We are <span>IoT solutions providers</span><br> for<span> agricultural applications</span></h2>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-8">


                        <p>
                            Our Control unit for agriculture systems helps medium farmers better take advantage of resources
                            such as workers, fertilizers, and water. Moreover, it provides remote control to their systems
                            by having a flexible brain taking the right decisions with iot and AI for a high-quality plant.
                            That means owning an affordable control unit with user-friendly interface unlike industrial PLCs
                            or typical controlling companies.
                        </p>

                        <p>
                            At AgriMecha, we have 70% local components as an alternative to imported ones. We provide
                            control units and periodic monitoring via the Internet of Things (IoT), which offers farms with
                            real-time control and monitoring of irrigation, fertilization, and ventilation systems (in the
                            case of greenhouses), while providing improvement reports using developed artificial
                            intelligence reports to identify problems in the system and suggest appropriate solutions. Thus,
                            we control the factors affecting the plant, which leads to high quality and quantity appropriate
                            to the need.
                        </p>

                        <p>
                            Our team at AgriMecha comprises individuals with diverse backgrounds, including corporate
                            experience gained through internships, part-time roles, and volunteer work. United by a common
                            goal of transforming the agriculture sector in Egypt, we collaborate in passion to develop
                            innovative solutions. Our collective expertise and commitment drive us to create an impact and
                            drive positive change in the industry.
                        </p>

                        <p>
                            <a class="custom-btn custom-btn--medium custom-btn--style-1" href="{{ route('front.contact') }}">Get in Touch</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="section">
            <div class="container">
                <!-- start counters -->
                <div class="counter">
                    <div class="__inner">
                        <div class="row justify-content-sm-center">
                            <!-- start item -->
                            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-3">
                                <div class="__item" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="150">
                                    <div class="d-table">
                                        <div class="d-table-cell align-middle">
                                            <i class="__ico">
                                                <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                                    data-src="{{ asset('front') }}/img/ico/units.png" alt="demo" />
                                            </i>
                                        </div>
                                        <div class="d-table-cell align-middle">
                                            <p class="__count1 js-count" data-from="0" data-to="0">19 500</p>
                                            <p class="__title">Units</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->
                            <!-- start item -->
                            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-3">
                                <div class="__item" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="150">
                                    <div class="d-table">
                                        <div class="d-table-cell align-middle">
                                            <i class="__ico">
                                                <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                                    data-src="{{ asset('front') }}/img/ico/arces.png" alt="demo" />
                                            </i>
                                        </div>
                                        <div class="d-table-cell align-middle">
                                            <p class="__count1 js-count" data-from="0" data-to="0">19 500</p>
                                            <p class="__title">Acres covered</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->
                            <!-- start item -->
                            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-3">
                                <div class="__item" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="150">
                                    <div class="d-table">
                                        <div class="d-table-cell align-middle">
                                            <i class="__ico">
                                                <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                                    data-src="{{ asset('front') }}/img/ico/farm.png" alt="demo" />
                                            </i>
                                        </div>
                                        <div class="d-table-cell align-middle">
                                            <p class="__count1 js-count" data-from="0" data-to="0">19 500</p>
                                            <p class="__title">Farms</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->
                            <!-- start item -->
                            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-3">
                                <div class="__item" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="300">
                                    <div class="d-table">
                                        <div class="d-table-cell align-middle">
                                            <i class="__ico">
                                                <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                                    data-src="{{ asset('front') }}/img/ico/time-left.png" alt="demo" />
                                            </i>
                                        </div>
                                        <div class="d-table-cell align-middle">
                                            <p class="__count1 js-count" data-from="0" data-to="0">2 720</p>
                                            <p class="__title">Working Hours</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->
                            <!-- start item -->
                            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-3">
                                <div class="__item" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="300">
                                    <div class="d-table">
                                        <div class="d-table-cell align-middle">
                                            <i class="__ico">
                                                <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                                    data-src="{{ asset('front') }}/img/ico/save-water.png"
                                                    alt="demo" />
                                            </i>
                                        </div>
                                        <div class="d-table-cell align-middle">
                                            <p class="__count1 js-count" data-from="0" data-to="0">2 720</p>
                                            <p class="__title">Water saved in liters</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->
                            <!-- start item -->
                            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-3">
                                <div class="__item" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="300">
                                    <div class="d-table">
                                        <div class="d-table-cell align-middle">
                                            <i class="__ico">
                                                <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                                    data-src="{{ asset('front') }}/img/ico/fertilizer.png"
                                                    alt="demo" />
                                            </i>
                                        </div>
                                        <div class="d-table-cell align-middle">
                                            <p class="__count1 js-count" data-from="0" data-to="0">2 720</p>
                                            <p class="__title">Fertilizers saved in Kg</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->
                        </div>
                    </div>
                </div>
                <!-- end counters -->
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="section section--gutter section--base-bg section--custom-02">
            <div class="container">
                <div class="section-heading" data-aos="fade">
                    <h2 class="__TimeLinetitle">The Openfield <span>Timeline</span></h2>
                </div>

                <!-- start timeline -->
                <div class="timeline">
                    <div class="__inner">
                        <div class="row">
                            <!-- start item -->
                            <div class="col-12 col-md-3">
                                <div class="__item">
                                    <i class="__ico"></i>

                                    <div class="row">
                                        <div class="col-lg-11 col-xl-9">
                                            <p class="__year">1907</p>

                                            <h5 class="__title">Smells Racy Free Announcing</h5>

                                            <p>
                                                Vast a real proven works discount secure care. Market invigorate a awesome
                                                handcrafted bigger comes
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- start item -->
                            <div class="col-12 col-md-3">
                                <div class="__item">
                                    <i class="__ico"></i>

                                    <div class="row">
                                        <div class="col-lg-11 col-xl-9">
                                            <p class="__year">1996</p>

                                            <h5 class="__title">Grainfarmers <br> Formed</h5>

                                            <p>
                                                Vast a real proven works discount secure care. Market invigorate a awesome
                                                handcrafted bigger comes
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- start item -->
                            <div class="col-12 col-md-3">
                                <div class="__item">
                                    <i class="__ico"></i>

                                    <div class="row">
                                        <div class="col-lg-11 col-xl-9">
                                            <p class="__year">2000</p>

                                            <h5 class="__title">Group Cereals and Lingrain Merge</h5>

                                            <p>
                                                Vast a real proven works discount secure care. Market invigorate a awesome
                                                handcrafted bigger comes
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- start item -->
                            <div class="col-12 col-md-3">
                                <div class="__item">
                                    <i class="__ico"></i>

                                    <div class="row">
                                        <div class="col-lg-11 col-xl-9">
                                            <p class="__year">2017</p>

                                            <h5 class="__title">Aquired Countrywide Farmers</h5>

                                            <p>
                                                Vast a real proven works discount secure care. Market invigorate a awesome
                                                handcrafted bigger comes
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->
                        </div>
                    </div>
                </div>
                <!-- end timeline -->
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="section section--no-pb ">
            <div class="container">
                <div class="section-heading section-heading--center" data-aos="fade">
                    <h2 class="__title">our team</h2>


                </div>

                <!-- start team -->
                <div class="team">
                    <div class="__inner">
                        <div class="row">
                            <!-- start item -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="__item" data-aos="fade" data-aos-delay="200" data-aos-offset="0">
                                    <figure class="__image">
                                        <img class="lazy" src="{{ asset('front') }}/img/blank.gif"
                                            data-src="{{ asset('front') }}/img/team_img/Abdulrhaman.jpg"
                                            alt="demo" />
                                    </figure>

                                    <div class="__content">
                                        <h5 class="__title">Abdulrhaman Elfeky</h5>

                                        <span>Operation & Technical</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- start item -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="__item" data-aos="fade" data-aos-delay="300" data-aos-offset="0">
                                    <figure class="__image">
                                        <img class="lazy" src="{{ asset('front') }}/img/blank.gif"
                                            data-src="{{ asset('front') }}/img/team_img/Sara.jpg" alt="demo" />
                                    </figure>

                                    <div class="__content">
                                        <h5 class="__title">Sara Elrefaey</h5>

                                        <span>Marketing & Communications</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- start item -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="__item" data-aos="fade" data-aos-delay="400" data-aos-offset="0">
                                    <figure class="__image">
                                        <img class="lazy" src="{{ asset('front') }}/img/blank.gif"
                                            data-src="{{ asset('front') }}/img/team_img/mahmoud.jpg" alt="demo" />
                                    </figure>

                                    <div class="__content">
                                        <h5 class="__title">Mahmoud Wageh</h5>

                                        <span>Business Development</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- start item -->
                            {{-- <div class="col-12 col-md-6 col-lg-4">
                                <div class="__item" data-aos="fade" data-aos-delay="500" data-aos-offset="0">
                                    <figure class="__image">
                                        <img class="lazy" src="{{ asset('front') }}/img/blank.gif"
                                            data-src="{{ asset('front') }}/img/team_img/5.jpg" alt="demo" />
                                    </figure>

                                    <div class="__content">
                                        <h5 class="__title">Billi Moorer</h5>

                                        <span>Assistant</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end item -->

                            <!-- start item -->
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="__item" data-aos="fade" data-aos-delay="600" data-aos-offset="0">
                                    <figure class="__image">
                                        <img class="lazy" src="{{ asset('front') }}/img/blank.gif"
                                            data-src="{{ asset('front') }}/img/team_img/6.jpg" alt="demo" />
                                    </figure>

                                    <div class="__content">
                                        <h5 class="__title">Allan Bolt</h5>

                                        <span>Farmer</span>
                                    </div>
                                </div>
                            </div>
                            <!-- end item --> --}}
                        </div>
                    </div>
                </div>
                <!-- end team -->
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="section">
            <div class="container">
                <div class="section-heading section-heading--center" data-aos="fade">
                    <h2 class="__title">Partners</h2>
                </div>

                <div class="partners-list">
                    <div class="js-slick"
                        data-slick='{
								 "autoplay": true,
								 "arrows": false,
								 "dots": true,
								 "speed": 1000,
								 "responsive": [
									{
										"breakpoint":576,
										"settings":{
											"slidesToShow": 2
										}
									},
									{
										"breakpoint":767,
										"settings":{
											"slidesToShow": 3
										}
									},
									{
										"breakpoint":991,
										"settings":{
											"slidesToShow": 4
										}
									},
									{
										"breakpoint":1199,
										"settings":{
											"autoplay": false,
											"dots": false,
											"slidesToShow": 5
										}
									}
								]}'>
                                <div class="__item">
                                    <img class="img-fluid m-auto"
                                        src="{{ asset('front') }}/img/partners_img/Horizontal_RGB_294_0.png" alt="demo" />
                                </div>

                                <div class="__item">
                                    <img class="img-fluid m-auto" src="{{ asset('front') }}/img/partners_img/images.png"
                                        alt="demo" />
                                </div>



                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->



    </main>
    <!-- end main -->
@endsection
