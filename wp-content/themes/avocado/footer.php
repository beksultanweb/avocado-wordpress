<div class="modal" id="modal">
    <div class="modal__body">
        <div class="modal__form">
            <div class="modal__close">X</div>
            <div class="call-to-action">Оставьте заявку и наш менеджер свяжется с Вами</div>
            <?php echo do_shortcode('[contact-form-7 id="183" title="Форма обратной связи"]'); ?>
        </div>
    </div>
</div>
<footer class="footer1">
        <div class="container">
            <nav class="nav-footer">
                <div class="logo">
                    <?php the_custom_logo(); ?>
                </div>
                <ul class="menu">
                    <a href="<?php echo get_home_url(); ?>"><li class="menu__item">Главная</li></a>
                    <a href="<?php echo get_permalink(92); ?>"><li class="menu__item">Недвижимость</li></a>
                    <a href="<?php echo get_permalink(171); ?>"><li class="menu__item">О компании</li></a>
                    <a href="<?php echo get_permalink(216); ?>"><li class="menu__item">Услуги</li></a>
                    <a href="<?php echo get_permalink(169); ?>"><li class="menu__item">Отзывы</li></a>
                    <a href="<?php echo get_permalink(234); ?>"><li class="menu__item">Контакты</li></a>
                </ul>
            </nav>
        </div>
    </footer>
    <footer class="footer2">
        <div class="container">
            <div class="footer__content">
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/instagram.svg" alt="instagram">
                    <a href="https://instagram.com/<?php the_field('insta_link', 2); ?>" class="footer__text">@<?php the_field('insta_link', 2) ?></a>
                </div>
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/location.svg" alt="location">
                    <div class="footer__text"><?php the_field('address', 2) ?></div>
                </div>
                <a href="tel: <?php the_field('phone_1', 2) ?>" class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/phone.svg" alt="phone">
                    <div class="footer__text"><?php the_field('phone_1', 2) ?></div>
                </a>
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/whatsapp.svg" alt="whatsapp">
                    <div class="footer__text"><?php the_field('phone_1', 2) ?></div>
                </div>
            </div>
        </div>
    </footer>

    <?php
        wp_footer();
    ?>
</body>
</html>