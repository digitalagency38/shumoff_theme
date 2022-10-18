<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shumof
 */

$type = get_post_type();

if ($type === 'portfolio') {
	$slider = get_field('slider');
	$advantagies = get_field('advantagies');
	$seo_block = get_field('seo_block');
}

?>

<?if ($type === 'portfolio'):?>
<main class="content">
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
	<div class="text_page center_block">
		<?php the_title( '<h1 class="text_page__h1">', '</h1>' ); ?>
		<div class="text_page__img">
			<img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
		</div>
		<div class="center_block2">
			<div class="text_page__txt">
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
				<?if ($slider):?>
					<div class="text_page__slider">
						<div class="text_page__slid js_sl1">
							<? foreach($slider as $slide): ?>
								<div class="text_page__slider">
									<?
										$image = $slide['image'];
										$size = 'large';
										$alt = $image['alt'];
										$thumb = $image['sizes'][ $size ];

										if( $image ):
									?>
										<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
									<?php endif; ?>
								</div>
							<?endforeach;?>
						</div>
						<div class="js_sl1_prev button button__all-arrow">
							<svg class="ln">
								<rect x="0" y="0" fill="none" width="100%" height="100%" />
							</svg>
							<svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M4.39241 11.9996L12.9336 3.99962V0.799622L0.933594 11.9996L12.9336 23.1996V19.9996L4.39241 11.9996Z"
									fill="#333333" />
							</svg>
						</div>
						<div class="js_sl1_next button button__all-arrow">
							<svg class="ln">
								<rect x="0" y="0" fill="none" width="100%" height="100%" />
							</svg>
							<svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z"
									fill="#333333" />
							</svg>
						</div>
					</div>
				<?endif;?>
			</div>
		</div>
	</div>
	<?if ($advantagies):?>
	<div class="prev_block">
		<div class="prev_block__in">
			<div class="prev_block__items center_block">
				<div class="prev_block__blocks js_sl5">
					<? foreach ($advantagies as $advantage) { ?>
						<div class="prev_block__block">
							<div class="prev_block__img">
									<?
										$image = $advantage['image'];
										$size = 'large';
										$alt = $image['alt'];
										$thumb = $image['sizes'][ $size ];

										if( $image ):
									?>
										<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
									<?php endif; ?>
							</div>
							<div class="prev_block__text"><?= $advantage['text'] ?></div>
						</div>
					<? }; ?>
				</div>
				<div class="button button__all-arrow prev_prev">
					<svg class="ln">
						<rect x="0" y="0" fill="none" width="100%" height="100%" />
					</svg>
					<svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M4.39241 11.9996L12.9336 3.99962V0.799622L0.933594 11.9996L12.9336 23.1996V19.9996L4.39241 11.9996Z"
							fill="#333333" />
					</svg>
				</div>
				<div class="button button__all-arrow prev_next">
					<svg class="ln">
						<rect x="0" y="0" fill="none" width="100%" height="100%" />
					</svg>
					<svg class="ar" width="13" height="24" viewBox="0 0 13 24" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd"
							d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z"
							fill="#333333" />
					</svg>
				</div>
			</div>
		</div>
	</div>
	<?endif?>
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
</main>
<?else:?>







	asdasdasd
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<? if (!is_product()): ?>
	<header class="entry-header">
		<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;?>
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
<?endif;?>