<?php
/**
 * Displays 404 template.
 */

?>
<article <?php post_class( 'hentry' ); ?>>
	<div class="entry-content">
		<p><?php _e( 'Nothing found for your search. Maybe try a new search.', 'wh-classic' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</article>
