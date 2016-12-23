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
				<div class="img-portrait panel-img" style="background-image:url('<?php echo $mission_panel_img_url; ?>')" data-anchor-target="#mission" data--200-top="top:-2%;" data--100-bottom="top:30%;"><!-- data-stellar-offset-parent="true" data-stellar-ratio=".025" -->
					<!-- <img src="<?php echo $mission_panel_img_url; ?>"> -->
				</div>
				<h3 class="intro"><?php echo $mission_statement; ?></h3>
			</article>
		</section>

		<?php 

		$services_intro=get_field('services_intro');

		?>
		<section id="services">
			<div class="section-logo even viewport-bulge">
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
				<div class="row  service-block">
				<div class="service-container seven columns">
					<ul>
					<?php $svc_ctr=0; 
						while (have_rows('services')):the_row();
						$svc_ctr++;
						$service_title = get_sub_field('service_title');
						$service_intro = get_sub_field('service_intro');
						$service_content = get_sub_field('service_content');
 
						$directory = get_bloginfo('template_directory');

						$svc_ctr_img_1 = get_bloginfo( 'template_directory' ).'/img/arrows/custom-style.png';
						$svc_ctr_img_2 = get_bloginfo( 'template_directory' ).'/img/arrows/style-renewal.png';
						$svc_ctr_img_3 = get_bloginfo( 'template_directory' ).'/img/arrows/personal-shopping.png';
						$svc_ctr_img_4 = get_bloginfo( 'template_directory' ).'/img/arrows/wardrobe.png';

						$svc_ctr_image='';

						if($svc_ctr == 1){
							$svc_ctr_image = $svc_ctr_img_1;
							$bg_pos = 'center top';
							$pos = 'first';
						}elseif ($svc_ctr==2){
							$svc_ctr_image = $svc_ctr_img_2;
							$bg_pos = 'center 4%';
							$pos = 'second';
						}elseif ($svc_ctr==3){
							$svc_ctr_image = $svc_ctr_img_3;
							$bg_pos = 'center 50%';
							$pos = 'third';
						}elseif ($svc_ctr==4){
							$svc_ctr_image = $svc_ctr_img_4;
							$bg_pos = 'center bottom';
							$pos = 'fourth';
						}
					?>
						<li <?php if ($svc_ctr=="1"){echo 'class="active"'; }?>> 
							<div class="row">
								<!-- <div class="ten columns"> -->
									<h4 class="service-title"><?php echo $service_title; ?></h4>
									<p class="service-intro"><?php echo $service_intro; ?></p>
								<!-- </div> -->
								<!-- <div class="row-arrow <?php echo $pos; ?> two columns" > --><!-- style="background-image:url('<?php echo $svc_ctr_image; ?>'); background-position:<?php echo $bg_pos; ?>"-->
									<!-- <img src="<?php echo $svc_ctr_image; ?>"> -->
								<!-- </div> -->
							</div>
							<ul class="services-nav">
								<li>
									<div class="row service-sub">
										<div class="row-arrow two columns" style="background-image:url('<?php echo $svc_ctr_image; ?>'); background-position:<?php echo $bg_pos; ?>">
											<img src="<?php echo $svc_ctr_image; ?>" style="opacity:0;">
										</div>
										<div class="nine columns"><!--  -->
											<div class="service-content">
											<?php echo $service_content; ?>
											</div> <!-- end service-content -->
											<?php if(have_rows('additional_service_content')): ?>
											<div class="additional-service-content">
											<?php while(have_rows('additional_service_content')):the_row(); 

												$additional_service_type = get_sub_field('additional_service_type');
												$additional_service_title = get_sub_field('additional_service_title');
												$additional_service_content = get_sub_field('additional_service_summary');

												if($additional_service_type != ""){
											?>

												<h4 class="service-type"><?php echo $additional_service_type; ?></h4>
												<h5 class="additional-service-title"><?php echo $additional_service_title; ?></h5>
												<p> <?php echo $additional_service_content; ?></p>
											<?php } endwhile; endif;?>
											</div> <!-- end additional service info -->
										</div>
									</div>
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
				$acc_horz_img_url = $acc_horz_img['sizes']['large'];
				$acc_h_img_caption = get_field('acc_horiz_img_cptn');
				$acc_vert_img = get_field('acc_vert_img');
				$acc_vert_img_url = $acc_vert_img['sizes']['large'];
				$acc_v_img_caption = get_field('acc_vert_img_cptn');

			?>

			<h3 class="intro"><?php echo $acc_intro; ?></h3>
			<?php while (have_rows('acc_cta')) : the_row(); 
					$acc_link_text = get_sub_field('acc_lt');
					$acc_link = get_sub_field('acc_link');
				?>

				<div class="cta">
					<a class="cta-link" href="<?php echo $acc_link; ?>" target="_blank"><?php echo $acc_link_text; ?></a>
				</div>

				<?php endwhile; ?>
			<?php if ($acc_statement != ''){ ?>
			<div class="accessories-statement viewport-bulge"><?php echo $acc_statement; ?></div>
			<?php } ?>
			<div class="row">
				<div class="product-wrapper "><!-- eight columns -->
					<div class="vert-product" data-anchor-target="#accessories" data--100-top="bottom:-2%;" data--250-bottom="bottom:40%;">
						<div class="img-portrait" style="background-image:url('<?php echo $acc_vert_img_url; ?>')">
							<span class="sr-only"></span>
						</div>
						<figcaption><?php echo $acc_v_img_caption ?></figcaption>
					</div>
					<div class="horiz-product" data-anchor-target="#accessories" data--100-top="top:20%;" data--250-bottom="top:-5%;">
						<div class="img-landscape" style="background-image:url('<?php echo $acc_horz_img_url; ?>')">
							<span class="sr-only"></span>
						</div>
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
					<a class="cta-link" href="<?php echo $tip_link; ?>" target="_blank"><?php echo $tip_link_text; ?></a>
				</div>

			<?php endwhile; ?>

			<div class="row tip-block">
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
					
					<?php echo $polyvore; ?>
					
				</div>
			</div>
		</section>

		<?php 

			$about_us_title = get_field('about_us_title');
			$au_top = get_field('au_content_top');
			$about_us_img = get_field('about_us_image');
			//var_dump($about_us_img);
			$au_img_url = $about_us_img['sizes']['product-portrait'];
			//var_dump($au_img_url);
			$au_bottom = get_field('au_content_bottom');
			$b_statement = get_field('business_statement');

		?>

		<section id="about">
			<div class="section-logo viewport-bulge">
				<span class="sr-only">About Us</span>
				<img alt="About Us" src="<?php bloginfo( 'template_directory' ); ?>/img/headers/about.png">
			</div>

			<h3 class="intro"><?php echo $b_statement; ?></h3>
			<div class="au-content-top viewport-bulge">
				<?php echo $au_top; ?>
			</div>
			<div class="au-img-content" id="au-imgs">
				<div class="img-about au-img" style="background-image:url('<?php echo $au_img_url; ?>');" data-anchor-target="#about" data--200-top="top:20%;" data--250-bottom="top:-2%;">
					<span class="sr-only"></span>
				</div>
				<div class="sig-img" data-anchor-target="#about" data--200-top="bottom:-10%" data--100-bottom="bottom:60%;">
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/signature.png ">
				</div>
			</div>
			<div class="au-content-bottom viewport-bulge">
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

		<nav class="social-nav">
			<ul>
				<li class="facebook">
					<a href="#" target="_blank"><span class="sr-only"></span></a>
				</li>
				<li class="twitter">
					<a href="#" target="_blank"><span class="sr-only"></span></a>
				</li>
				<li class="mail">
					<a href="#" target="_blank"><span class="sr-only"></span></a>
				</li>
				<li class="instagram">
					<a href="#" target="_blank"><span class="sr-only"></span></a>
				</li>
			</ul>
		
	</div> 
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
