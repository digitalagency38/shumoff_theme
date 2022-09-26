<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shumof
 */
$categories = get_terms( 'product_cat');
$site_phone = get_option('site_phone');

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap&_v=20220924035140" rel="stylesheet">
	<script src="https://api-maps.yandex.ru/2.1/?apikey=8a69628d-9012-482b-962d-9bd92d6f2d51&lang=ru_RU&_v=20220924033747" type="text/javascript"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="wrapper">
		<header class="header">
			<div class="header__in center_block">
				<div class="header__top">
					<div class="site-panel-wrap">
						<div class="burger-wrap">
							<div class="burger-btn"></div>
							<div class="burger-body">
								<div class="burger-body__top">
									<div class="burger-close-btn"></div>
									<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
								</div>
								<div class="burger-body__catalog">каталог</div>
								<div class="burger-body__cat-block">
									<div class="header__cat--blocks">
										<? foreach ( $categories as $category ) { ?>                            
											<a href="<?= esc_url( get_term_link( $category ) ); ?>" class="header__cat--block">
											<?
												$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
												$image = wp_get_attachment_image( $thumbnail_id, 'medium', false, array( "class" => "img-responsive" ) );

												if ($image) {
											?>
												<div class="header__cat--img">
													<?= $image ?>
												</div>
												<? }; ?>
												<div class="header__cat--info">
													<div class="header__cat--title"><?= $category->name; ?> <sup><?= $category->count; ?></sup></div>
													<div class="header__cat--price">от 350 ₽</div>
												</div>
											</a>
										<? }; ?>
									</div>
								</div>
								<nav class="slide-menu" id="example-menu">
									<ul>
										<li><a href="#">Установка</a></li>
										<li><a href="#">О компании</a></li>
										<li><a href="#">Калькулятор</a></li>
										<li><a href="#">Портфолио</a></li>
										<li class="menu-item-has-children">
											<a href="#">Покупателям</a>
											<ul class="sub-menu">
												<li><a href="#">Документы</a></li>
												<li><a href="#">Клиентский сервис</a></li>
												<li><a href="#">Как строить</a></li>
												<li><a href="#">Как выбрать</a></li>
												<li><a href="#">Ошибки строительства</a></li>
												<li><a href="#">Часто задаваемые вопросы</a></li>
												<li><a href="#">Блог строителя</a></li>
											</ul>
										</li>
										<li><a href="#">Контакты</a></li>
									</ul>
								</nav>
								<div class="header__info">
									<? if (!empty($site_phone)) { ?>
										<a href="tel:<?= $site_phone; ?>" class="header__tel"><?= $site_phone; ?></a>
									<? }; ?>
									<a href="#" class="header__call button button__link">Заказать звонок</a>
								</div>
							</div>
						</div>
					</div>
					<? the_custom_logo(); ?>
					<div class="header__cat-btn isOpen button button__all-link">
						<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M11.375 14H2.625C2.39294 14 2.17038 14.0922 2.00628 14.2563C1.84219 14.4204 1.75 14.6429 1.75 14.875C1.75 15.1071 1.84219 15.3296 2.00628 15.4937C2.17038 15.6578 2.39294 15.75 2.625 15.75H11.375C11.6071 15.75 11.8296 15.6578 11.9937 15.4937C12.1578 15.3296 12.25 15.1071 12.25 14.875C12.25 14.6429 12.1578 14.4204 11.9937 14.2563C11.8296 14.0922 11.6071 14 11.375 14ZM2.625 7H18.375C18.6071 7 18.8296 6.90781 18.9937 6.74372C19.1578 6.57962 19.25 6.35706 19.25 6.125C19.25 5.89294 19.1578 5.67038 18.9937 5.50628C18.8296 5.34219 18.6071 5.25 18.375 5.25H2.625C2.39294 5.25 2.17038 5.34219 2.00628 5.50628C1.84219 5.67038 1.75 5.89294 1.75 6.125C1.75 6.35706 1.84219 6.57962 2.00628 6.74372C2.17038 6.90781 2.39294 7 2.625 7ZM18.375 9.625H2.625C2.39294 9.625 2.17038 9.71719 2.00628 9.88128C1.84219 10.0454 1.75 10.2679 1.75 10.5C1.75 10.7321 1.84219 10.9546 2.00628 11.1187C2.17038 11.2828 2.39294 11.375 2.625 11.375H18.375C18.6071 11.375 18.8296 11.2828 18.9937 11.1187C19.1578 10.9546 19.25 10.7321 19.25 10.5C19.25 10.2679 19.1578 10.0454 18.9937 9.88128C18.8296 9.71719 18.6071 9.625 18.375 9.625Z"
								fill="#E8610F" />
						</svg>
						<span>Каталог</span>
					</div>
					<div class="header__cat-btn isClose isHide button button__all-link">
						<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M11.7337 10.4999L17.2462 4.99617C17.411 4.8314 17.5035 4.60793 17.5035 4.37492C17.5035 4.1419 17.411 3.91843 17.2462 3.75367C17.0814 3.5889 16.858 3.49634 16.6249 3.49634C16.3919 3.49634 16.1685 3.5889 16.0037 3.75367L10.4999 9.26617L4.9962 3.75367C4.83143 3.5889 4.60796 3.49634 4.37495 3.49634C4.14193 3.49634 3.91846 3.5889 3.7537 3.75367C3.58893 3.91843 3.49637 4.1419 3.49637 4.37492C3.49637 4.60793 3.58893 4.8314 3.7537 4.99617L9.2662 10.4999L3.7537 16.0037C3.67168 16.085 3.60659 16.1818 3.56217 16.2884C3.51774 16.395 3.49487 16.5094 3.49487 16.6249C3.49487 16.7404 3.51774 16.8548 3.56217 16.9614C3.60659 17.068 3.67168 17.1648 3.7537 17.2462C3.83504 17.3282 3.93182 17.3933 4.03844 17.4377C4.14507 17.4821 4.25944 17.505 4.37495 17.505C4.49046 17.505 4.60482 17.4821 4.71145 17.4377C4.81808 17.3933 4.91485 17.3282 4.9962 17.2462L10.4999 11.7337L16.0037 17.2462C16.085 17.3282 16.1818 17.3933 16.2884 17.4377C16.3951 17.4821 16.5094 17.505 16.6249 17.505C16.7405 17.505 16.8548 17.4821 16.9615 17.4377C17.0681 17.3933 17.1649 17.3282 17.2462 17.2462C17.3282 17.1648 17.3933 17.068 17.4377 16.9614C17.4821 16.8548 17.505 16.7404 17.505 16.6249C17.505 16.5094 17.4821 16.395 17.4377 16.2884C17.3933 16.1818 17.3282 16.085 17.2462 16.0037L11.7337 10.4999Z"
								fill="white" />
						</svg>
						<span>Закрыть</span>
					</div>
					<div class="header__search">
						<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
					</div>
					<a href="#" class="header__cart button button__all-link">
						<svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M17.4996 22.9999C17.8311 22.9999 18.1491 22.8682 18.3835 22.6338C18.6179 22.3994 18.7496 22.0815 18.7496 21.7499V19.2499C18.7496 18.9184 18.6179 18.6005 18.3835 18.3661C18.1491 18.1316 17.8311 17.9999 17.4996 17.9999C17.1681 17.9999 16.8502 18.1316 16.6157 18.3661C16.3813 18.6005 16.2496 18.9184 16.2496 19.2499V21.7499C16.2496 22.0815 16.3813 22.3994 16.6157 22.6338C16.8502 22.8682 17.1681 22.9999 17.4996 22.9999ZM12.4996 22.9999C12.8311 22.9999 13.1491 22.8682 13.3835 22.6338C13.6179 22.3994 13.7496 22.0815 13.7496 21.7499V19.2499C13.7496 18.9184 13.6179 18.6005 13.3835 18.3661C13.1491 18.1316 12.8311 17.9999 12.4996 17.9999C12.1681 17.9999 11.8502 18.1316 11.6157 18.3661C11.3813 18.6005 11.2496 18.9184 11.2496 19.2499V21.7499C11.2496 22.0815 11.3813 22.3994 11.6157 22.6338C11.8502 22.8682 12.1681 22.9999 12.4996 22.9999ZM23.7496 7.99994H22.0246L19.8621 3.68744C19.796 3.52876 19.6979 3.38541 19.574 3.26635C19.45 3.14729 19.3028 3.05509 19.1415 2.99549C18.9803 2.9359 18.8085 2.9102 18.6369 2.92C18.4653 2.9298 18.2975 2.97489 18.1441 3.05245C17.9907 3.13001 17.855 3.23838 17.7454 3.37078C17.6357 3.50318 17.5546 3.65676 17.507 3.82193C17.4594 3.98711 17.4464 4.16032 17.4688 4.33075C17.4912 4.50118 17.5485 4.66516 17.6371 4.81244L19.2246 7.99994H10.7746L12.3621 4.81244C12.4834 4.52108 12.4901 4.1946 12.3806 3.89855C12.2712 3.60251 12.0539 3.35881 11.7722 3.2164C11.4905 3.07399 11.1654 3.04339 10.8621 3.13077C10.5589 3.21814 10.2998 3.41701 10.1371 3.68744L7.97462 7.99994H6.24962C5.36611 8.01338 4.51571 8.33838 3.84843 8.91761C3.18115 9.49684 2.73984 10.2931 2.60233 11.166C2.46483 12.0388 2.63996 12.9322 3.09685 13.6885C3.55374 14.4448 4.26303 15.0155 5.09962 15.2999L6.02462 24.6249C6.1179 25.5532 6.5538 26.4133 7.24721 27.0373C7.94062 27.6614 8.84174 28.0046 9.77462 27.9999H20.2496C21.1825 28.0046 22.0836 27.6614 22.777 27.0373C23.4704 26.4133 23.9063 25.5532 23.9996 24.6249L24.9246 15.2999C25.763 15.0147 26.4734 14.4419 26.93 13.683C27.3866 12.9242 27.5598 12.0282 27.4191 11.1539C27.2783 10.2795 26.8327 9.48318 26.1611 8.90591C25.4895 8.32865 24.6352 8.00771 23.7496 7.99994ZM21.4871 24.3749C21.456 24.6843 21.3107 24.9711 21.0796 25.1791C20.8485 25.3871 20.5481 25.5015 20.2371 25.4999H9.76212C9.45116 25.5015 9.15079 25.3871 8.91965 25.1791C8.68851 24.9711 8.54321 24.6843 8.51212 24.3749L7.62462 15.4999H22.3746L21.4871 24.3749ZM23.7496 12.9999H6.24962C5.9181 12.9999 5.60016 12.8682 5.36574 12.6338C5.13132 12.3994 4.99962 12.0815 4.99962 11.7499C4.99962 11.4184 5.13132 11.1005 5.36574 10.8661C5.60016 10.6316 5.9181 10.4999 6.24962 10.4999H23.7496C24.0811 10.4999 24.3991 10.6316 24.6335 10.8661C24.8679 11.1005 24.9996 11.4184 24.9996 11.7499C24.9996 12.0815 24.8679 12.3994 24.6335 12.6338C24.3991 12.8682 24.0811 12.9999 23.7496 12.9999Z"
								fill="#F1752A" />
						</svg>
						<span>Корзина</span>
					</a>
					<div class="header__info">
						<? if (!empty($site_phone)) { ?>
							<a href="tel:<?= $site_phone; ?>" class="header__tel"><?= $site_phone; ?></a>
						<? }; ?>
						<a href="#" class="header__call button button__link">Заказать звонок</a>
					</div>
				</div>
				<div class="header__bottom">
					<?
						wp_nav_menu( [
							'theme_location'  => '',
							'menu'            => 'Меню в шапке',
							'container'       => 'nav',
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
			</div>
			<div class="header__cat">
				<div class="header__cat--item center_block">
					<div class="header__cat--blocks">
						<? foreach ( $categories as $category ) { ?>  
							<a href="<?= esc_url( get_term_link( $category ) ); ?>" class="header__cat--block">
							<?
								$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
								$image = wp_get_attachment_image( $thumbnail_id, 'medium', false, array( "class" => "img-responsive" ) );

								if ($image) {
							?>
								<div class="header__cat--img">
									<?= $image ?>
								</div>
								<? }; ?>
								<div class="header__cat--info">
									<div class="header__cat--title"><?= $category->name; ?> <sup><?= $category->count; ?></sup></div>
									<div class="header__cat--price">от 350 ₽</div>
								</div>
							</a>
						<? }; ?>
					</div>
				</div>
			</div>
		</header>