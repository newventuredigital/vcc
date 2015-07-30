<?php
/*-----------------------------------------------------------------------------------*/
// Remove Fields From Templates
/*-----------------------------------------------------------------------------------*/

function remove_page_fields() {
	remove_meta_box( 'authordiv' , 'member' , 'normal' );
	remove_meta_box( 'postexcerpt' , 'member' , 'normal' );
	remove_meta_box( 'pageparentdiv' , 'member' , 'normal' );
	remove_meta_box( 'linktargetdiv', 'member', 'normal' );
	remove_meta_box( 'linkxfndiv', 'member', 'normal' );
	remove_meta_box( 'linkadvanceddiv', 'member', 'normal' );
	remove_meta_box( 'trackbacksdiv', 'member', 'normal' );
	remove_meta_box( 'postcustom', 'member', 'normal' );
	remove_meta_box( 'commentstatusdiv', 'member', 'normal' );
	remove_meta_box( 'commentsdiv', 'member', 'normal' );
	remove_meta_box( 'revisionsdiv', 'member', 'normal' );
	remove_meta_box( 'sqpt-meta-tags', 'member', 'normal' );

	remove_meta_box( 'postcustom', 'post', 'normal' );
	remove_meta_box( 'revisionsdiv' , 'post' , 'normal' );
}
add_action( 'admin_menu' , 'remove_page_fields' );

add_filter( 'rwmb_meta_boxes', 'meta_box_show_hide_demo_register' );

/**
 * Register meta boxes
 *
 * @param array $meta_boxes
 *
 * @return array
 */
