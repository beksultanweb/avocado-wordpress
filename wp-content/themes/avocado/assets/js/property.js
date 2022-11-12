const gap = 8;

const carousel = document.getElementsByClassName("property-slider")[0],
  content = document.getElementsByClassName("property-photos-line")[0],
  next = document.getElementById("next"),
  prev = document.getElementById("prev"),
  photos = document.querySelectorAll('.property-photos__photo'),
  mainImg = document.querySelector('.property-photos__main-photo');


next.addEventListener("click", e => {
  carousel.scrollBy(width + gap, 0);
  if (Math.round(carousel.scrollLeft) == content.scrollWidth - width) {
    carousel.scrollBy(-(content.scrollWidth - width), 0)
  }
});

prev.addEventListener("click", e => {
  carousel.scrollBy(-(width + gap), 0);
  if (Math.round(carousel.scrollLeft) == 0) {
    carousel.scrollBy(content.scrollWidth - width, 0)
  }
});

let width = carousel.offsetWidth;
window.addEventListener("resize", e => (width = carousel.offsetWidth));

photos.forEach(el => {
    el.addEventListener('click', function() {
        mainImg.src = this.src;
    })
})