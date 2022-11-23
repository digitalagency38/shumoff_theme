<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package shumof
 */

get_header();
?>

	<main id="primary" class="site-main center_block">
		<div class="breadcrums">
			<div class="breadcrums__item">
				<div class="breadcrums__in">
					<?php
						if(function_exists('bcn_display'))
						{
							bcn_display();
						}
					?>
				</div>
			</div>
		</div>
		
		<?php if ( have_posts() ) : ?>

			<header class="page-header page_top">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результаты поиска для: %s', 'shumof' ), '' . get_search_query() . '' );
					?>
				</h1>
			</header><!-- .page-header -->
			<div class="catalog__wrapper">
				<div class="catalog__wrapper_in" style="--item_in_line:3;">
				<?php
				/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;
				?>
				</div>
			</div>
		<?php

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
