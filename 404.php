<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package shumof
 */

get_header();


$categories = get_terms( 'product_cat');

?>

	<main class="content">
		<div class="page_404 center_block">
			<div class="page_404__l-side">
				<div class="page_404__title">Страница <br> не найдена</div>
				<a href="/" class="page_404__button button button__all-line">
					<svg>
						<rect x="0" y="0" fill="none" width="100%" height="100%"/>
					</svg>
					<span>Вернутся на главную</span>
				</a>
			</div>
			<div class="page_404__r-side">
				<div class="page_404__tit">Попробуйте поискать здесь:</div>
				<nav class="page_404__menu">
					<ul>
						<? foreach ( $categories as $category ) { ?>  
							<li><a href="<?= esc_url( get_term_link( $category ) ); ?>"><?= $category->name; ?></a></li>
						<? }; ?>
					</ul>
				</nav>
			</div>
		</div>
	</main>

<?php
get_footer();
