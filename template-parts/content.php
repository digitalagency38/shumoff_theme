<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shumof
 */

$type = get_post_type();

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
				<div class="text_page__slider">
					<div class="text_page__slid js_sl1">
						<div class="text_page__slider">
							<picture>
								<source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/img_t.webp"
									type="image/webp"><img
									src="<?php echo get_theme_file_uri(); ?>/src/dist/img/img_t.jpg" alt=""></picture>
						</div>
						<div class="text_page__slider">
							<picture>
								<source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/img_t.webp"
									type="image/webp"><img
									src="<?php echo get_theme_file_uri(); ?>/src/dist/img/img_t.jpg" alt=""></picture>
						</div>
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
			</div>
		</div>
	</div>
	<div class="prev_block">
		<div class="prev_block__in">
			<div class="prev_block__items center_block">
				<div class="prev_block__blocks js_sl5">
					<div class="prev_block__block">
						<div class="prev_block__img">
							<picture>
								<source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/s1.webp"
									type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/s1.jpg"
									alt=""></picture>
						</div>
						<div class="prev_block__text">Улучшается качество звучания аудио системы</div>
					</div>
					<div class="prev_block__block">
						<div class="prev_block__img">
							<picture>
								<source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/s2.webp"
									type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/s2.jpg"
									alt=""></picture>
						</div>
						<div class="prev_block__text">Уменьшаются <br> вибрации металла</div>
					</div>
					<div class="prev_block__block">
						<div class="prev_block__img">
							<picture>
								<source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/s3.webp"
									type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/s3.jpg"
									alt=""></picture>
						</div>
						<div class="prev_block__text">Снижается уровень шума <br> от проезжающего мимо транспорта и
							ветра</div>
					</div>
					<div class="prev_block__block">
						<div class="prev_block__img">
							<picture>
								<source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/s4.webp"
									type="image/webp"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/s4.jpg"
									alt=""></picture>
						</div>
						<div class="prev_block__text">Двери закрываются более <br> четко и тихо</div>
					</div>
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
	<div class="seo_block center_block">
		<div class="seo_block__in">
			<div class="seo_block__l-side">
				<picture>
					<source srcset="<?php echo get_theme_file_uri(); ?>/src/dist/img/seo_img.webp" type="image/webp">
					<img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/seo_img.jpg" alt=""></picture>
			</div>
			<div class="seo_block__r-side">
				<div class="seo_block__title">Заголовок SEO блока</div>
				<div class="seo_block__text">Термин шумоизоляция автомобиля, предполагает под собой действия,
					направленные на снижение уровня шума, как в салоне автомобиля, так и снаружи авто. Основное
					предназначение шумоизоляции — обеспечение тишины в салоне транспортного средства. Любой автомобиль,
					даже дорогой даже электрический, пропускает в салон определённое количество шума от движения колёс
					по дороге, от работы двигателя, от шума ветра, от попутного и встречного транспорта.</div>
			</div>
		</div>
	</div>
</main>
<?else:?>
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