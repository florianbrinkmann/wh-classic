<?php
/**
 * Comments template.
 */

if ( ! comments_open() && ! get_comments_number() ) {
	return;
}

if ( post_password_required() ) {
	return;
}
?>
<aside aria-label="<?php esc_html_e( 'Area for comments and other reactions', 'wh-classic' ); ?>" class="comments-area">
	<?php
	if ( have_comments() ) {
		$comments_heading = sprintf(
			_n( /* translators: 1=post/page title, 2=number of comments */
				'One reaction to »%1$s«',
				'%2$s reactions to »%1$s«',
				get_comments_number(),
				'wh-classic'
			),
			get_the_title(),
			get_comments_number()
		);
		echo "<h2 class='comments-area-heading'>$comments_heading</h2>";
		$comments = wp_list_comments(
			[
				'echo'     => false,
				'style'    => 'ul',
				'type'     => 'comment',
				'per_page' => ( isset( $comment_args['number'] ) ? $comment_args['number'] : - 1 ),
			]
		);

		if ( ! empty( $comments ) ) {
			echo "<ul class='reactions-list comments'>$comments</ul>";
		}

		$pings = wp_list_comments(
			[
				'style'    => 'ul',
				'type'     => 'pings',
				'per_page' => ( isset( $comment_args['number'] ) ? $comment_args['number'] : - 1 ),
			]
		);

		if ( ! empty( $pings ) ) {
			echo "<ul class='reactions-list pings'>$pings</ul>";
		}

		the_comments_navigation();

		if ( ! comments_open() && get_comments_number() ) {
			?>
			<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'wh-classic' ); ?></p>
			<?php
		}
	}

	comment_form( [ 'label_submit' => __( 'Submit Comment', 'wh-classic' ) ] );
	?>
</aside>