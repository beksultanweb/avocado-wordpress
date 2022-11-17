// Banner slider
const sliderLine = document.querySelector('.banner-line'),
      dotsWrapper = document.querySelector('.dots-wrapper'),
      slides = document.querySelectorAll('.banner-slide'),
      carousel = document.getElementsByClassName('banner-wrapper')[0]

for(let i = 0; i<slides.length; i++) {
    let dot = document.createElement('div');
    dot.className = "dot";
    dotsWrapper.appendChild(dot);
}


let position = 0,
    dotIndex = 0,
    widthBox = carousel.offsetWidth

function init() {
    widthBox = carousel.offsetWidth
    slides.forEach(el => {
        el.style.width = widthBox + 'px';
    })
}
init()
window.addEventListener('resize', init)

const nextSlide = () => {
    if(position < ((dots.length - 1) * widthBox)) {
        position += widthBox
        dotIndex++
    }
    else {
        position = 0
        dotIndex = 0
    }
    carousel.scroll(position, 0);
    thisSlide(dotIndex)
}

const thisSlide = (index) => {
    for(let dot of dots) {
        dot.classList.remove('dot_active')
    }
    dots[index].classList.add('dot_active')
}

const dots = document.querySelectorAll('.dot');

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        console.log("test");
        position = widthBox * index
        // sliderLine.style.left = -position + 'px'
        carousel.scroll(position, 0);
        dotIndex = index
        thisSlide(dotIndex)
        clearInterval(myTimer);
    })
})

var myTimer = setInterval(() => {
    nextSlide()
}, 4000)


// Testimonals slider
const testimonalLine = document.querySelector('.testimonal-line'),
      testimonalDotsWrapper = document.querySelector('.testimonal-dots-wrapper'),
      testimonals = document.querySelectorAll('.testimonal').length / 3,
      testimonalCarousel = document.getElementsByClassName('testimonals-wrapper')[0]

console.log(testimonals);
for(let i = 0; i<testimonals; i++) {
    let dot = document.createElement('div');
    dot.className = "testimonal-dot";
    testimonalDotsWrapper.appendChild(dot);
}

let testimonalPosition = 0,
    testimonalDotIndex = 0,
    testimonalWidthBox = parseInt(document.getElementsByClassName('testimonals-wrapper')[0].offsetWidth)

const gap = 10;

const testimonalThisSlide = (index) => {
    for(let dot of testimonalDots) {
        dot.classList.remove('dot_active')
    }
    testimonalDots[index].classList.add('dot_active')
}

testimonalDots = document.querySelectorAll('.testimonal-dot');

testimonalDots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        testimonalPosition = testimonalWidthBox * index
        testimonalCarousel.scroll(testimonalPosition, 0);
        testimonalDotIndex = index
        testimonalThisSlide(testimonalDotIndex)
    })
})

const testimonalsArr = document.querySelectorAll('.testimonal')

if(window.innerWidth > 992) {
    for(let i = 0; i<testimonalsArr.length; i++) {
        testimonalsArr[i].style.display = "block"
    }
}
else {
    for(let i = 0; i<testimonalsArr.length; i++) {
        if(i > 2) {
            testimonalsArr[i].style.display = "none"
        }
    }
}