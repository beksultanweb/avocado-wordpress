<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="property-photos">
        <div class="container">
            <div class="property-photos__info">
                <h1 class="property-photos__title"><?php the_title(); ?></h1>
                <div class="property-photos__price">€
                    <?php $loop = CFS()-> get('flat');
                        $array = [];
                        foreach($loop as $row) {
                            array_push($array, $row['flat_price']);
                        }

                        echo number_format(min($array), 0, ',', ' ') . ' - € ' . number_format(max($array), 0, ',', ' ');
                    ?></div>
            </div>
            <div class="property-additional-information">
                <div class="property-additional-information_item">
                    <?php echo do_shortcode('[favorite_button]') ?>
                    <div class="pr_id">
                        <?php
                        $city = get_the_category(get_the_ID());
                        echo $city[0] -> name . ' - ' . get_field('property_location');
                        ?>
                    </div>
                    <div class="pr_id"><?php the_field('property_ID'); ?></div>
                </div>
                <div class="mob"></div>
            </div>
            <div class="property-photos__content">
                <div class="property-photos__body">
                    <img class="property-photos__main-photo" src="<?php the_field('property_img'); ?>" alt="property">
                    <div class="property-photos__nav">
                        <div id="prev"></div>
                        <div class="property-slider">
                            <div class="property-photos-line">
                                <?php
                                    $loop = CFS()->get('property_photos');
                                    foreach ( $loop as $row ) {
                                        ?>
                                        <img class="property-photos__photo" src="<?= $row['property_photo']; ?>" alt="property_img">
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div id="next"></div>
                    </div>
                </div>
                <div class="form">
                    <div class="predstavitel">
                        <img class="foto_predstavitelya" src="<?php echo the_field('foto_predstavitelya') ?>" alt="rieltor">
                        <div>
                            <div class="predstavitel_name">
                                <?php echo the_field('predstavitel') ?>
                            </div>
                            <div class="predstavitel_subtitle">
                                Представитель
                            </div>
                        </div>
                    </div>
                    <div class="call-to-action">Оставьте заявку и наш менеджер свяжется с Вами</div>
                    <?php echo do_shortcode('[contact-form-7 id="183" title="Форма обратной связи"]'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="property-location">
        <div class="container">
            <div class="property-location__content">
                <div class="property-location__body">
                    <div class="property-location__info">
                        <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-locat.png" alt=""></div>
                        <div class="property-location__text">
                            <div class="property-location__subtitle">Местоположение</div>
                            <div class="property-location__title"><?php the_field('property_location'); ?></div>
                        </div>
                    </div>
                    <div class="property-location__info">
                        <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-resid.png" alt=""></div>
                        <div class="property-location__text">
                            <div class="property-location__subtitle">Тип недвижимости</div>
                            <div class="property-location__title"><?php the_field('property_type'); ?></div>
                        </div>
                    </div>
                    <div class="property-location__info">
                        <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-date.png" alt=""></div>
                        <div class="property-location__text">
                            <div class="property-location__subtitle">Год постройки</div>
                            <div class="property-location__title"><?php the_field('property_date'); ?></div>
                        </div>
                    </div>
                    <div class="property-location__info">
                        <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/prop-house.png" alt=""></div>
                        <div class="property-location__text">
                            <div class="property-location__subtitle">Этажность</div>
                            <div class="property-location__title"><?php the_field('property_floors'); ?></div>
                        </div>
                    </div>
                    <div class="property-location__info">
                        <div class="icon-green"><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/complex-sq.png" alt=""></div>
                        <div class="property-location__text">
                            <div class="property-location__subtitle">Площадь комплекса</div>
                            <div class="property-location__title"><?php the_field('property_complexsq'); ?> кв. м.</div>
                        </div>
                    </div>
                </div>
                <div class="property-location-second">
                    <div id="yamaps" class="map"></div>
                    <div class="distances">
                        <div class="distances_item">
                            <img class="distance_img" src="<?php echo bloginfo('template_url'); ?>/assets/icons/city_center.png" alt="center">
                            <div>
                                <div class="property-location__subtitle">До центра</div>
                                <div class="property-location__title"><?php the_field('property_city_center'); ?></div>
                            </div>
                        </div>
                        <div class="distances_item">
                            <img class="distance_img" src="<?php echo bloginfo('template_url'); ?>/assets/icons/sea.png" alt="sea">
                            <div>
                                <div class="property-location__subtitle">До моря</div>
                                <div class="property-location__title"><?php the_field('property_sea'); ?></div>
                            </div>
                        </div>
                        <div class="distances_item">
                            <img class="distance_img" src="<?php echo bloginfo('template_url'); ?>/assets/icons/plane.png" alt="">
                            <div>
                                <div class="property-location__subtitle">До аэропорта</div>
                                <div class="property-location__title"><?php the_field('property_airport'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <?php
            $loop = CFS()->get('flat');
            $object_type = CFS()->get('object_type');
            foreach ($loop as $row) {
                ?>
                <div class="flat">
                    <div>
                        <div class="flat_type"><?php echo $row['flat_type']; foreach($object_type as $key => $label) echo ' ' . $label; ?></div>
                        <div><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/flat_sq.png" alt="square"> Площадь: <?php echo $row['flat_square']; ?> кв.м.</div>
                        <div><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/flat_san.png" alt="sanuzel"> Сан.узел: <?php echo $row['flat_sanuzel']; ?></div>
                    </div>
                    <div>
                        <div><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/flat_bal.png" alt="balkon"> Балкон: <?php echo $row['flat_balkon']; ?></div>
                        <div><img src="<?php echo bloginfo('template_url'); ?>/assets/icons/flat_kitchen.png" alt="kitchen"> Кухня: <?php echo $row['flat_kitchen']; ?></div>
                    </div>
                    <div>
                        <div class="flat_price">Цена: <?php $price = $row['flat_price'];
                        echo number_format($price, 0, ',', ' ');
                    ?> EUR</div>
                        <button class="flat_btn popup-link">Связаться с менеджером</button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <section class="property-info">
        <div class="container">
            <h2 class="property-info__title">Информация о недвижимости</h2>
            <div class="property-info__content">
                <div class="additional_convenience">
                <?php
                    $loop = CFS()->get('additional_convenience');
                    foreach ( $loop as $row ) {
                        ?>
                        <div class="convenience">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/icons/add_info.png" alt="add_info">
                            <?php echo $row['convenience'] ?>
                        </div>
                        <?php
                    }
                ?>
                </div>
                <div class="property-info__text">
                    <?php the_field('property_description'); ?>
                </div>
                <button class="property-info__btn popup-link">Перезвоните мне</button>
            </div>
        </div>
    </section>

    <div class="entry-content">
        <?php
        the_content( sprintf(
            wp_kses(
                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'avocado' ),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'avocado' ),
            'after' => '</div>',
        ) );
        ?>
    </div>
</article>