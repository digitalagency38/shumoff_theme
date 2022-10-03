<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shumof
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
	<? if (!is_product()): ?>
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			

			if ( 'post' === get_post_type() ) :
				?>
				<div class="entry-meta">
					<?php
					shumof_posted_on();
					shumof_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<?php shumof_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'shumof' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
