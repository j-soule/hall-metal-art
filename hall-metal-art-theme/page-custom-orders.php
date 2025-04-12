<?php

/**
 * The template for displaying the custom orders page
 *
 * @package hall-metal-art
 */

get_header();
?>

<main id="primary" class="site-main">
	<section>
		<h2>Custom Orders</h2>
		<p>
			We love to help our customers create custom pieces that fit their needs. If you have an idea for a custom piece, please reach out to us and we will work with you to make it a reality.
		</p>
	</section>
	<section>
		<?php echo do_shortcode('[forminator_form id="94"]'); ?>
	</section>



</main><!-- #main -->

<?php

get_footer();
