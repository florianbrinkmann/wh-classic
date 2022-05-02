<?php
/**
 * Last fallback for all views.
 */

get_header();

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
		'none'
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
