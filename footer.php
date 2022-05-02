<?php
/**
 * Theme footer.
 */
?>
		</main>
		<?php
		if ( is_active_sidebar( 'footer-widgets-area' ) ) {
			dynamic_sidebar( 'footer-widgets-area' );
		}
		?>
		<?php wp_footer(); ?>
	</body>
</html>
