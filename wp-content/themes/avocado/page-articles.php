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
            $current_page = !empty( $_GET['article-page'] ) ? $_GET['article-page'] : 1;
            $posts = new WP_Query( array(
                'posts_per_page' => 6,
                'category_name' => 'stati',
                'paged' => $current_page,
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
                <a href="<?php echo get_permalink(); ?>">Читать дальше...</a>
            </div>
            <?php
            endwhile;
            ?>
            <div class="pagination">
                <?php
                echo paginate_links( array(
                    'base' => get_permalink(252) . '%_%',
                    'format' => '?article-page=%#%',
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