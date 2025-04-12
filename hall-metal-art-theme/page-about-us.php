<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hall-metal-art
 */

get_header();
?>

<main id="primary" class="site-main">
	<section>

		<?php
		$aboutus_hero_query = new WP_Query(
			array(
				"post_type" => "image",
				"posts_per_page" => 1,
				"tag" => "whoweare_hero"
			)
		);
		if ($aboutus_hero_query->have_posts()):
			while ($aboutus_hero_query->have_posts()):
				$aboutus_hero_query->the_post();
				$aboutus_hero_url = get_field("image");
		?>
				<div class="hero" style="background-image: url('<?php echo $aboutus_hero_url ?>');">
			<?php
			endwhile;
			wp_reset_postdata();
		endif;
			?>
			<div class="hero-content">
				<h1>About Hall Metal Art</h1>
			</div>
				</div>
	</section>
	<section>
		<p>Hall Metal Art is owned and operated by Gary Hall, a local Edmonton artist who has a passion for metal art. A master in metal work, Gary has custom designed his own equipment and works with a variety of materials including stainless, aluminum, and cold rolled steel.</p>

		<p>Gary has been working closely with metal for almost 40 years and is still excited everyday to create custom designs. Not only does he follow his heart and his hands, but he is happy to work with you to design the custom pieces that will fit your needs. Whether its decor, art, or even a crest or logo, it can be done.</p>

		<p>Feel free to browse the gallery of our previous work or if you already have an idea, place a custom order.</p>
	</section>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
