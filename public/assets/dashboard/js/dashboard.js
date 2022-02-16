// show / hide sidebar script
const toggle = document.querySelector('.toggle');
const sidebar = document.getElementById('sidebar');
const mainContent = document.getElementById('main-content');

toggle.addEventListener('click', function() {
    toggle.classList.toggle('active');
    sidebar.classList.toggle('active');
    mainContent.classList.toggle('active');
})

// Image slide script
// const productImages = document.querySelectorAll(".image-group img");
// const productImageSlide = document.querySelector(".image-slider");

// let activeImageSlide = 0;

// productImages.forEach((item, i) => {
//     item.addEventListener('click', () => {
//         productImages[activeImageSlide].classList.remove('active');
//         item.classList.add('active');
//         productImageSlide.style.backgroundImage = `url('${item.src}')`;
//         activeImageSlide = i;
//     })
// })


// Number counter dashboard
const numCounter = document.querySelectorAll('.number-counter');
let interval = 1000;

numCounter.forEach(num => {
    let startValue = 0;
    let endValue = parseInt(num.getAttribute('data-value'));
    console.log(endValue);

    let duration;

    if(endValue == 0) {
        duration = Math.floor(endValue / interval);
    } else {
        duration = Math.floor(interval / endValue);
    }

    if(endValue > 0) {
        let counter = setInterval(function () {
            startValue++;
            num.innerHTML = startValue;
            if(startValue == endValue) {
                clearInterval(counter);
            }
        }, duration);
    } else {
        num.innerHTML = 0;
    }

})

// Munculin loader pada button ketika form disubmit
function submitForm(text) {
  $('.btn-submit')
    .addClass('opacity-75 text-white')
    .removeClass('btn-effect')
    .html(`<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>${text}...`)

}



