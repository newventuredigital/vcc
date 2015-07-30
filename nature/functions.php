<?php
/**
 * @package Nature WP
*/

/*-----------------------------------------------------------------------------------*/
// Loads the Options Panel
/*-----------------------------------------------------------------------------------*/
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';

/*-----------------------------------------------------------------------------------*/
// Custom Metaboxes
/*-----------------------------------------------------------------------------------*/
	define( 'RWMB_URL', trailingslashit( get_template_directory_uri().'/includes/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( get_template_directory().'/includes/meta-box' ) );
	// Include the meta box script
	require RWMB_DIR . 'meta-box.php';
	// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
	include get_template_directory().'/includes/config-meta-boxes.php';
	include get_template_directory(). '/includes/meta-box-show-hide/meta-box-show-hide.php';
	include get_template_directory(). '/includes/meta-box-tabs/meta-box-tabs.php';

/*-----------------------------------------------------------------------------------*/
// Custom Post Types
/*-----------------------------------------------------------------------------------*/
	require 'includes/custom-post-type.php';

/*-----------------------------------------------------------------------------------*/
// Shortcodes
/*-----------------------------------------------------------------------------------*/
	require 'includes/shortcodes-nature.php';

/*-----------------------------------------------------------------------------------*/
// Customize Options
/*-----------------------------------------------------------------------------------*/
	require 'includes/customize-nature.php';

/*-----------------------------------------------------------------------------------*/
// Add Style Sheets
/*-----------------------------------------------------------------------------------*/
function nature_theme_css() { //call the css files at header
	global $wp_styles;
	wp_enqueue_style ( 'magnific_popup', get_template_directory_uri() . '/css/magnific-popup.css' , false , '1.0' );
	wp_enqueue_style ( 'countdown_css', get_template_directory_uri() . '/css/countdown.css' , false , '1.0' );
	wp_enqueue_style ( 'animate_css', get_template_directory_uri() . '/css/animate.css' , false , '1.0' );
	wp_enqueue_style ( 'font_awesome_css', get_template_directory_uri() . '/css/font-awesome.min.css' , false , '1.0' );
	wp_enqueue_style ( 'fotorama_css', get_template_directory_uri() . '/css/fotorama.css' , false , '1.0' );
	wp_enqueue_style ( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' , false , '1.0' ); //add bootstrap.min.css
	wp_enqueue_style ( 'reset_css', get_template_directory_uri() . '/css/reset.css' , false , '1.0' );
	wp_enqueue_style ( 'nature_ie_style_css', get_template_directory_uri() . '/css/style-ie.css', array('nature' ) );
	$wp_styles -> add_data ( 'nature_ie_style_css', 'conditional', 'lte IE 8' );
}

add_action ( 'wp_enqueue_scripts' , 'nature_theme_css' );


/* Select Stylesheet Predefined */
function options_stylesheets_alt_style()   {
	if ( of_get_option('option_stylesheet') ) {
		wp_enqueue_style( 'nature_stylesheet', of_get_option('option_stylesheet'), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'options_stylesheets_alt_style' );

/*add child style below */
function enqueue_child_theme_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css', false, '1.0' );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style', false, '1.0')  );
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_theme_styles', PHP_INT_MAX);
/*-----------------------------------------------------------------------------------*/
// Add Javascript
/*-----------------------------------------------------------------------------------*/
function nature_theme_js() { // call javascript files

	//verify if is IE  to call javascript in header
	global $wp_scripts;
	wp_register_script ( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_script ( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );
	$wp_scripts -> add_data ( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts -> add_data ( 'respond_js', 'conditional', 'lt IE 9' );

	//call the js in the header
	wp_enqueue_script ( 'hover_js', get_template_directory_uri() . '/js/hover.js' , array( 'jquery' ) , '', false);

	//call the js in the footer
	wp_enqueue_script ( 'boot_js' , get_template_directory_uri() . '/js/bootstrap.min.js' , array( 'jquery' ), '', true );
	wp_enqueue_script ( 'bootstrapValidator_js' , get_template_directory_uri() . '/js/bootstrapValidator.min.js' , array( 'jquery' , 'boot_js' ), '', true );
	wp_enqueue_script ( 'masonry_js' , get_template_directory_uri() . '/js/masonry.pkgd.min.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'magnific_popup_js' , get_template_directory_uri() . '/js/jquery.magnific-popup.min.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'classie_js' , get_template_directory_uri() . '/js/classie.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'jquery_countdown_js' , get_template_directory_uri() . '/js/jquery.countdown.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'toucheffects_js' , get_template_directory_uri() . '/js/toucheffects.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'wow_js' , get_template_directory_uri() . '/js/wow.min.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'fotorama_js' , get_template_directory_uri() . '/js/fotorama.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'parallax_js' , get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'imagesloaded_js' , get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js' , array('jquery') , '', true);
	wp_enqueue_script ( 'custom_js' , get_template_directory_uri() . '/js/custom.js' , array('jquery') , '', true);
	}

add_action ( 'wp_enqueue_scripts', 'nature_theme_js' );

/*-----------------------------------------------------------------------------------*/
// Remove Wp Version
/*-----------------------------------------------------------------------------------*/
function wp_generator_remove() {
	return '';
	}
add_filter ( 'the_generator', 'wp_generator_remove' );

//Wordpress Theme Check
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );


/*-----------------------------------------------------------------------------------*/
// Add Google Fonts
/*-----------------------------------------------------------------------------------*/
function nature_load_fonts() {
    wp_register_style('google_fonts', 'http://fonts.googleapis.com/css?family=Oxygen:400,300,700');
    wp_enqueue_style( 'google_fonts');
}

add_action('wp_enqueue_scripts', 'nature_load_fonts');

/*-----------------------------------------------------------------------------------*/
// Add Modernizr
/*-----------------------------------------------------------------------------------*/
function nature_load_modernzr() {
	wp_register_script ( 'modernzr_js', 'http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js', '', '', false );
	wp_enqueue_script ( 'modernzr_js' );
}
add_action('wp_enqueue_scripts', 'nature_load_modernzr');

/*-----------------------------------------------------------------------------------*/
// Add Theme Support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_theme_support ( 'menus' ); //add suport for menu on theme
add_theme_support( 'automatic-feed-links' );
// post thumbnail support
if ( function_exists ( 'add_theme_support' )) {
	add_theme_support ( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150 ); // Normal post thumbnails
	add_image_size( 'medium-blog', 600, 400, true);
	add_image_size( 'large-blog', 900, 600, true );
	add_image_size( 'masonry', 900, 9999, false );
	add_image_size( 'sidebar-thumb', 160, 106, true );
}

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}


function nature_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep" . sprintf( __( 'Page %s', 'nature' ), max( $paged, $page ) );
	}

	return $title;

}
add_filter( 'wp_title', 'nature_wp_title', 10, 2 );

// add menus
function nature_register_menu() {
	register_nav_menus (
		array(
			'header-menu' => __('Header Menu' , 'nature')
		)
	);
}
add_action( 'init', 'nature_register_menu');

//This function add the search on menu last li
function nature_add_last_li_search($items, $args) {
    if($args->theme_location == 'header-menu'){
       $last_item = '<li><a href="#" class="trigger-overlay"><i class="fa fa-search fa-lg"></i></a></li>';
       $items = $items . $last_item;
    }

    return $items;
}
add_filter('wp_nav_menu_items', 'nature_add_last_li_search', 10, 2);
/*-----------------------------------------------------------------------------------*/
// Stylize Category on Events, Projects e Posts Sidebar
/*-----------------------------------------------------------------------------------*/
	require 'includes/custom_walker_category.php';

/*-----------------------------------------------------------------------------------*/
// Allow SVG files
/*-----------------------------------------------------------------------------------*/
function nature_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'nature_mime_types');
/*-----------------------------------------------------------------------------------*/
// Widgets
/*-----------------------------------------------------------------------------------*/

