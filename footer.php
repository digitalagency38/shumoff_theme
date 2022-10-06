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

?>

	<footer class="footer">
		<div class="footer__in center_block">
			<div class="footer__top">
				<div class="footer__info">
					<? the_custom_logo(); ?>
					<div class="footer__cont">
						<div class="footer__title">ООО «Шумoff»</div>
						<div class="footer__text">
							<span>ИНН:</span>
							3702579095
						</div>
						<div class="footer__text">
							<span>ОГРН:</span>
							1093702004043
						</div>
						<div class="footer__text">
							<span>Юр.адрес:</span>
							153000, Россия г. Иваново, ул.Зверева, д.13, оф.37
						</div>
					</div>
				</div>
				<nav class="footer__menu">
					<div class="footer__menu--item">
						<div class="footer__menu--tit">Продукция</div>
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
					<div class="footer__menu--item">
						<div class="footer__menu--tit">Клиентам</div>
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
					<div class="footer__menu--item">
						<div class="footer__menu--tit">Техническая поддержка</div>
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
			<div class="footer__bottom">
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
		<div class="fixed_panel__menu">Меню</div>
		<a href="/shop" class="fixed_panel__catalog">Каталог</a>
		<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>