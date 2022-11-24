<?php
    get_header();
?>
    <section class="banner">
        <div class="container">
            <div class="banner__content">
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
                                    <div class="banner-slide" style="background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url(<?php the_field('banner_img'); ?>); background-size: cover;">
                                        <div class="banner-info">
                                            <h1
                                            class="banner-title"
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
                </div>
                <div class="dots-wrapper">
                </div>
            </div>
        </div>
    </section>
    <section class="search">
        <div class="container">
            <h2 class="title">Поиск недвижимости</h2>
            <div>
                <form class="search__body" action="search" onsubmit="return validateForm()" method="GET">
                <?php
                    $posts = get_posts( array(
                            'category' => array(6, 7),
                            'numberposts' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'suppress_filters' => true
                    ));
                    ?>
                    <label class="search__label">Местоположение
                    <select name="location[]" id="location" multiple>
                        <?php foreach($location as $val) {
                            ?>
                                <option value="<?php echo $val; ?>" selected><?php echo $val; ?></option>
                            <?php
                        } ?>

                        <?php
                        $res = array();
                        $pr_location2 = array();
                        foreach( $posts as $post ) {
                            setup_postdata($post);
                            $pr_location = get_field('property_location');
                            array_push($pr_location2, $pr_location);
                        }
                        $res = array_unique($pr_location2);
                        foreach($res as $resel) {
                            if($location == "") {
                                ?>
                                <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                                <?php
                            }
                            else if(!in_array($resel, $location)) {
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                        <?php
                        }
                    }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Вид недвижимости
                    <select name="type[]" id="type" multiple>
                        <?php foreach($type as $val) {
                            ?>
                                <option value="<?php echo $val; ?>" selected><?php echo $val; ?></option>
                            <?php
                        } ?>
                        <?php
                            $res = array();
                            $pr_type2 = array();
                            foreach( $posts as $post ) {
                                setup_postdata($post);
                                $pr_type = get_field('property_type');
                                array_push($pr_type2, $pr_type);
                            }
                            $res = array_unique($pr_type2);
                            foreach($res as $resel) {
                                if($type == "") {
                                    ?>
                                    <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                                    <?php
                                }
                                else if(!in_array($resel, $type)) {
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                            <?php
                        }
                    }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Количество комнат
                    <select name="rooms-number" id="rooms-number">
                        <?php
                        if($rooms == "") {
                        ?>
                        <option value="" selected>Любой комнатности</option>
                        <?php
                        }
                        else {
                            ?>
                            <option value="">Любой комнатности</option>
                            <option value="<?php echo $rooms; ?>" selected><?php echo $rooms; ?>-комнатный</option>
                            <?php
                        }
                            $res = array();
                            $pr_type2 = array();
                            foreach( $posts as $post ) {
                                setup_postdata($post);
                                $pr_type = get_field('property_rooms');
                                array_push($pr_type2, $pr_type);
                            }
                            $res = array_unique($pr_type2);
                            foreach($res as $resel) {
                                if($resel != $rooms){
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?>-комнатный</option>
                            <?php
                        }
                    }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Цена
                        <div class="price-input">
                            <input class="search-input" type="text" name="minprice" id="price" value="<?php
                            if($minprice != "") echo number_format($minprice, 0, ',', ' ');
                            ?>" placeholder="От">
                            <div>-</div>
                            <input class="search-input" type="text" name="maxprice" id="price" value="<?php
                            if($maxprice != "") echo number_format($maxprice, 0, ',', ' ');
                            ?>" placeholder="До">
                            <div>&euro;</div>
                        </div>
                    </label>
                    <label class="search__label">Поиск по ID номеру
                    <select name="id" id="id">
                        <?php
                        if($ID == "") {
                            ?>
                            <option value="" selected>Любой</option>
                        <?php
                        }
                        else {?>
                        <option value="" selected>Любой</option>
                        <option value="<?php echo $ID; ?>" selected><?php echo $ID; ?></option>
                        <?php
                        }
                        foreach( $posts as $post ) {
                            setup_postdata($post)
                            ?>
                            <option value="<?php echo $post->ID ?>"><?php echo $post->ID ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Год постройки
                        <div class="price-input">
                            <input class="search-input" type="number" name="mindate" id="date" value="<?php
                            if($mindate != "") echo $mindate;
                            ?>" placeholder="От">
                            <div>-</div>
                            <input class="search-input" type="number" name="maxdate" id="date" value="<?php
                            if($maxdate != "") echo $maxdate;
                            ?>" placeholder="До">
                        </div>
                    </label>
                    <label class="search__label">Расстояние до моря
                        <div class="price-input">
                            <input class="search-input" type="number" name="maxsea" id="sea" value="<?php
                            if($maxsea != "") echo $maxsea;
                            ?>" placeholder="До">
                            <div>м.</div>
                        </div>
                    </label>
                    <?php
                    wp_reset_postdata();
                ?>
                <button class="search__btn">Поиск</button>
                </form>
            </div>
        </div>
    </section>
    <main>
        <div class="container">
            <div class="active__tabs">
                <input type="radio" name="active__tabs" id="btn-1" class="btn-1">
                <label for="btn-1" class="btn">Горячие предложения</label>
                <input type="radio" name="active__tabs" id="btn-2" class="btn-2">
                <label for="btn-2" class="btn">Новые объекты</label>
                <div class="tabs__body">
                    <div class="tabs__block">
                        <?php
                            $posts = get_posts( array(
                                'numberposts' => 6,
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
                                        <img class="tabs__img" src="<?php the_field('property_img'); ?>" alt="property">
                                        <div class="tabs__title"><?php the_title(); ?></div>
                                        <div class="tabs__info">
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/building.svg" alt="building">
                                                <div class="tabs__subtitle"><?php the_field('property_rooms'); ?></div>
                                            </div>
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/square.svg" alt="square">
                                                <div class="tabs__subtitle"><?php the_field('property_square'); ?> кв.м.</div>
                                            </div>
                                        </div>
                                        <a href="<?php echo get_permalink(); ?>"><button class="tabs__btn">
                                            <?php
                                                $price = get_field('property_price');
                                                echo number_format($price, 0, ',', ' ');
                                            ?> EUR</button></a>
                                    </div>
                                <?php
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                    <div class="tabs__block">
                        <?php
                            $posts = get_posts( array(
                                'numberposts' => 6,
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
                                        <img class="tabs__img" src="<?php the_field('property_img'); ?>" alt="property">
                                        <div class="tabs__title"><?php the_title(); ?></div>
                                        <div class="tabs__info">
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/building.svg" alt="building">
                                                <div class="tabs__subtitle"><?php the_field('property_rooms'); ?></div>
                                            </div>
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/square.svg" alt="square">
                                                <div class="tabs__subtitle"><?php the_field('property_square'); ?></div>
                                            </div>
                                        </div>
                                        <a href="<?php echo get_permalink(); ?>"><button class="tabs__btn">
                                            <?php
                                            $price = get_field('property_price');
                                            echo number_format($price, 0, ',', ' ');
                                            ?> EUR</button></a>
                                    </div>
                                <?php
                            }
                            wp_reset_postdata();
                        ?>
                    </div>
                    <a href="<?php echo get_permalink(92) ?>"><button class="see_more">Посмотреть еще</button></a>
                </div>
            </div>
        </div>
    </main>
    <section class="about">
        <div class="container">
            <div class="about__content">
                <div>
                    <h2 class="about__title"><?php the_field('about_title'); ?></h2>
                    <p class="about__p"><?php the_field('about_description'); ?></p>
                </div>
                <div>
                    <img class="tabs__img" src="<?php the_field('about_img'); ?>" alt="about">
                </div>
            </div>
        </div>
    </section>
    <section class="videos">
        <div class="container">
            <div class="videos-wrapper">
                <div class="videos-line">
                <?php
                    $posts = get_posts( array(
                        'numberposts' => -1,
                        'category_name' => 'videos',
                        'orderBy' => 'date',
                        'order' => 'ASC',
                        'post_type' => 'post',
                        'suppress_filters' => true,
                    ));
                    foreach( $posts as $post ) {
                        setup_postdata($post)
                        ?>
                            <?php the_field('youtube_links'); ?>
                        <?php
                    }
                    wp_reset_postdata();
                ?>
                </div>
            </div>
            <div class="videos-dots-wrapper">
            </div>
            <div class="swipe-hint swipe-horizontal">
                <img src="<?php echo bloginfo('template_url'); ?>/assets/icons/finger.svg" alt="finger">
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
            </div>
        </div>
    </section>
    <section class="articles">
        <div class="container">
            <h2 class="article__h2">Полезная информация о недвижимости в Турции</h2>
            <div class="articles__content">
                <?php
                $posts = new WP_Query( array(
                    'posts_per_page' => 3,
                    'category_name' => 'stati',
                    'orderBy' => 'date',
                    'order' => 'ASC',
                    'post_type' => 'post',
                    'suppress_filters' => true,
                ));
                while( $posts->have_posts() ) : $posts->the_post();
                ?>
                <div class="article">
                    <img class="articles__img" src="<?php the_field('article_img'); ?>" alt="article">
                    <div class="article__title"><?php the_title(); ?></div>
                    <p class="article__text">
                    <?php
                    $string = (string)get_field('article_text');
                    echo internoetics_truncate_words($string, 20);
                    ?>
                    </p>
                    <a href="<?php echo get_permalink(); ?>">Читать дальше...</a>
                </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <a href="<?php echo get_permalink(252); ?>"><button class="see_more">Посмотреть еще</button></a>
        </div>
    </section>
    <section class="search">
        <div class="container">
            <h2 class="team__title">Команда</h2>
            <div class="team">
                <div class="team__item"><img src="<?php the_field('team_img'); ?>" alt="team__img" class="team__img"><div class="team__name"><?php the_field('team_name'); ?></div><div class="team__pos"><?php the_field('team_pos'); ?></div><button class="team__btn popup-link">Консультация</button></div>
                <div class="team__item"><img src="<?php the_field('team_img2'); ?>" alt="team__img" class="team__img"><div class="team__name"><?php the_field('team_name2'); ?></div><div class="team__pos"><?php the_field('team_pos2'); ?></div><button class="team__btn popup-link">Консультация</button></div>
                <div class="team__item"><img src="<?php the_field('team_img3'); ?>" alt="team__img" class="team__img"><div class="team__name"><?php the_field('team_name3'); ?></div><div class="team__pos"><?php the_field('team_pos3'); ?></div><button class="team__btn popup-link">Консультация</button></div>
                <div class="team__item"><img src="<?php the_field('team_img4'); ?>" alt="team__img" class="team__img"><div class="team__name"><?php the_field('team_name4'); ?></div><div class="team__pos"><?php the_field('team_pos4'); ?></div><button class="team__btn popup-link">Консультация</button></div>
            </div>
        </div>
    </section>
    <?php
        get_footer();
    ?>