<?php
/**
 * Displays archive views.
 */

get_header();
?>
<article <?php post_class( 'hentry' ); ?>>
	<header class="entry-header">
		<h1 class="entry-title">
			<?php _e( 'Nothing found.', 'wh-classic' ); ?>
		</h1>
	</header>
	<div class="entry-content">
		<p><?php _e( 'The content you are looking for does not exist, sorry. Maybe a search helps?', 'wh-classic' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</article>
<?php
get_footer();