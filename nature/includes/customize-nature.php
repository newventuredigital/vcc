<?php

/*--------------------------------*/
//Convert color HEX to RGB
/*--------------------------------*/

function hex2RGB($hex)
	{
        preg_match("/^#{0,1}([0-9a-f]{1,6})$/i",$hex,$match);

        if(!isset($match[1])) {
        	return false;
        }

        if(strlen($match[1]) == 6) {
            list($r, $g, $b) = array($hex[0].$hex[1],$hex[2].$hex[3],$hex[4].$hex[5]);

        } elseif(strlen($match[1]) == 3) {
            list($r, $g, $b) = array($hex[0].$hex[0],$hex[1].$hex[1],$hex[2].$hex[2]);

        } else if(strlen($match[1]) == 2) {
            list($r, $g, $b) = array($hex[0].$hex[1],$hex[0].$hex[1],$hex[0].$hex[1]);

        } else if(strlen($match[1]) == 1) {
            list($r, $g, $b) = array($hex.$hex,$hex.$hex,$hex.$hex);

        } else {
			return false;
        }

        $color = array();
        $color['r'] = hexdec($r);
        $color['g'] = hexdec($g);
        $color['b'] = hexdec($b);

        return $color;
	}
/*-----------------------------------------------------------------------------------*/
// Customize.php Wordpress
/*-----------------------------------------------------------------------------------*/

function nature_customize_theme ( $wp_customize ) {

	//remove some options
	$wp_customize -> remove_section( 'title_tagline');
	$wp_customize -> remove_section( 'nav' );

/*--------------------------------*/
// //section colors theme
/*--------------------------------*/
	$wp_customize -> add_section( 'nature_theme_color', array (
		'title' 	  => __( 'Nature Theme Colors' ,'nature'),
		'description' => __( 'Set the main colors of your theme','nature'),
		'priority'    => 25,
	));

/*--------------------------------*/
// background theme color (body)
/*--------------------------------*/
	$wp_customize -> add_setting ( 'nature_background_color', array (
		'default' => '#EBEBEB'
	));

	$wp_customize -> add_control ( new Wp_Customize_Color_Control ( $wp_customize, 'nature_background_color', array (
		'label'   => __('Change your background color','nature'),
		'section' => 'nature_theme_color',
		'settings' => 'nature_background_color',
	)));

/*--------------------------------*/
// links color
/*--------------------------------*/
	$wp_customize -> add_setting ( 'nature_link_color', array (
		'default' => '#E6323C',
	));

	$wp_customize -> add_control ( new Wp_Customize_Color_Control ( $wp_customize, 'nature_link_color', array (
		'label'   => __('Change your link color','nature'),
		'section' => 'nature_theme_color',
		'settings' => 'nature_link_color',
	)));

/*--------------------------------*/
// //section colors theme
/*--------------------------------*/
	$wp_customize     -> add_section( 'nature_menu_theme_color', array (
		'title' 	  => __( 'Menu Theme Colors' ,'nature'),
		'description' => __( 'Set the menu colors of your theme','nature'),
		'priority'    => 30,
	));

/*--------------------------------*/
// background menu change color
/*--------------------------------*/
	$wp_customize -> add_setting ( 'nature_solid_color', array (
		'default' => 'no',
	));

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'nature_solid_color', array(
        'label'   => __( 'Display a solid color for background menu', 'nature' ),
        'section' => 'nature_menu_theme_color',
        'settings' => 'nature_solid_color',
        'type'    => 'radio',
        'choices' => array(
            'yes' => 'Yes',
            'no'  => 'No'
        )
	)));

/*--------------------------------*/
// background menu
/*--------------------------------*/
	$wp_customize -> add_setting ( 'nature_top_menu_bg_color', array (
		'default' => '',
	));

	$wp_customize -> add_control( new Wp_Customize_Color_Control( $wp_customize, 'nature_top_menu_bg_color', array (
		'label'   => __('Change your menu background color','nature'),
		'section' => 'nature_menu_theme_color',
		'settings' => 'nature_top_menu_bg_color',
	)));

/*--------------------------------*/
// primary menu links color
/*--------------------------------*/
	$wp_customize -> add_setting ( 'nature_link_color_menu_primary', array (
		'default' => '',
	));

	$wp_customize -> add_control ( new Wp_Customize_Color_Control ( $wp_customize, 'nature_link_color_menu_primary', array (
		'label'   => __('Primary menu link color','nature'),
		'section' => 'nature_menu_theme_color',
		'settings' => 'nature_link_color_menu_primary',
	)));

/*--------------------------------*/
// secondary menu links color
/*--------------------------------*/
	$wp_customize -> add_setting ( 'nature_link_color_menu', array (
		'default' => '',
	));

	$wp_customize -> add_control ( new Wp_Customize_Color_Control ( $wp_customize, 'nature_link_color_menu', array (
		'label'   => __('Secondary menu link color','nature'),
		'section' => 'nature_menu_theme_color',
		'settings' => 'nature_link_color_menu',
	)));

