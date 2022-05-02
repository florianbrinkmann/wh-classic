<?php
/**
 * Last fallback for all views.
 */

get_header();

while ( have_posts() ) {
	the_post();
	get_template_part(
		'template-parts/content/content-single',
		get_post_type()
	);
}
comments_template();
get_footer();