function nature_widgets_footer( $name, $id, $description ) {
	register_sidebar( array (
		'name'			=> $name,
		'id'  			=> $id,
		'description'	=> $description,
		'before_widget' => '<div class="col-md-4 gray">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_tile'	=> '</h3>'
	));
}

nature_widgets_footer ( 'First Footer 3 columns', 'footer-3-columns', 'Footer 3 Columns' );



function nature_widgets_blog( $name, $id, $description ) {
	register_sidebar( array (
		'name'			=> $name,
		'id'  			=> $id,
		'description'	=> $description,
		'before_widget' => '<div class="sidebar">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_tile'	=> '</h3>'
	));
}

nature_widgets_blog ( 'Sidebar Blog', 'sidebar-blog', 'Show widgets on sidebar blog' );


function nature_widgets_project( $name, $id, $description ) {
	register_sidebar( array (
		'name'			=> $name,
		'id'  			=> $id,
		'description'	=> $description,
		'before_widget' => '<div class="sidebar">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_tile'	=> '</h3>'
	));
}

nature_widgets_project ( 'Sidebar Projects', 'sidebar-project', 'Show widgets on sidebar projects page' );

function nature_widgets_event( $name, $id, $description ) {
	register_sidebar( array (
		'name'			=> $name,
		'id'  			=> $id,
		'description'	=> $description,
		'before_widget' => '<div class="sidebar">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_tile'	=> '</h3>'
	));
}

