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
						<p>
						<a href="<?php bloginfo('wpurl') ?>/?page_id=653">&larr; Back to Board Members</a>
						</p>

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

					<?php endwhile; else: ?>
					<div class="page-header">
						<h1>Oh no!</h1>
						<p>No content is appearing for this page!</p>
					</div>
					<?php endif; ?>
					<!-- Related posts beside single page-->
					
					<div class="clear bottom"></div>
					

			</div><!-- col-lg-8 -->
		</div><!-- row -->
		<div class="col-lg-4">
			<aside>
				<?php 
					$set_responsive = array(
						'src'   => $src,
						'class' => " img-responsive member-photo"
					);
					if ( has_post_thumbnail() ) { 
						the_post_thumbnail($set_responsive);
					} 
					?>
			</aside>
		</div>
		</div><!-- row -->
	</div><!-- container -->
</div><!-- container fluid -->
<?php get_footer(); ?>