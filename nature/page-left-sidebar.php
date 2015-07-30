<?php
/*
	Template Name: Page Left Sidebar
*/
?>
<?php get_header();?>
<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 page-left-sidebar right-nature">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					<?php endwhile; else : ?>
					<div class="page-header">
						<h1>Ooooh</h1>
						<?php echo _e( 'No content', 'nature' );?>
					</div>
					<?php endif;?>
			</div>
			<div class="col-lg-4">
				<aside>
					<?php if ( ! dynamic_sidebar( 'sidebar-left' ) ) : ?>
						<h2><?php echo _e( 'Empty Sidebar', 'nature' ) ?></h2>
						<p><?php echo _e( 'You have to add content on left sidebar!', 'nature' ); ?> </p>
					<?php endif; ?>
				</aside>
			</div><!-- col-lg-4 -->

		</div>
	</div>
</div>
<?php get_footer();?>
