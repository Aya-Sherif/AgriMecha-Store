<script>
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Extract the product ID from the button's data attribute
            const productId = this.getAttribute('data-product-id');
            // Call the addToCart function with the extracted product ID
            addToCart(productId);
        });
    });

    // Function to add product to cart using AJAX
    function addToCart(productId) {
        // AJAX request to add the product to the cart
        fetch('{{ route('front.addtoCart', ':productId') }}'.replace(':productId', productId), {
                method: 'POST', // Send a POST request
                headers: {
                    'Content-Type': 'application/json', // Set the content type to JSON
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for Laravel security
                }
            })
            .then(response => {
                // Check if the response is successful
                if (response.ok) {
                    // Parse the JSON response
                    return response.json();
                }
                // Throw an error if the response is not successful
                throw new Error('Failed to add product');
            })
            .then(data => {
                // Handle success response (if needed)

                console.log(data); // Log the response data
                alert(data['message'])
                // Echo.private(`cart-channel`)
                // .listen('.cart.quantity.updated', (event) => {
                //     console.log('Received CartUpdated event:', event);
                //     console.log('Cart count:', event.cartCount);
                //     // Update the cart count in the UI
                //     document.getElementById('cart-count').innerText = event.cartCount;
                // });
            })
            .catch(error => {
                // Handle error (if needed)
                console.error(error); // Log the error
                alert('Failed to add product to cart');
            });
    }
</script>
