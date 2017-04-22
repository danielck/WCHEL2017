<?php

function customizer_test_display_related_posts() {

	$number_of_posts = get_theme_mod( 'related_posts_number', 3 );

	// Get the categories for this post
	$post_categories_query = get_the_category();
	$post_categories_ids = wp_list_pluck( $post_categories_query, 'term_id' );
	
	// Get three posts with the same category
	$related_posts = new WP_Query( array(
		'posts_per_page' => absint( $number_of_posts ),
		'category__in' => $post_categories,
		'ignore_sticky_posts' => true,
	) );

	// Loop over posts and display them
	if ( $related_posts->have_posts() ) {
	?>
	<div class="related-posts-container">
		<h2><?php esc_html_e( 'Related posts', 'customizer-test' ); ?></h2>
		<ul class="related-posts-list">
	<?php
		while ( $related_posts->have_posts() ) {
			$related_posts->the_post();
	?>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</li>
	<?php
		}
	?>
		</ul>
	</div>
	<?php
	}
	wp_reset_postdata();

}