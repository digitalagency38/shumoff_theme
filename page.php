<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shumof
 */

get_header();
?>
	<div class="breadcrums center_block">
        <div class="breadcrums__item">
            <div class="breadcrums__in">
                <a href="/">Главная</a>
                <div class="breadcrums__splash"></div>
                <a href="#">Подкатегория</a>
                <div class="breadcrums__splash"></div>
                <span>Данная страница</span>
            </div>
        </div>
    </div>
	<div class="page_top center_block">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<p class="woocommerce-result-count">
			<?php
				// phpcs:disable WordPress.Security
				if ( 1 === intval( $total ) ) {
					_e( 'Showing the single result', 'woocommerce' );
				} elseif ( $total <= $per_page || -1 === $per_page ) {
					/* translators: %d: total results */
					printf( _n( 'Showing all %d result', 'Showing all %d results', $total, 'woocommerce' ), $total );
				} else {
					$first = ( $per_page * $current ) - $per_page + 1;
					$last  = min( $total, $per_page * $current );
					/* translators: 1: first result 2: last result 3: total results */
					printf( _nx( 'Showing %1$d&ndash;%2$d of %3$d result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
				}
			// phpcs:enable WordPress.Security
			?>
		</p>
	</div>
	<main id="primary" class="content">
		<div class="inner_page center_block">
			<? if( is_product_category() || is_shop() ) { ?>
				<div class="inner_page__left">
					<? get_sidebar(); ?>
				</div>
			<? }; ?>
			<div class="inner_page__right">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
