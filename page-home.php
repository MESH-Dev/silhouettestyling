<?php 
/*
*Template Name: Homepage
*/
?>

<?php get_header(); ?>

<main id="content">

	<?php 
		$home_bg = get_field('home_bg');
		$home_bg_url = $home_bg['sizes']['background-fullscreen'];
	?>
	<section id="home" class="home-section" style="background-image:url('<?php echo $home_bg_url; ?>')" >
		<h1 class="sr-only">
			Silhouette Styling
		</h1>
			<img class="logo-img" alt="Silhouette Styling Logo" src="<?php bloginfo( 'template_directory' ); ?>/img/logo/logo.png">
		<div class="down twelve columns">
			<div class="content">
				<a href="#main-content">
					<img class="down-arrow" alt="Down arrow, click to proceed to content" src="<?php bloginfo( 'template_directory' ); ?>/img/arrows/down-arrow.png">
				</a>
			</div>
		</div>
	</section>

	<?php 


	?>

	

	<div class="fullwidth" id="main-content">
		<?php get_template_part('/partials/main-nav')?>
	<div class="container page">

		<?php 

		$mission_panel_img = get_field("mission_panel_image");
		$mission_panel_img_url = $mission_panel_img['sizes']['medium'];
		$mission_statement = get_field('mission_statement');

		?>
		<section id="mission">
			<article>
				<h2 class="section-logo">
					<span class="sr-only">Mission</span>
					<img alt="Mission" src="<?php bloginfo( 'template_directory' ); ?>/img/headers/mission.png">
				</h2>
				<div class="panel-img" data-anchor-target="#mission" data-top="top:-2%;" data-500-top="top:15%;"><!-- data-stellar-offset-parent="true" data-stellar-ratio=".025" -->
					<img src="<?php echo $mission_panel_img_url; ?>">
				</div>
				<h3 class="intro"><?php echo $mission_statement; ?></h3>
			</article>
		</section>

		<?php 

		$services_intro=get_field('services_intro');

		?>
		<section id="services">
			<div class="section-logo even">
				<span class="sr-only">Mission</span>
				<img alt="Mission" src="<?php bloginfo( 'template_directory' ); ?>/img/headers/services.png">
			</div>
			<h3 class="intro"><?php echo $services_intro;?></h3>

				<?php while (have_rows('contact_us_cta')) : the_row(); 
					$services_link_text = get_sub_field('link_text');
					$services_link = get_sub_field('contact_us_link');
				?>

				<div class="cta">
					<a class="cta-link" href="<?php echo $services_link; ?>"><?php echo $services_link_text; ?></a>
				</div>

				<?php endwhile; ?>
				<div class="row">
				<div class="service-container six columns">
					<ul>
					<?php while (have_rows('services')):the_row();
						$service_title = get_sub_field('service_title');
						$service_intro = get_sub_field('service_intro');
						$service_content = get_sub_field('service_content');
					?>
						<li> 
							<h4><?php echo $service_title; ?></h4>
							<p><?php echo $service_intro; ?></p>
							<ul class="services-nav">
								<li>
									<div class="service-content">
									<?php echo $service_content; ?>
									</div> <!-- end service-content -->
									<?php if(have_rows('additional_service_content')): ?>
									<div class="additional-service-content">
									<?php while(have_rows('additional_service_content')):the_row(); 

										$additional_service_type = get_sub_field('additional_service_type');
										$additional_service_title = get_sub_field('additional_service_title');
										$additional_service_content = get_sub_field('additional_service_content');

										if($additional_service_type != ""){
									?>

										<h4 class="service-type"><?php echo $additional_service_type; ?><h4>
										<h5 class="additional-service-title"><?php echo $additional_service_title; ?><h5>
										<p> <?php echo $additional_service_content; ?>
									<?php } endwhile; endif;?>
									</div> <!-- end additional service info -->
								</li>
							</ul>
					<?php endwhile; ?>
						<li>
					</ul>
				</div>
			</div>
		</section>
		<section id="accessories">
			<div class="section-logo">
				<span class="sr-only">Accessories</span>
				<img alt="Accessories" src="<?php bloginfo( 'template_directory' ); ?>/img/headers/accessories.png">
			</div>

			<?php 

				$acc_intro = get_field('acc_intro');
				$acc_statement = get_field('acc_stmt');
				$acc_horz_img = get_field('acc_horiz_img');
				$acc_horz_img_url = $acc_horz_img['sizes']['product-portrait'];
				$acc_h_img_caption = get_field('acc_horiz_img_cptn');
				$acc_vert_img = get_field('acc_vert_img');
				$acc_vert_img_url = $acc_vert_img['sizes']['product-landscape'];
				$acc_v_img_caption = get_field('acc_vert_img_cptn');

			?>

			<h3 class="intro"><?php echo $acc_intro; ?></h3>
			<?php while (have_rows('acc_cta')) : the_row(); 
					$acc_link_text = get_sub_field('acc_lt');
					$acc_link = get_sub_field('acc_link');
				?>

				<div class="cta">
					<a class="cta-link" href="<?php echo $acc_link; ?>"><?php echo $acc_link_text; ?></a>
				</div>

				<?php endwhile; ?>
			<p><?php echo $acc_statement; ?></p>
			<div class="row">
				<div class="product-wrapper "><!-- eight columns -->
					<div class="vert-product">
						<img src="<?php echo $acc_vert_img_url; ?>">
						<figcaption><?php echo $acc_v_img_caption ?></figcaption>
					</div>
					<div class="horiz-product">
						<img src="<?php echo $acc_horz_img_url; ?>">
						<figcaption><?php echo $acc_h_img_caption ?></figcaption>
					</div>
				</div>
			</div>

		</section>

		<?php 
			$tips_intro = get_field('tips_intro');
			$polyvore = get_field('polyvore_embed');

		?>

		<section id="tips">
			<div class="section-logo even">
				<span class="sr-only">Tips</span>
				<img alt="Tips" src="<?php bloginfo( 'template_directory' ); ?>/img/headers/tips.png">
			</div>

			<h3 class="intro"><?php echo $tips_intro ?></h3>

			<?php while (have_rows('tips_cta')) : the_row(); 
					$tip_link_text = get_sub_field('tips_lt');
					$tip_link = get_sub_field('polyvore_link');
				?>

				<div class="cta">
					<a class="cta-link" href="<?php echo $tip_link; ?>"><?php echo $tip_link_text; ?></a>
				</div>

			<?php endwhile; ?>

			<div class="row">
				<div class="tip-content six columns">
					<?php while(have_rows('tips')):the_row(); 
						$tip_title = get_sub_field('tip_title');
						$tip_content = get_sub_field('tip_text');
					?>
					<div class="tip">
						<h4 class="tip-title"><?php echo $tip_title; ?></h4>
						<p><?php echo $tip_content; ?></p>
					</div>
					<?php endwhile; ?>
				</div>

				<div class="polyvore six columns">
					<script src="//urlembed.com/static/js/script.js"></script>
					<a src="<?php echo $polyvore; ?>" /></a>
				</div>
			</div>
		</section>

		<?php 

			$about_us_title = get_field('about_us_title');
			$au_top = get_field('au_content_top');
			$about_us_img = get_field('about_us_image');
			$au_img_url = $about_us_img['sizes']['medium'];
			$au_bottom = get_field('au_content_bottom');
			$b_statement = get_field('business_statement');

		?>

		<section id="about">
			<div class="section-logo">
				<span class="sr-only">About Us</span>
				<img alt="About Us" src="<?php bloginfo( 'template_directory' ); ?>/img/headers/about.png">
			</div>

			<h3 class="intro"><?php echo $b_statement; ?></h3>
			<div class="au-content-top">
				<?php echo $au_top; ?>
			</div>
			<div class="au-img">
				<img src="<?php echo $au_img_url; ?>" />
			<div class="au-content-bottom">
				<?php echo $au_bottom; ?>
			</div>

			<h3 class="intro"><?php echo $about_us_title; ?></h3>
		</section>
		<section id="contact">
			<div class="section-logo even">
				<span class="sr-only">Contact Us</span>
				<img alt="Contact Us"src="<?php bloginfo( 'template_directory' ); ?>/img/headers/contactus.png">
			</div>
			<div class="contact-form">
				<?php echo do_shortcode('[contact-form-7 id="4" title="Contact form"]'); ?>
			</div>
		</section>
		
	</div> 
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
