<?php
/*
Template Name: Contact
*/
?>
<?php /*

$nameError = '';
$emailError = '';
$commentError = '';
$sumError = '';

	if ( isset( $_POST['submit'] ) ) {
		if ( trim( $_POST['username'] ) === '') {
			$nameError = __( 'Please enter your name.', 'nature' );
			$hasError = true;
		} else {
			$name = trim( $_POST['username'] );
		}

		if ( trim( $_POST['email'] ) === '')  {
			$emailError = __( 'Please enter your email address.', 'nature' );
			$hasError = true;
		} else if ( !eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email'] ) ) ) {
			$emailError = __( 'You entered an invalid email address.', 'nature' );
			$hasError = true;
		} else {
			$email = trim( $_POST['email']);
		}

		if ( trim( $_POST['message'] ) === '') {
			$commentError = __( 'Please enter a message.', 'nature' );
			$hasError = true;
		} else {
			if( function_exists('stripslashes') ) {
				$comments = stripslashes( trim($_POST['message'] ) );
			} else {
				$comments = trim( $_POST['message'] );
			}
		}

		if(trim($_POST['sum']) === '' || trim($_POST['sum']) != '11' ){
			$sumError = __( 'Please enter what\'s 7 + 4', 'nature' );
			$hasError = true;
		}

		if(!isset($hasError)) {
			$emailTo = of_get_option( 'option_contact_email' );
			if (!isset($emailTo) || ($emailTo == '') ){
				$emailTo = get_option('admin_email');
			}
			$subject = '[Contact Form] From '.$name;
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $emailTo;

			mail($emailTo, $subject, $body, $headers);
			$emailSent = true;
		}

} */ ?>

<?php get_header(); ?>


<div id="post-<?php the_ID(); ?>" <?php post_class( 'container-fluid'); ?>>
	<div class="container">
		<div class="row contact">
		<?php $custom_map = rwmb_meta( 'custom_map_contact' ); ?>
		<?php $show_map = rwmb_meta( 'custom_map_contact_show' );?>
			<?php if ( !empty( $custom_map ) && ( $show_map == 'yes' ) ) { ?>
				<div id="mapContact">
						<?php $args = array(
						    'type'         => 'map',
						    'width'        => '100%', // Map width, default is 640px. You can use '%' or 'px'
						    'height'       => '300px', // Map height, default is 480px. You can use '%' or 'px'
						    'zoom'         => 16,  // Map zoom, default is the value set in admin, and if it's omitted - 14
						    'marker'       => true, // Display marker? Default is 'true',
						    'marker_title' => '', // Marker title when hover
						);
						echo rwmb_meta( 'custom_map_contact', $args );?>
					</div>
				<?php } ?>
			<div class="col-lg-6 contact-color">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>
			<?php
				$below_map_left = rwmb_meta( 'custom_below_map_left' );
				$below_map_right = rwmb_meta( 'custom_below_map_right' );
				$below_map_bold = rwmb_meta( 'custom_below_map_bold' );
				$text_contact = rwmb_meta( 'custom_text_area_map' );
			?>
			<?php
					if ( !empty ( $below_map_left ) ) {
						
					}
						else { 

					}
			?>

			<!--
			<?php if(isset($emailSent) && $emailSent == true) { ?>

                <div class="thanks">
                   <h3 class="success"><?php _e('Thanks, your email was sent successfully.', 'nature') ?></h3>
                </div>

            <?php } else { ?>

			<?php if(isset($hasError) || isset($captchaError)) { ?>
			 <div class="form-group icon-left">
                 <span class="error"><?php _e( 'Sorry, an error occured.', 'nature') ?></span>
			 </div>
             <?php } ?>

			 <form name="contactForm1" id="contactForm1" action="#" method="post" role="form">

				 <div class="form-group icon-left">
					 <span class="glyphicon glyphicon-user"></span>
					 <input type="text" class="form-control" name="username" id="username" placeholder= "Name" value="<?php if(isset($_POST['username'])) echo $_POST['username'];?>" class="required requiredField" />
					 <?php if($nameError != '') { ?>
					 <span class="error"><?php echo $nameError; ?></span>
					 <?php } ?>
				</div>

				<div class="form-group icon-left">
					<span class="glyphicon glyphicon-envelope"></span>
					<input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
					<?php if($emailError != '') { ?>
					<span class="error"><?php echo $emailError; ?></span>
					<?php } ?>
				</div>

				<div class="form-group icon-left">
					<span class="glyphicon glyphicon-comment"></span>
					<textarea class="form-control" name="message" id="message" placeholder="Your message" rows="5" class="required requiredField"><?php if(isset($_POST['message'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['message']); } else { echo $_POST['message']; } } ?></textarea>
					<?php if($commentError != '') { ?>
					<span class="error"><?php echo $commentError; ?></span>
					<?php } ?>
					</textarea>
				</div>

				<div class="form-group icon-left">
					<span class="fa fa-question-circle"></span>
                    <input type="text" class="form-control" placeholder="<?php _e('How much is = 7 + 4:', 'nature'); ?>" name="sum" id="sum" value="<?php if(isset($_POST['sum'])) echo $_POST['sum'];?>" class="required requiredField" />
                    <?php if($sumError != '') { ?>
                    <span class="error"><?php echo $sumError; ?></span>
                    <?php } ?>
				</div>


				<input type="hidden" name="submit" id="submit" value="true" />
				<button type="submit" class="btn btn-default ghost-color"><?php _e( 'Submit', 'nature' ); ?></button>

			</form>

			<?php } ?>
			-->
		</div>

<div class="col-lg-6">
	<h2><?php
		if ( !empty ( $below_map_right ) ) {
			echo $below_map_right;
			} ?></h2>
			<h4><?php
		if (!empty( $below_map_bold ) ) {
			foreach ($below_map_bold as $map_bold) {
				echo $map_bold . '<br>';
			}

		}
	?>
	</h4>
	<p><?php
			if ( !empty ( $text_contact ) ) {
 			
			}
		?></p>
</div>
<div class="clear"></div>
<div class="row">
	<div class="col-lg-12">
	<h2>Contact Us</h2>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; ?>
<?php endif; ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>