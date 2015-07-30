<?php
/**
 * @package Nature WP
*/
?>
<div class="form-group">
	<form action="<?php echo home_url( '/' ); ?>" id="searchform" method="get" class="search-sidebar" class="search-sidebar" role="search">
		<fieldset>
			<input type="text" class="form-control" id="s" name="s" placeholder= "<?php _e( 'Search:', 'nature' ); ?>" >
			<button type="submit" class="zoom-form"><i class="fa fa-search fa-lg"></i></button>
		</fieldset>
	</form>
</div>

