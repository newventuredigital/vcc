<?php
/**
 * @package Nature WP
*/
get_header();?>

<?php $columns = rwmb_meta('custom_columns_gallery'); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid '); ?>>

	<?php if ( '3col_man' == $columns ) { ?>
		<div class="container gallery-container">

	<?php } else { ?>
		<div class="container">

	<?php } ?>

		<div class="row main-container">
		<?php if ( '3col_man' == $columns ) { ?>
			<div class="col-md-2 gallery-desc-sidebar">

		<?php } else { ?>
			<div class="col-lg-12 gallery-container">

		<?php } ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article>
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
						<?php the_content(); ?>
			</article>

			<?php if ( '3col_man' == $columns ) { ?><hr>
		</div>
			<div class="col-md-10 sidebar-masonry">
			<?php } ?>

			<div class="effect-zoom hover-effects">
				<?php if ( '2col' == $columns or '3col' == $columns or '6col' == $columns ){ ?>

					 <div class="gallery-item gallery-columns">

				<?php } else { echo '<div id="content" class="masonry"><div class="gallery-item">'; } ?>

				<?php $gallery = rwmb_meta( 'custom_gallery_style', 'type=image' );?>
					<?php foreach ( $gallery as $image ) {

						switch($columns)
							{
								case '2col':
									echo '<div class="col-sm-6">';
									break;
								case '3col':
									echo '<div class="col-md-4 col-sm-6">';
									break;
								case '6col':
									echo '<div class="col-md-2 col-sm-3">';
									break;
								case '3col_man':
								case '4col_man':
									echo '';
									break;
								default:
									echo _e( 'You have to select a column option', 'nature' );
							}
					?>
					<div class="item img">
						<figure>

							<?php echo "<img src='{$image['full_url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />"; ?>
								<div class="overlay-zoom">

								<?php
									if ( '6col' == $columns ) {
										$class = 'expand-small';
									} else {
										$class = 'expand';
									}
								?>

								<?php echo "<a href='{$image['full_url']}' alt='{$image['alt']}' class='{$class}' title='{$image['title']}'  rel='image_advanced'>";?>

								<?php if ( '6col' == $columns ) { echo '<i class="fa fa-search-plus fa-lg"></i>'; }
											else { echo '<i class="fa fa-search-plus fa-2x"></i>'; } ?>
										</a>
										<div class="close-overlay hidden">x</div>
								</div>
						</figure>

						<?php if ( '2col' == $columns or '3col' == $columns or '6col' == $columns ){ ?>
						</div>
						<?php } ?>
					</div>

					<?php } ?>

					<?php if ( '3col_man' == $columns or '4col_man' == $columns ){ ?>
						</div><!-- masonry -->
					<?php } ?>

					<?php endwhile; endif; ?>

					</div><!-- gallery-item gallery-columns -->
				</div><!-- Effect Zoom -->
			</div>
		</div><!-- Row -->
	</div><!-- container -->
</div><!-- fluid container -->

<?php
	$title_banner = rwmb_meta( 'custom_title_banner' );
	$icon_title = rwmb_meta( 'custom_icon_fontawesome' );
	$button_title = rwmb_meta( 'custom_button_banner' );
	$icon_button = rwmb_meta( 'custom_icon_button_fontawesome' );
	$link_banner = rwmb_meta( 'custom_link_banner' );
	$banner_donate = rwmb_meta( 'custom_banner_donate' );
?>
<?php if ($banner_donate == 'value1') { ?>

<div class="container-fluid banner-full"> <!-- Help us -->
	<div class="container">
 		<div class="row">
 			<div class="col-md-9">
 				<h3><?php echo $title_banner; ?><span><i class="<?php echo $icon_title; ?>"></i></span></h3>
 			</div>
 			<div class="col-md-3">
 			<?php if (!empty ($link_banner) or ($icon_button) or ($button_title)) { ?>
	 			<h3><a class="ghost-color" href="<?php echo $link_banner; ?>"><i class="<?php echo $icon_button; ?>"></i> <?php echo $button_title; ?></a></h3>
	 		<?php } ?>
 			</div>
 		</div> <!-- Row -->
 	</div><!-- Container -->
</div><!-- Container fluid -->
<?php } ?>

<?php
	$custom_title = rwmb_meta( 'custom_title_displayed' );
	$another_galleries = rwmb_meta( 'custom_another_galleries' );
		if ($another_galleries == 'value1') { ?>

	<div class="container-fluid">
		<div class="container">
			<div class="row gallery-random">
				<div class="col-lg-12">
					<h4><?php echo rwmb_meta( 'custom_title_gallery' ); ?></h4>
					<?php
						$args = array(
						 'post_type' => 'gallery',
						 'posts_per_page' => 4,
					);
					$gallery = new WP_Query ( $args );

					?>
					<?php if ( $gallery->have_posts() ) : while ( $gallery->have_posts() ) :  $gallery->the_post(); ?>

					<div class="effect-zoom hover-effects">
						<div class="col-md-3 col-sm-6">
							<div class="item img">
								<figure>
								<?php the_post_thumbnail('medium-blog'); ?>
								<div class="overlay-zoom"><a href="<?php the_permalink(); ?>" class="expand-small"><i class="fa fa-share-square fa-3x"></i></a>
									<div class="close-overlay hidden">x</div>
								</div>
								</figure>
							</div>
							<?php
							 	if ( $custom_title == 'value1' ) { ?>
								<div class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
							<?php  } ?>
						</div>
					</div>
				<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>

	<?php wp_reset_query(); } ?>

<?php get_footer();?>