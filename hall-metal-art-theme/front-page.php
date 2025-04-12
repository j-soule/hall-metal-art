<?php
//this is the front page template for the Hall Metal Art theme

//@package hall-metal-art-theme
get_header();

?>
<main id="primary" class="site-main">
    <!-- hero banner -->
    <section>
        <div class="hero-banner">
            <img src="<?php echo get_template_directory_uri(); ?>/images/hero-banner.jpg" alt="Hall Metal Art Banner" />
            <div class="hero-text">
                <h1>Custom Metal Art</h1>
                <p>Transform your space with our unique designs.</p>
            </div>
        </div>
    </section>
    <!-- About -->
    <section>
        <h1>Welcome to Hall Metal Art</h1>
        <p>Your one-stop shop for custom metal art.</p>
        <p>Explore our collection of unique designs and find the perfect piece for your home or business.</p>
        <p>We specialize in custom orders, so if you have a specific design in mind, don't hesitate to reach out!</p>
        <p>Check out our custom products below or browse our catalogue.</p>
    </section>
    <!-- Custom Orders -->
    <section>
        <h2>Custom Orders</h2>
        <div class="featured-products">
            <?php
            // Query for featured products
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'meta_query' => array(
                    array(
                        'key' => '_featured',
                        'value' => 'yes'
                    )
                )
            );
            $featured_products = new WP_Query($args);
            if ($featured_products->have_posts()) {
                while ($featured_products->have_posts()) {
                    $featured_products->the_post();
                    wc_get_template_part('content', 'product');
                }
            } else {
                echo '<p>No featured products found.</p>';
            }
            wp_reset_postdata();
            ?>
        </div>
    </section>
    <!-- Catalogue -->
    <section>
        <h2>Catalogue</h2>
        <div class="catalogue-products">
            <?php
            // Query for all products
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12,
            );
            $all_products = new WP_Query($args);
            if ($all_products->have_posts()) {
                while ($all_products->have_posts()) {
                    $all_products->the_post();
                    wc_get_template_part('content', 'product');
                }
            } else {
                echo '<p>No products found.</p>';
            }
            wp_reset_postdata();
            ?>
        </div>
    </section>

</main>