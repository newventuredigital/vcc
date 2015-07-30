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
								<?php the_content(); ?>
					</article>

					<?php $custom_link = rwmb_meta( 'custom_link_project'); ?>
					<?php $custom_button = rwmb_meta( 'custom_button_text_project');?>
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
							$custom_date = rwmb_meta( 'custom_date');
							$custom_raised = rwmb_meta( 'custom_raised');
							$custom_goal = rwmb_meta( 'custom_goal' );
						?>

						<aside>
							<h3>
						<?php if (!empty($custom_date) or !empty($custom_raised) or !empty($custom_goal) )  {
									_e ( 'Project Details' , 'nature' );
								} ?>
							</h3>
								<?php if  ( ! empty( $custom_date ) ) { ?>
									<div class="clock-container"><!-- Project countdown -->
										<div class="time-big">
											<div class="time-left">time left</div>
											<div class="time-left-clock"><i class="fa fa-clock-o fa-3x"></i></div>
											<?php echo '<time>' . $custom_date . '</time>'; ?>
										</div>
								<?php
								} ?>

							<?php
								if  ( ! empty( $custom_raised ) ) { ?>
									<h4 class="raised-inside">
										<i class="fa fa-heart-o"></i>

									<?php echo _e('Raised: ' , 'nature') . '<span>' . $custom_raised . '</span><br>';
								}
								if  ( ! empty( $custom_goal ) ) { ?>
										<i class="fa fa-bullseye"></i>

									<?php echo _e('Our Goal: ' , 'nature') . '<span>' . $custom_goal . '</span>';

								if ( ! empty ( $custom_raised) & ( ! empty( $custom_goal )) ) {
										$progressbar = ( preg_replace("([^0-9])","",$custom_raised) * 100) /  preg_replace("([^0-9])","",$custom_goal);
									}
								?>
								<br>
								<i class="fa fa-bar-chart-o"></i>

								<?php echo _e('Completed: ' , 'nature') . '<span>' . round ($progressbar).'%</span> '; ?>

									</h4>
								</div>
						<?php } ?>
						</aside>
					</div>


					<div class="sidebar">
						<aside>
						<?php
					$images = rwmb_meta( 'custom_images_project', 'type=image' );
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
						}

						elseif (!empty ( $thumbnail_id ) ) { //if there isn't gallery show the featured image ?>

							<div class="single-picture"><figure>
								<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">
							</figure>
								<?php
					} else {
						/*display nothing*/
					}?>
					</aside>
				</div>

					<div class="sidebar-categories">
						<aside>
							<h3><?php echo _e ( 'Categories', 'nature' );?></h3>
							<ul class="links-arrow">
							<?php
								$walker = new nature_nav_walker();
								$customCategorie = get_object_taxonomies('project');
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

					<?php comments_template() ?>


					<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</div>
	</div>
</div>
<?php get_footer(); ?>
