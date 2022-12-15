<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="product__top">

		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="product__summary">
			<h1 class="product__title"><?= $product->get_title(); ?></h1>
			<div class="product__article"><?= $product->get_sku(); ?></div>
			<div class="product__info">
				<div class="title">Описание</div>
				<div class="text"><?= $product->get_short_description(); ?></div>
				<a href="#prod_description" class="header__call button button__link">Читать полное описание</a>
			</div>
			<div class="product__info">
				<div class="title">Характеристики</div>
				<div class="attributes">
					<?
						$attributes = $product->get_attributes();

						foreach ($attributes as $attribute):
						$attr = wc_get_attribute($attribute['id']);
					?>
						<div class="attribute">
							<div class="left"><?= $attr->name; ?></div>
							<div class="right"><?= $attr_value = $product->get_attribute( $attribute['name'] );?></div>
						</div>
					<?endforeach;?>
				</div>
			</div>
		</div>
		<div class="product__right">
			<? 
				if($product->get_type() == "variable"){
					woocommerce_variable_add_to_cart();	
				} else {};
			?>
		</div>
	</div>
	<? if ($product->get_description()): ?>
		<div class="product__description" id="prod_description">
			<div class="product__description_title">Полное описание</div>
			<div class="product__description_value">
				asdas<?= print_r($product->get_description()); ?>
			</div>
		</div>
	<?endif;?>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
	
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