/*--------------------------------*/
// background footer color
/*--------------------------------*/
	$wp_customize -> add_setting ( 'nature_footer_bg_color', array (
		'default' => '#3C3C3C',
	));

	$wp_customize -> add_control ( new Wp_Customize_Color_Control ( $wp_customize, 'nature_footer_bg_color', array (
		'label'   => __('Change your footer background color','nature'),
		'section' => 'nature_menu_theme_color',
		'settings' => 'nature_footer_bg_color'
	)));
}

function nature_css_colors () {
	$y = preg_replace("/[^a-zA-Z0-9]/", "", get_theme_mod ('nature_link_color')); //remove # from color
	$x = hex2RGB ($y); // convert hexadecimal to rgb color

	$n = preg_replace("/[^a-zA-Z0-9]/", "", get_theme_mod ('nature_link_color_menu')); //remove # from color
	$m = hex2RGB ($n); // convert hexadecimal to rgb color

	$top_bg = get_theme_mod( 'nature_top_menu_bg_color' );
	?>
	<style type="text/css">

		body {
			background-color: <?php echo get_theme_mod ( 'nature_background_color' ); ?>;
		}

		a {
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}

		/* menu styles */
		.navbar-default .navbar-nav>.active>a {
			background-color:rgba(<?php echo($x['r'].','.$x['g'].','.$x['b']) ; ?>,0.01);
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
			color: <?php echo get_theme_mod ('nature_link_color_menu'); ?>;
		}

		.navbar-default .navbar-nav>li>a:hover,
		.navbar-default .navbar-nav>li>a:active{
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
			color: <?php echo get_theme_mod ('nature_link_color_menu'); ?>;
		}

		.navbar-side-logo i{
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
			color: <?php echo get_theme_mod ('nature_link_color_menu'); ?>;
		}
		div.navbar-brand.logo-nature a h2 {
			color: #fff;
			color: <?php echo get_theme_mod ('nature_link_color'); ?>
		}
		.navbar-default,
		.navbar-default .navbar-nav>.active>a:focus,
		.navbar-default .navbar-nav>.active>a:hover,
		.shrink .navbar-default {
			background-color: <?php echo $top_bg; ?>;
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;

			<?php if ( get_theme_mod ('nature_solid_color') == 'yes') { echo 'background-image: none;'; } ?>
		}
		.navbar-default .navbar-toggle {
			border-color: <?php echo get_theme_mod ('nature_link_color_menu'); ?>;
		}
		.navbar-default .navbar-toggle .icon-bar {
			background-color: <?php echo get_theme_mod ('nature_link_color_menu'); ?>;
		}
		.navbar-default .navbar-toggle:hover,
		.navbar-default .navbar-toggle:focus {
			background-color: rgba(<?php echo($m['r'].','.$m['g'].','.$m['b']) ; ?>,0.8);
		}

		/* dropdown */
		.navbar-default .navbar-nav>li>a, .dropdown-menu>li>a {
			color: <?php echo get_theme_mod ('nature_link_color_menu_primary'); ?>;
		}
		.dropdown-menu>.active>a,
		.dropdown-menu>.active>a:hover,
		.dropdown-menu>.active>a:focus {
			background: <?php echo get_theme_mod ('nature_link_color'); ?>;
			background: <?php echo get_theme_mod ('nature_link_color_menu'); ?>;
		}

		.dropdown-menu>li>a:hover{
			background-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
			background-color:rgba(<?php echo($x['r'].','.$x['g'].','.$x['b']) ; ?>,0.8);
			background-color: <?php echo get_theme_mod ('nature_link_color_menu'); ?>;
			background-color:rgba(<?php echo($m['r'].','.$m['g'].','.$m['b']) ; ?>,0.8);
		}


		.navbar-nav>li>.dropdown-menu{
			border-top: 2px <?php echo get_theme_mod ('nature_link_color'); ?> solid;
			border-top: 2px <?php echo get_theme_mod ('nature_link_color_menu'); ?> solid;
		<?php

		if ( get_theme_mod ('nature_solid_color') == 'yes' ) { ?>

			background-image: none;
			background-color:<?php echo $top_bg; ?>
		<?php } ?>
		}

		<?php if (of_get_option( 'option_stylesheet') == ( get_stylesheet_directory_uri() . '/css/style-light.css' ) ) { ?>

		/* pagination */
		.pagination>li>a, .pagination>li>span {
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		<?php } ?>

		/* buttons and progress bar */
		.ghost-dark:hover,
		.ghost-dark:focus {
			background:#FFF;
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
			border:1px solid <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.white a {
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.ghost-color {
			border:1px solid <?php echo get_theme_mod ('nature_link_color'); ?>;
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.ghost-color:hover,
		.ghost-color:focus{
			background:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.solid-color {
			background:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.solid-color:hover,
		.solid-color:focus{
			border:1px solid <?php echo get_theme_mod ('nature_link_color'); ?>;
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.ghost-white-search:hover,
		.ghost-white-search:focus{
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.progress-bar-nature {
			background-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.panel-default>.panel-heading {
			background-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
			border-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}

		/* menu Mobile */
		.navbar-default .navbar-toggle {
			border-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.navbar-default .navbar-toggle .icon-bar {
			background-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.navbar-default .navbar-toggle:hover,
		.navbar-default .navbar-toggle:focus {
			background-color: rgba(<?php echo($x['r'].','.$x['g'].','.$x['b']) ; ?>,0.5);
		}

		/* map */
		#mapContact h3{
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.icon-home i{
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.team-home .overlay-zoom {
			background: <?php echo get_theme_mod ('nature_link_color'); ?>;
			background:rgba(<?php echo($x['r'].','.$x['g'].','.$x['b']) ; ?>,0.8);
		}

		/* banner */
		.banner-full {
			border-top: 6px <?php echo get_theme_mod ('nature_link_color'); ?> solid;
			border-bottom: 1px <?php echo get_theme_mod ('nature_link_color'); ?> solid;
			border-left: 1px <?php echo get_theme_mod ('nature_link_color'); ?> solid;
			border-right: 1px  <?php echo get_theme_mod ('nature_link_color'); ?> solid;
			background-color: #EBEBEB;
		}
		.banner-full span {
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.icon-right{
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.grid figcaption{
			background: <?php echo get_theme_mod ('nature_link_color'); ?>; /*ie color*/
			background:rgba(<?php echo($x['r'].','.$x['g'].','.$x['b']) ; ?>,0.8);
		}
		.overlay-zoom i{
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.close-overlay {
			background-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.icon-left{
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.icon-left input,
		.icon-left textarea{
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
			border:1px solid <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.navbar-form ::-webkit-input-placeholder,
		.icon-left ::-webkit-input-placeholder{
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.navbar-form :-moz-placeholder,
		.icon-left :-moz-placeholder{
			/* Firefox 18- */
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.navbar-form ::-moz-placeholder,
		.icon-left ::-moz-placeholder{
			/* Firefox 19+ */
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.navbar-form :-ms-input-placeholder,
		.icon-left :-ms-input-placeholder{
			color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.select-project h4{
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.fotorama__thumb-border{
			border-color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}
		.raised-inside i{
		 	color:<?php echo get_theme_mod ('nature_link_color'); ?>;
		 }
		.sidebar .raised-inside {
			color: <?php echo get_theme_mod ('nature_link_color'); ?>;
		}

		/* footer */
		.footer-wide,
		.full{
			background-color: <?php echo get_theme_mod ( 'nature_footer_bg_color' ); ?>;
		}
		.full .zoom-form {
			background-color: #474747;
			background-color: <?php echo get_theme_mod ( 'nature_footer_bg_color' ); ?>
		}
		<?php //banner parallax 01
			$noimage = of_get_option('option_placeholder');
			$banner_01 = rwmb_meta('custom_parallax_01' , 'type=image');
			foreach ($banner_01 as $image)
			{

			echo '.home-banner-1 {
			background: url('?><?php if ( !empty ( $image ) ) { echo $image['full_url']; } else { echo $noimage; } ?> <?php echo ') no-repeat;
			background-attachment: fixed ;
			background-repeat: no-repeat;
			background-size: cover;
			margin: 0 -15px;
			height: 300px;
			width: auto;
		}';
			} ?>

		<?php //banner parallax 02
			$banner_02 = rwmb_meta('custom_parallax_02' , 'type=image');
			foreach ($banner_02 as $image)
			{

			echo '.home-banner-2 {
			background: url('?><?php if ( !empty ( $image ) ) { echo $image['full_url']; } else { echo $noimage; } ?> <?php echo ') no-repeat;
			background-attachment: fixed ;
			background-repeat: no-repeat;
			background-size: cover;
			margin: 0 -15px;
			height: 300px;
			width: auto;
		}';
			} ?>

		@media screen and (max-width: 768px){

			.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
			.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
				color: <?php echo get_theme_mod ('nature_link_color'); ?>;
			}
			.container>.navbar-collapse,
			.container-fluid>.navbar-collapse {
				background-color: <?php echo $top_bg; ?>;
				<?php if ( get_theme_mod ('nature_solid_color') == 'yes') { echo 'background-image: none;'; } ?>

			}
		}
		<?php
		$custom_css = of_get_option( 'option_custom_css' );
		if ( !empty($custom_css ) )
		{
			echo $custom_css;
		}
		?>

	</style>

	<?php

}

add_action( 'wp_head' , 'nature_css_colors');
add_action( 'customize_register' , 'nature_customize_theme' );

