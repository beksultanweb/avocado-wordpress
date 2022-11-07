window.addEventListener('DOMContentLoaded', () => {
    const menu = document.querySelector('.menu'),
    phone = document.querySelector('.mobile'),
    menuItem = document.querySelectorAll('.menu_item'),
    hamburger = document.querySelector('.burger');

    hamburger.addEventListener('click', () => {
        window.scrollTo(0, 0);
        hamburger.classList.toggle('burger_active');
        menu.classList.toggle('menu_active');
        phone.classList.toggle('mobile_active');
        document.body.classList.toggle('lock');
    });

    menuItem.forEach(item => {
        item.addEventListener('click', () => {
            hamburger.classList.toggle('burger_active');
            menu.classList.toggle('menu_active');
            document.body.classList.toggle('lock');
        })
    })
})

// Banner slider
const sliderLine = document.querySelector('.banner-line'),
      dots = document.querySelectorAll('.dot')

let position = 0,
    dotIndex = 0,
    widthBox = parseInt(document.getElementsByClassName('banner-wrapper')[0].offsetWidth)

const nextSlide = () => {
    if(position < ((dots.length - 1) * widthBox)) {
        position += widthBox
        dotIndex++
    }
    else {
        position = 0
        dotIndex = 0
    }
    sliderLine.style.left = -position + 'px'
    thisSlide(dotIndex)
}

const thisSlide = (index) => {
    for(let dot of dots) {
        dot.classList.remove('dot_active')
    }
    dots[index].classList.add('dot_active')
}

dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        position = widthBox * index
        sliderLine.style.left = -position + 'px'
        dotIndex = index
        thisSlide(dotIndex)
    })
})

setInterval(() => {
    nextSlide()
}, 4000)

// Testimonals slider
const testimonalLine = document.querySelector('.testimonal-line'),
      testimonalDots = document.querySelectorAll('.testimonal-dot')

let testimonalPosition = 0,
    testimonalDotIndex = 0,
    testimonalWidthBox = parseInt(document.getElementsByClassName('testimonals-wrapper')[0].offsetWidth)

const testimonalNextSlide = () => {
    if(testimonalPosition < ((testimonalDots.length - 1) * testimonalWidthBox)) {
        testimonalPosition += testimonalWidthBox
        testimonalDotIndex++
    }
    else {
        testimonalPosition = 0
        testimonalDotIndex = 0
    }
    testimonalLine.style.left = -testimonalPosition + 'px'
    testimonalThisSlide(testimonalDotIndex)
}

const testimonalThisSlide = (index) => {
    for(let dot of testimonalDots) {
        dot.classList.remove('dot_active')
    }
    testimonalDots[index].classList.add('dot_active')
}

testimonalDots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        testimonalPosition = testimonalWidthBox * index
        testimonalLine.style.left = -testimonalPosition + 'px'
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