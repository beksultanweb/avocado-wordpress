const popupLinks = document.querySelectorAll('.popup-link'),
      popup = document.querySelector('.modal'),
      closeBtn = document.querySelector('.modal__close')

if(popupLinks.length > 0) {
    for(let i = 0; i<popupLinks.length; i++) {
        const popupLink = popupLinks[i]
        popupLink.addEventListener('click', function() {
            popup.classList.add('open')
            popup.addEventListener('click', function(e) {
                if(!e.target.closest('.modal__form')) {
                    popup.classList.remove('open')
                    document.body.classList.remove('lock')
                }
            })
            document.body.classList.add('lock')
        })
    }
}

closeBtn.addEventListener('click', function() {
    popup.classList.remove('open')
    document.body.classList.remove('lock')
})