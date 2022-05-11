<?php
/**
 * Displays post content.
 */

?>
<article <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		printf(
			'<p class="entry-date">%s</p>',
			get_the_date()
		);
		if ( has_post_thumbnail() ) {
			printf(
				'<figure class="post-thumbnail">%s</figure>',
				get_the_post_thumbnail( null, 'large' )
			);
		}
		?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<footer class="entry-footer">
		<p class="post-categories">
			<?php
			_e( 'Categories: ', 'wh-classic' );
			echo get_the_category_list( ', ' );
			?>
		</p>
	</footer>
</article>
