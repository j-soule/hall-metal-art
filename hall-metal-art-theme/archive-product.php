<?php
/**
 * The template for displaying product archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hall-metal-art
 */

get_header();
?>

<main id="primary" class="site-main">
	<h1>Product Catalog</h1>

	<!-- Category Filter -->
	<form method="get" class="product-category-filter">
		<?php
		$terms = get_terms([
			'taxonomy'   => 'product_category',
			'hide_empty' => true,
		]);

		if (!empty($terms)) :
		?>
			<select name="product_category" onchange="this.form.submit()">
				<option value=""><?php esc_html_e('All Categories', 'hall-metal-art'); ?></option>
				<?php foreach ($terms as $term) : ?>
					<option value="<?php echo esc_attr($term->slug); ?>" <?php selected($term->slug, get_query_var('product_category')); ?>>
						<?php echo esc_html($term->name); ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>
	</form>

	<!-- Product Loop -->
	<?php
	$tax_query = [];

	if (!empty($_GET['product_category'])) {
		$tax_query[] = [
			'taxonomy' => 'product_category',
			'field'    => 'slug',
			'terms'    => sanitize_text_field($_GET['product_category']),
		];
	}

	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

	$args = [
		'post_type'      => 'product',
		'posts_per_page' => 12,
		'paged'          => $paged,
		'tax_query'      => $tax_query,
	];

	$product_query = new WP_Query($args);

	if ($product_query->have_posts()) :
		echo '<div class="product-grid">';
		while ($product_query->have_posts()) : $product_query->the_post();
			get_template_part('template-parts/content', 'product');
		endwhile;
		echo '</div>';

		the_posts_pagination();
	else :
		echo '<p>No products found.</p>';
	endif;

	wp_reset_postdata();
	?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
