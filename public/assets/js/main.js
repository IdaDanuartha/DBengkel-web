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


// Star rating
$('.star-input').click(function() {
    $(this).parent()[0].reset();
    var prevStars = $(this).prevAll();
    var nextStars = $(this).nextAll();
    prevStars.attr('checked',true);
    nextStars.attr('checked',false);
    $(this).attr('checked',true);
  });
  
  $('.star-input-label').on('mouseover',function() {
    var prevStars = $(this).prevAll();
    prevStars.addClass('hovered');
  });
  $('.star-input-label').on('mouseout',function(){
    var prevStars = $(this).prevAll();
    prevStars.removeClass('hovered');
  })