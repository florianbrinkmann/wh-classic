<?php
/**
 * Displays the header nav.
 */

wp_nav_menu(
	[
		'theme_location'  => 'primary',
		'menu_class'      => 'primary-menu',
		'container'       => 'nav',
		'container_class' => 'primary-menu-container',
		'depth'           => 1,
	]
);
