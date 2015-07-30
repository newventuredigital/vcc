<?php //Shortcodes

add_filter( 'widget_text', 'do_shortcode');
/*===================================================================================
 *  Gallery Thumbs Shortcode

 [thumb-gallery posts=6 display=true columns=6]

/*===================================================================================*/


function show_gallery_thumbs_nature( $atts, $content=null) {
	extract( shortcode_atts(
	array(
    	'posts'  => 1,
		'display'=> true,
		'columns'=> 4,
		'order'  => 'DESC',
		'title'  => 'Nature Galleries',
		'icon'   => false,
		),

	$atts , 'thumb-gallery'
	));

		$args = array(
			'post_type' => 'gallery',
			'showposts' => $posts,
			'orderby'   => $order,
		);

	$gallery = new WP_Query ( $args );
	?>

	<div class="row gallery-random">

	<?php

	if (isset ($atts['title']) && ($atts['icon'] === 'true' ) ) {
		echo '<h4><i class="fa fa-camera-retro"></i> ' . $atts['title'] . '</h4>';

	} elseif (isset ($atts['title'])) {
		echo '<h4>'. $atts['title'] . '</h4>';
	}
	?>

	<?php if ( $gallery->have_posts() ) : while ( $gallery->have_posts() ) :  $gallery->the_post(); ?>

		<div class="effect-zoom hover-effects">
			<?php
			if (isset($atts['columns']))
			{
				$columns = $atts['columns'];

				switch($columns)
				{
					case 3:
						echo '<div class="col-md-4 col-sm-4">';
						break;
					case 4:
						echo '<div class="col-md-3 col-sm-3">';
						break;
					case 6:
						echo '<div class="col-md-2 col-sm-3">';
						break;
				}
			}
				else
			{
				echo '<div class="col-md-3 col-sm-3">';
			}
			?>
	 			<div class="item img">
	 				<figure>
	 				<?php the_post_thumbnail('medium-blog'); ?>
	 				<div class="overlay-zoom"><a href="<?php the_permalink(); ?>" class="expand-small"><i class="fa fa-share-square fa-2x"></i></a>
	 					<div class="close-overlay hidden">x</div>
	 				</div>
	 				</figure>
	 			</div>
	 			<?php
	 			if ( isset($atts['display']) &&  $atts['display'] === 'true' )
	 			{ ?>

	 				<div class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

	 			<?php
	 			} ?>

	 		</div>
		</div>
	 		<?php endwhile; endif; ?>
	 	</div>

	 <?php wp_reset_query();
	 	return $content; }

function register_shortcode_gallery_nature(){
   add_shortcode('thumb-gallery', 'show_gallery_thumbs_nature');
}
add_action( 'init', 'register_shortcode_gallery_nature');

/*===================================================================================
 * Banner Shortcode

 [banner text='Help us, support our team!' icon_text='fa fa-certificate' button_text='Help Us' link='http://www.example.com' icon_button='fa fa-bullseye']

/*===================================================================================*/

function banner_nature( $atts ) {
	$atts = shortcode_atts(
		array(
			'text' => __( 'Help us change the World', 'nature' ),
			'icon_text' => 'fa fa-globe',
			'link' => '#',
			'button_text' => __( 'Donate now', 'nature' ),
			'icon_button' => 'fa fa-heart',
		), $atts, 'banner' );

		return '
	 		<div class="banner-full"><div class="col-md-8"><h3>' . $atts['text'] . '<span><i class="' . $atts['icon_text'] . '"></i></span></h3></div><div class="col-md-4">
	 		<h3><a class="ghost-color" href="' . $atts['link'] . '"><i class="' . $atts['icon_button'] . '"></i> '. $atts['button_text'] . '</a></h3></div></div>';
}
add_shortcode( 'banner', 'banner_nature' );

/*===================================================================================
 * Button Shortcode

 [button style='ghost-dark' link_url='http://example.com' link_text='Read more']

/*===================================================================================*/

function button_nature( $atts ) {
	$atts = shortcode_atts(
		array(
			'link_text'     => __( 'Click here', 'nature' ),
			'link_url' => '#',
			'style'    => 'ghost-color',
		), $atts, 'button' );
		return
			'<h3><a class="' . $atts['style'] . '" href="' . $atts['link_url'] . '">'. $atts['link_text'] . '</a></h3>';
}
add_shortcode( 'button', 'button_nature' );

/*===================================================================================
 * Custom Columns
/*===================================================================================*/

/* Class Row */
function columns_nature_row( $atts, $content = null ) {
   return '<div class="row">' . do_shortcode($content) . '</div>';
}
add_shortcode('row', 'columns_nature_row');

/* Two Thirds Column col-sm-8 */
function columns_nature_two_thirds( $atts, $content = null ) {
   return '<div class="col-sm-8 shortcode-margin"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('two_thirds', 'columns_nature_two_thirds');

/* One Half Column col-sm-6 */
function columns_nature_one_half( $atts, $content = null ) {
   return '<div class="col-sm-6 shortcode-margin"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_half', 'columns_nature_one_half');


/* One third Column col-sm-4 */
function columns_nature_one_third( $atts, $content = null ) {
   return '<div class="col-sm-4 shortcode-margin"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_third', 'columns_nature_one_third');

/* One Fourth Column col-sm-3 */
function columns_nature_one_fourth( $atts, $content = null ) {
   return '<div class="col-sm-3 shortcode-margin"><p>' . do_shortcode($content) . '</p></div>';
}
add_shortcode('one_fourth', 'columns_nature_one_fourth');

/* One Sixth Column col-sm-2 */
function columns_nature_one_sixth( $atts, $content = null ) {
   return '<div class="col-sm-2 shortcode-margin">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'columns_nature_one_sixth');



/* The following function created by TheBinaryPenguin for his wp-raw plugin takes care of that by disabling WordPress’s auto-formating filters so that the column shortcode is parsed without being run through them, then reapplying the content filters after the column shortcode has been parsed. The result is that all of the column shortcodes will validate. */

function webtreats_formatter($content) {
	$new_content = '';

	/* Matches the contents and the open and closing tags */
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';

	/* Matches just the contents */
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';

	/* Divide content into pieces */
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	/* Loop over pieces */
	foreach ($pieces as $piece) {
		/* Look for presence of the shortcode */
		if (preg_match($pattern_contents, $piece, $matches)) {

			/* Append to content (no formatting) */
			$new_content .= $matches[1];
		} else {

			/* Format and append to content */
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;
}

// Remove the 2 main auto-formatters
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');

// Before displaying for viewing, apply this function
add_filter('the_content', 'webtreats_formatter', 99);
add_filter('widget_text', 'webtreats_formatter', 99);
