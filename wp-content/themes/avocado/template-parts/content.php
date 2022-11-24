<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="property-photos">
        <div class="container">
            <div class="property-photos__info">
                <h1 class="property-photos__title"><?php the_title(); ?></h1>
                <div class="property-photos__price">от €
                    <?php $price = get_field('property_price');
                        echo number_format($price, 0, ',', ' ');
                    ?></div>
            </div>
            <div class="property-photos__content">
                <div class="property-photos__body">
                    <img class="property-photos__main-photo" src="<?php the_field('property_img'); ?>" alt="property">
                    <div class="property-photos__nav">
                        <div id="prev"></div>
                        <div class="property-slider">
                            <div class="property-photos-line">
                                <?php
                                if ( get_post_meta( get_the_ID(), 'images', false ) ){ //images название вашего произвольного поля
                                    $image_array = get_post_meta( get_the_ID(), 'images', false ); //images название вашего произвольного поля
                                }
                                if ( $image_array ) {
                                    foreach ( $image_array as $image ) {
                                        ?>
                                        <img class="property-photos__photo" src="<?php echo wp_get_attachment_image_url( $image, 'thumbnail'); ?>" alt="property">
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div id="next"></div>
                    </div>
                </div>
                <div class="form">
                    <div class="interested">Интересует данный объект недвижимости?</div>
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
                </div>
                <div id="yamaps" class="map">
                </div>
            </div>
        </div>
    </section>
    <section class="property-info">
        <div class="container">
            <h2 class="property-info__title">Информация о недвижимости</h2>
            <div class="property-info__content">
                <div class="grey">
                    <?php the_field('property_additionals'); ?>
                </div>
                <div>
                    <div class="property-info__text">
                        <?php the_field('property_description'); ?>
                    </div>
                    <button class="property-info__btn popup-link">Перезвоните мне</button>
                </div>
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