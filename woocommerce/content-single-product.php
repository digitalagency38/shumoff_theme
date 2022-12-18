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
		#do_action( 'woocommerce_before_single_product_summary' );
		?>
		<div class="product__left">
			<!-- <div class="product__play">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 12 14" fill="none">
					<path d="M10.9994 6.42008L1.66602 1.03341C1.56467 0.974896 1.44971 0.944092 1.33269 0.944092C1.21566 0.944092 1.1007 0.974896 0.999354 1.03341C0.897618 1.09214 0.813208 1.17672 0.754673 1.27857C0.696137 1.38042 0.665555 1.49593 0.666021 1.61341V12.3867C0.665555 12.5042 0.696137 12.6197 0.754673 12.7216C0.813208 12.8234 0.897618 12.908 0.999354 12.9667C1.1007 13.0253 1.21566 13.0561 1.33269 13.0561C1.44971 13.0561 1.56467 13.0253 1.66602 12.9667L10.9994 7.58008C11.102 7.52193 11.1873 7.43761 11.2467 7.33572C11.306 7.23382 11.3373 7.118 11.3373 7.00008C11.3373 6.88215 11.306 6.76633 11.2467 6.66443C11.1873 6.56254 11.102 6.47822 10.9994 6.42008ZM1.99935 11.2334V2.76674L9.33269 7.00008L1.99935 11.2334Z"/>
				</svg>
			</div> -->
			<div class="glide product__gallery">
				<div class="product__gallery--track glide__track" data-glide-el="track">
					<div class="product__gallery--slides glide__slides" id="lightgallery">
						<?
							$attachment_ids = $product->get_gallery_image_ids();
							$id = $product->get_image_id();
							$product_image_url = wp_get_attachment_url( $id );
						?>
							<!-- <a href="<?= $product_image_url; ?>" data-src="<?= $product_image_url; ?>" class="product__gallery--slide glide__slide"> -->
							<span class="product__gallery--slide glide__slide">
								<div class="product__gallery--slide_in">
									<img src="<?= $product_image_url; ?>" alt="">
								</div>
							</span>
							<!-- </a> -->
						<?
							foreach( $attachment_ids as $attachment_id ):
								$image_link = wp_get_attachment_url( $attachment_id );
						?>
							<!-- <a href="<?= $image_link; ?>" class="product__gallery--slide glide__slide"> -->
							<span class="product__gallery--slide glide__slide">
								<div class="product__gallery--slide_in">
									<img src="<?= $image_link; ?>" alt="">
								</div>
							</span>
							<!-- </a> -->
						<?
							endforeach;
						?>
					</div>
				</div>
			</div>
			<? if (count($product->get_gallery_image_ids()) > 1): ?>
				<div class="product__thumbnails--wrap">
					<div class="glide product__thumbnails">
						<div class="product__thumbnails--track glide__track" data-glide-el="track">
							<ul class="product__thumbnails--slides glide__slides">
								<li class="product__thumbnails--slide glide__slide">
									<div class="product__thumbnails--slide_in" @click="productPage.gallery.go('=0'); productPage.thumbs.go('=0')">
										<img src="<?= $product_image_url; ?>" alt="">
									</div>
								</li>
								<?
									foreach( $attachment_ids as $key=>$attachment_id ):
										$image_link = wp_get_attachment_url( $attachment_id );
								?>									
									<li class="product__thumbnails--slide glide__slide">
										<div class="product__thumbnails--slide_in" @click="productPage.gallery.go('=<?= $key+1; ?>'); productPage.thumbs.go('=<?= $key; ?>')">
											<img src="<?= $image_link; ?>" alt="">
										</div>
									</li>
								<?
									endforeach;
								?>
							</ul>
						</div>
						
					</div>
					<div class="product__thumbnails--arrows glide__arrows">
						<!-- <button class="product__thumbnails--arrow glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
						<button class="product__thumbnails--arrow glide__arrow glide__arrow--right" data-glide-dir=">">next</button> -->
						<div class="button button__all-arrow product__thumbnails--arrow glide__arrow--left" :class="{'': productPage.thumbs.index === 0}" @click="productPage.thumbs.go('<')"><svg class="ln"><rect x="0" y="0" fill="none" width="100%" height="100%"></rect></svg> <svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ar"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z" fill="#333333"></path></svg></div>
						<div class="button button__all-arrow product__thumbnails--arrow glide__arrow--right" :class="{'': productPage.thumbs.index === <?= count($product->get_gallery_image_ids()) - 2; ?>}" @click="productPage.thumbs.go('>')"><svg class="ln"><rect x="0" y="0" fill="none" width="100%" height="100%"></rect></svg> <svg width="13" height="24" viewBox="0 0 13 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ar"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.60759 11.9996L0.0664062 3.99962V0.799622L12.0664 11.9996L0.0664062 23.1996V19.9996L8.60759 11.9996Z" fill="#333333"></path></svg></div>
					</div>
				</div>
			<?endif?>
		</div>
		
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
							if ($attribute['visible']):
					?>
						<div class="attribute">
							<div class="left"><?= $attr->name; ?></div>
							<div class="right"><?= $attr_value = $product->get_attribute( $attribute['name'] );?></div>
						</div>
						<?endif;?>
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
