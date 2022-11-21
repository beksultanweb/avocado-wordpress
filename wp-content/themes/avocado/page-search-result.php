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
?>
<section class="search">
        <div class="container">
            <h2 class="title">Поиск недвижимости</h2>
            <div>
                <form class="search__body" action="<?php get_permalink('search') ?>" onsubmit="return validateForm()" method="GET">
                <?php
                    $posts = get_posts( array(
                            'category' => array(6, 7),
                            'numberposts' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'suppress_filters' => true
                    ));
                    ?>
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

						$current_page = !empty( $_GET['prop'] ) ? $_GET['prop'] : 1;

						if($ID!="")
                        {
                            $the_query = new WP_Query( array(
                                'post_type' => 'post',
                                'p' => $ID
                            ));
                        }
				        else if($location != "" && $type=="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
						{
						$the_query = new WP_Query( array(
						'posts_per_page' => 6,
						'paged' => $current_page,
						'post_type' => 'post',
						'meta_query'=>array(
						     array(
							  'key'=>'property_location',
							  'value'=> $location,
							  'compare'=>'IN'
						          )
							 )));
						}
						else if($location=="" && $type!="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
                                'posts_per_page' => 6,
                                'paged' => $current_page,
                                'post_type' => 'post',
                                'meta_query'=>array(
                                    array(
                                        'key'=>'property_type',
                                        'value'=>$type,
                                        'compare'=>'IN'
                                    )
                                )
                            ));
						}
						else if($location=="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
								array(
								  'key'=>'property_price',
								  'type'=>'NUMERIC',
								  'value'=>array($minprice,$maxprice),
								  'compare'=>'BETWEEN'
									  )
							   )));
						}
						else if($location=="" && $type=="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
								'post_type' => 'post',
								'meta_query'=>array(
									array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'LIKE'
										  )
								   )));
						}
						else if($location!="" && $type=="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
								'post_type' => 'post',
								'meta_query'=>array(
									array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'LIKE'
										  ),
									array(
									  'key'=>'property_location',
									  'value'=>$location,
									  'compare'=>'LIKE'
										  )
								   )));
						}
						else if($location=="" && $type=="" && $rooms!="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
								'post_type' => 'post',
								'meta_query'=>array(
									array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'LIKE'
										  ),
									array(
									  'key'=>'property_price',
									  'type'=>'NUMERIC',
									  'value'=>array($minprice,$maxprice),
									  'compare'=>'BETWEEN'
										  )
								   )));
						}
						else if($location!="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
								'post_type' => 'post',
								'meta_query'=>array(
									array(
										  'key'=>'property_location',
										  'value'=>$location,
										  'compare'=>'IN'
										  ),
									array(
									  'key'=>'property_price',
									  'type'=>'NUMERIC',
									  'value'=>array($minprice,$maxprice),
									  'compare'=>'BETWEEN'
										  )
								   )));
						}
                        else if($location!="" && $type!="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
                        {
                            $the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
                                'post_type' => 'post',
                                'meta_query'=>array(
                                    array(
                                        'key'=>'property_location',
                                        'value'=>$location,
                                        'compare'=>'IN'
                                    ),
                                    array(
                                        'key'=>'property_type',
                                        'value'=>$type,
                                        'compare'=>'IN'
                                    )
                                )
                            ));
                        }
                        else if($location!="" && $type!="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea=="")
                        {
                            $the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
                                'post_type' => 'post',
                                'meta_query'=>array(
                                    array(
                                        'key'=>'property_location',
                                        'value'=>$location,
                                        'compare'=>'IN'
                                    ),
                                    array(
                                        'key'=>'property_type',
                                        'value'=>$type,
                                        'compare'=>'IN'
                                    ),
                                    array(
                                        'key'=>'property_rooms',
                                        'value'=>$rooms,
                                        'compare'=>'LIKE'
                                    )
                                )
                            ));
                        }
						else if($location!="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
								'post_type' => 'post',
								'meta_query'=>array(
									 array(
									  'key'=>'property_location',
									  'value'=>$location,
									  'compare'=>'IN'
										  ),
									 array(
									  'key'=>'property_price',
									  'type'=>'NUMERIC',
									  'value'=>array($minprice,$maxprice),
									  'compare'=>'BETWEEN'
										  ),
									 array(
										'key'=>'property_date',
										'type'=>'NUMERIC',
										'value'=>array($mindate, $maxdate),
										'compare'=>'BETWEEN'
											)
								   )));
						}
                        else if($location=="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
								'post_type' => 'post',
								'meta_query'=>array(
									 array(
									  'key'=>'property_price',
									  'type'=>'NUMERIC',
									  'value'=>array($minprice,$maxprice),
									  'compare'=>'BETWEEN'
										  ),
									 array(
										'key'=>'property_date',
										'type'=>'NUMERIC',
										'value'=>array($mindate, $maxdate),
										'compare'=>'BETWEEN'
											)
								   )));
						}
						else if($location!="" && $type!="" && $rooms!="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
								 array(
								  'key'=>'property_location',
								  'value'=>$location,
								  'compare'=>'IN'
									  ),
                                array(
                                'key'=>'property_type',
                                'value'=>$type,
                                'compare'=>'IN'
                                    ),
								 array(
								  'key'=>'property_price',
								  'type'=>'NUMERIC',
								  'value'=>array($minprice,$maxprice),
								  'compare'=>'BETWEEN'
									  ),
								 array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'LIKE'
                                 ),
                                 array(
                                    'key'=>'property_date',
									'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                        ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'BETWEEN'
                                        ),
							   )));
						}
                        else if($location!="" && $type=="" && $rooms!="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
								 array(
								  'key'=>'property_location',
								  'value'=>$location,
								  'compare'=>'IN'
									  ),
								 array(
								  'key'=>'property_price',
								  'type'=>'NUMERIC',
								  'value'=>array($minprice,$maxprice),
								  'compare'=>'BETWEEN'
									  ),
								 array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'LIKE'
                                 ),
                                 array(
                                    'key'=>'property_date',
									'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                        ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                        ),
							   )));
						}
                        else if($location=="" && $type=="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_date',
                                    'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                    ),
							   )));
                        }
                        else if($location=="" && $type=="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea=="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_date',
                                    'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                    ),
							   )));
                        }
                        else if($location=="" && $type=="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                    ),
							   )));
                        }
                        else if($location=="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_price',
                                    'type'=>'NUMERIC',
                                    'value'=>array($minprice, $maxprice),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_date',
                                    'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                    ),
							   )));
                        }
                        else if($location=="" && $type!="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_type',
                                    'value'=>$type,
                                    'compare'=>'IN'
                                    ),
                                array(
                                    'key'=>'property_price',
                                    'type'=>'NUMERIC',
                                    'value'=>array($minprice, $maxprice),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_date',
                                    'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                    ),
							   )));
                        }
                        else if($location!="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_location',
                                    'value'=>$location,
                                    'compare'=>'IN'
                                    ),
                                array(
                                    'key'=>'property_price',
                                    'type'=>'NUMERIC',
                                    'value'=>array($minprice, $maxprice),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_date',
                                    'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                    ),
							   )));
                        }
                        else if($location!="" && $type!="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_location',
                                    'value'=>$location,
                                    'compare'=>'IN'
                                    ),
                                array(
                                    'key'=>'property_type',
                                    'value'=>$type,
                                    'compare'=>'IN'
                                    ),
                                array(
                                    'key'=>'property_price',
                                    'type'=>'NUMERIC',
                                    'value'=>array($minprice, $maxprice),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_date',
                                    'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                    ),
							   )));
                        }
                        else if($location=="" && $type!="" && $rooms!="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $maxsea!="")
						{
							$the_query = new WP_Query( array(
							'posts_per_page' => 6,
							'paged' => $current_page,
							'post_type' => 'post',
							'meta_query'=>array(
                                array(
                                    'key'=>'property_type',
                                    'value'=>$type,
                                    'compare'=>'IN'
                                    ),
                                array(
                                    'key'=>'property_rooms',
                                    'value'=>$rooms,
                                    'compare'=>'LIKE'
                                    ),
                                array(
                                    'key'=>'property_price',
                                    'type'=>'NUMERIC',
                                    'value'=>array($minprice, $maxprice),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_date',
                                    'type'=>'NUMERIC',
                                    'value'=>array($mindate, $maxdate),
                                    'compare'=>'BETWEEN'
                                    ),
                                array(
                                    'key'=>'property_sea',
                                    'type'=>'NUMERIC',
                                    'value'=>$maxsea,
                                    'compare'=>'<='
                                    ),
							   )));
                        }
                        else {
							$the_query = new WP_Query( array(
								'posts_per_page' => 6,
								'paged' => $current_page,
								'post_type' => 'post',
								'meta_query'=>array(
									array(
									 'key'=>'property_location',
									 'value'=>$location,
									 'compare'=>'NOT IN'
										 ),
							)));
						}
                        if($the_query->have_posts()) :
                            while ( $the_query->have_posts() ) : $the_query->the_post();
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