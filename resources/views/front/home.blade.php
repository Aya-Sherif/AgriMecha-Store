@extends('front.layouts.app')
@section('content')
    @include('front.styles.homestyles')

    <!-- start section -->
    <section class="section">
        <div class="container">
            <div class="section-heading section-heading--center" data-aos="fade">
                <h2 class="__title">Our <span>services</span></h2>

            </div>

            <!-- start feature -->
            <div class="feature feature--style-1">
                <div class="__inner">
                    <div class="row justify-content-center"> <!-- Added justify-content-center here -->


                        <!-- start item -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="__item  text-center" data-aos="fade" data-aos-delay="200" data-aos-offset="100">
                                <i class="__ico">
                                    <img class="img-fluid  lazy" src="{{ asset('front') }}/img/blank.gif"
                                        data-src="{{ asset('front') }}/img/feature_img/irrigation.png" alt="demo" />
                                </i>

                                <h5 class="__title">Irrigation controllers </h5>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="__item  text-center" data-aos="fade" data-aos-delay="300" data-aos-offset="100">
                                <i class="__ico">
                                    <img class="img-fluid  lazy" src="{{ asset('front') }}/img/blank.gif"
                                        data-src="{{ asset('front') }}/img/feature_img/ph.png" alt="demo" />
                                </i>

                                <h5 class="__title">Water ph Actuators</h5>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="__item  text-center" data-aos="fade" data-aos-delay="400" data-aos-offset="100">
                                <i class="__ico">
                                    <img class="img-fluid  lazy" src="{{ asset('front') }}/img/blank.gif"
                                        data-src="{{ asset('front') }}/img/feature_img/greenhouse.png" alt="demo" />
                                </i>

                                <h5 class="__title">Greenhouses management</h5>
                            </div>
                        </div>
                        <!-- end item -->

                        <!-- start item -->
                        <div class="col-6 col-sm-4 col-lg-2">
                            <div class="__item  text-center" data-aos="fade" data-aos-delay="500" data-aos-offset="100">
                                <i class="__ico">
                                    <img class="img-fluid  lazy" src="{{ asset('front') }}/img/blank.gif"
                                        data-src="{{ asset('front') }}/img/feature_img/hydroponic-gardening.png"
                                        alt="demo" />
                                </i>

                                <h5 class="__title">Hydroponic controllers</h5>
                            </div>
                        </div>
                        <!-- end item -->


                    </div>
                </div>
            </div>
            <!-- end feature -->

        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section section--no-pt section--no-pb">
        <div class="container">
            <div class="special-offer special-offer--style-1" data-aos="zoom-in" data-aos-duration="600"
                data-aos-offset="70">
                <h2 class="text text-center lazy" data-src="{{ asset('front') }}/img/WhatsApp Image 2024-05-09 at 11.10.37 PM (2).jpeg">
                    Special products for most farmers</h2>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section">


        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4">
                    <div data-aos="fade-left" data-aos-delay="400" data-aos-duration="500" ddata-aos-offset="100">
                        <div class="section-heading">
                            <h2 class="__title">About AgriMecha </h2>
                        </div>

                        <p class="d-none d-sm-block">
                            <a class="custom-btn custom-btn--medium custom-btn--style-1"
                                href="{{ route('front.about') }}">More about</a>
                        </p>
                    </div>
                </div>

                <div class="col-12 my-3 d-lg-none"></div>

                <div class="col-12 col-lg-4 text-center">
                    <div data-aos="fade-up" data-aos-duration="600" data-aos-offset="100">
                        <div style="width: 300px; height: 300px; overflow: hidden; ">
                            <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                data-src="{{ asset('front') }}/img/AgriMecha_Logo.png" alt="demo" />
                        </div>
                    </div>
                </div>


                <div class="col-12 my-3 d-lg-none"></div>

                <div class="col-12 col-lg-4">
                    <div data-aos="fade-right" data-aos-delay="400" data-aos-duration="500" ddata-aos-offset="100">
                        <p>
                            AgriMecha revolutionizes agriculture for medium farmers with our cutting-edge Control Unit. Harnessing the power of IoT and AI, our affordable system optimizes resource utilization like workers, fertilizers, and water, ensuring high-quality plant growth. With 70% local components, we offer real-time monitoring and control, empowering farmers to manage irrigation, fertilization, and ventilation efficiently. Our diverse team is dedicated to transforming Egypt's agriculture sector, driven by innovation and a passion for positive change.
                        </p>



                        <p class="d-sm-none">
                            <a class="custom-btn custom-btn--medium custom-btn--style-1" href="#">More about</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section section--gutter section--base-bg">
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
                                        <p class="__count js-count" data-from="0" data-to="1">19 500</p>
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
                                        <p class="__count js-count" data-from="0" data-to="0">19 500</p>
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
                                        <p class="__count js-count" data-from="0" data-to="0">19 500</p>
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
                                        <p class="__count js-count" data-from="0" data-to="0">2 720</p>
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
                                                data-src="{{ asset('front') }}/img/ico/save-water.png" alt="demo" />
                                        </i>
                                    </div>
                                    <div class="d-table-cell align-middle">
                                        <p class="__count js-count" data-from="0" data-to="0">2 720</p>
                                        <p class="__title">Water saved in liters</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end item -->
                        <!-- start item -->
                        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-3">
                            <div class="__item" data-aos="zoom-in" data-aos-duration="350" data-aos-delay="0">
                                <div class="d-table">
                                    <div class="d-table-cell align-middle">
                                        <i class="__ico">
                                            <img class="img-fluid lazy" src="{{ asset('front') }}/img/blank.gif"
                                                data-src="{{ asset('front') }}/img/ico/fertilizer.png" alt="demo" />
                                        </i>
                                    </div>
                                    <div class="d-table-cell align-middle">
                                        <p class="__count js-count" data-from="0" data-to="0">2 720</p>
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
    <section class="section section--review  lazy" data-src="{{ asset('front') }}/img/review_bg_1.png">
        <div class="container">
            <div class="section-heading section-heading--center" data-aos="fade">
                <h3 class="__title">People says <span>about agrimecha</span></h3>
            </div>

            <!-- start review -->
            <div class="review review--slider">
                <div class="js-slick" data-slick='{"autoplay": true, "arrows": false, "dots": true, "speed": 1000}'>
                    <!-- start item -->
                    <div class="review__item">
                        <div class="review__item__text">
                            <p>
                                <i>AgriMecha has participated in the USAID Social and Green Entrepreneurship (SGE) program
                                    in collaboration with the American University in Cairo, School of Business, Center for
                                    Entrepreneurship and Innovation (CEI), where the team showed exceptional entrepreneurial
                                    mindset and innovative ideas driven from their community. AgriMecha proposed a
                                    one-of-its-kind solution to the imminent water scarcity problem; AgriMecha won first
                                    place in the SGE Grand Challenge, and secured a 50,000 EGP seed fund to start their
                                    venture.</i>
                            </p>
                        </div>

                        <div class="review__item__author  d-table">
                            <div class="d-table-cell align-middle">
                                <div class="review__item__author-image">
                                    <img class="circled" src="{{ asset('front') }}/img/ava.png" alt="ava" />
                                </div>
                            </div>

                            <div class="d-table-cell align-middle">
                                <span class="review__item__author-name"><strong>Sara Elfiky</strong></span>
                                <span class="review__item__author-position">/ programs manager at CEI</span>
                            </div>
                        </div>
                    </div>
                    <!-- end item -->

                    <!-- start item -->
                    {{-- <div class="review__item">
                        <div class="review__item__text">
                            <p>
                                <i>Latin words, combined with a handful of model sentence structures, to generate Lorem
                                    Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free
                                    from repetition injected humour, or non-characteristic words etc. Contrary to
                                    popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                    classical Latin literature from 45 BC, making it over</i>
                            </p>

                            <p>
                                <i>Latin words, combined with a handful of model sentence structures, to generate Lorem
                                    Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free
                                    from repetition injected humour, or non-characteristic words etc. Contrary to
                                    popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                    classical Latin literature from 45 BC, making it over</i>
                            </p>
                        </div>

                        <div class="review__item__author  d-table">
                            <div class="d-table-cell align-middle">
                                <div class="review__item__author-image">
                                    <img class="circled" src="{{ asset('front') }}/img/ava.png" alt="ava" />
                                </div>
                            </div>

                            <div class="d-table-cell align-middle">
                                <span class="review__item__author-name"><strong>Terens Smith</strong></span>
                                <span class="review__item__author-position">/CEO AntalAgro</span>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end item -->
                </div>
            </div>
            <!-- start review -->
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    {{-- <section class="section section--no-pt section--no-pb section--gutter">
        <!-- start banner simple -->
        <div class="simple-banner simple-banner--style-1" data-aos="fade" data-aos-offset="50">

            <div class="__label d-none d-md-block">
                <div class="d-table m-auto h-100">
                    <div class="d-table-cell align-middle">
                        <span class="num-1">1</span>
                    </div>

                    <div class="d-table-cell align-middle">
                        <span class="num-2">50$</span>
                        <span>Kg</span>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="__inner">
                            <img class="img-fluid  lazy" src="{{ asset('front') }}/img/blank.gif"
                                data-src="{{ asset('front') }}/img/site_logo.png" alt="demo" />

                            <div class="row">
                                <div class="col-12 col-lg-7 col-xl-5">
                                    <div class="banner__text" data-aos="fade-left" data-delay="500">
                                        <h2 class="__title h1"><b style="display: block; color: #B6C11F;">Fresh
                                                Apples</b> <span>in Our Store</span></h2>

                                        <p>
                                            The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non-characteristic words etc.
                                        </p>

                                        <p>
                                            <a class="custom-btn custom-btn--medium custom-btn--style-1"
                                                href="#">Buy</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end banner simple -->
    </section> --}}
    <!-- end section -->

    <!-- start section -->
    <section class="section section--no-pb">
        <div class="container">
            <div class="section-heading section-heading--center" data-aos="fade">
                <h2 class="__title">Blog <span>Posts</span></h2>
            </div>

            <!-- start posts -->
            <div class="posts posts--style-1">
                <div class="__inner">
                    <div class="row">
                        <!-- start item -->
                        @foreach ($blogs as $blog)
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div class="__item __item--preview" data-aos="flip-up" data-aos-delay="100"
                                data-aos-offset="0">
                                <figure class="__image">
                                    <img class="lazy" src="{{ asset('front/img/blog_imgs/') }}/{{ $blog->image }}"
                                        data-src="{{ asset('front/img/blog_imgs/') }}/{{ $blog->image }}" alt="demo" />
                                </figure>

                                <div class="__content">


                                    <h3 class="__title h5"><a href="{{route('front.singlepost',['post' => $blog->id])}}">{{$blog->title}}</a></h3>

                                    <p>
                                       {{$blog->subtitle}}
                                    </p>

                                    <a class="custom-btn custom-btn--medium custom-btn--style-1"
                                        href="{{route('front.singlepost',['post' => $blog->id])}}">Read more</a>
                                </div>

                                <span class="__date-post">
                                    <strong>{{$blog->created_at->format('d')}}</strong>{{$blog->created_at->format('M')}}
                                </span>
                            </div>
                        </div>
                        @endforeach

                        <!-- end item -->

                    </div>
                </div>
            </div>
            <!-- end posts -->
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section">
        <div class="container">
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
