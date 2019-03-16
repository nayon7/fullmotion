<!DOCTYPE HTML>
<!--
	Full Motion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Full Motion</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<?php wp_head(); ?>
	</head>


	<body id="top" <?php body_class(); ?>>

			<!-- Banner -->
			<!--
				To use a video as your background, set data-video to the name of your video without
				its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
				formats to work correctly.
			-->

<?php 
 $supported_image = array('gif','jpg','jpeg','png');
 
   $src_file_name = get_header_image();
 
   $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));
 
 ?>




			<?php if (in_array($ext, $supported_image)) :?>
				<section id="banner" data-video="images/banner">
					<div class="inner">
						<header>
							<h1><?php bloginfo('name'); ?></h1>
							<p><?php bloginfo('description'); ?><br />
							designed by <a href="<?php echo get_site_url(); ?>">Templated</a>
							<?php echo get_theme_mod('cust_footer_copyright_text'); ?>
							 </p>
						</header>
						<a href="#main" class="more">Learn More</a>
					</div>

				</section>
				<?php else:?>
				<section id="banner" data-video="images/banner">
					<div class="inner">
						<header>
							<h1><?php bloginfo('name'); ?></h1>
							<p><?php bloginfo('description'); ?><br />
							designed by <a href="<?php echo get_site_url(); ?>">Templated</a>
							<?php echo get_theme_mod('cust_footer_copyright_text'); ?>
							 </p>
						</header>
						<a href="#main" class="more">Learn More</a>
					</div>
					<video width="100%" height="100%" autoplay>						
					<?php 
					$id = get_theme_mod('banner_video');
					$url = wp_get_attachment_url($id);
					?>
					  <source src="<?php echo $url;?>" type="video/mp4">
					</video>
				</section>

			<?php endif;?>	











			<div class="service-section">
				<h2><?php echo get_theme_mod('cust_footer_text_top'); ?></h2>
				<p><?php echo get_theme_mod('cust_service_bottom');?></p>
			</div>

		
			<!-- Main -->
				<div id="main">
					<div class="inner">

					<!-- Boxes -->
						<div class="thumbnails">

						<?php 


							while (have_posts()) {
								the_post(); ?>
							

							<div class="box">
								<a href="<?php echo 'https://youtu.be/'.get_post_meta(get_the_ID(),"image-video",true);?>" class="image fit">


						<?php
						$youtube_url = 'https://youtu.be/'.get_post_meta(get_the_ID(),"image-video",true);
						// YouTube video url

						$urlArr = explode("/",$youtube_url);
						$urlArrNum = count($urlArr);

						// Youtube video ID
						$youtubeVideoId = $urlArr[$urlArrNum - 1];

						// Generate youtube thumbnail url
						$thumbURL = 'http://img.youtube.com/vi/'.$youtubeVideoId.'/0.jpg';

						// Display thumbnail image

						?>



							<?php if (has_post_thumbnail()):?>
								<?php the_post_thumbnail( array( 548, 353 ) );?>
								<?php else:?>
								<img src="<?php echo esc_url($thumbURL);?>" alt="" width="548" height="353">
							<?php endif;?>	

	
								</a>
								<div class="inner">
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
									<a href="<?php echo 'https://youtu.be/'.get_post_meta(get_the_ID(),"video",true);?>" class="button fit" data-poptrox="youtube,800x400">Watch</a>
								</div>
							</div>


<?php 
					}	 ?>

						</div>



					</div>
				</div>

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<h2><?php echo get_theme_mod('cust_footer_text_bottom'); ?></h2>
						<p><?php echo get_theme_mod('cust_footer-top'); ?></p>

						<?php dynamic_sidebar('footer3') ?>



					</div>
				</footer>

		<!-- Scripts -->
			
<?php wp_footer(); ?>
	</body>
</html>