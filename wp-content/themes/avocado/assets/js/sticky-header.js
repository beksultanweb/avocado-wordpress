const header = document.querySelector(".header"),
      secHeader = document.querySelector('.first_header')

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 49 || document.documentElement.scrollTop > 49) {
    header.style.paddingTop = "5px"
    header.style.paddingBottom = "5px"
    document.querySelector(".logo").style.height = "60px";
  }
  else {
    header.style.paddingTop = "17px"
    header.style.paddingBottom = "17px"
    document.querySelector(".logo").style.height = "auto";
  }
}