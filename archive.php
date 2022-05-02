<?php
/**
 * Displays archive views.
 */

get_header();
?>
<header class="archive-header">
	<h1 class="archive-title">
		<?php the_archive_title(); ?>
	</h1>
	<?php
	$archive_description = get_the_archive_description();
	if ( ! empty( $archive_description ) ) {
		echo "<p class='archive-description'>$archive_description</p>";
	}
	?>
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