function meta_box_show_hide_demo_register( $meta_boxes )
{
	$prefix = 'custom_';
	global $meta_boxes;
	$meta_boxes = array();

/*-----------------------------------------------------------------------------------*/
// Page contact meta boxes
/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'title'  => __( 'Contact Options', 'nature' ),
		'pages'  => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
		// Show this meta box for posts matched below conditions
		'show'   => array(
			// With all conditions below, use this logical operator to combine them. Default is 'OR'. Case insensitive. Optional.
			'relation'    => 'OR',
			// List of page templates (used for page only). Array. Optional.
			'template'    => array( 'page-contact.php' ),
		),
		'fields' => array(
			array(
				'id'   => $prefix . 'map_contact_show',
				'name' => __( 'Display contact map', 'nature' ),
				'desc' => __( 'Do you want display the map for your address?', 'nature' ),
				'type' => 'radio',

				//options
				'options'  => array(
				  'yes'    => __( 'yes', 'nature' ),
				  'no'     => __( 'no', 'nature' ),
				  ),
			),
			array(
				'id'            => $prefix.'address_contact',
				'name'          => __( 'Find the map place by address', 'nature' ),
				'type'          => 'text',
				'std'           => __( 'San Francisco, CA, USA', 'nature' ),
			),
			array(
				'id'            => $prefix .'map_contact',
				'name'          => __( 'Location', 'nature' ),
				'desc'          => __( 'Place the map marker in your adress', 'nature' ),
				'type'          => 'map',
				'std'           => '37.774929,-122.419416',     // 'latitude,longitude[,zoom]' (zoom is optional)
				'style'         => 'width: 500px; height: 400px',
				'address_field' => $prefix. 'address_contact', // Name of text field where address is entered. Can be list of text fields, separated by commas (for ex. city, state)
	        ),
	        array(
	        	'name' => __( 'Text above form left', 'nature' ),
	            'desc' => __( 'ie.: Contact our team', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'below_map_left',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Title right form', 'nature' ),
	            'desc' => __( 'ie.: We would like to hear from you', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'below_map_right',
	            'type' => 'text',
	        ),
			array(
	        	'name' => __( 'Bold text bellow title', 'nature' ),
	            'desc' => __( 'ie.: Adress, Phone, Social Network', 'nature' ),
	            'clone'=> true,
	            'id'   => $prefix . 'below_map_bold',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Text information', 'nature' ),
	            'desc' => __( 'ie.: Text area for more detais', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'text_area_map',
	            'type' => 'textarea',
	        ),
		),
	);

/*-----------------------------------------------------------------------------------*/
// Posts - gallery options meta boxes
/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'title'  => 'Custom post gallery',
		'pages'  => array( 'post' ),

		// Show this meta box for posts matched below conditions
		'show'   => array(
			// With all conditions below, use this logical operator to combine them. Default is 'OR'. Case insensitive. Optional.
			'relation'    => 'OR',
		// List of post formats. Array. Case insensitive. Optional.
			'post_format' => array( 'Standard' ),
		),

		'fields' => array(
			 array(
				'id'       =>  $prefix . 'featured_image',
				'name'     => __( 'Display featured image', 'nature' ),
				'desc'	   => __( 'You can choose if you want display a featured image at the beginning of the post', 'nature' ),
				'type'     => 'radio',

				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				  ),
			 ),
			 array(
				'id'       =>  $prefix.'post_images',
				'name'     => __( 'Gallery Post', 'nature' ),
				'desc'	   => __( 'You can upload your post gallery here to display in Fotorama JS style!', 'nature' ),
				'type'     => 'image_advanced',
	        ),
		),
	);

/*-----------------------------------------------------------------------------------*/
// Project page meta boxes
/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'id' => 'meta_box_project',
	    'title' => 'Custom project page',
	    'pages' => array ( 'project' ),
	    'context' => 'normal',
	    'priority' => 'high',
	    'fields' => array(
	        array(
	            'name' => __( 'Date' , 'nature' ),
	            'desc' => __( 'Click to pick a date', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'date',
	            'type' => 'date',
	            'std'  => '',
	        ),
	        array(
	            'name' => __( 'Raised', 'nature' ),
	            'desc' => __( 'How much did the project raise? ie. US$ 1,114.00', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'raised',
	            'type' => 'text',
	            'std'  => ''
	        ),
	        array(
	            'name' => __( 'Our goal', 'nature' ),
	            'desc' => __( 'How much is the goal? ie. US$ 3,000.00', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'goal',
	            'type' => 'text',
	        ),
	        array(
	            'name' => __( 'Button text', 'nature' ),
	            'desc' => __( 'The text inside the button', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'button_text_project',
	            'type' => 'text',
	            'std'  => __( 'Support this project', 'nature' ),
	        ),
	        array(
	        	'name' => __( 'Button link', 'nature' ),
	            'desc' => __( 'The link for donation or more information', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'link_project',
	            'type' => 'text',
	            'std'  => '#',
	        ),
	        array(
	       		'name'	=> __( 'Attach images galery', 'nature' ),
				'desc'	=> __( 'Upload images related to this project. These Images will appear in gallery of this project page.', 'nature'),
				'clone' => false,
				'id'	=> $prefix .'images_project',
				'type'	=> 'image_advanced',
			)
		)
	);

/*-----------------------------------------------------------------------------------*/
// Page events meta boxes
/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'id' => 'meta_box_event',
	    'title' => 'Custom event page',
	    'pages' => array ( 'event' ),
	    'context' => 'normal',
	    'priority' => 'high',
	    'fields' => array(
	    	array(
					'id'            => $prefix . 'address_event',
					'name'          => __( 'Find the map place by address', 'nature' ),
					'desc'          => __( 'The event address', 'nature' ),
					'type'          => 'text',
					'std'           => '',
				),
			array(
					'id'            => $prefix .'map_event',
					'name'          => __( 'Location', 'nature' ),
					'type' 		    => 'map',
					'std' 			=> '',
					'style'			=> 'width: 500px; height: 350px',
					'address_field' => $prefix . 'address_event',
			),
	        array(
	            'name' => __( 'Button text', 'nature' ),
	            'desc' => __( 'The text inside the button', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'button_text_event',
	            'type' => 'text',
	            'std'  => __( 'Support this project', 'nature' )
	        ),
	        array(
	        	'name' => __( 'Button link', 'nature' ),
	            'desc' => __( 'The link for more information', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'link_event',
	            'type' => 'text',
	            'std'  => '#',
	        ),
	        array(
	        	'name' => __( 'Date', 'nature' ),
	            'desc' => __( 'The event date', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'calendar_event',
	            'type' => 'date',
	            // jQuery date picker options. See here http://jqueryui.com/demos/datepicker

				'js_options' => array(
					'appendText'      => __( '(dd M)', 'nature' ),
					'autoSize'        => true,
					'buttonText'      => __( 'Select Date', 'nature' ),
					'dateFormat'      => __( 'dd M', 'nature' ),
					'numberOfMonths'  => 2,
					'showButtonPanel' => true,
				),
			),
	        array(
	        	'name' => __( 'Time', 'nature' ),
	            'desc' => __( 'The event time', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'time_event',
	            'type' => 'time',
	            'std'  => '',
	        ),
	        array(
	       		'name'	=> __( 'Attach images galery', 'nature' ),
				'desc'	=> __( 'Upload images related to this event. These Images will appear in gallery of this project page.', 'nature'),
				'clone' => false,
				'id'	=> $prefix . 'images_event',
				'type'	=> 'image_advanced',
			)
		)
	);

/*-----------------------------------------------------------------------------------*/
// Team page meta boxes
/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'id' => 'meta_box_donation',
	    'title' => 'Custom donation page',
	    'pages' => array('member' ),
	    'context' => 'normal',
	    'priority' => 'low',
	    'fields' => array(
	    	 array(
	        	'name' => __( 'Full Name', 'nature' ),
	            'desc' => __( 'The full name', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'full_name',
	            'type' => 'text',
	            'std'  => '',
	        ),
			array(
				'name' => __( 'Job Title', 'nature' ),
				'id'   => $prefix .'job_title',
				'type' => 'text',
				'std'  => '',
			),
			array(
	        	'name' => __( 'Website', 'nature' ),
	            'desc' => __( 'ie.: www.mysite.com', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'website',
	            'type' => 'text',
	            'std'  => '',
	        ),
	        array(
	        	'name' => __( 'Full Link Website', 'nature' ),
	            'desc' => __( 'ie.: http://www.mysite.com/somepage', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'full_link',
	            'type' => 'text',
	            'std'  => '',
	        ),
	        array(
	        	'name' => __( 'Text description', 'nature' ),
	            'desc' => __( 'An explanatory text about you', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'text_description',
	            'type' => 'textarea',
	            'std'  => '',
	        ),
	        array(
	        	'name' => __( 'Facebook Profile', 'nature' ),
	            'desc' => __( 'ie.: http://facebook.com/yourname', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'facebook',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Twitter Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'twitter',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Google+ Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'google',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Pinterest Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'pinterest',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Linkedin Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'linkedin',
	            'type' => 'text',
	        ),
	   	)
	);


	$meta_boxes[] = array(
		'id' => 'meta_box_donation',
	    'title' => 'Custom donation page',
	    'pages' => array('boardmember' ),
	    'context' => 'normal',
	    'priority' => 'low',
	    'fields' => array(
	    	 array(
	        	'name' => __( 'Full Name', 'nature' ),
	            'desc' => __( 'The full name', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'full_name',
	            'type' => 'text',
	            'std'  => '',
	        ),
			array(
				'name' => __( 'Job Title', 'nature' ),
				'id'   => $prefix .'job_title',
				'type' => 'text',
				'std'  => '',
			),
			array(
	        	'name' => __( 'Website', 'nature' ),
	            'desc' => __( 'ie.: www.mysite.com', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'website',
	            'type' => 'text',
	            'std'  => '',
	        ),
	        array(
	        	'name' => __( 'Full Link Website', 'nature' ),
	            'desc' => __( 'ie.: http://www.mysite.com/somepage', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'full_link',
	            'type' => 'text',
	            'std'  => '',
	        ),
	        array(
	        	'name' => __( 'Text description', 'nature' ),
	            'desc' => __( 'An explanatory text about you', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'text_description',
	            'type' => 'textarea',
	            'std'  => '',
	        ),
	        array(
	        	'name' => __( 'Facebook Profile', 'nature' ),
	            'desc' => __( 'ie.: http://facebook.com/yourname', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'facebook',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Twitter Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'twitter',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Google+ Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'google',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Pinterest Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'pinterest',
	            'type' => 'text',
	        ),
	        array(
	        	'name' => __( 'Linkedin Profile', 'nature' ),
	            'desc' => __( 'Full url link', 'nature' ),
	            'clone'=> false,
	            'id'   => $prefix . 'linkedin',
	            'type' => 'text',
	        ),
	   	)
	);



/*-----------------------------------------------------------------------------------*/
// Page gallery meta boxes
/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'title'  => 'Gallery Customize',
		'pages'  => array( 'gallery' ),

		// Show this meta box for posts matched below conditions
		'show'   => array(
			// With all conditions below, use this logical operator to combine them. Default is 'OR'. Case insensitive. Optional.
			'relation'    => 'OR',
		// List of post formats. Array. Case insensitive. Optional.
			'post_format' => array( 'Standard' ),
		),

		'fields' => array(
			 array(
				'id'   =>  $prefix . 'columns_gallery',
				'name' => __( 'Select the quantity of columns and the style', 'nature' ),
				'desc' => __( 'You can choose how many columns do you want', 'nature' ),
				'type' => 'select',

				//options
				'options'    => array(
				  '2col'     => __( '2 columns', 'nature' ),
				  '3col'     => __( '3 columns', 'nature' ),
				  '6col'     => __( '6 columns', 'nature' ),
				  '3col_man' => __( '3 col masonry w/ sidebar', 'nature' ),
				  '4col_man' => __( '4 col masonry no sidebar', 'nature' ),
				  ),
			 ),
			 array(
				'id'       =>  $prefix.'gallery_style',
				'name'     => __( 'Gallery Post', 'nature' ),
				'desc'	   => __( 'You can upload your post gallery here to display in diferent columns!', 'nature' ),
				'type'     => 'image_advanced',
	        ),
	         array(
				'id'       =>  $prefix . 'banner_donate',
				'name'     => __( 'Display the banner above the galleries', 'nature' ),
				'desc'	   => __( 'You can choose if you want display a banner below the galleries', 'nature' ),
				'type'     => 'radio',

				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				  ),
			 ),
			  array(
			 	'id'   => $prefix . 'title_banner',
			 	'name' => __( 'Title banner', 'nature' ),
			 	'desc' => __( 'ie.: Help us change the World' , 'nature'),
			 	'type' => 'text',
			 ),
			 array(
			 	'id'   => $prefix . 'icon_fontawesome',
			 	'name' => __( 'Fontawesome icon banner', 'nature' ),
			 	'desc' => __( 'You can display fontawesome icon here. ie.: fa fa-globe<br>For full list off available icons visit<br>http://fortawesome.github.io/Font-Awesome/', 'nature'),
			 	'type' => 'text',
			 ),
			 array(
			 	'id'   => $prefix . 'button_banner',
			 	'name' => __( 'Button text banner', 'nature' ),
			 	'desc' => __( 'ie.: Support Us', 'nature'),
			 	'type' => 'text',
			 ),
			 array(
			 	'id'   => $prefix . 'icon_button_fontawesome',
			 	'name' => __( 'Fontawesome icon button banner', 'nature' ),
			 	'desc' => __( 'You can call button icon here. ie.: fa fa-heart', 'nature'),
			 	'type' => 'text',
			 ),
			  array(
			 	'id'   => $prefix . 'link_banner',
			 	'name' => __( 'Url link banner', 'nature' ),
			 	'desc' => __( 'Full adress url ie.:http://www.example.com', 'nature'),
			 	'std'  => '#',
			 	'type' => 'url',
			 ),
			  array(
				'id'       =>  $prefix . 'another_galleries',
				'name'     => __( 'Display another galleries', 'nature' ),
				'desc'	   => __( 'You can choose if you want display a random gallery below the banner', 'nature' ),
				'type'     => 'radio',

				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				  ),
			 ),
			 array(
			 	'id'   => $prefix . 'title_displayed',
			 	'name' => __( 'Display a link', 'nature' ),
			 	'desc' => __( 'Display a link below each image', 'nature' ),
			 	'type' => 'radio',

			 	//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				 ),
			 ),
			  array(
			 	'id'   => $prefix . 'title_gallery',
			 	'name' => __( 'Display a title', 'nature' ),
			 	'desc' => __( 'Display a title above the random gallery', 'nature' ),
			 	'type' => 'text',
			 	'clone'=> false,
			 ),
		)
	);

/*-----------------------------------------------------------------------------------*/
// Page home template meta boxes
/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'title'    => __( 'Home Page Options', 'nature' ),
		'pages'    => array( 'page' ),
		'context'  => 'normal',
		'priority' => 'high',
		// Show this meta box for posts matched below conditions
		'show'     => array(
			// With all conditions below, use this logical operator to combine them. Default is 'OR'. Case insensitive. Optional.
			'relation' => 'OR',
			// List of page templates (used for page only). Array. Optional.
			'template' => array( 'page-home.php' ),
		),
		'tabs' => array(
			'slide' => array(
				'label' => __( 'Slider', 'nature' ),
				'icon'  => 'dashicons-camera', // Dashicon
			),
			'welcome' => array(
				'label' => __( 'Welcome', 'nature' ),
				'icon'  => 'dashicons-id-alt', // Dashicon
			),
			'parallax_01' => array(
				'label'   => __( 'Banner Parallax 01', 'nature' ),
				'icon'    => 'dashicons-camera',
			),
			'services_01'   => array(
				'label' => __( 'Service First Row', 'nature' ),
				'icon'  => 'dashicons-admin-generic',
			),
			'services_02'   => array(
				'label' => __( 'Service Second Row', 'nature' ),
				'icon'  => 'dashicons-admin-generic',
			),
			'team' => array(
				'label' => __( 'Team options', 'nature' ),
				'icon'  => 'dashicons-admin-users',
			),
			'parallax_02' => array(
				'label'   => __( 'Banner Parallax 02', 'nature' ),
				'icon'    => 'dashicons-camera',
			),
			'posts_home' => array(
				'label'   => __( 'Random Posts', 'nature' ),
				'icon'    => 'dashicons-format-gallery',
			),
		),

		// Tab style: 'default', 'box' or 'left'. Optional
		'tab_style' => 'left',

/*-----------------------------------------------------------------------------------*/
// Page home template - Welcome options
/*-----------------------------------------------------------------------------------*/
		'fields'    => array(
			array(
				'id'   => $prefix . 'slide_home',
				'name' => __( 'Picture Slider 1', 'nature' ),
				'desc' => __( 'Select a picture for slider, the caption image will be used in the slider title and the description of the image will be used as the description of slider ', 'nature'),
				'type' => 'image_advanced',
				'clone'=> false,
				'tab'  => 'slide',
			),
			array(
				'id'   => $prefix . 'button_text_slide',
				'name' => __( 'Button text slider', 'nature' ),
				'desc' => __( 'Default: Read More', 'nature' ),
				'std'  => 'Read More',
				'type' => 'text',
				'tab'  => 'slide',
			),

/*-----------------------------------------------------------------------------------*/
// Page home template - Slider options
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'display_welcome',
				'name' => __( 'Display welcome', 'nature' ),
				'desc' => __( 'Enable welcome text to show up', 'nature' ),
				'type' => 'radio',
				'tab'  => 'welcome',
				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				 ),
			),
			array(
				'id'   => $prefix . 'title_welcome',
				'name' => __( 'Title welcome', 'nature' ),
				'desc' => __( 'ie.: Welcome to Nature Wordpress', 'nature' ),
				'type' => 'text',
				'tab'  => 'welcome',
			),
			array(
				'id'   => $prefix . 'text_welcome',
				'name' => __( 'Full text description', 'nature' ),
				'type' => 'textarea',
				'tab'  => 'welcome',
			),
			array(
				'id'    => $prefix . 'button_type',
				'name'  => __( 'Select color button', 'nature' ),
				'type'  => 'select',
				'tab'   => 'welcome',

				'options' => array(
					'ghost-dark'   => 'Ghost Dark',
					'ghost-color'  => 'Ghost Color',
					'solid-color'  => 'Solid Color',
				),
				'multiple'    => false,
				'std'         => 'ghost-color',
				'placeholder' => __( 'Select an option', 'nature' ),
 			),
			array(
				'id'   => $prefix . 'button_welcome',
				'name' => __( 'Button text', 'nature' ),
				'desc' => esc_html__( 'If you don\'t want to display leave empty', 'nature' ),
				'type' => 'text',
				'tab'  => 'welcome',
			),
			array(
				'id'   => $prefix . 'link_welcome',
				'name' => __( 'The url button link', 'nature' ),
				'desc' => esc_html__( 'Full url link, ie.: http://www.example.com', 'nature' ),
				'type' => 'text',
				'tab'  => 'welcome',
			),
			array(
				'id'   => $prefix . 'img_welcome',
				'name' => __( 'Picture right side', 'nature' ),
				'desc' => __( 'Select a picture to display on right side', 'nature'),
				'type' => 'image_advanced',
				'clone'=> false,
				'tab'  => 'welcome',
			),

/*-----------------------------------------------------------------------------------*/
// Page home template - Parallax 01 options
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'display_parallax_01',
				'name' => __( 'Display banner', 'nature' ),
				'desc' => __( 'Enable parallax 1 to show up', 'nature' ),
				'type' => 'radio',
				'tab'  => 'parallax_01',
				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				 ),
			),
			array(
				'id'   => $prefix . 'parallax_01',
				'name' => __( 'Upload your image', 'nature' ),
				'desc' => __( 'Minimum width 1200px', 'nature' ),
				'type' => 'image_advanced',
				'tab'  => 'parallax_01',
			),
			array(
				'id'   => $prefix . 'parallax_01_title',
				'name' => __( 'Banner Title, HTML allowed', 'nature' ),
				'desc' => esc_html__( 'ie.: We raised until now <span class="fa fa-bar-chart-o"></span> $589,765.08', 'nature' ),
				'type' => 'text',
				'tab'  => 'parallax_01',
			),

			array(
				'id'   => $prefix . 'parallax_01_button',
				'name' => __( 'Text Link, HTML allowed', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-heart"></i> Donate now', 'nature' ),
				'type' => 'text',
				'tab'  => 'parallax_01',
			),
			array(
				'id'   => $prefix . 'parallax_01_link',
				'name' => __( 'Full url link', 'nature' ),
				'desc' => esc_html__( 'ie.: http://www.example.com', 'nature' ),
				'type' => 'url',
				'tab'  => 'parallax_01',
			),

/*-----------------------------------------------------------------------------------*/
// Page home template - Services options
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'show_services',
				'name' => __( 'Display Services', 'nature' ),
				'desc' => __( 'Enable services to show up', 'nature' ),
				'type' => 'radio',
				'tab'  => 'services_01',
				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				 ),
			),
			array(
				'id'   => $prefix . 'title_services',
				'name' => __( '<strong>Title Services</strong>', 'nature' ),
				'desc' => __( 'ie.: Our services', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_01',
		    ),

/*-----------------------------------------------------------------------------------*/
// Page home template - Services first row
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'icon_1',
				'name' => __( '<strong>Icon one</strong>', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-child"></i>', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_01',
			),
			array(
				'id'   => $prefix . 'service_1',
				'name' => __( 'Service one', 'nature' ),
				'desc' => __( 'First service title', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_01',
			),
			array(
				'id'   => $prefix . 'desc_1',
				'name' => __( 'Description service one', 'nature' ),
				'desc' => __( 'Small description service two', 'nature' ),
				'type' => 'textarea',
				'tab'  => 'services_01',
			),
			array(
				'id'   => $prefix . 'icon_2',
				'name' => __( '<strong>Icon two</strong>', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-child"></i>', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_01',
			),
			array(
				'id'   => $prefix . 'service_2',
				'name' => __( 'Service two', 'nature' ),
				'desc' => __( 'Second service title', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_01',
			),
			array(
				'id'   => $prefix . 'desc_2',
				'name' => __( 'Description service two', 'nature' ),
				'desc' => __( 'Small description service one', 'nature' ),
				'type' => 'textarea',
				'tab'  => 'services_01',
			),

			array(
				'id'   => $prefix . 'icon_3',
				'name' => __( '<strong>Icon three</strong>', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-child"></i>', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_01',
			),
			array(
				'id'   => $prefix . 'service_3',
				'name' => __( 'Service three', 'nature' ),
				'desc' => __( 'Third service title', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_01',
			),
			array(
				'id'   => $prefix . 'desc_3',
				'name' => __( 'Description service three', 'nature' ),
				'desc' => __( 'Small description service three', 'nature' ),
				'type' => 'textarea',
				'tab'  => 'services_01',
			),

/*-----------------------------------------------------------------------------------*/
// Page home template - Services second row
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'icon_4',
				'name' => __( '<strong>Icon four</strong>', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-child"></i>', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'service_4',
				'name' => __( 'Service four', 'nature' ),
				'desc' => __( 'Second service title', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'desc_4',
				'name' => __( 'Description service four', 'nature' ),
				'desc' => __( 'Small description service four', 'nature' ),
				'type' => 'textarea',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'icon_5',
				'name' => __( '<strong>Icon five</strong>', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-child"></i>', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'service_5',
				'name' => __( 'Service five', 'nature' ),
				'desc' => __( 'Fifth service title', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'desc_5',
				'name' => __( 'Description service five', 'nature' ),
				'desc' => __( 'Small description service five', 'nature' ),
				'type' => 'textarea',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'icon_6',
				'name' => __( '<strong>Icon six</strong>', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-child"></i>', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'service_6',
				'name' => __( 'Service six', 'nature' ),
				'desc' => __( 'Sixth service title', 'nature' ),
				'type' => 'text',
				'tab'  => 'services_02',
			),
			array(
				'id'   => $prefix . 'desc_6',
				'name' => __( 'Description service six', 'nature' ),
				'desc' => __( 'Small description service six', 'nature' ),
				'type' => 'textarea',
				'tab'  => 'services_02',
			),
/*-----------------------------------------------------------------------------------*/
// Page home template - Team options
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'display_team',
				'name' => __( '<strong>Team Options</strong>', 'nature' ),
				'desc' => __( 'Do you want display team row?', 'nature' ),
				'type' => 'radio',
				'tab'  => 'team',

				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				 ),
			),
			array(
				'id'   => $prefix . 'link_team_page',
				'name' => __( 'The link for page team', 'nature' ),
				'desc' => esc_html__( 'ie.: http://www.yoursite.com/team-members', 'nature' ),
				'type' => 'text',
				'tab'  => 'team',
 			),

/*-----------------------------------------------------------------------------------*/
// Page home template - Parallax 02 options
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'display_parallax_02',
				'name' => __( 'Display banner', 'nature' ),
				'desc' => __( 'Enable parallax 2 to show up', 'nature' ),
				'type' => 'radio',
				'tab'  => 'parallax_02',
				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				 ),
			),
			array(
				'id'   => $prefix . 'parallax_02',
				'name' => __( 'Upload your image', 'nature' ),
				'desc' => __( 'Minimum width 1200px', 'nature' ),
				'type' => 'image_advanced',
				'tab'  => 'parallax_02',
			),
			array(
				'id'   => $prefix . 'parallax_02_title',
				'name' => __( 'Banner Title, HTML allowed', 'nature' ),
				'desc' => esc_html__( 'ie.: We raised until now <span class="fa fa-bar-chart-o"></span> $589,765.08', 'nature' ),
				'type' => 'text',
				'tab'  => 'parallax_02',
			),

			array(
				'id'   => $prefix . 'parallax_02_button',
				'name' => __( 'Text Link, HTML allowed', 'nature' ),
				'desc' => esc_html__( 'ie.: <i class="fa fa-heart"></i> Donate now', 'nature' ),
				'type' => 'text',
				'tab'  => 'parallax_02',
			),
			array(
				'id'   => $prefix . 'parallax_02_link',
				'name' => __( 'Full url link', 'nature' ),
				'desc' => esc_html__( 'ie.: http://www.example.com', 'nature' ),
				'type' => 'url',
				'tab'  => 'parallax_02',
			),

/*-----------------------------------------------------------------------------------*/
// Page home template - Posts Home
/*-----------------------------------------------------------------------------------*/
			array(
				'id'   => $prefix . 'display_posts',
				'name' => __( 'Display posts', 'nature' ),
				'desc' => __( 'Enable posts to show up', 'nature' ),
				'type' => 'radio',
				'tab'  => 'posts_home',

				//options
				'options'  => array(
				  'value1' => __( 'yes', 'nature' ),
				  'value2' => __( 'no', 'nature' ),
				 ),
			),
			array(
				'id'    => $prefix . 'order_posts',
				'name'  => __( 'Order posts options', 'nature' ),
				'desc'  => __( 'Chose how do you want display posts', 'nature'),
				'type'  => 'select',
				'tab'   => 'posts_home',

				'options' => array(
					'rand'          => __( 'Random', 'nature' ),
					'ID'            => __( 'Order by post id', 'nature' ),
					'author'        => __( 'Order by author', 'nature' ),
					'comment_count' => __( 'Number of comments', 'nature' ),
				),
				'multiple'    => false,
				'std'         => 'rand',
				'placeholder' => __( 'Select an option', 'nature' ),
 			),
 			array(
				'id'   => $prefix . 'title_posts',
				'name' => __( 'Title posts', 'nature' ),
				'desc' => __( 'ie.: Random posts, Recents posts', 'nature' ),
				'type' => 'text',
				'tab'  => 'posts_home',
			),
		),
	);

	return $meta_boxes;

}

function nature_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded
//  before (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'nature_register_meta_boxes' );

