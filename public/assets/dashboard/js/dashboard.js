// show / hide sidebar script
const toggle = document.querySelector('.toggle');
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('main-content');

toggle.addEventListener('click', function() {
    toggle.classList.toggle('active');
    sidebar.classList.toggle('active');
    mainContent.classList.toggle('active');
})


// active clicked sidebar
const sidebarList = document.querySelectorAll('#sidebar li');

function activeLink() {
    sidebarList.forEach((item) => item.classList.remove('actived'));
    this.classList.add('actived');
}
sidebarList.forEach((item) => item.addEventListener('click', activeLink));


// Image slide script
const productImages = document.querySelectorAll(".image-group img");
const productImageSlide = document.querySelector(".image-slider");

let activeImageSlide = 0;

productImages.forEach((item, i) => {
    item.addEventListener('click', () => {
        productImages[activeImageSlide].classList.remove('active');
        item.classList.add('active');
        productImageSlide.style.backgroundImage = `url('${item.src}')`;
        activeImageSlide = i;
    })
})

// Alert display none
function alertDisplay() {
    const alertDiv = document.querySelector('.alert-div');

    alertDiv.classList.toggle('hidden');
}

// Preview Image script
function previewMainImage() {
    const mainImage = document.querySelector('#main_image');
    const imgPreview = document.querySelector('.img-preview');

    const oFReader = new FileReader;
    oFReader.readAsDataURL(mainImage.files[0]);

    oFReader.onload = function(oFRevent) {
        imgPreview.src = oFRevent.target.result;
    }
}

// function previewImage2() {
//     const image2 = document.querySelector('#image2');
//     const imgPreview2 = document.querySelector('.img-preview2');

//     const oFReader = new FileReader;
//     oFReader.readAsDataURL(image2.files[0]);

//     oFReader.onload = function(oFRevent) {
//         imgPreview2.src = oFRevent.target.result;
//     }
// }

// function previewImage3() {
//     const image3 = document.querySelector('#image3');
//     const imgPreview3 = document.querySelector('.img-preview3');

//     const oFReader = new FileReader;
//     oFReader.readAsDataURL(image3.files[0]);

//     oFReader.onload = function(oFRevent) {
//         imgPreview3.src = oFRevent.target.result;
//     }
// }

// function previewImage4() {
//     const image4 = document.querySelector('#image4');
//     const imgPreview4 = document.querySelector('.img-preview4');

//     const oFReader = new FileReader;
//     oFReader.readAsDataURL(image4.files[0]);

//     oFReader.onload = function(oFRevent) {
//         imgPreview4.src = oFRevent.target.result;
//     }
// }

