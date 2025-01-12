jQuery(document).ready(function ($) {
  $(function () {
    $(".slider").slick({
      dots: false,
      infinite: true,
      autoplay: true,
      arrows: false,
      autoplaySpeed: 1000,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      variableWidth: true,
    });
  });


const hamburger = document.querySelector(".humberger-menu");
const menu = document.querySelector(".main-menu");
const rightMenu = document.querySelector(".right-menu");
const header = document.querySelector("header");

hamburger.addEventListener("click", () => {
  menu.classList.toggle("active");
  // menu.style.height = "100%";
  rightMenu.classList.toggle("active");
  // rightMenu.style.height = "50%";
  header.classList.toggle("full-screen-menu");
  hamburger.classList.toggle("humberger-menu-open");
});

$('.menu-item-has-children > a').on('click', function(e) {
  // Prevent the link from navigating
  e.preventDefault();
  
  var $parent = $(this).parent(); // Get the parent <li> of the clicked item
  
  // Toggle the 'open' class to show/hide the dropdown
  $parent.toggleClass('open');
  
  // Close other dropdowns if needed (optional)
  $parent.siblings('.menu-item-has-children').removeClass('open');
});
});