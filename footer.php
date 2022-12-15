<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shumof
 */

$site_socials = get_theme_mod('site_socials');
$site_socials_decoded = json_decode($site_socials);
$site_address = get_option('site_address');
$site_worktime = get_option('site_worktime');
$site_email = get_option('site_email');


$site_name = get_option('site_name');
$site_inn = get_option('site_inn');
$site_kpp = get_option('site_kpp');
$site_ogrn = get_option('site_ogrn');

$args = array(
    'numberposts' => -1,
    'post_type'   => 'model'
);

$models = get_posts( $args );

$models_data = array();

$footer_menu_1 = get_option('footer_menu_1');
$footer_menu_2 = get_option('footer_menu_2');
$footer_menu_3 = get_option('footer_menu_3');

foreach( $models as $post) {
	setup_postdata($post);
	array_push($models_data, (object) array(
		"name"  => get_the_title(),
		"brand" => get_field('brand'),
		"body"  => get_field('body'),
	));
};
wp_reset_postdata();


?>

	<footer class="footer">
		<div class="footer__in center_block">
			<div class="footer__top">
				<div class="footer__info">
					<? the_custom_logo(); ?>
					<div class="footer__cont wow fadeInLeft">
						<div class="footer__title"><?= $site_name; ?></div>
						<div class="footer__text">
							<span>ИНН:</span>
							<?= $site_inn; ?>
						</div>
						<div class="footer__text">
							<span>ОГРН:</span>
							<?= $site_ogrn; ?>
						</div>
						<div class="footer__text">
							<span>Юр.адрес:</span>
							<?= $site_address; ?>
						</div>
					</div>
				</div>
				<nav class="footer__menu">
					<div class="footer__menu--item  wow fadeInLeft">
						<div class="footer__menu--tit"><?= $footer_menu_1 ?></div>
						<?
							wp_nav_menu( [
								'theme_location'  => '',
								'menu'            => 'Меню в подвале 1',
								'container'       => false,
								'container_class' => 'header__menu-bot',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '<span>',
								'link_after'      => '</span>',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => '',
							] );
						?>
					</div>
					<div class="footer__menu--item wow fadeInRight">
						<div class="footer__menu--tit"><?= $footer_menu_2 ?></div>
						<?
							wp_nav_menu( [
								'theme_location'  => '',
								'menu'            => 'Меню в подвале 2',
								'container'       => false,
								'container_class' => 'header__menu-bot',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '<span>',
								'link_after'      => '</span>',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => '',
							] );
						?>
					</div>
					<div class="footer__menu--item wow fadeInRight">
						<div class="footer__menu--tit"><?= $footer_menu_3 ?></div>
						<?
							wp_nav_menu( [
								'theme_location'  => '',
								'menu'            => 'Меню в подвале 3',
								'container'       => false,
								'container_class' => 'header__menu-bot',
								'container_id'    => '',
								'menu_class'      => 'menu',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '<span>',
								'link_after'      => '</span>',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => '',
							] );
						?>
					</div>
				</nav>
				<div class="footer__append"></div>
				<div id="up_button" class="up_button">Наверх</div>
			</div>
			<div class="footer__bottom wow zoomInUp">
				<div class="footer__links">
					<div class="footer__link">© Шумoff<div class="footer__delim"></div>2022</div>
					<div class="footer__delim"></div>
					<div class="footer__link">Все права защищены</div>
					<div class="footer__delim"></div>
					<a href="#" class="footer__link">Публичная оферта</a>
					<div class="footer__delim"></div>
					<a href="#" class="footer__link">Политика конфиденциальности</a>
				</div>
				<div class="footer__pays">
					<div class="footer__pay"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/pay1.svg" alt=""></div>
					<div class="footer__pay"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/pay2.svg" alt=""></div>
					<div class="footer__pay"><img src="<?php echo get_theme_file_uri(); ?>/src/dist/img/pay3.svg" alt=""></div>
				</div>
				<?php if( $site_socials_decoded ) { ?>
					<div class="footer__socs">
						<?php foreach ($site_socials_decoded as $icon) { ?>
							<a href="<?= $icon->link; ?>" class="footer__soc button button__all-soc">
								<img src="<?= $icon->image_url; ?>"
                                    alt="">
							</a>
						<?php }; ?>
					</div>
				<?php }; ?>
			</div>
		</div>
	</footer>
	<div class="fixed_panel">
		<a href="/" class="fixed_panel__main">Главная</a>
		<div class="fixed_panel__menu" @click="headerBlock.burgCatClick.apply(headerBlock)">Меню</div>
		<a href="/katalog" class="fixed_panel__catalog">Каталог</a>
		<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
	</div>
</div><!-- #page -->
<script>
	function loadModels() {
		return <?= json_encode($models_data); ?>
	};
	function loadPortfolioGetParams() {
		return {
			vendor: '<?= $_GET['vendor'] ?>' ? '<?= $_GET['vendor'] ?>' : 'Все',
			type: '<?= $_GET['type'] ?>' ? '<?= $_GET['type'] ?>' : 'Все',
		};
	}
</script>


<?php wp_footer(); ?>



</body>

</html>
