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

    <div class="product-single container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="product-wrapper">
      <h1><?php the_title(); ?></h1>
      <?php if (has_post_thumbnail()) : ?>
        <div class="product-image">
          <?php the_post_thumbnail('large'); ?>
        </div>
      <?php endif; ?>
      <div class="product-content">
        <?php the_content(); ?>
      </div>
    </div>
  <?php endwhile; endif; ?>
</div>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