nature_widgets_event ( 'Sidebar Events', 'sidebar-event', 'Show widgets on sidebar projects page' );

function nature_widgets_left_sidebar( $name, $id, $description ) {
	register_sidebar( array (
		'name'			=> $name,
		'id'  			=> $id,
		'description'	=> $description,
		'before_widget' => '<div class="sidebar">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_tile'	=> '</h3>'
	));
}

nature_widgets_event ( 'Page Left Sidebar', 'sidebar-left', 'Show widgets on page left sidebar' );


/*-----------------------------------------------------------------------------------*/
// Navwalker
/*-----------------------------------------------------------------------------------*/
// Register Custom Navigation Walker - Links whith icons
require('includes/wp_bootstrap_navwalker.php');

	function vb_pagination( $query=null ) {

	global $wp_query;
		$query = $query ? $query : $wp_query;
		$big = 999999999;

		$paginate = paginate_links( array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'type'      => 'array',
			'total'     => $query->max_num_pages,
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var('paged') ),
			'prev_text' => __( '&laquo;', 'nature' ),
			'next_text' => __( '&raquo;', 'nature' ),
			)
		);

	if ($query->max_num_pages > 1) :
	?>
	<ul class="pagination">
	<?php
		foreach ( $paginate as $page ) {
			echo '<li>' . $page . '</li>';
		}
	?>
	</ul>
	<?php
	endif;
	}
/*-----------------------------------------------------------------------------------*/
// Comments Styles Bootstrap
/*-----------------------------------------------------------------------------------*/
function bootstrap3_comment_form_fields( $fields ) {
	$req = 0;
	$commenter = wp_get_current_commenter();
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	$fields   =  array(

        'author' => '<div class="form-group comment-form-author">
                    <input class="form-control" id="author" placeholder="'. __( 'Name*' , 'nature' ) . '" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',

        'email'  => '<div class="form-group comment-form-email">
                    <input class="form-control" id="email" placeholder="'. __( 'Email*' , 'nature' ) . '" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',

        'url'    => '<div class="form-group comment-form-url">
                    <input class="form-control" id="url" placeholder="'. __( 'Website' , 'nature' ) . '" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
    );

    return $fields;
}
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );


