<?php

if ( function_exists( 'genesis' ) ) {

	/** Replace the standard loop with our custom loop */
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	add_action( 'genesis_loop', 'initiatieven_archive_custom_loop' );

	genesis();

} else {


	get_header(); ?>

    <div id="primary" class="content-area">
        <div id="content" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php if ( $template = myplugin_get_template( 'content-single', get_post_type() ) ) {
					include $template;
				} else {
					get_template_part( 'content', 'single' );
				} ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; ?>

        </div><!-- #content -->
    </div><!-- #primary -->

	<?php

	get_sidebar();

	get_footer();


}


/** Code for custom loop */
function initiatieven_archive_custom_loop() {

	// code for a completely custom loop
	global $post;

	if ( have_posts() ) {

		$postcounter = 0;

		while ( have_posts() ) : the_post();

			$postcounter ++;

			$permalink       = get_permalink();
			$excerpt         = wp_strip_all_tags( get_the_excerpt( $post ) );
			$postdate        = get_the_date();
			$classattr       = genesis_attr( 'entry' );
			$contenttype     = get_post_type();
			$current_post_id = isset( $post->ID ) ? $post->ID : 0;
			$cssid           = 'image_featured_image_post_' . $current_post_id;

			$labelledbytitleid = sanitize_title( 'title_' . $contenttype . '_' . $current_post_id );
			$labelledby        = ' aria-labelledby="' . $labelledbytitleid . '"';

			printf( '<article %s %s>', $classattr, $labelledby );
			printf( '<a href="%s">Yoyoyohy <h2 id="%s">%s</h2><p class="meta">%s</p><p>%s</p></a>', get_permalink(), $labelledbytitleid, $thetitle, $postdate, $excerpt );
			echo '</article>';

		endwhile;

		wp_reset_query();

	}

}
