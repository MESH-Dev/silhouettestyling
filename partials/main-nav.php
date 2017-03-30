<header>
	<div class="nav-wrap <?php if (is_404()){ ?> nav-404 <?php } ?>">
		
		<div class="logo"> <!-- two columns -->
				<!-- <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> -->
					<img alt="Silhouette styling logo" src="<?php bloginfo( 'template_directory' ); ?>/img/logo/navigation-xo@2x.png">
				<!-- </a> -->
			</div>
		<nav class="main-navigation">
			<div class="nav-bg">
				<div class="sidr-trigger desktop-hide">
					Menu <i class="fa fa-fw fa-lg fa-bars"></i>
				</div>
				<div class="container">
					<div class="row sidr-nav">
						<div class="sidr-close">Close <i class="fa fa-fw fa-lg fa-close"></i></div>
						<?php //Get that nav
							$split_nav = get_split_nav('main_nav');

							//render left nav
							echo $split_nav->left_menu; 
			
							//render right nav
							echo $split_nav->right_menu;
						?>
					</div>
				</div>
			</div>
			
		</nav>
	</div>
</header>