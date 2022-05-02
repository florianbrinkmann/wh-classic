<?php
/**
 * Displays search results.
 */

get_header();
?>
<header class="archive-header">
	<h1 class="archive-title">
		<?php
		printf( /* translators: s=search query. */
			esc_html__( 'Search Results for: %s', 'wh-classic' ),
			get_search_query()
		);
		?>
	</h1>
</header>
<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part(
			'template-parts/content/content',
			get_post_type()
		);
	}
} else {
	get_template_part(
		'template-parts/content/content',
		'no-search-result'
	);
}

the_posts_pagination(
	[
		'type'      => 'list',
		'prev_text' => __( 'Previous', 'wh-classic' ),
		'next_text' => __( 'Next', 'wh-classic' ),
	]
);

get_footer();