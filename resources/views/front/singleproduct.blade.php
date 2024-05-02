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
                    <div class="col-12 col-md-12 col-lg-12">

                        <!-- start product single -->
                        <div class="product-single">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="__product-img">
                                        <img width="330"
                                            src="{{ asset('front/img/products_img') }}/{{ $product->image }}"
                                            alt="demo" />

                                        <span class="product-label product-label--new">New</span>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-5">
                                    <div class="content-container">
                                        <h3 class="__name">{{ $product->productname }}</h3>

                                        <div class="__categories">

                                            Category: {{ $product->category->name }}

                                            </span>
                                        </div>

                                        <div class="product-price">
                                            <span
                                                class="product-price__item product-price__item--new">{{ $product->price }}</span>
                                        </div>


                                        <p>
                                            {{ $product->description }}
                                        </p>



                                        <form class="__add-to-cart"
                                            action="{{ route('front.addToCart', ['product' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            <div class="quantity-counter js-quantity-counter">
                                                <span class="__btn __btn--minus"></span>
                                                <input class="__q-input" name="quantity" type="number" value="1"
                                                    min="1" />
                                                <span class="__btn __btn--plus"></span>
                                            </div>
                                            @if ($product->quantity == 0)
                                                <button class="custom-btn custom-btn--medium custom-btn--style-6"
                                                    type="submit" role="button" disabled>
                                                    <i class="fontello-shopping-bag"></i>Out of Stock
                                                </button>
                                            @else
                                                <button class="custom-btn custom-btn--medium custom-btn--style-1"
                                                    type="submit" role="button">
                                                    <i class="fontello-shopping-bag"></i>Add to Cart
                                                </button>
                                            @endif
                                        </form>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="spacer py-5 py-md-9"></div>

                                    <!-- start tab -->
                                    <div class="tab-container">
                                        <nav class="tab-nav">
                                            <a href="#">Description</a>
                                            <a href="#">Reviews</a>
                                        </nav>

                                        <div class="tab-content">
                                            <div class="tab-content__item is-visible">
                                                <p>
                                                    {{ $product->description }}
                                                </p>



                                                <div class="description-table" style="max-width: 370px;">
                                                    <table>
                                                        <tbody>
                                                            @php
                                                                $additionalData = json_decode(
                                                                    $product->additional_data,
                                                                    true,
                                                                );
                                                            @endphp
                                                            @if ($additionalData)
                                                                @foreach ($additionalData as $key => $value)
                                                                    <tr>
                                                                        <td>{{ $key }}</td>
                                                                        <td>{{ $value }}</td>
                                                                    </tr>
                                                                @endforeach
                                                                {{-- <tr>
                                                                    <td>PDF File</td>
                                                                    <td> <a href="{{ route('pdf.show', ['filename' => $product->pdf_file]) }}"
                                                                            target="_blank">View PDF</a></td>

                                                                </tr> --}}
                                                            @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-content__item">
                                                <!-- start comments list -->
                                                <ul class="comments-list" id="commentsList">
                                                    @foreach ($comments as $comment)
                                                        <li class="comment">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-none d-lg-block">

                                                                            <div class="comment__author-img">
                                                                                <img class="img-fluid lazy" width="70"
                                                                                    src="{{ asset('front') }}/img/blank.gif"
                                                                                    data-src="{{ asset('front') }}/img/avatar.jpg"
                                                                                    alt="demo" />
                                                                            </div>

                                                                        </div>
                                                                    </td>

                                                                    <td width="100%">
                                                                        <time
                                                                            class="comment__date-post">{{ $comment->created_at->format('F j, Y') }}</time>

                                                                        <div class="d-flex align-items-center mb-3 mb-lg-0">
                                                                            <div class="d-block d-lg-none">

                                                                                <div class="comment__author-img">
                                                                                    <img class="img-fluid lazy"
                                                                                        width="70"
                                                                                        src="{{ asset('front') }}/img/blank.gif"
                                                                                        data-src="{{ asset('front') }}/img/avatar.jpg"
                                                                                        alt="demo" />
                                                                                </div>

                                                                            </div>

                                                                            <span
                                                                                class="comment__author-name">{{ $comment->name }}</span>

                                                                        </div>


                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <p>
                                                                            {{ $comment->content }}
                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                        </li>
                                                    @endforeach


                                                </ul>
                                                <!-- end comments list -->

                                                <!-- start add review -->
                                                <div class="__add-review">
                                                    <h5>Leave a Reply</h5>
                                                    <form id="commentForm"
                                                        action="{{ route('front.LeaveComment', ['product' => $product->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12 col-md-6">
                                                                <div class="input-wrp">
                                                                    <input class="textfield" type="text" name='name'
                                                                        value="" placeholder="Name *" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <div class="input-wrp">
                                                                    <input class="textfield" type="email" name="email"
                                                                        value="" placeholder="Email *"
                                                                        inputmode="email" x-inputmode="email" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-wrp">
                                                            <textarea class="textfield" name="review" placeholder="Your review *"></textarea>
                                                        </div>
                                                        <div class="spacer py-md-5"></div>
                                                        <div class="row align-items-sm-center justify-content-sm-between">
                                                            <div class="col-12 col-sm-auto">
                                                                <button
                                                                    class="custom-btn custom-btn--medium custom-btn--style-1"
                                                                    type="submit" role="button">post comment</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                                <!-- end add review -->

                                                <!-- end add review -->

                                                <!-- end add review -->
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            // Get the form element
                                            const commentForm = document.getElementById('commentForm');

                                            // Get the container element where comments will be displayed
                                            const commentsList = document.getElementById('commentsList');

                                            // Add event listener for form submission
                                            commentForm.addEventListener('submit', function(event) {
                                                // Prevent the default form submission
                                                event.preventDefault();

                                                // Create FormData object and pass the commentForm element
                                                const formData = new FormData(commentForm);

                                                // Perform an AJAX request to submit the form data
                                                fetch(commentForm.action, {
                                                        method: 'POST',
                                                        body: formData,
                                                        headers: {
                                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                                        }
                                                    })
                                                    .then(response => response.json())
                                                    .then(data => {
                                                        console.log(data);
                                                        if (data.success) {
                                                            // Clear the form fields
                                                            commentForm.reset();

                                                            // Display success message as a popup
                                                            alert('Comment posted successfully');

                                                            // Format the date
                                                            const formattedDate = new Date(data.created_at).toLocaleDateString(
                                                                'en-US', {
                                                                    year: 'numeric',
                                                                    month: 'long',
                                                                    day: 'numeric'
                                                                });

                                                            // Create HTML markup for the comment with formatted date
                                                            const commentHTML = `
                                                                                <li class="comment">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="d-none d-lg-block">
                                                                                                    <div class="comment__author-img">
                                                                                                        <img class="img-fluid lazy" width="70" src="{{ asset('front') }}/img/blank.gif" data-src="{{ asset('front') }}/img/avatar.jpg" alt="demo" />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                            <td width="100%">
                                                                                                <time class="comment__date-post">${formattedDate}</time>
                                                                                                <div class="d-flex align-items-center mb-3 mb-lg-0">
                                                                                                    <div class="d-block d-lg-none">
                                                                                                        <div class="comment__author-img">
                                                                                                            <img class="img-fluid lazy" width="70" src="{{ asset('front') }}/img/blank.gif" data-src="{{ asset('front') }}/img/avatar.jpg" alt="demo" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <span class="comment__author-name">${data.name}</span>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td></td>
                                                                                            <td>
                                                                                                <p>${data.content}</p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </li>
                                                                            `;
                                                            commentsList.insertAdjacentHTML('beforeend', commentHTML);
                                                        } else {
                                                            // Display error message as a popup
                                                            alert('Failed to be added');
                                                        }
                                                    })
                                                    .catch(error => {
                                                        console.error('Error:', error);
                                                    });
                                            });
                                        });
                                    </script>


                                    <div class="spacer py-5 py-md-9"></div>
                                </div>
                            </div>
                        </div>
                        <!-- start product single -->

                        <h2>Related <span>products</span></h2>
                        <div class="spacer py-2"></div>

                        <!-- start goods -->
                        <div class="goods goods--style-1">
                            <div class="__inner">
                                <div class="row">
                                    <!-- start item -->
                                    @foreach ($relatedProducts as $relatedProduct)
                                        <div class="col-12 col-sm-6 col-lg-4">
                                            <div class="__item">
                                                <figure class="__image">
                                                    <img class="lazy" width="180"
                                                        src="{{ asset('front/img/products_img') }}/{{ $relatedProduct->image }}"
                                                        data-src="{{ asset('front/img/products_img') }}/{{ $relatedProduct->image }}"
                                                        alt="demo" />
                                                </figure>

                                                <div class="__content">
                                                    <h4 class="h6 __title"><a
                                                            href="{{ route('front.singleproduct', ['product' => $relatedProduct->id]) }}
                                                            ">{{ $relatedProduct->productname }}</a>
                                                    </h4>

                                                    <div class="__category"><a
                                                            href="{{ route('front.singleproduct', ['product' => $relatedProduct->id]) }}
                                                            ">{{ $product->category->name }}</a>
                                                    </div>

                                                    <div class="product-price">
                                                        <span
                                                            class="product-price__item product-price__item--new">{{ $relatedProduct->price }}
                                                            $</span>
                                                    </div>

                                                    @if ($relatedProduct->quantity == 0)
                                                            <button
                                                                class="custom-btn custom-btn--medium custom-btn--style-6 add-to-cart-btn"
                                                                data-product-id="{{ $relatedProduct->id }}" disabled><i
                                                                    class="fontello-shopping-bag"></i>Out Of Stock</button>
                                                        @else
                                                            <button
                                                                class="custom-btn custom-btn--medium custom-btn--style-1 add-to-cart-btn"
                                                                data-product-id="{{ $relatedProduct->id }}"><i
                                                                    class="fontello-shopping-bag"></i>Add to cart</button>
                                                        @endif



                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                @include('front.styles.addtocartscript')


                                    <!-- end item -->
                                </div>
                            </div>
                        </div>
                        <!-- end goods -->

                    </div>


                </div>
            </div>
        </section>
        <!-- end section -->

        <!-- start section -->

        <!-- end section -->
    </main>
    <!-- end main -->

    <!-- start footer -->
@endsection
