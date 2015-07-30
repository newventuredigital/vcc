<?php
/*
	Template Name: Home Template
*/
?>
<?php get_header();?>
<?php //Welcome

	$display_welcome = rwmb_meta( 'custom_display_welcome' );
	$title_welcome = rwmb_meta( 'custom_title_welcome' );
	$text_welcome = rwmb_meta( 'custom_text_welcome' );
	$img_welcome = rwmb_meta( 'custom_img_welcome', 'type=image');
	$button_welcome = rwmb_meta( 'custom_button_welcome' );
	$link_welcome = rwmb_meta( 'custom_link_welcome' );
	$button_type = rwmb_meta( 'custom_button_type' );

	if ( $display_welcome == 'value1' ) {
?>
<div <?php post_class( 'container-fluid welcome' ) ?> id="post-<?php the_ID(); ?>">
	<div class="container">
		<div class="row main-container-home">
			<div class="col-md-8 wow fadeInLeft">
				<?php echo '<h2>' . $title_welcome . '</h2><div class="home-hr"></div><p>' . $text_welcome . '</p>';

					if ( !empty( $button_welcome ) ) {
						echo '<h3><a class="' . $button_type . '" href="' . $link_welcome . '">' . $button_welcome . '</a></h3>';
					}
				?>
			</div><!-- col-md-8 -->
			<div class="col-md-4 wow fadeInRight">
			<?php foreach ( $img_welcome as $image ) { ?>
				<img src="<?php echo $image['full_url']; ?>" alt="<?php echo $image['alt']; ?>">
			<?php } ?>
			</div><!-- col-sm-6 -->
		</div><!-- row -->
	</div>
</div><!-- Welcome ends -->
<?php } ?>


<?php // Parallax 01

	$title_parallax_01 = rwmb_meta( 'custom_parallax_01_title' );
	$button_parallax_01 = rwmb_meta( 'custom_parallax_01_button' );
	$link_parallax_01 = rwmb_meta( 'custom_parallax_01_link' );

	// Display Parallax 1

	$display_parallax_01 = rwmb_meta( 'custom_display_parallax_01' );
	if ( $display_parallax_01 == 'value1')	{
?>
<div class="container-fluid">
	<div class="home-banner-1">
		<div class="container">
			<div class="row">
				<?php echo '<h3>' .$title_parallax_01 . '</h3>'; ?>
				<div class="banner-hr"></div>
				<?php echo '<h2><a class="solid-color" href="' . $link_parallax_01. '">' . $button_parallax_01 . '</h2>'; ?></a>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--home banner -->
</div><!-- container fluid -->

<?php } //Parallax ends  ?>

<?php
	// Services begin
	$display_services = rwmb_meta( 'custom_show_services' );
	$title_services = rwmb_meta( 'custom_title_services' );

	//service one
	$icon1 = rwmb_meta( 'custom_icon_1' );
	$service1 = rwmb_meta( 'custom_service_1');
	$desc1 = rwmb_meta( 'custom_desc_1' );

	//service two
	$icon2 = rwmb_meta( 'custom_icon_2' );
	$service2 = rwmb_meta( 'custom_service_2');
	$desc2 = rwmb_meta( 'custom_desc_2' );

	//service three
	$icon3 = rwmb_meta( 'custom_icon_3' );
	$service3 = rwmb_meta( 'custom_service_3');
	$desc3 = rwmb_meta( 'custom_desc_3' );

	//service four
	$icon4 = rwmb_meta( 'custom_icon_4' );
	$service4 = rwmb_meta( 'custom_service_4');
	$desc4 = rwmb_meta( 'custom_desc_4' );

	//service five
	$icon5 = rwmb_meta( 'custom_icon_5' );
	$service5 = rwmb_meta( 'custom_service_5');
	$desc5 = rwmb_meta( 'custom_desc_5' );

	//service six
	$icon6 = rwmb_meta( 'custom_icon_6' );
	$service6 = rwmb_meta( 'custom_service_6');
	$desc6 = rwmb_meta( 'custom_desc_6' );

