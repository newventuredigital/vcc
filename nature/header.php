<?php
/**
 * @package Nature WP
*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php wp_title( '|', true, 'right' ); ?> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
		<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() );  ?>/images/favicon.ico">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

		<?php wp_head(); ?>
	</head>
<body <?php body_class(); ?>>
<!-- Static navbar -->
<header>
	<nav>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<div class="navbar-brand logo-nature">
						<a href="<?php echo esc_url( home_url() ); ?>">
						<?php
						$logo_svg = of_get_option( 'option_logo_svg_header' );
						$logo_png = of_get_option( 'option_logo_png_header' );

						//If have both logo svg and png or jpg display
						if ( !empty( $logo_svg ) &&  !empty( $logo_png ) ) { ?>

						<object class="logo-nature-object" data="<?php echo $logo_svg; ?>" type="image/svg+xml">

							<img src="<?php echo $logo_png; ?>" alt="<?php bloginfo( 'description' ); ?>" />

						</object>

						<?php
						//if have just logo.png or jpg display here

						} elseif (!empty ( $logo_png ) ) { ?>

						<img src="<?php echo $logo_png; ?>" alt="<?php bloginfo( 'description' ); ?>" />

						<?php
						// if no logo was uploaded display the blog name
						} else { ?>
						<h2><?php bloginfo('name'); ?></h2> <?php } ?>
						</a>
					</div>
				</div>
				<div class="navbar-collapse collapse">
					<?php
						wp_nav_menu( array(
							'menu'              => 'header-menu',
							'theme_location'    => 'header-menu',
							'depth'             => 2,
							'container'         => false,
							'container_class'   => false,
							'menu_class'        => 'nav navbar-nav navbar-side-logo',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					?>
				</div>
			</div>
		</div>
	</nav>
</header>
<?php if ( is_page_template( 'page-home.php' ) ) { ?>
<?php
	$slides = rwmb_meta ( 'custom_slide_home', 'type=image' );
	$button_text = rwmb_meta ( 'custom_button_text_slide' );
	$result = count($slides);
	$array_key = array_keys($slides);
	$the_id = $array_key[0];
?>
<?php if ( !empty( $slides ) ) { ?>
	<div class="container-carousel">
		<div class="carousel carousel-fade slide" id="natureCarousel">
			<ol class="carousel-indicators">
			<?php
				$i = 0;

				for ($i = 0; $i <= $result - 1; $i++ ) {
					$active = array($i);

					if ($active[0] == 0) {
						echo '<li class="slide_count "data-target="#natureCarousel" data-slide-to="' . $i . '" class="active"></li>';

					} else {
						echo '<li class="slide_count "data-target="#natureCarousel" data-slide-to="' . $i . '"></li>';
					}
				}
			?></ol>
		<div class="carousel-inner">
			<?php
			foreach ( $slides as $slide ) {  ?>

			<div class = "item <?php if ($slide['ID'] == $the_id ) { echo 'active'; } ?>">
				<div class="bannerImage">
					<a href="#"><img src="<?php echo $slide['full_url']; ?>" alt="<?php echo $slide['alt']; ?>" width="1200" height="500" /></a>
				</div>
				<div class="carousel-caption">
					<h3><?php echo $slide['alt']; ?></h3>
					<div class="slide-hr"></div>
					<p><?php echo $slide['description']; ?></p>
					<a class="ghost-white" href="<?php echo $slide['caption']; ?>"> <?php echo $button_text; ?></a>
				</div>
			</div>

			<?php } //end foreach ?>

		</div><!-- carousel-inner -->
		<div class="control-box">
			<a class="left carousel-control" href="#natureCarousel" role="button" data-slide="prev">
				<i class="fa fa-angle-left fa-lg"></i>
			</a>
			<a class="right carousel-control" href="#natureCarousel" role="button" data-slide="next">
				<i class="fa fa-angle-right fa-lg"></i>
			</a>
		</div><!-- control-box -->
	</div><!-- #natureCarousel -->
</div><!-- #containerCarousel -->

	<?php } else { echo '<div class="margin-home"></div>'; }?>
<?php } ?>
<!-- Featured header -->
<div class="container-fluid featured-header <?php if ( is_page_template('page-home.php') ) { echo 'home-mobile-header'; } ?>">
	<div class="container">
		<div class="row">
			<!--
			<div class="hide-col col-xs-6">
				<header>
					<h2><?php  //Breadcumbs Title
						if ( is_front_page() || is_home() ) {
							bloginfo( 'name' );

						} elseif ( is_404() ) {
							_e( '404 page', 'nature' );

						} elseif ( is_archive() ) {
							_e( 'Archive page', 'nature' );

						} elseif ( is_search() ) {
							_e( 'Search page', 'nature' );

						} else {
							echo get_the_title();
						}
					?></h2>
				</header>
			</div>
			<div class="col-xs-6">
				<ul>
					<li><a href="<?php echo esc_url( home_url() ); ?>"><?php if (is_front_page() || is_home()) { } else { _e('Home', 'nature'); } ?></a></li>
					<li> <?php if ( !is_front_page() && !is_home() ) { echo '/';} ?></li>
					<li><?php echo get_the_title(); ?></li>
				</ul>
			
				<a href="#" class="trigger-small"><i class="fa fa-search fa-lg"></i></a>
				
				-->
			</div>
		</div>
	</div>
</div>
<!-- Featured header end -->
