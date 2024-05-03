@extends('front.layouts.shop')
@section('shopcontent')
    <!-- start hero -->

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
                <div class="row">
                    <div class="col-12">

                        <!-- start cart -->
                        <div class="cart">
                            <form class="cart__form" action="#">
                                <div class="cart__table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td width="15%">Order ID</td>
                                                <td width="45%">Products</td>
                                                <td width="10%">Date</td>
                                                <td width="15%">State</td>
                                                <td width="15%">&nbsp;</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)

                                            <tr>


                                                <td>
                                                 {{5000+$order['id']}}
                                                </td>



                                                    <td>

                                                        @foreach ($order->orderDetails as $detail)
                                                        <li>{{ $detail->product_name }} - <strong>Quantity:</strong>
                                                            {{ $detail->quantity }}</li>
                                                        <!-- Access other order detail attributes as needed -->
                                                    @endforeach

                                                    </td>
                                                    <td>
                                                        <span>{{$order['updated_at']->format('d/m/Y')}} </span>
                                                    </td>
                                                    <td>
                                                        <span >{{$order['state']}} </span>
                                                    </td>

                                                <td>
                                                    <form action="{{ route('front.cancelorder', $order['id']) }}" method="post" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                                        @csrf
                                                        @method('post')
                                                        @if($order['state']=='waited')
                                                        <button class="custom-btn custom-btn--small custom-btn--style-7" >Cancel Order</button>


                                                        @endif
                                                    </form>

                                                </td>

                                            </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>

                                <div class="py-5"></div>

                                <div class="row justify-content-md-between">
                                    <div class="col-12 col-md-6">



                                    </div>

                                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                                        <div class="spacer py-5 d-md-none"></div>


                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- start cart -->

                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- end main -->

    <!-- start footer -->

@endsection
