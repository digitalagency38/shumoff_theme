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

$seo_block = get_field('seo_block');

get_header();
?>
    <?if (!is_wc_endpoint_url( 'order-received' )):?>
        <div class="breadcrums center_block">
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
        
        <div class="page_top center_block">
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
            <?if( is_category() ):?>
                <div class="page_top__counter">
                    <?= do_shortcode('[product_count]'); ?> товаров
                </div>
            <?endif;?>

        </div>
    <?endif;?>
	
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

	<? if (!empty($seo_block)) { ?>
        <div class="seo_block center_block">
            <div class="seo_block__in">
                <div class="seo_block__l-side">
                    <?
                        $image = $seo_block['image'];
                        $size = 'large';
                        $alt = $image['alt'];
                        $thumb = $image['sizes'][ $size ];

                        if( $image ):
                    ?>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
                    <?php endif; ?>
                </div>
                <div class="seo_block__r-side">
                    <div class="seo_block__title"><?= $seo_block['title']; ?></div>
                    <div class="seo_block__text"><?= $seo_block['text']; ?></div>
                </div>
            </div>
        </div>
    <? }; ?>


<?php
get_footer();
