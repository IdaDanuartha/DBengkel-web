function rupiahFormat(x) {
    var parts = x.toString().split(".");
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    return parts.join(".");
}

$(document).ready(function() {

    loadCart();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // Cart Count
    function loadCart()
    {    
        $.ajax({
            method: "GET",
            url: "/load-cart",
            success: function(response) {
                $('.cart-counter').html('');
                $('.cart-counter').html(response.count);
                // console.log(response.count);
            }
        })
    }
    
    // Add to cart script
    $('.addToCart').click(function(e) {
        e.preventDefault();
    
        let product_id = $(this).closest('.product_data').find('.product_id').val();
        let product_quantity = $(this).closest('.product_data').find('.product_quantity').val();
        
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_quantity': product_quantity
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: response.status,
                    timer: 2000,
                    timerProgressBar: true,
                    background: 'rgb(74 222 128)',
                    color: '#fff',
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
              loadCart();
            }
        });
    
    })
    
    // Delete cart items
    // $('.delete-cart-btn').click(function(e) {
    $(document).on('click', '.delete-cart-btn', function(e) {
        e.preventDefault();
        
        var product_id = $(this).closest('.product_data').find('.product_id').val();
        
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'product_id': product_id,
            },
            success: function(response) {
                loadCart();
                $('.cart-container').load(location.href + " .cart-container");
                let timerInterval
                Swal.fire({
                    title: response.status,
                    timer: 2000,
                    timerProgressBar: true,
                    background: 'rgb(74 222 128)',
                    color: '#fff',
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                })
            }
        });
    })
    
    // Change value quantity
    // $('.changeQuantity').click(function(e) {
    //     e.preventDefault();
        
    //     var product_id = $(this).closest('.product_data').find('.product_id').val();
    //     var qty = $(this).closest('.product_data').find('.product_quantity').val();
    //     console.log(product_id, qty)
    
    
    //     data = {
    //         'product_id' : product_id,
    //         'product_qty' : qty,
    //     }
    //     $.ajax({
    //         method: "POST",
    //         url: "update-cart",
    //         data: data,
    //         success: function(response) {
    //             const price = response.quantity * response.product_price

    //             $('#subtotal-' + product_id).html('Rp ' + rupiahFormat(price))
    //             $('.subtotal-allproducts').html('Sub Total :  Rp ' + rupiahFormat(response.total_price))
    //             // console.log(response.status);
    //             loadCart();
    //         }
    //     });
    // })
    
    function updateQty(product_id, qty) {
        console.log(product_id, qty)
    
        data = {
            'product_id' : product_id,
            'product_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function(response) {
                const price = response.quantity * response.product_price

                $('#subtotal-' + product_id).html('Rp ' + rupiahFormat(price))
                $('.subtotal-allproducts').html('Sub Total :  Rp ' + rupiahFormat(response.total_price))
                // console.log(response.status);
                loadCart();
            }
        });
    }
    
    $('.plusBtn').click(function(e) {
        e.preventDefault();
    
        var product_id = $(this). closest('.product_data').find('.product_id').val();
        var maxQuantity = $(this).closest('.product_data').find('.product_max_qty').val();
        var inc_value = $(this).closest('.product_data').find('.product_quantity').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
    
        if(value < maxQuantity) {
            value++;
            $(this).closest('.product_data').find('.product_quantity').val(value);
            updateQty(product_id, value)
        }
    
    });
    
    $('.minusBtn').click(function(e) {
        e.preventDefault();
    
        var product_id = $(this). closest('.product_data').find('.product_id').val();
        var dec_value = $(this).closest('.product_data').find('.product_quantity').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
    
        if(value > 1) {
            value--;
            $(this).closest('.product_data').find('.product_quantity').val(value);
            updateQty(product_id, value)
        }
    
    });
    
        
    })