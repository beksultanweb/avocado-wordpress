<?php
/*
Template Name: Список недвижимости
*/
?>
<?php
    get_header();
?>
    <section class="search search_page">
        <div class="container">
            <h2 class="title">Поиск недвижимости</h2>
            <div>
                <form action="search" onsubmit="return validateForm()" method="GET">
                <div class="search__body">
                <?php
                    $sale_id = get_cat_ID('На продажу');
                    $rent_id = get_cat_ID('В аренду');
                    $posts = get_posts( array(
                            'category' => array($sale_id, $rent_id),
                            'numberposts' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'suppress_filters' => true
                    ));
                    ?>
                    <label class="search__label">Искать среди
                        <div class="price-input">
                            <label for="category">На продажу</label><input type="radio" checked name="category" id="category" value="for-sale">
                            <label for="category">В аренду</label><input type="radio" name="category" id="category" value="for-rent">
                        </div>
                    </label>
                    <label class="search__label">Город
                    <select name="city" id="city">
                        <option value="" selected>Любой город</option>
                        <?php
                            $cities = get_categories(array('parent' => 15));
                            foreach($cities as $cit) {
                            ?>
                            <option value="<?php echo $cit -> name; ?>"><?php echo $cit -> name; ?></option>
                            <?php
                            }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Местоположение
                    <select name="location[]" id="location" multiple>
                        <?php foreach($location as $val) {
                            ?>
                                <option value="<?php echo $val; ?>" selected><?php echo $val; ?></option>
                            <?php
                        } ?>

                        <?php
                        $res = array();
                        $pr_location2 = array();
                        foreach( $posts as $post ) {
                            setup_postdata($post);
                            $pr_location = get_field('property_location');
                            array_push($pr_location2, $pr_location);
                        }
                        $res = array_unique($pr_location2);
                        foreach($res as $resel) {
                            if($location == "") {
                                ?>
                                <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                                <?php
                            }
                            else if(!in_array($resel, $location)) {
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                        <?php
                        }
                    }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Вид недвижимости
                    <select name="type[]" id="type" multiple>
                        <?php foreach($type as $val) {
                            ?>
                                <option value="<?php echo $val; ?>" selected><?php echo $val; ?></option>
                            <?php
                        } ?>
                        <?php
                            $res = array();
                            $pr_type2 = array();
                            foreach( $posts as $post ) {
                                setup_postdata($post);
                                $pr_type = get_field('property_type');
                                array_push($pr_type2, $pr_type);
                            }
                            $res = array_unique($pr_type2);
                            foreach($res as $resel) {
                                if($type == "") {
                                    ?>
                                    <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                                    <?php
                                }
                                else if(!in_array($resel, $type)) {
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                            <?php
                        }
                    }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Количество комнат
                    <select name="rooms-number" id="rooms-number">
                        <?php
                        if($rooms == "") {
                        ?>
                        <option value="" selected>Любой комнатности</option>
                        <?php
                        }
                        else {
                            ?>
                            <option value="">Любой комнатности</option>
                            <option value="<?php echo $rooms; ?>" selected><?php echo $rooms; ?>-комнатный</option>
                            <?php
                        }
                            $res = array();
                            $pr_type2 = array();
                            foreach( $posts as $post ) {
                                setup_postdata($post);
                                $pr_type = get_field('property_rooms');
                                array_push($pr_type2, $pr_type);
                            }
                            $res = array_unique($pr_type2);
                            foreach($res as $resel) {
                                if($resel != $rooms){
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?>-комнатный</option>
                            <?php
                        }
                    }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Цена
                        <div class="price-input">
                            <input class="search-input" type="text" name="minprice" id="price" value="<?php
                            if($minprice != "") echo number_format($minprice, 0, ',', ' ');
                            ?>" placeholder="От">
                            <div>-</div>
                            <input class="search-input" type="text" name="maxprice" id="price" value="<?php
                            if($maxprice != "") echo number_format($maxprice, 0, ',', ' ');
                            ?>" placeholder="До">
                            <div>&euro;</div>
                        </div>
                    </label>
                    <label class="search__label">Поиск по ID номеру
                    <select name="id" id="id">
                        <?php
                        if($ID == "") {
                            ?>
                            <option value="" selected>Любой</option>
                        <?php
                        }
                        else {?>
                        <option value="" selected>Любой</option>
                        <option value="<?php echo $ID; ?>" selected><?php echo $ID; ?></option>
                        <?php
                        }
                        foreach( $posts as $post ) {
                            setup_postdata($post)
                            ?>
                            <option value="<?php echo $post->ID ?>"><?php echo $post->ID ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Год постройки
                        <div class="price-input">
                            <input class="search-input" type="number" name="mindate" id="date" value="<?php
                            if($mindate != "") echo $mindate;
                            ?>" placeholder="От">
                            <div>-</div>
                            <input class="search-input" type="number" name="maxdate" id="date" value="<?php
                            if($maxdate != "") echo $maxdate;
                            ?>" placeholder="До">
                        </div>
                    </label>
                    <label class="search__label">Расстояние до моря
                        <div class="price-input">
                            <input class="search-input" type="number" name="maxsea" id="sea" value="<?php
                            if($maxsea != "") echo $maxsea;
                            ?>" placeholder="До">
                            <div>м.</div>
                        </div>
                    </label>
                    <?php
                    wp_reset_postdata();
                ?>
                </div>
                <button class="search__btn">Поиск</button>
                </form>
            </div>
        </div>
    </section>
    <main>
        <div class="container">
            <div class="active__tabs">
                <input type="radio" name="active__tabs" id="btn-1" class="btn-1" checked>
                <label for="btn-1" class="btn">Продажа</label>
                <input type="radio" name="active__tabs" id="btn-2" class="btn-2">
                <label for="btn-2" class="btn">Аренда</label>
                <div class="tabs__body">
                    <div class="tabs__block">
                        <?php
                            $current_page = !empty( $_GET['for-sale'] ) ? $_GET['for-sale'] : 1;

                            $query = new WP_Query( array(
                                'posts_per_page' => 6,
                                'paged' => $current_page,
                                'category_name' => 'for-sale',
                                'orderBy' => 'date',
                                'order' => 'ASC',
                                'post_type' => 'post',
                                'suppress_filters' => true,
                            ));
                            while( $query->have_posts() ) : $query->the_post();
                            $city = get_the_category(get_the_ID());
                                ?>
                                    <div class="tabs__item">
                                        <img class="tabs__img" src="<?php the_field('property_img'); ?>" alt="property">
                                        <div class="tabs__sub">
                                            <div class="tabs__city"><?php echo $city[0] -> name; ?></div>
                                            <div class="tabs__ID"><?php the_field('property_ID') ?></div>
                                        </div>
                                        <div class="tabs__title"><?php the_title(); ?></div>
                                        <div class="tabs__info">
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/flat.svg" alt="building">
                                                <div class="tabs__subtitle"><?php the_field('property_rooms'); ?></div>
                                            </div>
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/meters.svg" alt="square">
                                                <div class="tabs__subtitle"><?php the_field('property_square'); ?> кв.м.</div>
                                            </div>
                                        </div>
                                        <div class="tabs__price">
                                            <?php
                                                $price = get_field('property_price');
                                                echo number_format($price, 0, ',', ' ');
                                            ?> EUR</div>
                                        <div class="tabs__btns">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <button class="tabs__btn">
                                                    Подробнее
                                                </button>
                                            </a>
                                            <?php echo do_shortcode('[favorite_button]') ?>
                                        </div>
                                    </div>
                                <?php
                            endwhile;
                            ?>
                            <div class="pagination">
                                <?php
                                echo paginate_links( array(
                                    'base' => get_permalink(92) . '%_%',
                                    'format' => '?for-sale=%#%',
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
                            $current_page = !empty( $_GET['for-rent'] ) ? $_GET['for-rent'] : 1;

                            $query = new WP_Query( array(
                                'posts_per_page' => 6,
                                'paged' => $current_page,
                                'category_name' => 'for-rent',
                                'orderBy' => 'date',
                                'order' => 'ASC',
                                'post_type' => 'post',
                                'suppress_filters' => true,
                            ));
                            while( $query->have_posts() ) : $query->the_post();
                            $city = get_the_category(get_the_ID());
                                ?>
                                    <div class="tabs__item">
                                        <img class="tabs__img" src="<?php the_field('property_img'); ?>" alt="property">
                                        <div class="tabs__sub">
                                            <div class="tabs__city"><?php echo $city[0] -> name; ?></div>
                                            <div class="tabs__ID"><?php the_field('property_ID') ?></div>
                                        </div>
                                        <div class="tabs__title"><?php the_title(); ?></div>
                                        <div class="tabs__info">
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/flat.svg" alt="building">
                                                <div class="tabs__subtitle"><?php the_field('property_rooms'); ?></div>
                                            </div>
                                            <div class="tabs__graphics">
                                                <img class="icon" src="<?php echo bloginfo('template_url'); ?>/assets/icons/meters.svg" alt="square">
                                                <div class="tabs__subtitle"><?php the_field('property_square'); ?></div>
                                            </div>
                                        </div>
                                        <div class="tabs__price">
                                            <?php
                                                $price = get_field('property_price');
                                                echo number_format($price, 0, ',', ' ');
                                            ?> EUR</div>
                                        <div class="tabs__btns">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <button class="tabs__btn">
                                                    Подробнее
                                                </button>
                                            </a>
                                            <?php echo do_shortcode('[favorite_button]') ?>
                                        </div>
                                    </div>
                                <?php
                            endwhile;
                            ?>
                            <div class="pagination">
                                <?php
                                echo paginate_links( array(
                                    'base' => get_permalink(92) . '%_%',
                                    'format' => '?for-rent=%#%',
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