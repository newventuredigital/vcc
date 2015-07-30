<?php
/*
	Template Name: Projects
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
					'post_type'	     => 'project',
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
								<h4 class="raised"><i class="fa fa-heart-o"></i>
									<?php $custom_raised = rwmb_meta(  'custom_raised' );
										// check if the custom field has a value
										if  ( ! empty( $custom_raised ) ) {
											echo _e( 'Raised until now:', 'nature') . '<span>' . $custom_raised . '</span>';
										} ?>
										<?php $custom_goal = rwmb_meta(  'custom_goal' );
										// check if the custom field has a value
										if  ( ! empty( $custom_goal ) ) {
											echo _e( '&nbsp;Our goal:', 'nature') . '<span>' . $custom_goal . '</span>';
										} ?>
								</h4>
								<?php
									if ( ! empty ( $custom_raised) & ( ! empty( $custom_goal )) ) {
										$progressbar = ( preg_replace("([^0-9])","",$custom_raised) * 100) /  preg_replace("([^0-9])","",$custom_goal);
									}
								?><br>
								<h4 class="raised"><i class="fa fa-bar-chart-o"></i>
									<?php echo _e( 'Completed: ', 'nature' ) . '<span>' . round ($progressbar).'%</span>'; ?></h4>
								<div class="progress">
									<div class="progress-bar progress-bar-nature" role="progressbar" aria-valuenow="<?php echo $progressbar; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $progressbar; ?>%">
										<span class="sr-only"><?php echo $progressbar; ?> Complete (success)</span>
									</div>
								</div><!-- progress -->
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
					<?php if ( ! dynamic_sidebar( 'sidebar-project' ) ) : ?>
						<h2><?php echo _e( 'Empty Sidebar', 'nature' ) ?></h2>
						<p><?php echo _e( 'You have to add content on widget projects sidebar!', 'nature' ); ?> </p>
					<?php endif; ?>
				</aside>
			</div><!-- col-lg-4 -->
		</div>
	</div>
</div>
<?php get_footer(); ?>