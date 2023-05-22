<?php
/*
Template Name: Шаблон для статей
Template Post Type: post, stati
*/
get_header();
?>
    <section class="article-page search_page">
        <div class="container">
        <?php
        while ( have_posts() ) : the_post();
        ?>
        <img class="articles__img" src="<?php the_field('article_img') ?>" alt="article_img">
        <div class="article__title"><?php the_title(); ?></div>
        <p class="article__text"><?php the_field('article_text') ?></p>
        </div>
        <?php
        endwhile;
        ?>
    </section>
<?php
get_footer();
?>