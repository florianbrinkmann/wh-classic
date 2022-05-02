<?php
/**
 * Displays branding info.
 */

$has_custom_logo   = has_custom_logo();
$site_description  = get_bloginfo( 'description', 'display' );
$shows_description = ! $has_custom_logo && ! empty( $site_description );
?>
<div class="branding <?php echo $shows_description ? 'with-description' : ''; ?>">
	<?php
	$title_tag = is_home() && is_front_page() ? 'h1' : 'p';
	if ( $has_custom_logo ) {
		$logo = get_custom_logo();
		echo "<$title_tag class='site-logo'>$logo</$title_tag>";
	}

	if ( ! $has_custom_logo ) {
		$site_title    = get_bloginfo( 'name', 'display' );
		$is_front_page = is_front_page();
		$site_url      = get_site_url();
		printf(
			'<%1$s class="site-title">%2$s%3$s%4$s</%1$s>',
			$title_tag,
			$is_front_page ? '' : "<a href='$site_url'>",
			$site_title,
			$is_front_page ? '' : '</a>'
		);
		if ( ! empty( $site_description ) ) {
			echo "<p class='site-description'>$site_description</p>";
		}
	}
	?>
</div>
