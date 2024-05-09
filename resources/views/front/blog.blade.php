@extends('front.layouts.app')
@section('content')
    <!-- start hero -->
    <div id="hero" class="jarallax" data-speed="0.7" data-img-position="50% 80%"
        style="background-image: url({{ asset('front') }}/img/loren-gu-IG1EdbuYCy8-unsplash.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-7">
                    <h1 class="__title"><span>Our</span> Blog</h1>

                    <p>
                        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
                        opposed to using 'Content here, content here', making it look like readable English
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
        <section class="section">
            <div class="container">
                <!-- start posts -->
                <div class="posts posts--style-1">
                    <div class="__inner">
                        <div class="row">
                            @if ($Blogs)
                                @foreach ($Blogs as $blog)
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="__item __item--preview">
                                            <figure class="__image">
                                                <img class="lazy" src="{{ asset('front') }}/img/blog_imgs/1.jpg"
                                                    data-src="{{ asset('front/img/blog_imgs/') }}/{{ $blog->image }}" alt="demo" />
                                                    <a href="{{route('front.singlepost',['post' => $blog->id])}}">
                                            </figure>

                                            <div class="__content">

                                                <h3 class="__title h5"><a href="{{route('front.singlepost',['post' => $blog->id])}}">{{ $blog->title }}</a>
                                                </h3>

                                                <p>
                                                    <a href="{{route('front.singlepost',['post' => $blog->id])}}">  {{ $blog->subtitle }} </p>
                                            </div>

                                            <span class="__date-post">
                                                <strong>{{$blog->created_at->format('d')}}</strong>{{$blog->created_at->format('M')}}
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- start item -->

                            <!-- end item -->


                        </div>
                    </div>
                </div>
                <!-- end posts -->
            </div>
        </section>
        <!-- end section -->




    </main>
    <!-- end main -->
@endsection
