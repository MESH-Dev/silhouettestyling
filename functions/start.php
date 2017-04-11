<?php

//enqueue scripts and styles *use production assets. Dev assets are located in  /css and /js
function loadup_scripts() {

    //cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.4/SmoothScroll.min.js
    wp_enqueue_script( 'smooth', '//cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.4/SmoothScroll.min.js', array('jquery'), '1.0.0', true );
	//wp_enqueue_script( 'stellar', get_template_directory_uri().'/js/jquery.stellar.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'scrollr', '//cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'sidr', get_template_directory_uri().'/js/jquery.sidr.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style( 'fontawesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', '1.0.0', true );
    wp_enqueue_style( 'sidr-css', get_template_directory_uri().'/css/jquery.sidr.bare.css', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('background-fullscreen', 1800, 1200, true);
add_image_size('short-banner', 1800, 800, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

add_image_size('product-portrait', 500, '', true);
add_image_size('product-landscape', '', 500, true);

//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );


function get_split_nav($menu_name=null, $raw=false){
    if($menu_name == null || !is_string($menu_name)){
        return false;
    }
    $output = new stdClass();
    if(($locations = get_nav_menu_locations()) && isset($locations[$menu_name])){
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        //Create a new array with just the
        $newMenu = array();
        foreach($menu_items as $item){
            if($item->menu_item_parent != 0) continue;
            //get subnav
            $parentID = $item->ID;
            $item->subnav = array_filter($menu_items, function($v) use ($parentID){
                if($v->menu_item_parent == $parentID) return $v;
              }
            );
            array_push($newMenu, $item);
        }
        //Split menu array in half
        $len = count($newMenu);
        $firsthalf = array_slice($newMenu, 0, $len / 2);
        $secondhalf = array_slice($newMenu, $len / 2);
        if($raw==true){
            $output->left_menu = $firsthalf;
            $output->right_menu = $secondhalf;
        }else{
            //Create left menu
            $menuMarkup = '';
            $menuMarkup .= '<div id="headerMenuLeft" class="five columns">
                    <ul class="menu">';
            foreach($firsthalf as $item){
                $menuMarkup .= "<li>
                    <a href='".$item->url."'>".$item->title."</a>";
                if($item->subnav){
                    $menuMarkup .= "<ul>";
                    foreach($item->subnav as $item){
                        $menuMarkup .= "<li><a href='".$item->url."'>".$item->title."</a></li>";
                    }
                    $menuMarkup .= "</ul>";
                }
                $menuMarkup .= "</li>";
            }
            $menuMarkup .= '</ul>
                </div>';
            $output->left_menu = $menuMarkup;
            //Create right menu
            $menuMarkup = '';
            $menuMarkup .= '<div id="headerMenuRight" class="five columns offset-by-two">
                    <ul class="menu">';
            foreach($secondhalf as $item){
                $menuMarkup .= "<li>
                    <a href='".$item->url."'>".$item->title."</a>";
                if($item->subnav){
                    $menuMarkup .= "<ul>";
                    foreach($item->subnav as $item){
                        $menuMarkup .= "<li><a href='".$item->url."'>".$item->title."</a></li>";
                    }
                    $menuMarkup .= "</ul>";
                }
                $menuMarkup .= "</li>";
            }
            $menuMarkup .= '</ul>
                </div>';
            $output->right_menu = $menuMarkup;
        }
        return $output;
    }
}





?>
