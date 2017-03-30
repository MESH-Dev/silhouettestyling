<?php

include('functions/start.php');

include('functions/clean.php');

//Custon wp-admin logo
function my_custom_login_logo() {
  echo '<style type="text/css">
		        h1 a {
		          background-size: 227px 85px !important;
		          margin-bottom: 20px !important;
		          background-image:url('.get_bloginfo('template_directory').'/img/logo/navigation-xo@2x.png) !important; }
		    </style>';
}

function my_acf_load_value( $value, $post_id, $field ) {

 $content = apply_filters('the_content',$value);
 $content = force_balance_tags( $content );
 $content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
 $content = preg_replace( '~\s?<p>(\s| )+</p>\s?~', '', $content );

 return $content;
}

add_filter('acf/load_value/type=wysiwyg', 'my_acf_load_value', 10, 3);

?>
