<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="main_product__block">
	<div class="main_product__img">
		<?= $product->get_image('thumbnail'); ?>
	</div>
	<div class="main_product__info">
		<a href="<?= $product->get_permalink(); ?>" class="main_product__tit"><?= $product->get_name(); ?></a>
		<div class="main_product__price"><?= $product->get_regular_price(); ?> ₽ / лист</div>
		<a href="?add-to-cart=<?= $product->get_id(); ?>" data-quantity="1" data-product_id="<?= $product->get_id(); ?>" data-product_sku="<?= $product->get_sku(); ?>" aria-label="Добавить «<?= $product->get_name(); ?>» в корзину" class="main_product__cart button button__all-line2 product_type_simple add_to_cart_button ajax_add_to_cart" rel="nofollow">
			<svg сlass="ln">
				<rect x="0" y="0" fill="none" width="100%" height="100%" />
			</svg>
			<span>
				<svg class="arrow" width="22" height="22" viewBox="0 0 22 22" fill="none"
					xmlns="http://www.w3.org/2000/svg">
					<path
						d="M12.7498 16.25C12.9818 16.25 13.2044 16.1578 13.3685 15.9937C13.5326 15.8296 13.6248 15.6071 13.6248 15.375V13.625C13.6248 13.3929 13.5326 13.1704 13.3685 13.0063C13.2044 12.8422 12.9818 12.75 12.7498 12.75C12.5177 12.75 12.2951 12.8422 12.131 13.0063C11.9669 13.1704 11.8748 13.3929 11.8748 13.625V15.375C11.8748 15.6071 11.9669 15.8296 12.131 15.9937C12.2951 16.1578 12.5177 16.25 12.7498 16.25ZM9.24976 16.25C9.48182 16.25 9.70438 16.1578 9.86848 15.9937C10.0326 15.8296 10.1248 15.6071 10.1248 15.375V13.625C10.1248 13.3929 10.0326 13.1704 9.86848 13.0063C9.70438 12.8422 9.48182 12.75 9.24976 12.75C9.01769 12.75 8.79513 12.8422 8.63104 13.0063C8.46694 13.1704 8.37476 13.3929 8.37476 13.625V15.375C8.37476 15.6071 8.46694 15.8296 8.63104 15.9937C8.79513 16.1578 9.01769 16.25 9.24976 16.25ZM17.1248 5.75H15.9173L14.4035 2.73125C14.3573 2.62017 14.2886 2.51983 14.2018 2.43649C14.115 2.35315 14.012 2.28861 13.8991 2.24689C13.7862 2.20517 13.666 2.18718 13.5459 2.19404C13.4257 2.2009 13.3083 2.23247 13.2009 2.28676C13.0935 2.34105 12.9985 2.41691 12.9218 2.50959C12.845 2.60227 12.7882 2.70978 12.7549 2.8254C12.7216 2.94102 12.7125 3.06227 12.7282 3.18157C12.7439 3.30087 12.784 3.41565 12.846 3.51875L13.9573 5.75H8.04226L9.15351 3.51875C9.23844 3.3148 9.24307 3.08626 9.16648 2.87903C9.08988 2.6718 8.93773 2.50121 8.74056 2.40152C8.5434 2.30183 8.31582 2.28042 8.10352 2.34158C7.89122 2.40274 7.70992 2.54195 7.59601 2.73125L6.08226 5.75H4.87476C4.2563 5.75941 3.66102 5.98691 3.19393 6.39237C2.72683 6.79783 2.41791 7.35521 2.32166 7.96621C2.2254 8.57721 2.348 9.20257 2.66782 9.732C2.98764 10.2614 3.48414 10.6609 4.06976 10.86L4.71726 17.3875C4.78255 18.0373 5.08768 18.6393 5.57307 19.0762C6.05846 19.513 6.68924 19.7533 7.34226 19.75H14.6748C15.3278 19.7533 15.9586 19.513 16.4439 19.0762C16.9293 18.6393 17.2345 18.0373 17.2998 17.3875L17.9473 10.86C18.5341 10.6603 19.0314 10.2594 19.351 9.72817C19.6706 9.19697 19.7919 8.56981 19.6934 7.95775C19.5949 7.3457 19.2829 6.78827 18.8128 6.38418C18.3426 5.98009 17.7447 5.75544 17.1248 5.75ZM15.541 17.2125C15.5192 17.4291 15.4175 17.6298 15.2557 17.7754C15.0939 17.921 14.8837 18.0011 14.666 18H7.33351C7.11584 18.0011 6.90557 17.921 6.74378 17.7754C6.58198 17.6298 6.48027 17.4291 6.45851 17.2125L5.83726 11H16.1623L15.541 17.2125ZM17.1248 9.25H4.87476C4.64269 9.25 4.42013 9.15782 4.25604 8.99372C4.09195 8.82963 3.99976 8.60707 3.99976 8.375C3.99976 8.14294 4.09195 7.92038 4.25604 7.75628C4.42013 7.59219 4.64269 7.5 4.87476 7.5H17.1248C17.3568 7.5 17.5794 7.59219 17.7435 7.75628C17.9076 7.92038 17.9998 8.14294 17.9998 8.375C17.9998 8.60707 17.9076 8.82963 17.7435 8.99372C17.5794 9.15782 17.3568 9.25 17.1248 9.25Z"
						fill="#111111" />
				</svg>
				Добавить в корзину
			</span>
		</a>
	</div>
</div>
