<?php
/*
Template Name: Board
*/
?>
<?php get_header(); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row team">
		<?php
					$args = array(
					'post_type'	     => 'boardmember',
					'posts_per_page' => -1,
					);
					$the_query = new WP_Query ( $args );
				?>
				<?php if ( have_posts() ) : while ( $the_query->have_posts() ) :  $the_query->the_post(); ?>
			<div class="team-user col-md-6">
				<div class="col-sm-4">

				<figure>
				<?php
					$thumbnail_id = get_post_thumbnail_id();
					$thumbnail_url = wp_get_attachment_image_src($thumbnail_id, '', true);
				?>
					<img src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title(); ?>">
				</figure>
				<?php
					$custom_facebook = rwmb_meta( 'custom_facebook' );
					$custom_twitter = rwmb_meta( 'custom_twitter' );
					$custom_google = rwmb_meta( 'custom_google' );
					$custom_pinterest = rwmb_meta( 'custom_pinterest' );
					$custom_linkedin = rwmb_meta( 'custom_linkedin' );
				?>
				<ul class="social gray-dark">
					<?php if ( ! empty ( $custom_facebook ) ) { ?>
					<?php echo '<li><a href="' .$custom_facebook . '"><i class="fa fa-facebook fa-lg"></i></a></li>'; ?>
					<?php } ?>
					<?php if ( ! empty ( $custom_twitter ) ) { ?>
					<?php echo '<li><a href="' .$custom_twitter . '"><i class="fa fa-twitter fa-lg"></i></a></li>'; ?>
					<?php } ?>
					<?php if ( ! empty ( $custom_google ) ) { ?>
					<?php echo '<li><a href="' .$custom_google . '"><i class="fa fa-google-plus fa-lg"></i></a></li>'; ?>
					<?php } ?>
					<?php if ( ! empty ( $custom_pinterest ) ) { ?>
					<?php echo '<li><a href="' .$custom_pinterest . '"><i class="fa fa-pinterest fa-lg"></i></a></li>'; ?>
					<?php } ?>
					<?php if ( ! empty ( $custom_linkedin ) ) { ?>
					<?php echo '<li><a href="' .$custom_linkedin . '"><i class="fa fa-linkedin fa-lg"></i></a></li>'; ?>
					<?php } ?>
				</ul>
			</div><!-- col-sm-4 -->
			<?php
				$custom_full_name = rwmb_meta( 'custom_full_name' );
				$custom_job_title = rwmb_meta( 'custom_job_title' );
				$custom_website = rwmb_meta( 'custom_website' );
				$custom_full_link = rwmb_meta( 'custom_full_link' );
				$custom_text_description = rwmb_meta( 'custom_text_description' );
			?>
				<div class="col-sm-8">
					    <h2><?php echo $custom_full_name ; ?></h2>
						<h5><?php echo $custom_job_title; ?></h5>

						<?php if ( ! empty ( $custom_full_link ) ) { ?>
						<p><a href="<?php echo $custom_full_link; ?>"><?php echo $custom_website; ?> &nbsp;<i class="fa fa-external-link"></i></a></p>
						<?php } ?>
					    <p class="team-biography"><?php echo custom_string_limit_words($custom_text_description, 36) ?> 
							&hellip; <a href="<?php the_permalink(); ?>">Read More &rarr;</a>
					    </p><hr>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>

</div>
<?php get_footer(); ?>
