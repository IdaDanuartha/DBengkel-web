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


// Number counter dashboard
const numCounter = document.querySelectorAll('.number-counter');
let interval = 2000;

numCounter.forEach(num => {
    let startValue = 0;
    let endValue = parseInt(num.getAttribute('data-value'));
    console.log(endValue);
    let duration = Math.floor(interval / endValue);
    let counter = setInterval(function () {
        startValue += 1;
        num.textContent = startValue;
        if(startValue == endValue) {
            clearInterval(counter);
        }
    }, duration);
})


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