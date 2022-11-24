<?php
/*
Template Name: Отзывы
*/
get_header();
?>
<section class="testimonals">
    <div class="container">
        <h2 class="testimonal__h2">Отзывы клиентов</h2>
        <div class="testimonals__block">
                <?php
                    $current_page = !empty( $_GET['otzyv-page'] ) ? $_GET['otzyv-page'] : 1;
                    $posts = new WP_Query( array(
                        'posts_per_page' => 6,
                        'paged' => $current_page,
                        'category_name' => 'testimonals',
                        'orderBy' => 'date',
                        'order' => 'ASC',
                        'post_type' => 'post',
                        'suppress_filters' => true,
                    ));
                    while( $posts->have_posts() ) : $posts->the_post();
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
                    endwhile;
                    ?>
                    <div class="pagination">
                        <?php
                        echo paginate_links( array(
                            'base' => get_permalink(169) . '%_%',
                            'format' => '?otzyv-page=%#%',
                            'total' => $posts->max_num_pages,
                            'current' => $current_page,
                        ) );
                        ?>
                    </div>
                    <?php
                    wp_reset_postdata();
                ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>