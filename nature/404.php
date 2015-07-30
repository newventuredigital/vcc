<?php
/**
 * @package Nature WP
*/
get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo _e( 'Sorry! The page that you are looking for is not available', 'nature' ) ?></h2>
				<h3><?php echo _e( 'Try to make a search' , 'nature'); ?></h3>
			</div>
			<div class="col-md-6">
				<?php get_search_form();?>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ; ?>
					<div class="page-header">
						<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</div>

			<div class="col-md-12">
			<div class="row related-posts">
			<h4><?php echo __('You might like:' , 'nature');?></h4>

				<?php

				$posts = get_posts('orderby=rand&numberposts=3');

				foreach($posts as $post)

				{

				$thumbnail_id = get_post_thumbnail_id();
				$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'medium-blog', true);

				?>
				<div class="grid cs-style-3">
					<div class="col-sm-4 newsimg">
						<figure>
							<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">

							<figcaption>
								<h4><?php the_title(); ?></h4>
								<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'nature' ); ?></a>
							</figcaption>

						</figure>
					</div><!-- col-sm-4 newsimg -->
				</div><!--Grid Cs Style -->
				<?php } ?>
				</div><!--Related Posts -->
			</div>
		</div>
	</div>
</div>
  <?php get_footer();?>
