<?php
/**
 * Template Name: Weddings New
 */
// $placeholder = THEMEURI . 'images/rectangle.png';
// $banner = get_field("flexslider_banner");
// $has_banner = ($banner) ? 'hasbanner':'nobanner';


get_header(); 
$post_type = get_post_type();
$dClass = '';
$mClass = '';
$heroImage = get_field("category_image");
$mobileBanner = get_field('mobile-banner');
if( $mobileBanner ) {
	$dClass = 'desktop';
	$mClass = 'mobile';
}
$has_hero = ($heroImage) ? 'has-banner':'no-banner';


$registration_status = get_field("registration_status"); 
$status = ($registration_status) ? $registration_status : 'open';
$blank_image = THEMEURI . "images/square.png";
$status_custom_message = get_field("status_custom_message");
$passport = get_field('passport_btn');
$passLabel = get_field('passport_label');
$idArray = array('266','267','268','269','270','271','154','152','153','40','41','42','43','58','57','56','55','54','53','59','179','180','38','39');
if( $passport == 'all' ) {
	$pp = 'data-accesso-launch';
} elseif(in_array($passport, $idArray )) {
	$pp = 'data-accesso-package="'.$passport.'"';
} else {
	$pp = 'data-accesso-keyword="'.$passport.'"';
}
// echo '<pre>';
// print_r($pp);
// echo '</pre>';
?>
<div id="primary" class="content-area-full  outfitters post-type-dining single-post <?php echo $has_hero ?>">
	<?php if ($heroImage) { ?>
		<div class="post-hero-image <?php echo $status; ?>">
			<img src="<?php echo $heroImage['url'] ?>" alt="<?php echo $heroImage['title'] ?>" class="featured-image <?php echo $dClass; ?>">

			<img src="<?php echo $mobileBanner['url'] ?>" alt="<?php echo $mobileBanner['title'] ?>" class="featured-image <?php echo $mClass; ?>">
			<?php if ($status=='open') { ?>

				<?php if( $passport !== 'none' ){ ?>
					<div class="stats open">
						<a <?php if($passport){echo $pp;} ?> href="#" target="<?php echo $buttonTarget ?>" class="registerBtn">
							<?php if($passLabel){
								echo $passLabel;
							}else{
								echo 'Buy';
							} ?>
						</a>
					</div>

				<?php }else{ ?>
					<?php if ($registerButton && $registerLink) { ?>
						<div class="stats open"><a href="<?php echo $registerLink ?>" target="<?php echo $registerTarget ?>" class="registerBtn"><?php echo $registerButton ?></a></div>
					<?php } ?>
				<?php } ?>
			<?php } else if($status=='closed') { ?>
			<div class="stats closed">SOLD OUT</div>
			<?php } else if($status=='custom') { ?>

				<?php if ($status_custom_message) { ?>
				<div class="stats closed custom-message-banner"><div class="innerTxt"><?php echo $status_custom_message ?></div></div>
				<?php } ?>
			
			<?php } ?>
			
		</div>
	<?php } ?>
	<main id="main" class="site-main fw-left" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php if( get_the_content() ) { ?>
				<div class="intro-text-wrap">
					<div class="wrapper">
						<h1 class="page-title"><span><?php the_title(); ?></span></h1>
						<div class="intro-text"><?php the_content(); ?></div>
					</div>
				</div>
			<?php } ?>

			<?php get_template_part("parts/subpage-tabs"); ?>

		<?php endwhile; ?>


	<?php include(locate_template('parts/wedding-layouts.php')); ?>

				

		<?php /* FAQ */ ?>
		<?php 
		$faq_title = get_field("faq_title");
		if( $faqs = get_faq_listings($post_id) ) { ?>
			<?php
				$customFAQTitle = $faq_title;
				include( locate_template('parts/content-faqs.php') ); 
				include( locate_template('inc/faqs.php') ); 
			?>
		<?php } ?>



	<?php
	/* FAQS JAVASCRIPT */ 
	//include( locate_template('inc/faqs-script.php') ); 
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php include( locate_template('inc/pagetabs-script.php') );  ?>
<?php
get_footer();
