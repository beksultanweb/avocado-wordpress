<?php
/*
Template Name: Список недвижимости
*/
?>
<?php
    get_header();
?>
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
                            $current_page = !empty( $_GET['hot-deals'] ) ? $_GET['hot-deals'] : 1;

                            $query = new WP_Query( array(
                                'posts_per_page' => 6,
                                'paged' => $current_page,
                                'category_name' => 'hot_deals',
                                'orderBy' => 'date',
                                'order' => 'ASC',
                                'post_type' => 'post',
                                'suppress_filters' => true,
                            ));
                            while( $query->have_posts() ) : $query->the_post();
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
                            endwhile;
                            ?>
                            <div class="pagination">
                                <?php
                                echo paginate_links( array(
                                    'base' => get_permalink(92) . '%_%',
                                    'format' => '?hot-deals=%#%',
                                    'total' => $query->max_num_pages,
                                    'current' => $current_page,
                                ) );
                                ?>
                            </div>
                            <?php
                            wp_reset_postdata();
                        ?>
                    </div>
                    <div class="tabs__block">
                        <?php
                            $current_page = !empty( $_GET['new-objects'] ) ? $_GET['new-objects'] : 1;

                            $query = new WP_Query( array(
                                'posts_per_page' => 6,
                                'paged' => $current_page,
                                'category_name' => 'new_objects',
                                'orderBy' => 'date',
                                'order' => 'ASC',
                                'post_type' => 'post',
                                'suppress_filters' => true,
                            ));
                            while( $query->have_posts() ) : $query->the_post();
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
                            endwhile;
                            ?>
                            <div class="pagination">
                                <?php
                                echo paginate_links( array(
                                    'base' => get_permalink(92) . '%_%',
                                    'format' => '?new-objects=%#%',
                                    'total' => $query->max_num_pages,
                                    'current' => $current_page,
                                ) );
                                ?>
                            </div>
                            <?php
                            wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
    get_footer();
?>