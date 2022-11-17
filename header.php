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
	<!-- <link rel="stylesheet" href="<?= get_template_directory_uri();?>/css/animate.css">
	<script src="<?= get_template_directory_uri();?>/js/wow.min.js"></script> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="wrapper" id="app">
	<div class="preloader" :class="{isLoaded}">
		<div class="preloader__in">
			<img src="<?= get_template_directory_uri();?>/src/dist/img/preloader.svg" width="100%">
		</div>
	</div>
		<header class="header">
			<div class="header__in center_block">
				<div class="header__top">
					<div class="site-panel-wrap" v-if="sizes.window < 1023">
						<div class="burger-wrap" :class="{'opened': headerBlock.isBurgerOpened}">
							<div class="burger-btn" @click="headerBlock.burgCatClick.apply(headerBlock)" :class="{'isOpened': headerBlock.isBurgerOpened}"></div>
							<div class="burger-body">
								<div class="burger-body__top">
									<div class="burger-close-btn" @click="headerBlock.burgCatClick.apply(headerBlock)"></div>
									<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
								</div>
								<div class="burger-body__catalog" @click="headerBlock.catalogClick.apply(headerBlock)" :class="{'isOpened': headerBlock.isCategoriesOpened}">каталог</div>
								<div class="burger-body__cat-block" :class="{'isOpened': headerBlock.isCategoriesOpened}">
									<div class="header__cat--blocks">
										<? foreach ( $categories as $category ) { ?>    
											<? if ($category->name != 'Misc'): ?>                        
												<a href="<?= esc_url( get_term_link( $category ) ); ?>" class="header__cat--block">
												<?
													$thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
													$image = wp_get_attachment_image( $thumbnail_id, 'large', false, array( "class" => "img-responsive" ) );

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
											<? endif; ?>
										<? }; ?>
									</div>
								</div>
								<?
									wp_nav_menu( [
										'theme_location'  => '',
										'menu'            => 'Меню в шапке',
										'container'       => 'nav',
										'container_class' => 'slide-menu',
										'container_id'    => 'example-menu',
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
					<div class="header__cat-btn isOpen button button__all-link" v-if="sizes.window > 1023 && !headerBlock.isCategoriesOpened" @click="headerBlock.catalogClick.apply(headerBlock)">
						<svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M11.375 14H2.625C2.39294 14 2.17038 14.0922 2.00628 14.2563C1.84219 14.4204 1.75 14.6429 1.75 14.875C1.75 15.1071 1.84219 15.3296 2.00628 15.4937C2.17038 15.6578 2.39294 15.75 2.625 15.75H11.375C11.6071 15.75 11.8296 15.6578 11.9937 15.4937C12.1578 15.3296 12.25 15.1071 12.25 14.875C12.25 14.6429 12.1578 14.4204 11.9937 14.2563C11.8296 14.0922 11.6071 14 11.375 14ZM2.625 7H18.375C18.6071 7 18.8296 6.90781 18.9937 6.74372C19.1578 6.57962 19.25 6.35706 19.25 6.125C19.25 5.89294 19.1578 5.67038 18.9937 5.50628C18.8296 5.34219 18.6071 5.25 18.375 5.25H2.625C2.39294 5.25 2.17038 5.34219 2.00628 5.50628C1.84219 5.67038 1.75 5.89294 1.75 6.125C1.75 6.35706 1.84219 6.57962 2.00628 6.74372C2.17038 6.90781 2.39294 7 2.625 7ZM18.375 9.625H2.625C2.39294 9.625 2.17038 9.71719 2.00628 9.88128C1.84219 10.0454 1.75 10.2679 1.75 10.5C1.75 10.7321 1.84219 10.9546 2.00628 11.1187C2.17038 11.2828 2.39294 11.375 2.625 11.375H18.375C18.6071 11.375 18.8296 11.2828 18.9937 11.1187C19.1578 10.9546 19.25 10.7321 19.25 10.5C19.25 10.2679 19.1578 10.0454 18.9937 9.88128C18.8296 9.71719 18.6071 9.625 18.375 9.625Z"
								fill="#E8610F" />
						</svg>
						<span>Каталог</span>
					</div>
					<div class="header__cat-btn isClose button button__all-link" v-if="sizes.window > 1023 && headerBlock.isCategoriesOpened" @click="headerBlock.catalogClick.apply(headerBlock)">
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
					<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
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
			<div class="header__cat" v-if="sizes.window > 1023" :class="{'isOpened': headerBlock.isCategoriesOpened}">
				<div class="header__cat--item center_block">
					<div class="header__cat--blocks">
						<? foreach ( $categories as $category ) { ?> 
							<? if ($category->name != 'Misc'): ?> 
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
							<? endif; ?>
						<? }; ?>
					</div>
				</div>
			</div>
		</header>