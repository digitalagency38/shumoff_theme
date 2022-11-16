<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.3
 */

defined( 'ABSPATH' ) || exit;

if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}

?>

<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>
		<ul class="wc_payment_methods payment_methods methods">
			<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
				}
			} else {
				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
			}
			?>
		</ul>
	<?php endif; ?>
	<div class="form-row place-order">
		<noscript>
			<?php
			/* translators: $1 and $2 opening and closing emphasis tags respectively */
			printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
			?>
			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
		</noscript>

		<?php wc_get_template( 'checkout/terms.php' ); ?>

		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button button__all-link" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '"><svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none"> <path d="M11.2491 14.75C11.4812 14.75 11.7038 14.6578 11.8679 14.4937C12.032 14.3296 12.1241 14.1071 12.1241 13.875V12.125C12.1241 11.8929 12.032 11.6704 11.8679 11.5063C11.7038 11.3422 11.4812 11.25 11.2491 11.25C11.0171 11.25 10.7945 11.3422 10.6304 11.5063C10.4663 11.6704 10.3741 11.8929 10.3741 12.125V13.875C10.3741 14.1071 10.4663 14.3296 10.6304 14.4937C10.7945 14.6578 11.0171 14.75 11.2491 14.75ZM7.74915 14.75C7.98121 14.75 8.20377 14.6578 8.36787 14.4937C8.53196 14.3296 8.62415 14.1071 8.62415 13.875V12.125C8.62415 11.8929 8.53196 11.6704 8.36787 11.5063C8.20377 11.3422 7.98121 11.25 7.74915 11.25C7.51708 11.25 7.29452 11.3422 7.13043 11.5063C6.96633 11.6704 6.87415 11.8929 6.87415 12.125V13.875C6.87415 14.1071 6.96633 14.3296 7.13043 14.4937C7.29452 14.6578 7.51708 14.75 7.74915 14.75ZM15.6241 4.25001H14.4166L12.9029 1.23126C12.8566 1.12018 12.788 1.01984 12.7012 0.936495C12.6144 0.853155 12.5114 0.788611 12.3985 0.746895C12.2856 0.70518 12.1654 0.68719 12.0452 0.69405C11.9251 0.70091 11.8077 0.732473 11.7003 0.786766C11.5929 0.841059 11.4979 0.916914 11.4212 1.00959C11.3444 1.10227 11.2876 1.20978 11.2543 1.3254C11.221 1.44103 11.2119 1.56227 11.2276 1.68157C11.2433 1.80087 11.2834 1.91566 11.3454 2.01876L12.4566 4.25001H6.54165L7.6529 2.01876C7.73783 1.8148 7.74246 1.58627 7.66587 1.37903C7.58927 1.1718 7.43712 1.00122 7.23995 0.901528C7.04279 0.801839 6.81521 0.780425 6.60291 0.841585C6.39061 0.902746 6.20931 1.04195 6.0954 1.23126L4.58165 4.25001H3.37415C2.75569 4.25942 2.16041 4.48691 1.69332 4.89237C1.22622 5.29784 0.917299 5.85522 0.821046 6.46622C0.724794 7.07721 0.847389 7.70257 1.16721 8.232C1.48703 8.76143 1.98353 9.16092 2.56915 9.36001L3.21665 15.8875C3.28194 16.5373 3.58707 17.1393 4.07246 17.5762C4.55785 18.013 5.18863 18.2533 5.84165 18.25H13.1741C13.8272 18.2533 14.4579 18.013 14.9433 17.5762C15.4287 17.1393 15.7339 16.5373 15.7991 15.8875L16.4466 9.36001C17.0335 9.16033 17.5308 8.75938 17.8504 8.22818C18.17 7.69698 18.2913 7.06981 18.1928 6.45776C18.0943 5.84571 17.7823 5.28827 17.3122 4.88419C16.842 4.4801 16.2441 4.25544 15.6241 4.25001ZM14.0404 15.7125C14.0186 15.9291 13.9169 16.1298 13.7551 16.2754C13.5933 16.421 13.3831 16.5011 13.1654 16.5H5.8329C5.61523 16.5011 5.40496 16.421 5.24317 16.2754C5.08137 16.1298 4.97966 15.9291 4.9579 15.7125L4.33665 9.50001H14.6616L14.0404 15.7125ZM15.6241 7.75001H3.37415C3.14208 7.75001 2.91952 7.65782 2.75543 7.49373C2.59133 7.32963 2.49915 7.10707 2.49915 6.87501C2.49915 6.64294 2.59133 6.42038 2.75543 6.25629C2.91952 6.0922 3.14208 6.00001 3.37415 6.00001H15.6241C15.8562 6.00001 16.0788 6.0922 16.2429 6.25629C16.407 6.42038 16.4991 6.64294 16.4991 6.87501C16.4991 7.10707 16.407 7.32963 16.2429 7.49373C16.0788 7.65782 15.8562 7.75001 15.6241 7.75001Z" fill="white"/> </svg><span>' . esc_html( $order_button_text ) . '</span></button>' ); // @codingStandardsIgnoreLine ?>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	</div>
</div>
<?php
if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
