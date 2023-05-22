<?php
get_header();
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', get_post_type() );
        endwhile;
        ?>
        </main>
    </div>

    <section class="property-same">
    <div class="container">
        <h2 class="property-info__title">Похожие объекты</h2>
        <div class="property-same__content">
        <?php
            $posts = get_posts( array(
                'post__not_in' => array(get_the_ID()),
                'category_name' => 'for-sale, for-rent',
                'numberposts' => 3,
                'post_type' => 'post',
                // 'meta_query' => array(
                //     'relation' => 'OR',
                //     array(
                //         'key' => CFS() -> get('flat'),
                //         'value' => get_field( 'property_price' ),
                //         'compare' => 'LIKE'
                //     ),
                //     array(
                //         'key' => 'property_rooms',
                //         'value' => get_field( 'property_rooms' ),
                //         'compare' => 'LIKE'
                //     )
                // ),
                'suppress_filters' => true,
            ));
            foreach( $posts as $post ) {
                setup_postdata($post)
                ?>
                    <div class="tabs__item">
                    <?php
                        $city = get_the_category($post->ID);
                        $loop = CFS()-> get('flat');
                        $price = []; $square = []; $type = [];
                        foreach($loop as $row) {
                            array_push($price, $row['flat_price']);
                            array_push($square, $row['flat_square']);
                            array_push($type, $row['flat_type']);
                        }
                            ?>
                        <img class="tabs__img" src="<?php the_field('property_img'); ?>" alt="property">
                        <div class="tabs__sub">
                            <div class="tabs__city"><?php echo $city[0] -> name; ?></div>
                            <div class="tabs__ID"><?php the_field('property_ID') ?></div>
                        </div>
                        <div class="tabs__title"><?php the_title(); ?></div>
                        <div class="tabs__info">
                            <div class="tabs__graphics">
                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/flat.svg" alt="building">
                                <div class="tabs__subtitle"><?php echo implode(', ', $type); ?></div>
                            </div>
                            <div class="tabs__graphics">
                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/meters.svg" alt="square">
                                <div class="tabs__subtitle"><?php echo count($square) > 1 ? min($square) . '-' . max($square) : min($square); ?> кв.м.</div>
                            </div>
                        </div>
                        <div class="tabs__price">
                            <?php
                                echo number_format(min($price), 0, ',', ' ');
                            ?> EUR</div>
                        <div class="tabs__btns one_btn">
                            <a href="<?php echo get_permalink(); ?>">
                                <button class="tabs__btn">
                                    Подробнее
                                </button>
                            </a>
                        </div>
                    </div>
                <?php
            }
            wp_reset_postdata();
        ?>
        </div>
    </div>
    </section>
<?php
get_footer();
?>