function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '</div><div class="col-lg-6"><div class="form-group comment-form-comment">
            <textarea class="form-control" id="comment" placeholder="'. __( 'Comments*' , 'nature' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    return $args;
}
add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );

function bootstrap3_comment_button() {
    echo '<button class="btn btn-default" type="submit">' . __( 'Submit' ,'nature' ) . '</button></div>';
}
add_action('comment_form', 'bootstrap3_comment_button' );
/*-----------------------------------------------------------------------------------*/
// More Comments Styles
/*-----------------------------------------------------------------------------------*/
/**
 * Change the text output that appears before the comment form
 * Note: Logged in user will not see this text.
 *
 * @author Carrie Dils <http://www.carriedils.com>
 * @uses comment_notes_before <http://codex.wordpress.org/Function_Reference/comment_form>
 *
 */
function cd_pre_comment_text( $arg ) {
	$arg['comment_notes_before'] = '<div class="col-lg-6"> <p>Your email address will not be published.<br>Required fields are marked *</p>';
	return $arg;
}
add_filter( 'comment_form_defaults', 'cd_pre_comment_text' );

function nature_logged_comment_text( $arg ) {
	$arg['logged_in_as'] = '<div class="col-lg-6"><p>' . __('Since you are logged in you can leave your opinion, we do apreciate!', 'nature') . '</p>';
	return $arg;
}
add_filter( 'comment_form_defaults', 'nature_logged_comment_text' );

/*===================================================================================
 * Add Author Links
 * =================================================================================*/
function nature_author_profile( $contactmethods ) {

	$contactmethods['rss_url'] = 'RSS URL';
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	$contactmethods['pinterest_profile'] = 'Pinterest Profile URL';

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'nature_author_profile', 10, 1);

function nature_social_icon_author() {

		echo '<ul class="social gray-dark social-author">';

		$rss_url = get_the_author_meta( 'rss_url' );
		if ( $rss_url && $rss_url != '' ) {
			echo '<li><a href="' . esc_url($rss_url) . '"><i class="fa fa-rss"></i></a></li>';
		}

		$facebook_profile = get_the_author_meta( 'facebook_profile' );
		if ( $facebook_profile && $facebook_profile != '' ) {
			echo '<li><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook"></i></a></li>';
		}

		$twitter_profile = get_the_author_meta( 'twitter_profile' );
		if ( $twitter_profile && $twitter_profile != '' ) {
			echo '<li><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter"></i></a></li>';
		}

		$google_profile = get_the_author_meta( 'google_profile' );
		if ( $google_profile && $google_profile != '' ) {
			echo '<li><a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus"></i></a></li>';
		}

		$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
		if ( $linkedin_profile && $linkedin_profile != '' ) {
		       echo '<li><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin"></i></a></li>';
		}
		$pinterest_profile = get_the_author_meta( 'pinterest_profile' );
		if ( $pinterest_profile && $pinterest_profile != '' ) {
		       echo '<li><a href="' . esc_url($pinterest_profile) . '"><i class="fa fa-pinterest"></i></a></li>';
		}
		echo '</ul>';
}
add_filter('social_icons', 'nature_social_icon_author');

/*===================================================================================
 *  Excerpt Limit
/*===================================================================================*/
function string_limit_words($string, $word_limit)
	{
		$words = explode(' ', $string, ($word_limit + 1));
			if(count($words) > $word_limit)
			array_pop($words);
			return implode(' ', $words);
	}

function custom_string_limit_words($string, $word_limit)
	{
		$words = explode(' ', $string, ($word_limit + 1));
			if(count($words) > $word_limit)
			array_pop($words);
			return implode(' ', $words);
	}

/*===================================================================================
 *  First unregister default comments and recents posts widgets
/*===================================================================================*/
function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Pages');
	}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);
