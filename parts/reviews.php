<?php
$review_section_title = get_field('review_section_title');
// house name
$aTitle = strtolower(str_replace(' ', '', get_the_title()));


$posts = get_posts(array(
	'numberposts'	=> -1,
	'post_type'		=> 'review',
	// 'meta_key'		=> 'house',
	// 'meta_value'	=> $aTitle
	'meta_query'	=> array(
		array(
			'key'		=> 'house',
			'value'		=> $aTitle,
			'compare'	=> 'LIKE'
		)
	)
));

if( $posts ):
?>
	<section class="the-reviews" data-section="<?php echo $review_section_title ?>">
		<div class="wrapper">
			<?php if ($review_section_title) { ?>
			<div class="section-title-div">
				<div class="wrapper">
					<div class="shead-icon text-center svg-sec-icon">
						<div class="icon">
							<img src="<?php echo $acIcon['url']; ?>">
						</div>
						<!-- <div class="icon"><span class="ci-calendar"></span></div> -->
						<h2 class="stitle"><?php echo $review_section_title ?></h2>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="reviews flexslider carousel">
				<ul class="slides">
					<?php foreach( $posts as $post ): 
				
							setup_postdata( $post );
							$exp = get_field('overall_experience');
							$house = get_field('house');
							// echo '<pre>';
							// print_r($exp);
							// echo '</pre>';
							if( $exp == 'verypositive' ) {
								$stars = '<div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>';
							} elseif( $exp == 'positive' ) {
								$stars = '<div class="star"></div><div class="star"></div><div class="star"></div><div class="star"></div>';
							} elseif( $exp == 'neutral' ) {
								$stars = '<div class="star"></div><div class="star"></div><div class="star"></div>';
							} elseif( $exp == 'negative' ) {
								$stars = '<div class="star"></div><div class="star"></div>';
							} elseif( $exp == 'verynegative' ) {
								$stars = '<div class="star"></div>';
							}

				 ?>
					<li>
						<div class="review">
							<div class="quote">
								<?php the_content(); ?>
							</div>
							<div class="stars">
								<?php echo $stars; ?>
							</div>
						</div>
					</li>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
	</section>
<?php endif; ?>