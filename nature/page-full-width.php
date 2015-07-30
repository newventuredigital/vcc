<?php
/*
	Template Name: Page Full Width
*/
?>
<?php get_header();?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row page-full-width">
			<div class="col-lg-12">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_title('<h2>', '</h2>' ); ?>
					<?php the_content(); ?>
				<?php endwhile; else : ?>
					<div class="page-header">
						<h1>Ooooh</h1>
						<?php echo _e( 'No content', 'nature' );?>
					</div>
					<?php endif;?>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>