/*===================================================================================
 *  Widgets Custom
/*===================================================================================*/
/*
class nature_latest_posts extends WP_Widget{

    function nature_latest_posts()
	    {
	        parent::WP_Widget(false, $name = 'Nature :: Latest Posts');
	    }

    function widget($args, $instance)
   		{
	        extract( $args );
	        $title = apply_filters('widget_title', $instance['title']);
	        $post_type = $instance['post_type'] ? $instance['post_type'] : "post";
			echo $args['before_widget'];
        ?>
		<aside>
            <h3><?php echo $title; ?></h3>
                <?php
                	$args = array(
						"posts_per_page" => 3,
                             "post_type" => $post_type
                    );

                    $the_query = new WP_Query( $args );
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                    global $post;
	                    $tax = $post_type;
	                    $terms = wp_get_post_terms( $post->ID,$tax );
	                    $terms_html_array = array();
	                    foreach($terms as $t){
	                        $term_name = $t->name;
	                        $term_link = get_term_link($t->slug,$t->taxonomy);
	                        array_push($terms_html_array,"<a href='{$term_link}'>{$term_name}</a>");
	                    }
						$terms_html_array = implode(", ",$terms_html_array);
                ?>
                <div class="latest-posts">
                    <?php
						$thumbnail_id = get_post_thumbnail_id();
						$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'sidebar-thumb', true);
					?>
					<figure>
						<a href="<?php the_permalink(); ?>">
						<?php if ( ! empty( $thumbnail_id ) )

						{ ?>

						<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">

						<?php
						} else {

						echo '<img src="' . of_get_option('option_placeholder') . '" alt="no image"/>';

						}
						?>
						</a>
					</figure>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<p class="desc">
						<?php
							$excerpt = get_the_excerpt();
							echo string_limit_words($excerpt,15);
						?>
					</p>
				<?php endwhile; ?>
		</aside>
        <?php
			echo $args['after_widget'];
		}
			function update($new_instance, $old_instance)
		{
	        $instance = $old_instance;
	        $instance['title'] = strip_tags($new_instance['title']);
	        $instance['post_type'] = strip_tags($new_instance['post_type']);
	        return $instance;
		}
		function form($instance)
			{
	        $title = isset($instance['title']) ? esc_attr($instance['title']) : "";
	        $post_type = isset($instance['post_type']) ? esc_attr($instance['post_type']) : "";
        ?>
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title',"Nature"); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post Type',"Nature"); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('post_type'); ?>" id="<?php echo $this->get_field_id('post_type'); ?>">
                <option value="post" <?php echo $post_type == "post" || !$post_type ? 'selected="selected"' : ''; ?>>
                    <?php _e("Posts","Nature"); ?>
                </option>
                <option value="project" <?php echo $post_type == "project" ? 'selected="selected"' : ''; ?>>
                    <?php _e("Project","Nature"); ?>
                </option>
                <option value="event" <?php echo $post_type == "event" ? 'selected="selected"' : ''; ?>>
                    <?php _e("Event","Nature"); ?>
                </option>
            </select>
        </p>
    <?php
    }
}

function nature_widgets_latest_posts() {
    register_widget('nature_latest_posts');
}
add_action('widgets_init', 'nature_widgets_latest_posts');
*/

/*===================================================================================
 *  Widgets Recent Comments
/*===================================================================================*/
class Nature_Recent_Comments extends WP_Widget{

    function nature_recent_comments()
	    {
	        parent::WP_Widget(false, $name = 'Nature :: Most Commented');
	    }

