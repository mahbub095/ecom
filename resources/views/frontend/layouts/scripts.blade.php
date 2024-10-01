<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // add product into cart
        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        getCartCount()
                        fetchSidebarCartProducts()
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message);
                    }else if (data.status === 'error'){
                        toastr.error(data.message);
                    }
                },
                error: function(data) {

                }
            })
        })

        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                },
                error: function(data) {

                }
            })
        }
 

        // reomove product from sidebar cart
   

 

        // add product to wishlist
    
        // newsletter
      


    })
</script>
