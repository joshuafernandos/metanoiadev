<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;


/**
 * GET LOGO
 */
$logo = get_field('logo', 'options');
$logo_footer = $logo['footer_logo'];

/**
 * GET CONTACT
 */
$contact = get_field('contact', 'options');
$contact_phone = $contact['phone'];
$contact_email = $contact['email'];
$contact_instagram = $contact['instagram'];
?>


<footer class="main__footer">
	<div class="container py-5">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-4 mb-5  d-flex justify-content-center justify-content-lg-start">
				<div class="footer-wrapper">
					<?php if ($logo_footer) : ?>
						<div class="footer-logo mb-4">
							<a href="<?php echo home_url() ?>">
								<img src="<?php echo $logo_footer['url'] ?>" alt="Metanoiawear Secondary Logo">
							</a>
						</div>
						<ul class="footer-social-list">
							<?php if ($contact_phone) : ?>
								<li class="social-item">
									<a href="tel:<?php echo $contact_phone['link'] ?>">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif ?>
							<?php if ($contact_email) : ?>
								<li class="social-item">
									<a href="mailto:<?php echo $contact_email['link'] ?>">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif ?>
							<li class="social-item">
								<a href="<?php echo $contact_instagram ?>">
									<i class="fa fa-instagram" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					<?php endif ?>
				</div>
			</div>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="footer-menu">
					<div class="footer-heading">
						<h5>
							Our Company
						</h5>
					</div>
					<?php wp_nav_menu(array(
						'theme_location' => 'footer_menu_1',
						'menu_class' => 'main-menu',
						'container' => 'false'
					)); ?>
				</div>
				<div class="footer-contact">

				</div>
			</div>
			<div class="col-md-6 col-lg-4">
				<div class="footer-menu">
					<div class="footer-heading">
						<h5>
							Terms and Policies
						</h5>
					</div>
					<?php wp_nav_menu(array(
						'theme_location' => 'footer_menu_2',
						'menu_class' => 'main-menu',
						'container' => 'false'
					)); ?>
				</div>
			</div>
		</div>
	</div>
</footer>


<div class="footer-bottom py-2">
	<div class="text-center">
		All rights reserved <?php echo date('Y') ?> Metanoiawear New Zealand
	</div>
</div>


</div><!-- #wrapper-footer -->

<?php // Closing div#page from header.php. 
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>