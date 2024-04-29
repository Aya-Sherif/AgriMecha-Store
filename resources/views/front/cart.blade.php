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
                                                <td width="10%">&nbsp;</td>
                                                <td width="35%">added products</td>
                                                <td width="15%">Price</td>
                                                <td width="20%">Quantity</td>
                                                <td width="15%">Total</td>
                                                <td width="5%">&nbsp;</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (session()->has('cart'))
                                                @foreach (session()->get('cart') as $key => $cartproduct)
                                                    <tr>
                                                        <td>
                                                            <figure class="__image">
                                                                <a href="#">
                                                                    <img class="lazy" src="{{asset('front/img/products_img') }}/{{$cartproduct['image']}}"
                                                                        data-src="{{asset('front/img/products_img') }}/{{$cartproduct['image']}}"
                                                                        alt="demo" />
                                                                </a>
                                                            </figure>

                                                        </td>

                                                        <td>
                                                            <a href="{{ route('front.singleproduct', ['product' => $key]) }}"
                                                                class="__name">{{ $cartproduct['product_name'] }}</a>
                                                        </td>

                                                        <td>
                                                            <span class="__price">{{ $cartproduct['price'] }} $</span>
                                                        </td>

                                                        <td>
                                                            <div class="quantity-counter"
                                                                data-product-id="{{ $key }}">
                                                                <span class="__btn __btn--minus"></span>
                                                                <input class="__q-input" type="text"
                                                                    value="{{ $cartproduct['quantity'] }}" />
                                                                <span class="__btn __btn--plus"></span>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <span class="__total"> {{ $cartproduct['totalprice'] }} $</span>
                                                        </td>

                                                        <td>
                                                            <a class="__remove" href="{{ route('front.removeItem', $key) }}"
                                                                aria-label="Remove this item"
                                                                data-productId="{{ $key }}">
                                                                <i class="fontello-cancel"></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>

                                    </table>
                                </div>
                                <script>
                                    document.querySelectorAll('.quantity-counter').forEach(function(input) {
                                        var productId = input.dataset.productId;
                                        var quantityInput = input.querySelector('.__q-input');
                                        var incrementButton = input.querySelector('.__btn--plus');
                                        var decrementButton = input.querySelector('.__btn--minus');
                                        var priceElement = input.closest('tr').querySelector('.__price'); // Assuming price is in the same row
                                        var totalElement = input.closest('tr').querySelector(
                                            '.__total'); // Assuming total price is in the same row
                                        if (quantityInput && incrementButton && decrementButton) { // Ensure all elements are found
                                            incrementButton.addEventListener('click', function() {
                                                var currentValue = parseInt(quantityInput.value);
                                                quantityInput.value = currentValue + 1; // Increment the value by 1
                                                updateCart(productId, quantityInput.value);
                                                updateTotalPrice(priceElement.textContent, quantityInput.value, totalElement);
                                            });

                                            decrementButton.addEventListener('click', function() {
                                                var currentValue = parseInt(quantityInput.value);
                                                if (currentValue > 1) {
                                                    quantityInput.value = currentValue - 1; // Decrement the value by 1
                                                    updateCart(productId, quantityInput.value);
                                                    updateTotalPrice(priceElement.textContent, quantityInput.value, totalElement);
                                                }
                                            });

                                            quantityInput.addEventListener('input', function(event) {
                                                var productId = input.dataset.productId;
                                                var quantity = parseInt(quantityInput.value);
                                                if (!isNaN(quantity) && quantity > 0) {
                                                    updateCart(productId, quantity);
                                                    updateTotalPrice(priceElement.textContent, quantityInput.value, totalElement);
                                                }
                                            });
                                        }
                                    });

                                    function updateTotalPrice(price, quantity, totalElement) {
                                        var totalPrice = parseFloat(price) * parseInt(quantity);
                                        totalElement.textContent = totalPrice.toFixed(2) + " $"; // Update the total price
                                    }


                                    // Function to update quantity in the session cart
                                    function updateCart(productId, quantity) {

                                        // Extract the CSRF token from the meta tag
                                        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                                        console.log("Updating cart with Product ID:", productId, "and Quantity:", quantity); // Log the data being sent

                                        fetch('{{ route('front.updateCart', ':productId') }}'.replace(':productId', productId), {
                                                method: 'POST',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                                                },
                                                body: JSON.stringify({
                                                    productId: productId,
                                                    quantity: quantity
                                                })
                                            })
                                            .then(function(response) {
                                                if (!response.ok) {
                                                    throw new Error('Failed to add product');
                                                }
                                                return response.json();
                                            })
                                            .then(function(data) {
                                                // Handle success response
                                                // For example, update the UI to reflect the changes
                                            })
                                            .catch(function(error) {
                                                console.error('There was a problem with the fetch operation:', error);
                                                alert('Failed to add product to cart');
                                            });
                                    }
                                </script>
                                <div class="py-5"></div>

                                <div class="row justify-content-md-between">
                                    <div class="col-12 col-md-6">



                                    </div>

                                    <div class="col-12 col-md-6 col-lg-5 col-xl-4">
                                        <div class="spacer py-5 d-md-none"></div>

                                        <div class="cart__total">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <td colspan="2">
                                                            <h3>CART <span>TOTALS</span></h3>
                                                        </td>
                                                    </tr>
                                                </thead>

                                                <tfoot>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a class="custom-btn custom-btn--medium custom-btn--style-1"
                                                                href="#">Proceed to checkout</a>
                                                        </td>
                                                    </tr>
                                                </tfoot>

                                                <tbody>


                                                    <tr>
                                                        <td>Total</td>
                                                        <td>
                                                        <a href="{{route('front.showCart')}}">{{session()->get('total')}}</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
