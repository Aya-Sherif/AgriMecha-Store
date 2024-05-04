@extends('front.layouts.shop')
@section('shopcontent')
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
                <h1 style="color: black;"><span>AGRIMECHA Shop </span><strong style="font-weight: bold;">Catalog</strong></h1>
                <br>
                <!-- start goods catalog -->
                <div class="goods-catalog">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-3">
                            <aside class="sidebar goods-filter">
                                <span class="goods-filter-btn-close js-toggle-filter"><i class="fontello-cancel"></i></span>

                                {{-- <div class="goods-filter__inner">
                                    <!-- start widget -->
                                    <div class="widget widget--search">
                                        <form class="form--horizontal" action="#" method="get">
                                            <div class="input-wrp">
                                                <input class="textfield" name="s" type="text"
                                                    placeholder="Search" />
                                            </div>

                                            <button class="custom-btn custom-btn--tiny custom-btn--style-1" type="submit"
                                                role="button">Find</button>
                                        </form>
                                    </div>
                                    <!-- end widget -->

                                    <!-- start widget -->
                                    <div class="widget widget--categories">
                                        <h4 class="h6 widget-title">Categories</h4>

                                        <ul class="list">
                                            @foreach ($categories as $category)
                                                <li class="list__item">
                                                    <a class="list__item__link" href="#">{{ $category->name }}</a>
                                                    <span>(3)</span>
                                                </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                    <!-- end widget -->

                                    <!-- start widget -->
                                    <div class="widget widget--price">
                                        <h4 class="h6 widget-title">Price</h4>

                                        <div>
                                            <input type="text" class="js-range-slider" name="my_range" value=""
                                                data-type="double" data-min="0" data-max="500" data-from="48"
                                                data-to="365" data-grid="false" data-skin="round" data-prefix="$"
                                                data-hide-from-to="true" data-hide-min-max="true" />

                                            <div class="row">
                                                <div class="col-6">
                                                    <input class="range-slider-min-value" type="text" value="48"
                                                        name="min-value" readonly="readonly">
                                                </div>

                                                <div class="col-6">
                                                    <input class="range-slider-max-value" type="text" value="365"
                                                        name="max-value" readonly="readonly">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end widget -->
                                    <!-- start widget -->
                                    <div class="widget">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col">
                                                <button class="custom-btn custom-btn--medium custom-btn--style-1"
                                                    role="button">Show Products</button>
                                            </div>

                                            <div class="col-auto">
                                                <a class="clear-filter" href="#">Clear all</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end widget -->

                                    <!-- end widget -->
                                </div> --}}
                            </aside>
                        </div>

                        <div class="col-12 col-md-8 col-lg-9">
                            <div class="spacer py-6 d-md-none"></div>

                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto">
                                    <span class="goods-filter-btn-open js-toggle-filter"><i
                                            class="fontello-filter"></i>Filter</span>
                                </div>

                                {{-- <div class="col-auto">
                                    <!-- start ordering -->
                                    <form class="ordering" action="#">
                                        <div class="input-wrp">
                                            <select class="textfield wide js-select">
                                                <option value="1">Default Sorting</option>
                                                <option value="2">Price. low to high</option>
                                                <option value="3">Price. high to low</option>
                                                <option value="3">Sort by latest</option>
                                            </select>
                                        </div>
                                    </form>
                                    <!-- end ordering -->
                                </div> --}}
                            </div>

                            <div class="spacer py-3"></div>



                            <!-- start goods -->
                            <!-- start goods -->
                            <div class="goods goods--style-1">
                                <div class="__inner">
                                    <div class="row">
                                        @foreach ($models as $model)
                                            <!-- start item -->
                                            <div class="col-12 col-sm-6 col-lg-4">
                                                <!-- Product item -->
                                                <div class="__item">
                                                    <!-- Product image -->
                                                    <figure class="__image">
                                                        <!-- Lazy-loaded image -->
                                                        <img class="lazy" width="188"
                                                            src="{{ asset('front/img/products_img') }}/{{ $model->image }}"
                                                            data-src="{{ asset('front/img/products_img') }}/{{ $model->image }}"
                                                            alt="demo" />
                                                    </figure>

                                                    <!-- Product content -->
                                                    <div class="__content">
                                                        <!-- Product title -->
                                                        <h4 class="h6 __title"><a
                                                                href="{{ route('front.singleproduct', ['product' => $model->id]) }}
                                                                ">{{ $model->productname }}</a>
                                                        </h4>

                                                        <!-- Product categories -->
                                                        <div class="__category">
                                                            @if ($model->category != null)
                                                                <a
                                                                    href="{{ route('front.singleproduct', ['product' => $model->id]) }}">
                                                                    {{ $model->category->name }}
                                                                </a>
                                                            @endif

                                                        </div>

                                                        <!-- Product price -->
                                                        <div class="product-price">
                                                            <span
                                                                class="product-price__item product-price__item--new">{{ $model->price }}
                                                                E£</span>
                                                        </div>

                                                        <!-- Add to cart button -->
                                                        @if ($model->quantity == 0)
                                                            <button
                                                                class="custom-btn custom-btn--medium custom-btn--style-6 add-to-cart-btn"
                                                                data-product-id="{{ $model->id }}" disabled><i
                                                                    class="fontello-shopping-bag"></i>Out Of Stock</button>
                                                        @else
                                                            <button
                                                                class="custom-btn custom-btn--medium custom-btn--style-1 add-to-cart-btn"
                                                                data-product-id="{{ $model->id }}"><i
                                                                    class="fontello-shopping-bag"></i>Add to cart</button>
                                                        @endif
                                                    </div>

                                                    <!-- Sale label (if applicable) -->
                                                    @if ($model->discount != 0)
                                                        <span class="product-label product-label--sale">Sale</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- end item -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <!-- Listen for click events on Add to Cart buttons -->
                            @include('front.styles.addtocartscript')



                            <!-- end goods -->
                        </div>
                    </div>
                </div>
                <!-- end goods -->

                <div class="spacer py-5"></div>


            </div>
            </div>
            </div>
            <!-- end goods catalog -->

            </div>
        </section>
        <!-- end section -->
    </main>
    <!-- end main -->
@endsection
