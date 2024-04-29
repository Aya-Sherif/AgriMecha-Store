@extends('front.layouts.app')
@section('content')
    <!-- start hero -->
    <style>
        #hero {
            background-image: url({{ asset('front') }}/img/blog_imgs/{{$post->image}});
            background-size: cover; /* Adjust the background image size to cover the entire container */
            background-position: center; /* Center the background image within the container */
            height: 400px; /* Set the desired height for the hero section */
            margin-bottom: 40px; /* Add space between hero section and content */
            padding-top: 100px; /* Adjust top padding for content alignment */
        }
        #hero .__title {
            color: #fff; /* Adjust text color for better contrast */
        }
        #hero p {
            color: #fff; /* Adjust text color for better contrast */
        }
        main {
            padding-bottom: 60px; /* Add space between content and footer */
        }
        .content-key {
            font-size: 2rem; /* Adjust font size for content keys */
        }
    </style>
    <div id="hero" class="jarallax">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h1 class="__title">{{$post->title}}</h1>
                    <p>{{$post->subtitle}}</p>
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
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-8">
                        @php
                            $contentArray = json_decode($post->content, true);
                        @endphp
                        @foreach($contentArray as $key => $value)
                            <h2 class="content-key">{{ $key }}</h3>
                            <p>{{ $value }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
    </main>
    <!-- end main -->
@endsection
