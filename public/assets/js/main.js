function dropdownToggle() {
    const toggleDropdown = document.querySelector('.dropdown');
    toggleDropdown.classList.toggle('active');
}

// Dark mode toggle using Storage
let darkMode = localStorage.getItem("dark-theme");
const darkModeToggle = document.querySelector("#dark-mode-icon");

const enabledDarkMode = () => {
    document.body.classList.add("dark-theme");;
    localStorage.setItem("dark-theme", "enabled");
};

const disabledDarkMode = () => {
    document.body.classList.remove("dark-theme");
    localStorage.setItem("dark-theme", null);
};

if(darkMode === "enabled") {
    enabledDarkMode();
    darkModeToggle.classList.add('bi-sun-fill');
    darkModeToggle.classList.remove('bi-moon-fill');
}

darkModeToggle.addEventListener("click", () => {
    darkMode = localStorage.getItem("dark-theme");
    if(darkMode != "enabled") {
        enabledDarkMode();
        darkModeToggle.classList.add('bi-sun-fill');
        darkModeToggle.classList.remove('bi-moon-fill');
        console.log(darkMode);
    } else {
        disabledDarkMode();
        darkModeToggle.classList.remove('bi-sun-fill');
        darkModeToggle.classList.add('bi-moon-fill');
        console.log(darkMode);
    }
});

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
          Swal.fire(response.status);
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
            console.log(response.status);
            // Swal.fire(
            //     'Success',
            //     response.status,
            //     'success'
            // )
        }
    });
})

// Change value quantity
$('.changeQuantity').click(function(e) {
    e.preventDefault();
    
    var product_id = $(this).closest('.product_data').find('.product_id').val();
    var qty = $(this).closest('.product_data').find('.product_quantity').val();


    data = {
        'product_id' : product_id,
        'product_qty' : qty,
    }
    $.ajax({
        method: "POST",
        url: "update-cart",
        data: data,
        success: function(response) {
            // console.log(response.status);
            loadCart();
        }
    });
})


$('.plusBtn').click(function(e) {
    e.preventDefault();

    var maxQuantity = $(this).closest('.product_data').find('.product_max_qty').val();
    var inc_value = $(this).closest('.product_data').find('.product_quantity').val();
    var value = parseInt(inc_value, 10);
    value = isNaN(value) ? 0 : value;

    if(value < maxQuantity) {
        value++;
        $(this).closest('.product_data').find('.product_quantity').val(value);
    }

});

$('.minusBtn').click(function(e) {
    e.preventDefault();

    var dec_value = $(this).closest('.product_data').find('.product_quantity').val();
    var value = parseInt(dec_value, 10);
    value = isNaN(value) ? 0 : value;

    if(value > 1) {
        value--;
        $(this).closest('.product_data').find('.product_quantity').val(value);
    }

});

    
})