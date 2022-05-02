<?php
/**
 * Displays a page.
 */

get_header();

while ( have_posts() ) {
	the_post();
	get_template_part(
		'template-parts/content/content',
		'page'
	);
}
comments_template();
get_footer();