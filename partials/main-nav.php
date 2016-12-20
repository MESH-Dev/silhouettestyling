<div class="nav-wrap">
	<div class="logo"> <!-- two columns -->
			<img src="<?php bloginfo( 'template_directory' ); ?>/img/logo/navigation-xo@2x.png">
		</div>
<nav class="main-navigation">
	<div class="nav-bg">
		<div class="container">
			<div class="row">
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