    function widget($args, $instance)
   		{
	        extract( $args );
	        $title = apply_filters('widget_title', $instance['title']);
	        $number_posts = apply_filters('', $instance['posts_per_page']);
	        $post_type = $instance['post_type'] ? $instance['post_type'] : "post";
			echo $args['before_widget'];


        ?>
		<aside>
            <h3><?php echo $title; ?></h3>
                <?php
                    $the_query = new WP_Query( array(
                        'posts_per_page' => $number_posts,
                             'post_type' => $post_type,
                              'orderby' => 'comment_count',

                    ) );
					 while ( $the_query->have_posts() ) : $the_query->the_post();
                    global $post;
	                    $tax = $post_type == "project" ? "project_type" : "project";
	                    $terms = wp_get_post_terms( $post->ID,$tax );
	                    $terms_html_array = array();
	                    foreach($terms as $t){
	                        $term_name = $t->name;
	                        $term_link = get_term_link($t->slug,$t->taxonomy);
	                        array_push($terms_html_array,"<a href='{$term_link}'>{$term_name}</a>");
	                    }
						$terms_html_array = implode(", ",$terms_html_array);
                  ?>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
					<blockquote>
						<p><i class="fa fa-comments-o"></i>
							<?php
								comments_number( 'No', '1', '%' ); echo esc_attr_e( ' comments', 'nature') ;
							?></p>
					</blockquote>
				<?php endwhile; ?>
				<?php rewind_posts();?>
		</aside>
        <?php
			echo $args['after_widget'];
		}
			function update($new_instance, $old_instance)
		{
	        $instance = $old_instance;
	        $instance['title'] = strip_tags($new_instance['title']);
	        $instance['posts_per_page'] = strip_tags($new_instance['posts_per_page']);
	        $instance['post_type'] = strip_tags($new_instance['post_type']);
	        return $instance;
		}
		function form($instance)
			{
	        $title = isset($instance['title']) ? esc_attr($instance['title']) : "";
	        $number_posts = isset($instance['posts_per_page']) ? esc_attr($instance['posts_per_page']) : "";
	        $post_type = isset($instance['post_type']) ? esc_attr($instance['post_type']) : "";
        ?>
        <p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title',"Nature"); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Total Posts',"Nature"); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" type="text" value="<?php echo $number_posts; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post Type',"Nature"); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('post_type'); ?>" id="<?php echo $this->get_field_id('post_type'); ?>">
                <option value="post" <?php echo $post_type == "post" || !$post_type ? 'selected="selected"' : ''; ?>>
                    <?php _e("Comments Blog","Nature"); ?>
                </option>
                <option value="project" <?php echo $post_type == "project" ? 'selected="selected"' : ''; ?>>
                    <?php _e("Comments Project","Nature"); ?>
                </option>
            </select>
        </p>
    <?php
    }
}

function nature_widget_recent_comments() {
    register_widget('Nature_Recent_Comments');
}
add_action('widgets_init', 'nature_widget_recent_comments');


