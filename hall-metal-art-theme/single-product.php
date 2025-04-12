<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hall-metal-art
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php
	while (have_posts()) :
		the_post();

		$product_name        = get_post_meta(get_the_ID(), '_product_name', true);
		$product_price       = get_post_meta(get_the_ID(), '_product_price', true);
		$description = get_post_meta(get_the_ID(), '_description', true);
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class('single-product'); ?>>

			<h1 class="product-title">
				<?php echo esc_html($product_name ? $product_name : get_the_title()); ?>
			</h1>

			<?php if (has_post_thumbnail()) : ?>
				<div class="product-image">
					<?php the_post_thumbnail('large'); ?>
				</div>
			<?php endif; ?>

			<p class="product-price">
				<strong>Price:</strong> <?php echo esc_html($product_price); ?>
			</p>

			<div class="product-description">
				<strong>Description:</strong>
				<p><?php echo esc_html($description); ?></p>
			</div>

		</article>
    <a href="<?php echo esc_url(get_post_type_archive_link('product')); ?>" class="back-to-catalog">
	← Back to Catalogue
</a>

	<?php endwhile; ?>
</main>
<!-- #main -->

<?php
get_sidebar();
get_footer();
