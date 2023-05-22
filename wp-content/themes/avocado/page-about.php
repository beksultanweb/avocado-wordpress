<?php
/*
Template Name: О компании
*/
get_header();
?>
<section class="about search_page">
    <div class="container">
        <div class="about__content">
            <div>
                <h2 class="about__title"><?php the_field('about_title', 2); ?></h2>
                <p class="about__p"><?php the_field('about_description_about', 2); ?></p>
            </div>
            <div>
                <img class="tabs__img" src="<?php the_field('about_img', 2); ?>" alt="about">
            </div>
            <div>
                <img class="tabs__img" src="<?php the_field('about_img2', 2); ?>" alt="about">
            </div>
            <div>
                <p class="about__p"><?php the_field('about_description_about2', 2); ?></p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>