/*===================================================================================
 *  Widgets Pages
/*===================================================================================*/
class Nature_Widget_Pages extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_pages', 'description' => __( 'A list of your site&#8217;s Pages.', 'nature') );
		parent::__construct('pages', __('Nature :: Pages', 'nature'), $widget_ops);
	}

	public function widget( $args, $instance ) {

		/**
		 * Filter the widget title.
		 *
		 * @since 2.6.0
		 *
		 * @param string $title    The widget title. Default 'Pages'.
		 * @param array  $instance An array of the widget's settings.
		 * @param mixed  $id_base  The widget ID.
		 */
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Pages', 'nature' ) : $instance['title'], $instance, $this->id_base );

		$sortby = empty( $instance['sortby'] ) ? 'menu_order' : $instance['sortby'];
		$exclude = empty( $instance['exclude'] ) ? '' : $instance['exclude'];

		if ( $sortby == 'menu_order' )
			$sortby = 'menu_order, post_title';

		/**
		 * Filter the arguments for the Pages widget.
		 *
		 * @since 2.8.0
		 *
		 * @see wp_list_pages()
		 *
		 * @param array $args An array of arguments to retrieve the pages list.
		 */
		$out = wp_list_pages( apply_filters( 'widget_pages_args', array(
			'title_li'    => '',
			'echo'        => 0,
			'sort_column' => $sortby,
			'exclude'     => $exclude,
			'link_after'  => '<i class="fa fa-angle-right"></i>',
		) ) );

		if ( ! empty( $out ) ) {
			echo $args['before_widget'];
			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
		?>
		<ul class="links-arrow">
			<?php echo $out; ?>
		</ul>
		<?php
			echo $args['after_widget'];
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		if ( in_array( $new_instance['sortby'], array( 'post_title', 'menu_order', 'ID' ) ) ) {
			$instance['sortby'] = $new_instance['sortby'];
		} else {
			$instance['sortby'] = 'menu_order';
		}

		$instance['exclude'] = strip_tags( $new_instance['exclude'] );

		return $instance;
	}

	public function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'sortby' => 'post_title', 'title' => '', 'exclude' => '') );
		$title = esc_attr( $instance['title'] );
		$exclude = esc_attr( $instance['exclude'] );
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:' , 'nature'); ?></label> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('sortby'); ?>"><?php _e( 'Sort by:', 'nature' ); ?></label>
			<select name="<?php echo $this->get_field_name('sortby'); ?>" id="<?php echo $this->get_field_id('sortby'); ?>" class="widefat">
				<option value="post_title"<?php selected( $instance['sortby'], 'post_title' ); ?>><?php _e('Page title', 'nature'); ?></option>
				<option value="menu_order"<?php selected( $instance['sortby'], 'menu_order' ); ?>><?php _e('Page order', 'nature'); ?></option>
				<option value="ID"<?php selected( $instance['sortby'], 'ID' ); ?>><?php _e( 'Page ID', 'nature' ); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('exclude'); ?>"><?php _e( 'Exclude:' , 'nature' ); ?></label> <input type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name('exclude'); ?>" id="<?php echo $this->get_field_id('exclude'); ?>" class="widefat" />
			<br />
			<small><?php _e( 'Page IDs, separated by commas.' , 'nature' ); ?></small>
		</p>
<?php
	}

}
function nature_widget_pages() {
	register_widget( 'Nature_Widget_Pages' );
}
add_action( 'widgets_init', 'nature_widget_pages' );

/*===================================================================================
/** 	COMMENTS WALKER */
/*===================================================================================*/
class Nature_Walker_Comment extends Walker_Comment {

    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );


    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>

        <ul id="comment-list">

    <?php }

    /** START_LVL
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

			<ul class="comment-list">
    <?php }

    /** END_LVL
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>

        	</ul><!-- /.children -->

    <?php }

    /** START_EL */
    function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>

        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <div id="comment-body-<?php comment_ID() ?>" class="comments-user">

                <div class="comment-author vcard author">
                    <?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?>
                    <h4><?php echo get_comment_author_link(); ?></h4>
                </div><!-- /.comment-author -->

                <div id="comment-content-<?php comment_ID(); ?>" class="comment-content">
                    <?php if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>

                    <?php else: comment_text(); ?>
                    <?php endif; ?>
                </div><!-- /.comment-content -->

                <div class="comment-meta comment-meta-data">
                    <a href="<?php echo htmlspecialchars( get_comment_link( get_comment_ID() ) ) ?>"><?php comment_date(); ?> at <?php comment_time(); ?></a> <?php edit_comment_link( '(Edit)' ); ?>
                </div><!-- /.comment-meta -->

                <div class="reply"><br>
                    <?php $reply_args = array(
                        'add_below' => '',
                        'depth' => $depth,
                        'before'=> '<div class="bottom clear">',
                        'after' => '</div>',
                        'max_depth' => $args['max_depth'] );
						//var_dump($reply_args[$depth]);die;
                    comment_reply_link( array_merge( $args, $reply_args ) );  ?>
                </div><!-- /.reply -->
            </div><!-- /.comment-body -->

    <?php }

    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

        </li><!-- /#comment-' . get_comment_ID() . ' -->

    <?php }

    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() { ?>

    </ul><!-- /#comment-list -->

    <?php }
} ?>