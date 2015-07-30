<?php
/*
Template Name: Events
*/
?>
<?php get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args = array(
					'post_type'	     => 'event',
					//'portfolio_type'  => 'web-design',
					'posts_per_page' => 10,
					'paged' => $paged
					);
					$the_query = new WP_Query ( $args );
				?>
				<?php if ( have_posts() ) : while ( $the_query->have_posts() ) :  $the_query->the_post(); ?>
					<div class="row project-container">
						<div class="col-sm-5 project">
							<div class="effect-zoom hover-effects">
								<div class="item img">
									<figure>
										<?php
											$thumbnail_id = get_post_thumbnail_id();
											$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, '', true);
										?>
											<a href="<?php the_permalink(); ?>"><img src="<?php
											if ( !empty( $thumbnail_id) ) {
												echo $thumbnail_url[0];
											} else {
												echo of_get_option('option_placeholder');
											} ?>" alt="<?php the_title(); ?>"></a>

											<div class="overlay-zoom">
											<a href="<?php the_permalink(); ?>" class="expand-small"><i class="fa fa-share-square fa-4x"></i></a>
											<div class="close-overlay hidden">x</div>
										</div><!-- overlay zoom -->
									</figure>
								</div><!-- item img -->
							</div><!-- effect-zoom -->
						</div><!-- col-sm-5 -->
						<div class="col-sm-7 project-description">
							<article>
								<header>
									<h2>
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h2>
								</header>
								<?php
									$custom_address = rwmb_meta( 'custom_address_event');
									$custom_calendar = rwmb_meta( 'custom_calendar_event');
									$custom_time = rwmb_meta( 'custom_time_event' );
								?>
								<ul class="blog-medium-below">
								<?php if  ( ! empty( $custom_address ) ) { ?>
								<?php echo '<li><i class="fa fa-map-marker"></i> ' . $custom_address . ' </li> - '; ?>
								<?php } ?>
								<?php if  ( ! empty( $custom_calendar ) ) { ?>
								<?php echo '<li><i class="fa fa-calendar-o"></i> ' . $custom_calendar . ' </li> - '; ?>
								<?php } ?>
								<?php if  ( ! empty( $custom_time ) ) { ?>
								<?php echo '<li><i class="fa fa-clock-o"></i> ' . $custom_time . ' </li>'; ?>
								<?php } ?>
								</ul>
								<p><?php the_excerpt();?></p>
							</article>
							<div class="left">
								<a class="ghost-dark" href="<?php the_permalink(); ?>"><?php echo _e( 'Read More', 'nature' );?></a>
							</div>
						</div><!-- col-sm-7 -->
					</div><!-- row project-container -->
					<?php endwhile; ?>
		      	<?php endif; ?>
		      	<div class="blog-pagination">
					<?php
						if ( function_exists('vb_pagination') ) {
							vb_pagination( $the_query );
							}
					?>
				</div>
			</div><!-- col-lg-8  -->
			<div class="col-lg-4">
				<aside>
					<?php if ( ! dynamic_sidebar( 'sidebar-event' ) ) : ?>
						<h2><?php echo _e( 'Empty Sidebar', 'nature' ) ?></h2>
						<p><?php echo _e( 'You have to add content on widget events sidebar!', 'nature' ); ?> </p>
					<?php endif; ?>
				</aside>
			</div><!-- col-lg-4 -->
		</div>
	</div>
</div>
<?php get_footer(); ?>