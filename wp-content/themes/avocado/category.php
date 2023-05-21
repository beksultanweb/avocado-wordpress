<?php
/*
Template Name: Search results
*/
?>
<?php
    get_header();
    $location=$_GET['location'];
    $type=$_GET['type'];
    $rooms=$_GET['rooms-number'];
    $minprice=$_GET['minprice'];
    $maxprice=$_GET['maxprice'];
    $additional_category=$_GET['add_cat'];
    if($minprice != "") {
        $minprice=(int)str_replace(' ', '', $_GET['minprice']);
    }
    if($maxprice != "") {
        $maxprice=(int)str_replace(' ', '', $_GET['maxprice']);
    }
    $ID=$_GET['id'];
    $mindate=$_GET['mindate'];
    $maxdate=$_GET['maxdate'];
    $maxsea=$_GET['maxsea'];
    $queried_object = get_queried_object();
    $current_category = $queried_object -> slug;
    $parentCName = get_cat_name($queried_object -> parent);
    $searching_cat = $_GET['category'];
?>
<section class="search search_page">
        <div class="container">
            <h2 class="title">Поиск среди <?= $queried_object -> name; ?></h2>
            <div>
                <form action="<?php get_permalink('search') ?>" onsubmit="return validateForm()" method="GET">
                <?php
                if($parentCName == 'Города') {
                    ?>
                    <div class="cats">
                        <div class="category">
                            <input type="radio" name="add_cat" value="new_objects">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/new.png" alt="new">
                            <div class="cat_name">Новые объекты</div>
                        </div>
                        <div class="category">
                            <input type="radio" name="add_cat" value="blizhe-k-moryu">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/sea.png" alt="sea">
                            <div class="cat_name">Близко к морю</div>
                        </div>
                        <div class="category">
                            <input type="radio" name="add_cat" value="hot_deals">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/hot.png" alt="hot">
                            <div class="cat_name">Горящие предложения</div>
                        </div>
                        <div class="category">
                            <input type="radio" name="add_cat" value="s-bassejnom">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/pool.png" alt="pool">
                            <div class="cat_name">С бассейном</div>
                        </div>
                        <div class="category">
                            <input type="radio" name="add_cat" value="villy-na-prodazhu">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/villa.png" alt="villa">
                            <div class="cat_name">Виллы на продажу</div>
                        </div>
                        <div class="category">
                            <input type="radio" name="add_cat" value="dlya-investiczii">
                            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/invest.png" alt=invest">
                            <div class="cat_name">Для инвестиции</div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="search__body">
                <?php
                    $posts = get_posts( array(
                            'category' => array($curr_cID, $add_cID),
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
        <div class="tabs__body">
            <div class="result__block">
<?php
                        if($searching_cat != "") {
                            $current_category = $current_category . ' + ' . $searching_cat;
                        }
                        if($additional_category != "") {
                            $current_category = $current_category . ' + ' . $additional_category;
                        }

						$current_page = !empty( $_GET['prop'] ) ? $_GET['prop'] : 1;

                        $the_query = new WP_Query(array(
                            'category_name' => $current_category,
                            'posts_per_page' => 6,
                            'paged' => $current_page,
                            'post_type' => 'post'
                        ));

                        if ($ID != "") {
                            $the_query->set('p', $ID);
                        } else {
                            $meta_query = array();

                            if ($location != "") {
                                $meta_query[] = array(
                                    'key' => 'property_location',
                                    'value' => $location,
                                    'compare' => 'IN'
                                );
                            }

                            if ($type != "") {
                                $meta_query[] = array(
                                    'key' => 'property_type',
                                    'value' => $type,
                                    'compare' => 'IN'
                                );
                            }

                            if ($rooms != "") {
                                $meta_query[] = array(
                                    'key' => 'property_rooms',
                                    'type' => 'NUMERIC',
                                    'value' => $rooms,
                                    'compare' => 'LIKE'
                                );
                            }

                            if ($minprice != "" && $maxprice != "") {
                                $meta_query[] = array(
                                    'key' => 'property_price',
                                    'type' => 'NUMERIC',
                                    'value' => array($minprice, $maxprice),
                                    'compare' => 'BETWEEN'
                                );
                            }

                            if ($mindate != "" && $maxdate != "") {
                                $meta_query[] = array(
                                    'key' => 'property_date',
                                    'type' => 'NUMERIC',
                                    'value' => array($mindate, $maxdate),
                                    'compare' => 'BETWEEN'
                                );
                            }

                            if ($maxsea != "") {
                                $meta_query[] = array(
                                    'key' => 'property_sea',
                                    'type' => 'NUMERIC',
                                    'value' => $maxsea,
                                    'compare' => '<='
                                );
                            }

                            if (!empty($meta_query)) {
                                $the_query->set('meta_query', $meta_query);
                            }
                        }

                        if($the_query->have_posts()) :
                            while ( $the_query->have_posts() ) : $the_query->the_post();
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
                            <?php endwhile;
                        else :
                            echo 'По вашему запросу ничего не найдено';
                        endif;?>
						   <div class="pagination">
                                <?php
                                echo paginate_links( array(
                                    'base' => get_permalink('search') . '%_%',
                                    'format' => '?prop=%#%',
                                    'total' => $the_query->max_num_pages,
                                    'current' => $current_page,
                                ) );
                                ?>
                            </div>
							<?php wp_reset_postdata(); ?>
                        </div>
                </div>
        </div>
</main>
<?php
    get_footer();
?>