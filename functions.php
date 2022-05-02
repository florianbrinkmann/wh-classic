<?php
/**
 * Functions file.
 */

if ( ! function_exists( 'wh_classic_add_theme_support' ) ) {
	/**
	 * Makes add_theme_support() calls.
	 *
	 * @return void
	 */
	function wh_classic_add_theme_support() {
		add_theme_support(
			'custom-logo',
			[
				'unlink-homepage-logo' => true,
			]
		);
	
		add_theme_support( 'title-tag' );

		add_theme_support( 'editor-styles' );
	}	
}
add_action(
	'after_setup_theme',
	'wh_classic_add_theme_support'
);

if ( ! function_exists( 'wh_classic_register_nav_menu' ) ) {
	/**
	 * Registers the nav menu location.
	 *
	 * @return void
	 */
	function wh_classic_register_nav_menu() {
		register_nav_menu(
			'primary',
			__( 'Header menu', 'wh-classic' )
		);
	}
}
add_action(
	'after_setup_theme',
	'wh_classic_register_nav_menu'
);

if ( ! function_exists( 'wh_classic_register_widgets_area' ) ) {
	/**
	 * Registers widget area in footer.
	 *
	 * @return void
	 */
	function wh_classic_register_widgets_area() {
		$heading = __( 'Footer widgets' );
		register_sidebar( [
			'name'           => __( 'Footer widgets area', 'wh-classic' ),
			'id'             => 'footer-widgets-area',
			'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'   => "</aside>\n",	
			'before_title'   => '<h3 class="widget-title">',
			'after_title'    => '</h3>',
			'before_sidebar' => "<footer class='site-footer'><h2 class='screen-reader-text'>$heading</h2>",
			'after_sidebar'  => '</footer>'
		] );
	}
}
add_action(
	'widgets_init',
	'wh_classic_register_widgets_area'
);

if ( ! function_exists( 'wh_classic_add_logo_alt' ) ) {
	/**
	 * For some reason, it was decided that the `alt` attribute
	 * of the logo is empty on the front page if `unlink-homepage-logo`
	 * is set. This filter fixes that.
	 *
	 * @param array $attrs
	 * @return array
	 */
	function wh_classic_add_logo_alt( array $attrs ) {
		$alt = $attrs['alt'] ?? '';
		if ( '' !== $alt ) {
			return $attrs;
		}
	
		$attrs['alt'] = get_bloginfo( 'name', 'display' );
		return $attrs;
	}
}
add_filter(
	'get_custom_logo_image_attributes',
	'wh_classic_add_logo_alt'
);

if ( ! function_exists( 'wh_classic_the_content' ) ) {
	/**
	 * Displays the_content() with a more accessible more tag.
	 */
	function wh_classic_the_content() {
		the_content(
			sprintf( /* translators: visible text for the more tag */
				'<span aria-hidden="true">%1s</span><span class="screen-reader-text">%2s</span>',
				__( 'Continue reading', 'wh-classic' ),
				sprintf( /* translators: continue reading text for screen reader users. s=post title */
					__( 'Continue reading %s', 'wh-classic' ),
					the_title( '', '', false )
				)
			)
		);
	}
}

if ( ! function_exists( 'wh_classic_remove_more_link_scroll' ) ) {
	/**
	 * Removes the page jump after clicking on a read more link.
	 *
	 * @param string $link Post URL.
	 *
	 * @return string
	 */
	function wh_classic_remove_more_link_scroll( $link ) {
		$link = preg_replace( '/#more-[0-9]+/', '', $link );
		return "<p class='read-more'>$link</p>";
	}
}
add_filter( 'the_content_more_link', 'wh_classic_remove_more_link_scroll' );

if ( ! function_exists( 'wh_classic_add_fonts' ) ) {
	function wh_classic_add_fonts() {
		printf(
			'<style>@font-face {
			  font-family: "IBM Plex Serif";
			  font-style: normal;
			  font-weight: 400;
			  src: url( "%1$s/fonts/ibm-plex-serif-v15-latin-regular.woff2" ) format( "woff2" ),
				   url( "%1$s/fonts/ibm-plex-serif-v15-latin-regular.woff" ) format( "woff" );
			}
			
			@font-face {
			  font-family: "IBM Plex Serif";
			  font-style: italic;
			  font-weight: 400;
			  src: url( "%1$s/fonts/ibm-plex-serif-v15-latin-italic.woff2 ") format( "woff2" ),
				   url( "%1$s/fonts/ibm-plex-serif-v15-latin-italic.woff ") format( "woff" );
			}
			
			@font-face {
			  font-family: "IBM Plex Serif";
			  font-style: normal;
			  font-weight: 700;
			  src: url( "%1$s/fonts/ibm-plex-serif-v15-latin-700.woff2 ") format( "woff2" ),
				   url( "%1$s/fonts/ibm-plex-serif-v15-latin-700.woff ") format( "woff" );
			}</style>',
			get_theme_file_uri( 'assets' )
		);
	}
}
add_action( 'wp_head', 'wh_classic_add_fonts' );

if ( ! function_exists( 'wh_classic_enqueue_assets' ) ) {
	function wh_classic_enqueue_assets() {
		wp_enqueue_style(
			'wh-classic-style',
			get_stylesheet_uri(),
			[],
			filemtime( get_stylesheet_directory() . '/style.css' )
		);
	}
}
add_action( 'wp_enqueue_scripts', 'wh_classic_enqueue_assets' );

if ( ! function_exists( 'wh_classic_add_editor_style' ) ) {
	function wh_classic_add_editor_style() {
		add_editor_style( 'assets/css/editor.css' );
	}
}
add_action( 'admin_init', 'wh_classic_add_editor_style' );