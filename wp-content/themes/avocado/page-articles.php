<?php
/*
Template Name: Статьи
*/
get_header();
?>
<section class="articles">
    <div class="container">
        <h2 class="article__h2">Полезная информация о недвижимости в Турции</h2>
        <div class="articles__content">
            <?php
            $posts = new WP_Query( array(
                'posts_per_page' => -1,
                'category_name' => 'stati',
                'orderBy' => 'date',
                'order' => 'ASC',
                'post_type' => 'post',
                'suppress_filters' => true,
            ));
            while( $posts->have_posts() ) : $posts->the_post();
            ?>
            <div class="article">
                <img class="articles__img" src="<?php the_field('article_img') ?>" alt="article">
                <div class="article__title"><?php the_title(); ?></div>
                <p class="article__text">
                    <?php
                        $string = (string)get_field('article_text');
                        echo internoetics_truncate_words($string, 20);
                    ?>
                </p>
                <a href="">Читать дальше...</a>
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