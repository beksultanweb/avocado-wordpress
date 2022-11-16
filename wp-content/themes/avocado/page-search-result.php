<?php
/*
Template Name: Search results
*/
?>
<?php
    get_header();
?>
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
                        $date=$_GET['built-year'];
                        $sea=$_GET['distance-to-sea'];

				        if($location!="" && $type=="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $date=="" && $sea=="")
						{
						$the_query = new WP_Query( array(
						'post_type' => 'post',
						// 'paged' => $paged,
						'meta_query'=>array(
						     array(
							  'key'=>'property_location',
							  'value'=>$location,
							  'compare'=>'LIKE'
						          )
						   )));
						}
						else if($location=="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $date=="" && $sea=="")
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
						else if($location=="" && $type=="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $date=="" && $sea=="")
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
						else if($location!="" && $type=="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $date=="" && $sea=="")
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
						else if($location=="" && $type=="" && $rooms!="" && $minprice!="" && $maxprice!="" && $ID=="" && $date=="" && $sea=="")
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
						else if($location!="" && $type=="" && $rooms=="" && $minprice!="" && $maxprice!="" && $ID=="" && $date=="" && $sea=="")
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
                        else if($location!="" && $type!="" && $rooms=="" && $minprice=="" && $maxprice=="" && $ID=="" && $date=="" && $sea=="")
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
                        else if($location!="" && $type!="" && $rooms!="" && $minprice=="" && $maxprice=="" && $ID=="" && $date=="" && $sea=="")
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
                        else if($ID!="")
                        {
                            $the_query = new WP_Query( array(
                                'post_type' => 'post',
                                'post__in' => $ID
                            ));
                        }
						else
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
                                    'value'=>$date,
                                    'compare'=>'LIKE'
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