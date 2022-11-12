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