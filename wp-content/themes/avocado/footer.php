<!-- Modals -->
<footer class="footer1">
        <div class="container">
            <nav class="nav-footer">
                <div class="logo">
                    <?php the_custom_logo(); ?>
                </div>
                <ul class="menu">
                    <li class="menu__item">Главная</li>
                    <li class="menu__item">Недвижимость</li>
                    <li class="menu__item">О компании</li>
                    <li class="menu__item">Услуги</li>
                    <li class="menu__item">Отзывы</li>
                    <li class="menu__item">Контакты</li>
                </ul>
            </nav>
        </div>
    </footer>
    <footer class="footer2">
        <div class="container">
            <div class="footer__content">
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/instagram.svg" alt="instagram">
                    <div class="footer__text"><?php the_field('instagram', 2) ?></div>
                </div>
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/location.svg" alt="location">
                    <div class="footer__text"><?php the_field('address', 2) ?></div>
                </div>
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/phone.svg" alt="phone">
                    <div><div class="footer__text"><?php the_field('phone_1', 2) ?></div>
                    <div class="footer__text"><?php the_field('phone_2', 2) ?></div></div>
                </div>
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/whatsapp.svg" alt="whatsapp">
                    <div><div class="footer__text"><?php the_field('phone_1', 2) ?></div>
                    <div class="footer__text"><?php the_field('phone_2', 2) ?></div></div>
                </div>
            </div>
        </div>
    </footer>

    <?php
        wp_footer();
    ?>
</body>
</html>