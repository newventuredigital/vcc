<?php
/**
 * @package Nature WP
*/
get_header();?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
<div class="container">
	<div class="row">
		<div class="col-lg-8">
			<div class="blog-single">

			<?php $featured_image = rwmb_meta( 'custom_featured_image' );?>
				<?php if ( $featured_image == 'value1' ) { // verify if want display the featured image ?>

				<div class="featured-post wow fadeIn" data-wow-duration="1.5s">
					<figure>

						<?php
							$thumbnail_id = get_post_thumbnail_id();
							$thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
							$thumbnail_meta = get_post_meta( $thumbnail_id, '_wp_attachment_image_alt', true);
						?>

						<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php echo $thumbnail_meta; ?>">
					</figure>
				</div><!-- featured post -->

				<?php } else { echo '<div class="margin-top-no-image"></div>'; } ?>

				<article>
					<?php if ( have_posts() ) : while ( have_posts () ) : the_post(); ?>

					<h1><?php echo get_the_title(); ?></h1>
					<ul class="blog-medium-below">
						<li><i class="fa fa-calendar-o"></i><?php _e( ' Posted', 'nature' ); ?> <?php echo the_time ( 'l, jS, Y' ) ;?> &nbsp;
						<i class="fa fa-user"></i> <?php _e( 'By: ', 'nature' ); ?> <?php the_author_posts_link ();?> &nbsp;
						<i class="fa fa-folder-open-o"></i> <?php _e( 'Category: ', 'nature' ); ?><a href="#"><?php the_category( ', ' ); ?></a>
						<?php if ( has_tag() ) { ?>
						&nbsp;<i class="fa fa-tag"></i><?php the_tags( ' The tags: ',', ')?>
						<?php } ?>
						</li>
					</ul><!-- blog-medium-below -->

					<div class="description wow fadeIn" data-wow-duration="1.5s">
						<?php
						the_content();

						wp_link_pages( $defaults = array(
							'before'           => '<p>' . __( 'Pages:', 'nature' ),
							'after'            => '</p>',
							'next_or_number'   => 'number',
							'separator'        => ' | ',
							'nextpagelink'     => __( 'Next page', 'nature' ),
							'previouspagelink' => __( 'Previous page', 'nature' ),
							'pagelink'         => '%',
							'echo'             => 1
							)
						);
						?>
					</div>

				</article>
				<hr>

				<?php
				$images = rwmb_meta( 'custom_post_images', 'type=image' );
				$images = array_values($images);
				$count = count($images);
				$array_k = array_keys($images);


				if ( !empty ( $images ) ) { ?>

				<h3><?php _e( 'Gallery', 'nature' ); ?></h3>
				<div class="fotorama" data-nav="thumbs" data-thumbwidth="140" data-thumbheight="80">
				<?php

					foreach ( $images as $image ) {

					echo '<a href="'. $image['full_url'] . '">'; ?>

					<figure><?php echo "<img src='{$image['url']}' alt='{$image['alt']}' rel='image_advanced' />";?></figure></a>

					<?php } // end foreach ?>
					</div><!-- fotorama -->

				<?php } ?>

					<div class="row comments-author">
						<?php echo get_avatar ( get_the_author_meta ( 'email' ), '90', '',  get_the_author_meta ( 'display_name' ) ) ; ?>
						<h3><?php the_author_meta ( 'nickname' ); ?></h3>
						<p><i class="fa fa-quote-left"></i> <?php the_author_meta ( 'description' ); ?> <i class="fa fa-quote-right"></i></p>
						<?php nature_social_icon_author();?>
					</div><!-- comments author -->

					<?php endwhile; else: ?>
					<div class="page-header">
						<h1>Oh no!</h1>
						<p>No content is appearing for this page!</p>
					</div>
					<?php endif; ?>
					<!-- Related posts beside single page-->
					<hr>
					<div class="row related-posts wow fadeIn" data-wow-duration="1.5s">
							<h4><?php echo __('You might like:' , 'nature');?></h4>
							<?php
							global $post;

							$args = array (
								'orderby'  	     => 'rand',
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
									if (!empty($thumbnail_id)) { ?>
										<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">

									<?php
									} else {
											echo '<img src="'. of_get_option('option_placeholder') .'" alt="no image"/>';
									} ?>
										<figcaption>
											<h4><?php the_title(); ?></h4>
											<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'nature' ); ?></a>
										</figcaption>
									</figure>
									<?php $posts_count = $the_query -> current_post + 1;
										if ( $posts_count % 1 == 0 ) :
											echo '</div>';
										?>
									<?php endif;?>
								<?php endwhile; endif; ?>
								<?php wp_reset_query(); ?>
								</div><!-- col-sm-4 newsimg -->
							</div><!--Grid Cs Style -->
						</div><!--Related Posts -->
						</div>
					<div class="clear bottom"></div>
					<?php //comments

					if ( have_posts() ) : while ( have_posts () ) : the_post();

					comments_template();

					endwhile; endif; ?>

			</div><!-- col-lg-8 -->
		</div><!-- row -->
		<?php get_sidebar('sidebar-blog');?>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- container fluid -->
<?php get_footer(); ?>