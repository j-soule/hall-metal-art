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
		<div class="product-thumb">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('medium'); ?>
			</a>
		</div>
	<?php endif; ?>

	<h2 class="product-title">
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h2>

	<div class="product-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>

