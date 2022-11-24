<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); echo " | "; bloginfo('description'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <?php
        wp_head();
    ?>
</head>
<body>
    <header class="first_header">
        <div class="container">
            <nav class="header__nav">
                <div class="nav-items"><img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/location.svg" alt="location"><div class="nav-text">Аланья, Турция</div></div>
                <div class="nav-gap">
                    <div class="mobile">
                        <div class="nav-items"><img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/phone.svg" alt="phone"><div class="nav-text"><?php the_field('phone_1', 2) ?></div></div>
                        <div class="nav-items"><img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/phone.svg" alt="phone"><div class="nav-text"><?php the_field('phone_2', 2) ?></div></div>
                    </div>
                    <a href="https://wa.me/<?php the_field('phone_1', 2); ?>"><button class="whatsapp">Написать в WhatsApp</button></a>
                    <button class="back-call popup-link">Обратный звонок</button>
                </div>
            </nav>
        </div>
    </header>
    <header class="header">
        <div class="container">
            <nav class="nav">
                <div>
                    <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php
                            $custom_logo__url = wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full');
                            echo $custom_logo__url[0];
                        ?>" alt="Avocado Logo" class="logo">
                    </a>
                </div>
                <ul class="menu">
                    <a href="<?php echo get_home_url(); ?>"><li class="menu__item">Главная</li></a>
                    <a href="<?php echo get_permalink(92); ?>"><li class="menu__item">Недвижимость</li></a>
                    <a href="<?php echo get_permalink(171); ?>"><li class="menu__item">О компании</li></a>
                    <a href="<?php echo get_permalink(216); ?>"><li class="menu__item">Услуги</li></a>
                    <a href="<?php echo get_permalink(169); ?>"><li class="menu__item">Отзывы</li></a>
                    <a href="<?php echo get_permalink(234); ?>"><li class="menu__item">Контакты</li></a>
                </ul>
                <div class="burger">
                    <span class="burger-span"></span>
                    <span class="burger-span"></span>
                    <span class="burger-span"></span>
                </div>
            </nav>
        </div>
    </header>