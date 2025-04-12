<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hall-metal-art
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('product-card'); ?>>
	<?php if (has_post_thumbnail()) : ?>
		<div class="product-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('medium'); ?>
			</a>
		</div>
	<?php endif; ?>

	<div class="product-info">
		<h2 class="product-title">
			<a href="<?php the_permalink(); ?>">
				<?php echo esc_html(get_post_meta(get_the_ID(), '_product_name', true)); ?>
			</a>
		</h2>

	</div>
</article>


