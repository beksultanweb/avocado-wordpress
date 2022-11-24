<?php
/*
Template Name: Contacts
*/
get_header();
?>
<section class="contacts">
    <div class="container">
        <div class="contacts__body">
            <div class="contacts__item">
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
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/mail.svg" alt="mail">
                    <div class="footer__text"><?php the_field('email', 2) ?></div>
                </div>
                <div class="footer__item">
                    <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/instagram.svg" alt="instagram">
                    <div class="footer__text"><?php the_field('instagram', 2) ?></div>
                </div>
                <button class="back-call popup-link">Обратный звонок</button>
            </div>
            <div>
                <?php echo do_shortcode('[yamap center="36.4816,32.1032" height="100%" controls="" zoom="16" type="yandex#map"][yaplacemark  coord="36.53747812752088,31.99293358993502" icon="islands#dotIcon" color="#82b723"][yaplacemark  coord="36.4820,32.1044" icon="islands#dotIcon" color="#82b723"][/yamap]'); ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>