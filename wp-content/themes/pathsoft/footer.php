<?php
/**
 * The template for displaying the footer
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit; ?>

	</div><!-- End inner -->

	<!-- Begin footer -->
	<footer class="footer">
		<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
	</footer><!-- End footer -->

</main><!-- End main -->

<script> var templateUrl = "<?php echo get_template_directory_uri(); ?>"; </script>

<?php wp_footer(); ?>

</body>

</html>

