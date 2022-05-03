<?php
/**
 * Displays post content.
 */

?>
<article <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_search() ) {
			$permalink = get_the_permalink();
			the_title( "<h2 class='entry-title'><a href='$permalink'>", "</a></h2>" );
		} else {
			the_title( '<h1 class="entry-title">', '</h1>' );
		}
		?>
	</header>
	<div class="entry-content">
		<?php
		if ( is_search() ) {
			the_excerpt();
		} else {
			the_content();
		}
		?>
	</div>
</article>