?>
<?php // Check if display srvices is set to display
	if ($display_services == 'value1') {
?>
<div class="container-fluid">
	<div class="container home-what"><!-- What we do -->

	<?php if (!empty($title_services) ) { ?>
		<div class="row main-container-title">
			<div class="col-sm-12">
				<h2><?php echo $title_services; ?></h2>
				<div class="home-hr"></div>
			</div>
		</div>

	<?php } ?>

		<div class="row icon-home">
			<div class="col-md-4 wow fadeInLeft">
				<?php echo $icon1 . '<h3>' . $service1 . '</h3><p>' . $desc1 . '</p>'; ?>
			</div>
			<div class="col-md-4 wow fadeInDown">
				<?php echo $icon2 . '<h3>' . $service2 . '</h3><p>' . $desc2 . '</p>'; ?>
			</div>
			<div class="col-md-4 wow fadeInRight">
				<?php echo $icon3 . '<h3>' . $service3 . '</h3><p>' . $desc3 . '</p>'; ?>
			</div>
		</div>
		<div class="row icon-home">
			<div class="col-md-4 wow fadeInLeft">
				<?php echo $icon4 . '<h3>' . $service4 . '</h3><p>' . $desc4 . '</p>'; ?>
			</div>
			<div class="col-md-4 wow fadeInUp">
				<?php echo $icon5 . '<h3>' . $service5 . '</h3><p>' . $desc5 . '</p>'; ?>
			</div>
			<div class="col-md-4 wow fadeInRight">
				<?php echo $icon6 . '<h3>' . $service6 . '</h3><p>' . $desc6 . '</p>'; ?>
			</div>
		</div>
	</div>
</div>
	<?php } //Services ends ?>

<?php // Team
	$display_team = rwmb_meta( 'custom_display_team' );
	$link_team_page = rwmb_meta( 'custom_link_team_page' );
	if ( $display_team == 'value1')	{
?>
<div class="container-fluid our-team">
	<div class="container">
		<div class="row team-home main-container-home">
			<h2>Meet our team</h4>
			 <div class="home-hr"></div>
		<?php
			$args = array(
			 'post_type' => 'member',
			 'posts_per_page' => 4,
		);
		$team = new WP_Query ( $args );

		if ( $team->have_posts() ) : while ( $team->have_posts() ) :  $team->the_post();

			$custom_full_name = rwmb_meta( 'custom_full_name' );
			$custom_job_title = rwmb_meta( 'custom_job_title' );
			$custom_website = rwmb_meta( 'custom_website' );
			$custom_full_link = rwmb_meta( 'custom_full_link' );
			$custom_text_description = rwmb_meta( 'custom_text_description' );
		?>
			<div class="effect-zoom hover-effects">
		 		<div class="col-lg-3 col-sm-6 item img">
		 			<figure>

	 			<?php the_post_thumbnail('medium-blog'); ?>
	 				<div class="team-caption overlay-zoom"><h2 class="white-gray"><a href="<?php if ( !empty ( $link_team_page) ) { echo $link_team_page; } ?>"><?php echo $custom_full_name; ?></a></h2>
		 				<h5><?php echo $custom_job_title; ?></h5>

				 		<?php
							$custom_facebook = rwmb_meta( 'custom_facebook' );
							$custom_twitter = rwmb_meta( 'custom_twitter' );
							$custom_google = rwmb_meta( 'custom_google' );
							$custom_pinterest = rwmb_meta( 'custom_pinterest' );
							$custom_linkedin = rwmb_meta( 'custom_linkedin' );
						?>

						<ul class="social gray-dark">
							<?php

								if ( ! empty ( $custom_facebook ) ) {
									echo '<li><a href="' .$custom_facebook . '"><i class="fa fa-facebook fa-lg"></i></a></li>';
								}

								if ( ! empty ( $custom_twitter ) ) {
									echo '<li><a href="' .$custom_twitter . '"><i class="fa fa-twitter fa-lg"></i></a></li>';
								}

								if ( ! empty ( $custom_google ) ) {
									echo '<li><a href="' .$custom_google . '"><i class="fa fa-google-plus fa-lg"></i></a></li>';
								}

								if ( ! empty ( $custom_pinterest ) ) {
									echo '<li><a href="' .$custom_pinterest . '"><i class="fa fa-pinterest fa-lg"></i></a></li>';
								}

								if ( ! empty ( $custom_linkedin ) ) {
									echo '<li><a href="' .$custom_linkedin . '"><i class="fa fa-linkedin fa-lg"></i></a></li>';
								}
							?>
						</ul>
						<div class="close-overlay hidden">x</div>
	 				</div><!-- team caption -->
	 				</figure>
		 		</div><!-- col-lg-3 -->
			</div><!-- effect-zoom hover-effects -->
		 <?php endwhile; endif; ?>
	 	</div><!-- row team home -->
	</div><!-- container -->
</div><!-- fluid our team -->
	 <?php wp_reset_query(); ?>
<?php } ?>

