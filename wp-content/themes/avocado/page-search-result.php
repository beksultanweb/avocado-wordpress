<?php
/*
Template Name: Search results
*/
?>
<?php
    get_header();
?>
<section class="search">
        <div class="container">
            <h2 class="title">Поиск недвижимости</h2>
            <div>
                <form class="search__body" action="search" method="GET">
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
                        ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Вид недвижимости
                    <select name="type[]" id="type" multiple>
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
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Количество комнат
                    <select name="rooms-number" id="rooms-number">
                        <option value="" selected>Любой комнатности</option>
                        <?php
                            $res = array();
                            $pr_type2 = array();
                            foreach( $posts as $post ) {
                                setup_postdata($post);
                                $pr_type = get_field('property_rooms');
                                array_push($pr_type2, $pr_type);
                            }
                            $res = array_unique($pr_type2);
                            foreach($res as $resel) {
                            ?>
                            <option value="<?php echo $resel; ?>"><?php echo $resel; ?>-комнатный</option>
                            <?php
                        }
                        ?>
                    </select>
                    </label>
                    <label class="search__label">Цена
                        <div class="price-input">
                            <input class="search-input" type="number" name="minprice" value="" placeholder="От">
                            <div>-</div>
                            <input class="search-input" type="number" name="maxprice" value="" placeholder="До">
                            <div>&euro;</div>
                        </div>
                    </label>
                    <label class="search__label">Поиск по ID номеру
                    <select name="id" id="id">
                        <option value="">Любой</option>
                        <?php
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
                            <input class="search-input" type="number" name="mindate" value="" placeholder="От">
                            <div>-</div>
                            <input class="search-input" type="number" name="maxdate" value="" placeholder="До">
                        </div>
                    </label>
                    <label class="search__label">Расстояние до моря
                    <select name="distance-to-sea" id="distance-to-sea">
                        <?php
                        foreach( $posts as $post ) {
                            setup_postdata($post)
                            ?>
                            <option value=""></option>
                            <?php
                        }
                        ?>
                    </select>
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
						$location=$_GET['location'];
                        $type=$_GET['type'];
                        $rooms=$_GET['rooms-number'];
						$minprice=$_GET['minprice'];
						$maxprice=$_GET['maxprice'];
                        $ID=$_GET['id'];
                        $mindate=$_GET['mindate'];
						$maxdate=$_GET['maxdate'];
                        $sea=$_GET['distance-to-sea'];

				        if($location != "" && $type=="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
						{
						$the_query = new WP_Query( array(
						'post_type' => 'post',
						// 'paged' => $paged,
						'meta_query'=>array(
						     array(
							  'key'=>'property_location',
							  'value'=> $location,
							  'compare'=>'IN'
						          )
							 )));
						}
						else if($location=="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
						{
							$the_query = new WP_Query( array(
							'post_type' => 'post',
							// 'paged' => $paged,
							'meta_query'=>array(
								array(
								  'key'=>'property_price',
								  'type'=>'NUMERIC',
								  'value'=>array($minprice,$maxprice),
								  'compare'=>'BETWEEN'
									  )
							   )));
						}
						else if($location=="" && $type=="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
						{
							$the_query = new WP_Query( array(
								'post_type' => 'post',
								// 'paged' => $paged,
								'meta_query'=>array(
									array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'<='
										  )
								   )));
						}
						else if($location!="" && $type=="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
						{
							$the_query = new WP_Query( array(
								'post_type' => 'post',
								// 'paged' => $paged,
								'meta_query'=>array(
									array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'<='
										  ),
									array(
									  'key'=>'property_location',
									  'value'=>$location,
									  'compare'=>'LIKE'
										  )
								   )));
						}
						else if($location=="" && $type=="" && $rooms!="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
						{
							$the_query = new WP_Query( array(
								'post_type' => 'post',
								// 'paged' => $paged,
								'meta_query'=>array(
									array(
									  'key'=>'property_rooms',
									  'type'=>'NUMERIC',
									  'value'=>$rooms,
									  'compare'=>'<='
										  ),
									array(
									  'key'=>'property_price',
									  'type'=>'NUMERIC',
									  'value'=>array($minprice,$maxprice),
									  'compare'=>'BETWEEN'
										  )
								   )));
						}
						else if($location!="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
						{
							$the_query = new WP_Query( array(
								'post_type' => 'post',
								// 'paged' => $paged,
								'meta_query'=>array(
									array(
										  'key'=>'property_location',
										  'value'=>$location,
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
                        else if($location!="" && $type!="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
                        {
                            $the_query = new WP_Query( array(
                                'post_type' => 'post',
                                'meta_query'=>array(
                                    array(
                                        'key'=>'property_location',
                                        'value'=>$location,
                                        'compare'=>'LIKE'
                                    ),
                                    array(
                                        'key'=>'property_type',
                                        'value'=>$type,
                                        'compare'=>'LIKE'
                                    )
                                )
                            ));
                        }
                        else if($location!="" && $type!="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $mindate=="" && $maxdate=="" && $sea=="")
                        {
                            $the_query = new WP_Query( array(
                                'post_type' => 'post',
                                'meta_query'=>array(
                                    array(
                                        'key'=>'property_location',
                                        'value'=>$location,
                                        'compare'=>'LIKE'
                                    ),
                                    array(
                                        'key'=>'property_type',
                                        'value'=>$type,
                                        'compare'=>'LIKE'
                                    ),
                                    array(
                                        'key'=>'property_rooms',
                                        'value'=>$rooms,
                                        'compare'=>'LIKE'
                                    )
                                )
                            ));
                        }
						else if($location!="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $mindate!="" && $maxdate!="" && $sea=="")
						{
							// Todo
							echo "TEST";
							$the_query = new WP_Query( array(
								'post_type' => 'post',
								// 'paged' => $paged,
								'meta_query'=>array(
									 array(
									  'key'=>'property_location',
									  'value'=>$location,
									  'compare'=>'LIKE'
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
                        else if($ID!="")
                        {
                            $the_query = new WP_Query( array(
                                'post_type' => 'post',
                                'post__in' => $ID
                            ));
                        }
						else
						{
							echo "test";
							$the_query = new WP_Query( array(
							'post_type' => 'post',
							// 'paged' => $paged,
							'meta_query'=>array(
								 array(
								  'key'=>'property_location',
								  'value'=>$location,
								  'compare'=>'LIKE'
									  ),
                                array(
                                'key'=>'property_type',
                                'value'=>$type,
                                'compare'=>'LIKE'
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
                                    'value'=>$sea,
                                    'compare'=>'LIKE'
                                        ),
							   )));
						}

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
                           <?php endwhile; ?>
                        </div>
                </div>
        </div>
</main>
<?php
    get_footer();
?>