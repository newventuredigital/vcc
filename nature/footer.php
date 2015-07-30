<?php
/**
 * @package Nature WP
*/
?>
<div class="container-fluid full">
	<div class="container">
		<div class="row">
		<?php if ( ! dynamic_sidebar( 'footer-3-columns' ) ) : ?>
		<h2><?php echo _e( 'No content', 'nature' ); ?></h2>
		<p><?php echo _e( ' You have to add content in widget sidebar!', 'nature' ); ?> </p>
		<?php endif; ?>
		</div><!-- Row -->
	</div><!-- Container -->
</div><!-- Fluid Container -->
<!-- Footer begin -->
<div class="container-fluid footer-wide">
	<div class="container">
		<div class="row">
		<div class="hr-footer-wide"></div>
			<div class="row">
			<div class="col-xs-12 footer-element">
				
						<div class="col-md-2">
							<p>
							<img src="http://vcc.downstreamnetwork.org/wp-content/uploads/2015/06/VCC_logo_color_reverse2.png" class="img-responsive footer-logo">
							</p>
						</div>
						<div class="col-md-10 footer-tagline">
						<p>&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?>. VCC recognizes and deeply appreciates the extraordinary photographic contributions of Pat & Chuck Blackley.</p>
						</div>
					
			</div>
			</div>
			<div class="col-xs-3 gray footer-element">
				<div class="logo-nature-footer">
					<a href="<?php echo esc_url( home_url() ); ?>">
					<?php
					$logo_svg_footer = of_get_option( 'option_logo_svg_footer' );
					$logo_png_footer = of_get_option( 'option_logo_png_footer' );
					//If have both logo svg and png or jpg display ::
					if ( !empty( $logo_svg_footer ) &&  !empty( $logo_png_footer ) )
					{ ?>
					<object class="logo-nature-object" data="<?php echo $logo_svg_footer; ?>" type="image/svg+xml">
						<img src="<?php echo $logo_png_footer; ?>" alt="<?php bloginfo( 'description' ); ?>" />
					</object>
					<?php
					//if have just logo.png or jpg display here ::
					} elseif (!empty ( $logo_png_footer ) ) { ?>
					<img src="<?php echo $logo_png_footer; ?>" alt="<?php bloginfo( 'description' ); ?>" />
					<?php
					} else {
					// if no logo was uploaded display the blog name
					?>
					<!--<h2><?php bloginfo('name'); ?></h2> --><?php } ?>
					</a>
				</div><!-- logo-nature-footer -->
			</div>
		</div><!-- row -->
	</div><!-- Container -->
</div><!-- Container Full -->
<div class="scroll gray"><a href="#"><i class="fa fa-angle-up fa-2x"></i></a></div>
<div class="overlay overlay-search">
<button type="button" class="overlay-close"><?php echo _e( 'close ', 'nature' ); ?><i class="fa fa-minus-square-o fa-lg"></i></button>
	<nav>
		<div class="box-search">
			<form action="<?php echo home_url( '/' ); ?>" class="navbar-form navbar-left" method="post" role="search">
				<div class="form-group icon-right">
					<input type="text" name="s" class="form-control" placeholder="<?php echo _e( 'Search...', 'nature' ); ?>">
				<button type="submit" class="btn ghost-white-search"><span class="fa fa-search fa-2x"></span></button>
				</div>
			</form>
		</div><!-- Box search -->
	</nav>
</div><!-- overlay search -->
<?php //add custom JS via options theme and Google Analytics on bottom of page
$custom_js = of_get_option( 'option_custom_js' );
if ( !empty( $custom_js ) )
{
	echo '<script type="text/javascript">';
	echo $custom_js;
	echo '</script>';
}
$custom_google_analytics = of_get_option( 'option_google_analytics' );
if ( !empty( $custom_google_analytics ) )
{
	echo '<script type="text/javascript">';
	echo $custom_google_analytics;
	echo '</script>';
}
?>
<?php wp_footer(); ?>
<script>
jQuery(document).ready(function() {
	jQuery('.gray:first-child').append('<a href="https://www.facebook.com/ValleyConservation" target="_blank"><i class="fa fa-facebook-square fa-3x"></i></a>');
});
</script>
</body>
</html>