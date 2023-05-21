<?php
/*
Template Name: Uslugi
*/
get_header();
?>
<section class="services">
    <div class="container">
        <h2 class="testimonal__h2">Услуги компании</h2>
        <div class="services__body">
            <?php
            $posts = new WP_Query( array(
                'posts_per_page' => -1,
                'category_name' => 'uslugi',
                'orderBy' => 'date',
                'order' => 'ASC',
                'post_type' => 'post',
                'suppress_filters' => true,
            ));
            while( $posts->have_posts() ) : $posts->the_post();
            ?>
            <div class="service">
                <img class="services__img" src="<?php the_field('service_img'); ?>" alt="service">
                <div>
                    <div class="testimonal__name"><?php the_title(); ?></div>
                    <div class="testimonal__text"><?php the_field('service_descr'); ?></div>
                    <button class="service__btn popup-link">Консультация</button>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php
get_footer();
?>