<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shumof
 */

?>

		<article id="post-<?php the_ID(); ?>" class="main_product__block">

			<div class="main_product__img">
				<?php shumof_post_thumbnail(); ?>
			</div>
			<div class="main_product__info">
				<?php the_title( sprintf( '<a class="main_product__tit" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
				<?php the_excerpt(); ?>
			</div>
		</article><!-- #post-<?php the_ID(); ?> -->


