function numFormat(angka){
  var reverse = angka.toString().split('').reverse().join(''),
  ribuan = reverse.match(/\d{1,3}/g);
  ribuan = ribuan.join('.').split('').reverse().join('');
  return ribuan;
}

// Number format rupiah
const oriPrice = document.getElementById('ori_price');
const discPrice = document.getElementById('disc_price');
const quantity = document.getElementById('quantity');


oriPrice.addEventListener('keyup', function(e) {
    oriPrice.value = formatRupiah(this.value, '');
})
discPrice.addEventListener('keyup', function(e) {
    discPrice.value = formatRupiah(this.value, '');
})
quantity.addEventListener('keyup', function(e) {
    quantity.value = formatRupiah(this.value, '');
})


const editOriPrice = document.getElementById('edit_ori_price');
const editDiscPrice = document.getElementById('edit_disc_price');
const editQuantity = document.getElementById('edit_quantity');

editOriPrice.addEventListener('keyup', function(e) {
    editOriPrice.value = formatRupiah(this.value, '');
})
editDiscPrice.addEventListener('keyup', function(e) {
    editDiscPrice.value = formatRupiah(this.value, '');
})
editQuantity.addEventListener('keyup', function(e) {
    editQuantity.value = formatRupiah(this.value, '');
})

function formatRupiah(num, prefix) {
    let num_string = num.replace(/[^,\d]/g, '').toString(),
    split = num_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}  

const productName = document.querySelector('#name');
const productSlug = document.querySelector('#slug');

  productName.addEventListener('change', function() {
    fetch('/dashboard/products/checkSlug?productName=' + productName.value)
      .then(response => response.json())
      .then(data => productSlug.value = data.slug)
  });

// Preview Image script
function previewMainImage(idImg, idPreview) {
    const mainImage = document.querySelector(idImg);
    const imgPreview = document.querySelector(idPreview);

    const oFReader = new FileReader;
    oFReader.readAsDataURL(mainImage.files[0]);

    oFReader.onload = function(oFRevent) {
        imgPreview.src = oFRevent.target.result;
    }
}

  $(document).ready(function() {
    $('.btn-edit').on('click', function() {
      const productId = $(this).val()
      console.log(productId)

      $.ajax({
        url: '/dashboard/product/edit/' + productId,
        type: 'GET',
        success: response => {

          $('#edit-form').attr('action', '/dashboard/product/update/' + response.product.id)
          $('#edit_name').val(response.product.name)
          $('#edit_ori_price').val(numFormat(response.product.ori_price))

          if(response.product.disc_price != null) {
            $('#edit_disc_price').val(numFormat(response.product.disc_price))
          } else {
            $('#edit_disc_price').val(response.product.disc_price)
          }

          $('#edit_quantity').val(response.product.quantity)
          $('#edit_description').val(response.product.description)
          $('#edit_img_preview').attr('src', '/assets/uploads/products/' + response.product.main_image)

          if(response.product.status == 1) {
            $('#edit_status').attr('checked', 'checked')
          } else {
            $('#edit_status').removeAttr('checked', 'checked')
          }

          if(response.product.trending == 1) {
            $('#edit_trending').attr('checked', 'checked')
          } else {
            $('#edit_trending').removeAttr('checked', 'checked')
          }

          // Category
          const categories = response.categories
          const product_cate_id = response.product.category_id

          console.log(product_cate_id)

          categories.forEach((item) => {
              $('#optgroup_category').append(`<option value="${item.id}">${item.name}</option>`)
          })

          $('#edit_category_id').val(product_cate_id)
          
        }
      })
    })
  })

  
function deleteConfirm(e, productId) {
    e.preventDefault();

    Swal.fire({
    title: 'Are you sure?',
    text: "The product can't be deleted, but system will deactive the product status",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = '/dashboard/product/destroy/' + productId;
          // Swal.fire(
          //   'Deleted!',
          //   '{{ session("status") }}',
          //   'success'
          // )
        } else {
          return false;
        }

    })
}

