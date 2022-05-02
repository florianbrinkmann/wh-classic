<?php
/**
 * Displays post content.
 */

?>
<article <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		$permalink = get_the_permalink();
		the_title( "<h2 class='entry-title'><a href='$permalink'>", '</a></h2>' );
		printf(
			'<p class="entry-date"><a href="%s">%s</a></p>',
			$permalink,
			get_the_date()
		);
		?>
	</header>
	<div class="entry-content">
		<?php
		if ( has_excerpt() && ! is_singular() ) {
			printf(
				'<p class="excerpt">%s</p>',
				get_the_excerpt()
			);
		} else {
			wh_classic_the_content();
		}
		?>
	</div>
</article>