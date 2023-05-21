<?php
/*
Template Name: Избранное
*/
get_header();
?>
<section class="testimonals search_page">
    <div class="container">
        <div>
            <h2 class="about__title">Избранное</h2>
        </div>
        <div class="tabs__body">
            <?php echo do_shortcode('[user_favorites]'); ?>
        </div>
        <?php echo do_shortcode('[clear_favorites_button]'); ?>
    </div>
</section>
<?php
get_footer();
?>