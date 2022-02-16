const categoryName = document.querySelector('#name');
const categorySlug = document.querySelector('#slug');

  categoryName.addEventListener('change', function() {
    fetch('/dashboard/categories/checkSlug?categoryName=' + categoryName.value)
      .then(response => response.json())
      .then(data => categorySlug.value = data.slug)
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
    // Fetch data category to modal
    $('.btn-edit').on('click', function() {
      const categoryId = $(this).val()
      console.log(categoryId)
      $.ajax({
        url: '/dashboard/category/edit/' + categoryId,
        type: 'GET',
        success: response => {
          $('#edit-form').attr('action', '/dashboard/category/update/' + response.category.id)
          $('#edit_name').val(response.category.name)
          $('#edit_slug').val(response.category.slug)
          $('#edit_description').val(response.category.description)
          $('#edit_img_preview').attr('src', '/assets/uploads/categories/' + response.category.main_image)

          if(response.category.status == 1) {
            $('#edit_status').attr('checked', 'checked')
          } else {
            $('#edit_status').removeAttr('checked', 'checked')
          }

          if(response.category.popular == 1) {
            $('#edit_popular').attr('checked', 'checked')
          } else {
            $('#edit_popular').removeAttr('checked', 'checked')
          }

        }
      })

    })
})


  function deleteConfirm(e, productId) {
      e.preventDefault();

      Swal.fire({
      title: 'Are you sure?',
      text: "The category can't be deleted, but system will deactive the category status",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
          document.location.href = '/dashboard/category/destroy/' + productId;
          
          } else {
              return false;
          }

      })
  }