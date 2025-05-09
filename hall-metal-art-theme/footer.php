<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hall-metal-art
 */

?>

<footer id="colophon" class="site-footer">
	<!-- site links -->
	<div>
	<?php
      wp_nav_menu(
        array(
          'theme_location' => 'menu-2',
          'menu_id' => 'footer-menu',
        )
      );
      ?>
	</div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>