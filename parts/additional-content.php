<?php 
	/* FLEXIBLE CONTENT */
	$flex_section_title = get_field("flexcontent_section_title");
	$acIcon = get_field('ac_icon');
	$flex_blocks = get_field("text_and_image");
	$margin = ($flex_section_title) ? '':' nomtop';
	if($flex_blocks) { ?>
		<section id="flexible-content" data-section="<?php echo $flex_section_title ?>" class="section-content">
			<?php if ($flex_section_title) { ?>
			<div class="section-title-div">
				<div class="wrapper">
					<div class="shead-icon text-center svg-sec-icon">
						<div class="icon">
							<img src="<?php echo $acIcon['url']; ?>">
						</div>
						<!-- <div class="icon"><span class="ci-calendar"></span></div> -->
						<h2 class="stitle"><?php echo $flex_section_title ?></h2>
					</div>
				</div>
			</div>
			<?php } ?>

			<div class="text-and-image-blocks<?php echo $margin ?>">
				<div class="columns-2">
					<?php $x=1; foreach ($flex_blocks as $b) { 
						$f_title = $b['title'];
						$f_text = $b['description'];
						$f_image = $b['gallery_image'];
						$fbutton = $b['button'];
						if($f_title || $f_text || $f_image) { 
							$colClass = ($x % 2==0) ? 'even':'odd';
							if( ($f_title || $f_text) && $f_image ) {
								$colClass .= ' half';
							} else {
								$colClass .= ' full';
							}
							$buttonTitle = (isset($fbutton['title']) && $fbutton['title']) ? $fbutton['title'] : '';
							$buttonLink = (isset($fbutton['url']) && $fbutton['url']) ? $fbutton['url'] : '';
							$buttonTarget = (isset($fbutton['target']) && $fbutton['target']) ? $fbutton['target'] : '_self';

							$imageCount = ($f_image) ? count($f_image) : 0;
						?>
						<div id="frow<?php echo $x?>" class="mscol <?php echo $colClass ?>">
							<?php if ($f_title || $f_text) { ?>
							<div class="textcol">
								<div class="inside">
									<div class="info">
										<?php if($f_title) { ?>
											<h3 class="mstitle"><?php echo $f_title ?></h3>
										<?php } ?>
										<?php if($f_text || ($buttonTitle && $buttonLink) ) { ?>
											<div class="textwrap">
												<div class="mstext"><?php echo $f_text ?></div>
												<?php if ($buttonTitle && $buttonLink) { ?>
												<div class="buttondiv">
													<a href="<?php echo $buttonLink ?>" target="<?php echo $buttonTarget ?>" class="btn-sm xs"><span><?php echo $buttonTitle ?></span></a>
												</div>
												<?php } ?>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<?php } ?>
							
							<?php if ($f_image) { ?>
							<div class="gallerycol">

								<?php if ($imageCount==1) { ?>
								<div class="singlepic">
									<img src="<?php echo $f_image[0]['url'] ?>" alt="<?php echo $f_image[0]['title'] ?>">
								</div>
								<?php } else { ?>
									<div class="flexslider">
										<ul class="slides">
											<?php $helper = THEMEURI . 'images/rectangle-narrow.png'; ?>
											<?php foreach ($f_image as $s) { ?>
												<li class="slide-item" style="background-image:url('<?php echo $s['url']?>')">
													<img src="<?php echo $helper ?>" alt="" aria-hidden="true" class="placeholder">
													<img src="<?php echo $s['url'] ?>" alt="<?php echo $s['title'] ?>" class="actual-image" />
												</li>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<?php $x++; } ?>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php } ?>