<?php

/**
 * The template for displaying the contact page

 *
 * @package hall-metal-art
 */

get_header();
?>

<main id="primary" class="site-main">
	<h1>Contact Us</h1>
	<section>
		<div>
			<h2>Gary Hall</h2>
			<p><a href="tel:780-913-4610" class="contact-link">Phone: (780) 913-4610</a></p>
			<p><a href="mailto:gary@hallmetalart.ca">Email: gary@hallmetalart.ca </a></p>
		</div>
	</section>
	<section>
		<h2>Get in Touch</h2>
		<?php echo do_shortcode('[forminator_form id="145"]'); ?>
	</section>
</main><!-- #main -->

<?php

get_footer();
