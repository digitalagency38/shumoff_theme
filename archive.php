<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shumof
 */

get_header();
?>

<div class="breadcrums center_block wow fadeInUp">
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
<main id="primary" class="content">
	<div class="inner_page center_block">
		<div class="inner_page__right">

			<?php if ( have_posts() ) : ?>

			<header class="page-header wow fadeInUp">
				<?php
				the_archive_title( '<h1 class="page-title wow fadeInUp">', '</h1>' );
				the_archive_description( '<div class="archive-description wow fadeInUp">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
	</div>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();