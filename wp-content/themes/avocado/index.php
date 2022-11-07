<?php
    get_header();
?>
    <section class="banner">
        <div class="container">
            <div class="banner-wrapper">
                <div class="banner-line">
                    <?php
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category_name' => 'banner',
                            'orderBy' => 'date',
                            'order' => 'ASC',
                            'post_type' => 'post',
                            'suppress_filters' => true,
                        ));
                        foreach( $posts as $post ) {
                            setup_postdata($post)
                            ?>
                                <div class="banner-slide">
                                    <img class="banner-img" src="<?php the_field('banner_img') ?>" alt="banner">
                                    <div class="banner-info">
                                        <h1
                                        style="
                                        <?php
                                            $field = get_field('color_h1');
                                            if ($field == 'dark') {
                                                ?>
                                                    color: #000;
                                                <?php
                                            }
                                        ?>
                                        "
                                        ><?php the_title(); ?></h1>
                                        <?php
                                            $field = get_field('button');
                                            if ($field == 'on') {
                                                ?>
                                                    <a href="<?php the_field('banner_link') ?>"><button class="banner-btn">Посмотреть объекты</button></a>
                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php
                        }
                        wp_reset_postdata();
                    ?>
                </div>
                <div class="dots-wrapper">
                    <div class="dot dot_active"></div>
                    <div class="dot"></div>
                    <div class="dot"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="search">
        <div class="container">
            <h2 class="title">Поиск недвижимости</h2>
            <div class="search__body">
                <label class="search__label">Местоположение
                    <select name="location" id="location">
                        <option value="">Выбрать...</option>
                    </select>
                </label>
                <label class="search__label">Вид недвижимости
                    <select name="type" id="type">
                        <option value="">Выбрать...</option>
                    </select>
                </label>
                <label class="search__label">Количество комнат
                    <select name="rooms-number" id="rooms-number">
                        <option value="">Выбрать...</option>
                    </select>
                </label>
                <label class="search__label">Диапазон цен
                    <select name="diapason" id="diapason">
                        <option value="">Выбрать...</option>
                    </select>
                </label>
                <label class="search__label">Поиск по ID номеру
                    <select name="id" id="id">
                        <option value="">Выбрать...</option>
                    </select>
                </label>
                <label class="search__label">Год постройки
                    <select name="built-year" id="built-year">
                        <option value="">Выбрать...</option>
                    </select>
                </label>
                <label class="search__label">Расстояние до моря
                    <select name="distance-to-sea" id="distance-to-sea">
                        <option value="">Выбрать...</option>
                    </select>
                </label>
                <button class="search__btn">Поиск</button>
            </div>
        </div>
    </section>
    <main>
        <div class="container">
            <div class="active__tabs">
                <input type="radio" name="active__tabs" id="btn-1" class="btn-1" checked>
                <label for="btn-1" class="btn">Горячие предложения</label>
                <input type="radio" name="active__tabs" id="btn-2" class="btn-2">
                <label for="btn-2" class="btn">Новые объекты</label>
                <div class="tabs__body">
                    <div class="tabs__block">
                        <?php
                            $posts = get_posts( array(
                                'numberposts' => -1,
                                'category_name' => 'hot_deals',
                                'orderBy' => 'date',
                                'order' => 'ASC',
                                'post_type' => 'post',
                                'suppress_filters' => true,
                            ));
                            foreach( $posts as $post ) {
                                setup_postdata($post)
                                ?>
                                    <div class="tabs__item">
                                        <img class="tabs__img" src="<?php the_field('hot_img'); ?>" alt="property">
                                        <div class="tabs__title"><?php the_title(); ?></div>
                                        <div class="tabs__info">
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/building.svg" alt="building">
                                                <div class="tabs__subtitle"><?php the_field('hot_rooms'); ?></div>
                                            </div>
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/square.svg" alt="square">
                                                <div class="tabs__subtitle"><?php the_field('hot_square'); ?> кв.м.</div>
                                            </div>
                                        </div>
                                        <button class="tabs__btn"><?php the_field('hot_price'); ?> EUR</button>
                                    </div>
                                <?php
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                    <div class="tabs__block">
                        <?php
                            $posts = get_posts( array(
                                'numberposts' => -1,
                                'category_name' => 'new_objects',
                                'orderBy' => 'date',
                                'order' => 'ASC',
                                'post_type' => 'post',
                                'suppress_filters' => true,
                            ));
                            foreach( $posts as $post ) {
                                setup_postdata($post)
                                ?>
                                    <div class="tabs__item">
                                        <img class="tabs__img" src="<?php the_field('new_img'); ?>" alt="property">
                                        <div class="tabs__title"><?php the_title(); ?></div>
                                        <div class="tabs__info">
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/building.svg" alt="building">
                                                <div class="tabs__subtitle"><?php the_field('new_rooms'); ?></div>
                                            </div>
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/square.svg" alt="square">
                                                <div class="tabs__subtitle"><?php the_field('new_square'); ?></div>
                                            </div>
                                        </div>
                                        <button class="tabs__btn"><?php the_field('new_price'); ?> EUR</button>
                                    </div>
                                <?php
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                    <button class="see_more">Посмотреть еще</button>
                </div>
            </div>
        </div>
    </main>
    <section class="about">
        <div class="container">
            <div class="about__content">
                <div>
                    <h2 class="about__title"><?php the_field('about_title'); ?></h2>
                    <p><?php the_field('about_description'); ?></p>
                </div>
                <div>
                    <img class="tabs__img" src="<?php the_field('about_img'); ?>" alt="about">
                </div>
            </div>
        </div>
    </section>
    <section class="videos">
        <div class="container">
            <div class="videos__content">
                <div><iframe width="100%" height="200" src="https://www.youtube.com/embed/A0mJ9JL6PaI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                <div><iframe width="100%" height="200" src="https://www.youtube.com/embed/A0mJ9JL6PaI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                <div><iframe width="100%" height="200" src="https://www.youtube.com/embed/A0mJ9JL6PaI?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
        </div>
    </section>
    <section class="testimonals">
        <div class="container">
            <h2 class="testimonal__h2">Отзывы клиентов</h2>
            <div class="testimonals-wrapper">
                <div class="testimonal-line">
                    <?php
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category_name' => 'testimonals',
                            'orderBy' => 'date',
                            'order' => 'ASC',
                            'post_type' => 'post',
                            'suppress_filters' => true,
                        ));
                        foreach( $posts as $post ) {
                            setup_postdata($post)
                            ?>
                                <div class="testimonal">
                                    <div class="testimonal__title">
                                    <img class="testimonal__img" src="<?php the_field('testimonal_img') ?>" alt="">
                                    <div>
                                        <div class="testimonal__name"><?php the_field('testimonal_name') ?></div>
                                        <div class="testimonal__location"><?php the_field('testimonal_location') ?></div>
                                    </div>
                                    </div>
                                    <p class="testimonal__text"><?php the_field('testimonal_text') ?></p>
                                </div>
                            <?php
                        }
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
            <div class="testimonal-dots-wrapper">
                <div class="testimonal-dot testimonal-dot_active"></div>
                <div class="testimonal-dot"></div>
                <div class="testimonal-dot"></div>
            </div>
        </div>
    </section>
    <section class="articles">
        <div class="container">
            <h2 class="about__title">Полезная информация о недвижимости в Турции</h2>
            <div class="articles__content">
                <div><img class="articles__img" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="article"><div class="article__title">7 советов как правильно выбрать недвижимость в Алании</div></div>
                <div><img class="articles__img" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="article"><div class="article__title">Какие документы нужны для покупки жилья в Турции</div></div>
                <div><img class="articles__img" src="<?php echo bloginfo('template_url'); ?>/assets/images/banner.jpg" alt="article"><div class="article__title">Тренды в дизайне интерьеров в 2022-2023</div></div>
            </div>
        </div>
    </section>
    <?php
        get_footer();
    ?>