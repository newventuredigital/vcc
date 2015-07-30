<?php
/**
 * @package Nature WP
*/
get_header();?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid '); ?>>
	<div class="container">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="row project-single">
				<div class="col-md-8 project-description inside">
					<article>
						<header>
							<h1><?php the_title(); ?></h1>
						</header>
						<p><?php the_content(); ?></p>
					</article>
					<?php $custom_link = rwmb_meta( 'custom_link_event'); ?>
					<?php $custom_button = rwmb_meta( 'custom_button_text_event');?>
					<?php if ( ! empty( $custom_link ) && ! empty( $custom_button ) )  { ?>
						<a class="btn ghost-color" href="<?php echo $custom_link; ?>">
							<i class="fa fa-heart"></i>
							<?php echo $custom_button; ?>
						</a>
					<?php } ?>
					<hr>
				</div>
				<div class="col-md-4 project sidebar-detail">
					<div class="sidebar">
						<?php
							$custom_address = rwmb_meta( 'custom_address_event');
							$custom_calendar = rwmb_meta( 'custom_calendar_event');
							$custom_time = rwmb_meta( 'custom_time_event' );
						?>
						<aside>
							<?php
								if (!empty($custom_address) or !empty($custom_raised) or !empty($custom_goal) )  {
									echo '<h3>';
										_e ( 'Event Details' , 'nature' );
									echo '</h3>';

									echo '<ul class="events-detail">';

										if  ( ! empty( $custom_address ) ) {
											echo '<li><i class="fa fa-map-marker"></i> ' . $custom_address . '</li>&nbsp;';
										}

										if  ( ! empty( $custom_calendar ) ) {
											echo '<li><i class="fa fa-calendar-o"></i> ' . $custom_calendar . '</li>&nbsp;';
										}

										if  ( ! empty( $custom_time ) ) {
											echo '<li><i class="fa fa-clock-o"></i> ' . $custom_time . '</li>&nbsp;';
										}

									echo '</ul>';
								} ?>

						<?php $custom_map = rwmb_meta( 'custom_map_event' ); ?>
						<?php if (!empty($custom_map)) { ?>
						<div id="map">
							<?php $args = array(
							    'type'         => 'map',
							    'width'        => '100%', // Map width, default is 640px. You can use '%' or 'px'
							    'height'       => '200px', // Map height, default is 480px. You can use '%' or 'px'
							    'zoom'         => 10,  // Map zoom, default is the value set in admin, and if it's omitted - 14
							    'marker'       => true, // Display marker? Default is 'true',
							    'marker_title' => '', // Marker title when hover
							);
							echo rwmb_meta( 'custom_map_event', $args );?>
						</div>
					<?php } ?>

					</aside>
				</div>

				<div class="sidebar">
					<aside>

				<?php
				$images = rwmb_meta( 'custom_images_event', 'type=image' );
				$thumbnail_id = get_post_thumbnail_id();
				$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, '', true);

				if (!empty ( $images )) { ?>
						<h3><?php _e( 'Gallery', 'nature' ); ?></h3>
						<div class="fotorama" data-nav="thumbs" data-thumbwidth="140" data-thumbheight="80">

						<?php
							foreach ( $images as $image ) {
								echo '<a href="' . $image['full_url'] . '">' ;?>
								<figure><?php echo "<img src='{$image['url']}' alt='{$image['alt']}' />";?></figure></a>
							<?php } ?>

						<?php

						} elseif (!empty ( $thumbnail_id ) ) { //if there isn't gallery show the featured image ?>

						<div class="single-picture">
							<figure>
								<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">
							</figure>
						<?php
						} else { /*display nothing*/
						}?>
					</aside>
				</div>
				<div class="sidebar-categories">
					<aside>
						<h3><?php echo _e ( 'Categories', 'nature' );?></h3>
						<ul class="links-arrow">
						<?php
							$walker = new nature_nav_walker();
							$customCategorie = get_object_taxonomies('event');
								if ( count ( $customCategorie ) > 0 ) {
									foreach ( $customCategorie as $taxonomie ) {
										$args = array(
											'orderby' => 'name',
											'style'   => 'list',
											'taxonomy'=> $taxonomie,
											'number'  => 5,
											'depth'   =>1,
											'title_li'=> '',
											'walker'  => $walker
										);
										wp_list_categories ( $args );
									}
								}
						?>
						</ul>
					</aside>
				</div>
			</div><!-- col-lg-4 -->
			<div class="col-lg-8">
				<?php comments_template(); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
