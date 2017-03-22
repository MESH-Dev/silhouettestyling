<?php get_header(); ?>

<main id="content">

	<?php 
		$home_bg = get_field('home_bg', 2);
		$home_bg_url = $home_bg['sizes']['background-fullscreen'];
	?>
	<div class="404" id="main-content">
	<?php get_template_part('/partials/main-nav')?>
	<section id="home-404" class="home-404" style="background-image:url('<?php echo $home_bg_url; ?>')" >
		<!-- <h1>
			Page Not Found
		</h1> -->
		<h1>The page you requested could not be found.</h1><br> <h2>Please return to the <a href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a></h2>
			<!-- <img class="logo-img" alt="Silhouette Styling Logo" src="<?php bloginfo( 'template_directory' ); ?>/img/logo/logo.png">
		<div class="down twelve columns">
			<div class="content">
				<a href="#main-content">
					<img class="down-arrow" alt="Down arrow, click to proceed to content" src="<?php bloginfo( 'template_directory' ); ?>/img/arrows/down-arrow.png">
				</a>
			</div>
		</div> -->
	</section>
	</div>

<!-- <div id="content">
	
	<h1>Page Not Found</h1>
	<p>The page you requested could not be found. Please return to the <a href="<?php bloginfo( '/' ); ?>">homepage</a></p>
	
	<?php //get_search_form(); ?>

</div> --><!-- End of Content -->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>