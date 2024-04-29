@extends('front.layouts.app')
@section('content')
<div id="hero" class="jarallax" data-speed="0.7" data-img-position="50% 40%" style="background-image: url({{asset('front')}}/img/intro_img/10.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <h1 class="__title"><span>vegetables</span> product case</h1>

                <p>
                    The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English
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
    <link rel="stylesheet" href="{{asset('front')}}/css/style.min.css" type="text/css">

    <!-- Load lazyLoad scripts
    ================================================== -->
    <script>
        (function(w, d){
            var m = d.getElementsByTagName('main')[0],
                s = d.createElement("script"),
                v = !("IntersectionObserver" in w) ? "8.17.0" : "10.19.0",
                o = {
                    elements_selector: ".lazy",
                    data_src: 'src',
                    data_srcset: 'srcset',
                    threshold: 500,
                    callback_enter: function (element) {

                    },
                    callback_load: function (element) {
                        element.removeAttribute('data-src')

                        oTimeout = setTimeout(function ()
                        {
                            clearTimeout(oTimeout);

                            AOS.refresh();
                        }, 1000);
                    },
                    callback_set: function (element) {

                    },
                    callback_error: function(element) {
                        element.src = "https://placeholdit.imgix.net/~text?txtsize=21&txt=Image%20not%20load&w=200&h=200";
                    }
                };
            s.type = 'text/javascript';
            s.async = true; // This includes the script as async. See the "recipes" section for more information about async loading of LazyLoad.
            s.src = "https://cdn.jsdelivr.net/npm/vanilla-lazyload@" + v + "/dist/lazyload.min.js";
            m.appendChild(s);
            // m.insertBefore(s, m.firstChild);
            w.lazyLoadOptions = o;
        }(window, document));
    </script>

    <!-- start section -->
    <section class="section section--gray-bg">
        <div class="container">
            <div class="simple-text-block">
                <div class="row justify-content-lg-center row--lg-middle">
                    <div class="col-lg-10">

                        <h2>About <span>Bolgarian Tomatos</span></h2>

                        <div class="row justify-content-lg-between no-gutters">
                            <div class="col-12 col-lg-6">
                                <p>
                                    Our team has a passion for making things with real value. This has led us to assemble a multi-talented group that can do just about anything: from building sets to photographing food, crafting websites to developing apps, beautiful design to adventure cinematography. Designers, engineers, creatives, makers, developers, artists, unite. <br> We believe in helping brands create through strategy, <a href="#">story-telling, digital products</a>, and integrated experiences on web, mobile, and in the world. friends, because you also believe.
                                </p>

                                <p>
                                    Our team has a passion for making things with real value. This has led us to assemble a multi-talented group that can do just about anything: from building sets to photographing food, crafting websites.
                                </p>

                                <p>
                                    Stimulates vast a real proven works discount secure care. Market invigorate a awesome handcrafted bigger comes newer recommended lifetime.Evulates vast a real proven works discount secure care. Market invigorate a awesome handcrafted bigger comes newer recommended lifetime. Odor to yummy high racy.
                                </p>
                            </div>

                            <div class="col-12 my-3 d-lg-none"></div>

                            <div class="col-12 col-lg-5">
                                <img class="img-fluid  lazy" src="{{asset('front')}}/img/blank.gif" data-src="{{asset('front')}}/img/img_4.jpg" alt="demo" />
                            </div>
                        </div>

                        <div class="product-description">
                            <div class="my-5">
                                <div class="__title">CULTURE</div>
                                <div class="__name">BOLGARIAN TOMATOS</div>
                            </div>

                            <div class="__details">
                                <div class="__details__inner">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto">
                                            <div class="__details__item">
                                                <span class="__num">3500</span>
                                                <div class="__title">THE NUMBER OF HECTARES</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-auto">
                                            <div class="__details__item">
                                                <span class="__num">236</span>
                                                <div class="__title">AMOUNT OF WORKERS</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-auto">
                                            <div class="__details__item">
                                                <span class="__num">33 800</span>
                                                <div class="__title"> COLLECTED TONS</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- start section -->
    <section class="section">
        <div class="container-fluid">
            <div class="product-features">
                <!-- start item -->
                <div class="__item">
                    <div class="__inner">
                        <div class="row justify-content-sm-center">
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="__content">
                                    <h3 class="__title">BETTER <span>THAN ORGANIC</span></h3>

                                    <div>
                                        <p>
                                            Evulates vast a real proven works discount secure care. Market invigorate a awesome handcrafted bigger comes newer recommended lifetime. Odor to yummy high racy bonus soaking mouthwatering. First superior full-bodied drink. Like outstanding odor economical deal clinically. Odor to yummy high racy bonus soaking mouthwatering. First superior full-bodied drink. Like outstanding odor economical deal clinically feel durable. Lather each real. Quite one fresh.
                                        </p>

                                        <p>
                                            Delectable absorbent ordinary full-bodied out durable whopping value when. Coming supreme tropical dual locked-in sharpest effervescent zesty bigger. Opportunity and affordable clinically. Ordinary whenever appearance first first unlimited compact.
                                        </p>

                                        <p>
                                            Effervescent pleasing touch vinyl choice. This artificial world's exotic. Survey is and. Delicious magically great product fat-free remarkable gigantic mild too herbal families creamy. Pay limited generous lasting millions sensible hurry pennies is out why sensible.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="__image">
                                    <img class="img-fluid lazy" src="{{asset('front')}}/img/blank.gif" data-src="{{asset('front')}}/img/product-features_img/1.jpg" alt="demo"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end item -->

                <!-- start item -->
                <div class="__item">
                    <div class="__inner">
                        <div class="row justify-content-sm-center">
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="__content">
                                    <h3 class="__title">NO <span>PESTICIDES</span></h3>

                                    <div>
                                        <p>
                                            We believe in helping brands create through strategy, story-telling, <a href="#">digital products</a>, and integrated experiences on web, mobile, and in the world. And you're here, friends, because you also believe.
                                        </p>

                                        <ol>
                                            <li>Enim congue blandit lorem ipsum dolor sit amet.</li>
                                            <li>Interdum finibus. Vestibulum ante ipsum primis.</li>
                                            <li>Posuere cubilia cras blandit porttitor arcu volutp.</li>
                                            <li>Vel tempus sapien. Vivamus aliquam euismod.</li>
                                        </ol>

                                        <p>
                                            Our team has a passion for making things with real value. This has led us to assemble a multi-talented group that can do just about anything: from building sets to photographing food, crafting websites to developing apps, beautiful design to adventure cinematography. Designers, engineers, creatives, makers, developers, artists, unite. Let’s do something real-special together.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="__image">
                                    <img class="img-fluid lazy" src="{{asset('front')}}/img/blank.gif" data-src="{{asset('front')}}/img/product-features_img/2.jpg" alt="demo"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end item -->

                <!-- start item -->
                <div class="__item">
                    <div class="__inner">
                        <div class="row justify-content-sm-center">
                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="__content">
                                    <h3 class="__title">feel good <span>about eating</span></h3>

                                    <div>
                                        <p>
                                            Evulates vast a real proven works discount secure care. Market invigorate a awesome handcrafted bigger comes newer recommended lifetime. Odor to yummy high racy bonus soaking mouthwatering. First superior full-bodied drink. Like outstanding odor economical deal clinically. Odor to yummy high racy bonus soaking mouthwatering. First superior full-bodied drink. Like outstanding odor economical deal clinically feel durable. Lather each real. Quite one fresh.
                                        </p>

                                        <p>
                                            Delectable absorbent ordinary full-bodied out durable whopping value when. Coming supreme tropical dual locked-in sharpest effervescent zesty bigger. Opportunity and affordable clinically. Ordinary whenever appearance first first unlimited compact.
                                        </p>

                                        <p>
                                            Effervescent pleasing touch vinyl choice. This artificial world's exotic. Survey is and. Delicious magically great product fat-free remarkable gigantic mild too herbal families creamy. Pay limited generous lasting millions sensible hurry pennies is out why sensible.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-9 col-lg-6">
                                <div class="__image">
                                    <img class="img-fluid lazy" src="{{asset('front')}}/img/blank.gif" data-src="{{asset('front')}}/img/product-features_img/3.jpg" alt="demo"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end item -->
            </div>
        </div>
    </section>
    <!-- end section -->

   
    <!-- end section -->

    <!-- start section -->

    <!-- end section -->
</main>

@endsection