<?php
	// Parallax 02
	$title_parallax_02 = rwmb_meta( 'custom_parallax_02_title' );
	$button_parallax_02 = rwmb_meta( 'custom_parallax_02_button' );
	$link_parallax_02 = rwmb_meta( 'custom_parallax_02_link' );

	// Display Parallax 2
	$display_parallax_02 = rwmb_meta( 'custom_display_parallax_02' );

	if ( $display_parallax_02 == 'value1')	{
?>
<div class="container-fluid">
	<div class="home-banner-2">
		<div class="container">
			<div class="row">
				<?php echo '<h3>' .$title_parallax_02 . '</h3>'; ?>
				<div class="banner-hr"></div>
				<?php echo '<h2><a class="solid-color" href="' . $link_parallax_02. '">' . $button_parallax_02 . '</h2>'; ?></a>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--home banner -->
</div><!-- container fluid -->
<?php } //Parallax ends  ?>

<?php
	$display_posts = rwmb_meta( 'custom_display_posts' );
	$orderby = rwmb_meta( 'custom_order_posts' );
	$title_posts = rwmb_meta( 'custom_title_posts' );

	if ( $display_posts == 'value1' ) {
?>
<div class="container">
	<div class="row main-container-home related-posts-home">
		<?php if ( !empty( $title_posts ) ) { echo '<h2>' . $title_posts . '</h2>'; } ?>
		<div class="home-hr"></div>

		<?php
			//global $post;
			$args = array (
				'orderby'  	     => $orderby,
				'posts_per_page' => 3,
				'post__not_in' => array($post->ID),
			);
			$the_query = new WP_Query( $args );

			if ( have_posts() ) : while ( $the_query->have_posts() ) :  $the_query->the_post();

			$thumbnail_id = get_post_thumbnail_id();
			$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'medium-blog', true);
		?>

		<div class="grid cs-style-3">
			<div class="col-sm-4 newsimg">
				<figure>
				<?php
					if ( !empty( $thumbnail_id ) ) {
						echo '<img src="'. $thumbnail_url[0]; ?>" alt="<?php the_title() ?>">
						<?php } else {
						echo '<img src="' . of_get_option('option_placeholder') . '" alt="no image"/>';
					} ?>
					<figcaption>
						<h4><?php the_title(); ?></h4>
							<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'nature' ); ?></a>
					</figcaption>
				</figure>
				<?php
					$posts_count = $the_query -> current_post + 1;

					if ( $posts_count % 1 == 0 ) :
						echo '</div>';

					endif;

					endwhile; endif;

					wp_reset_postdata(); ?>
				</div><!-- col-sm-4 newsimg -->
			</div><!-- grid cs-style-3 -->
		</div><!--Related Posts -->
	</div>
</div>

<?php } ?>

<div class="container-fluid container-stripes">
	<div class="container">
		<div class="row main-container-content">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>

				<?php endwhile; ?>
			<?php endif;?>
		</div>
	</div>
</div>


<?php get_footer();?>
