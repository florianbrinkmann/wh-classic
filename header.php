<?php
/**
 * Theme header.
 */

?>
<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<a class="skip-link screen-reader-text" href="#content">
			<?php esc_html_e( 'Skip to content', 'wh-classic' ); ?>
		</a>
		<header class="site-header inverted-link-style">
			<?php
			get_template_part(
				'template-parts/header/branding'
			);
			get_template_part(
				'template-parts/header/nav'
			);
			?>
		</header>
		<main id="content">
