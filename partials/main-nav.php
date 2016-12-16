<nav class="main-navigation">
	<div class="container">
	<?php $split_nav = get_split_nav('main_nav');

		//render left nav
		echo $split_nav->left_menu; ?>
	
		<div class="logo two columns">
			<img src="<?php bloginfo( 'template_directory' ); ?>/img/logo/navigation-xo@3x.png">
		</div>
	
		<?php
		//render right nav
		echo $split_nav->right_menu;
	?>
	</div>
</nav>