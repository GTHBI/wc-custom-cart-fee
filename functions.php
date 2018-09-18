add_action( 'woocommerce_cart_calculate_fees','handling_fee' );
function handling_fee() {

     if ( is_admin() && ! defined( 'DOING_AJAX' ) )
     return;
     
	 global $woocommerce;
	 $counter = 0;
	 $items = $woocommerce->cart->get_cart_contents_count();
     
	foreach ( $woocommerce->cart->get_cart() as $woo_items => $woo_item ) {
 
    if ( has_term( 'eBook', 'product_cat', $woo_item['product_id'] ) ) {
        $counter += 1;
    }
	}
   
     if($items == $counter){
     $fees = 0.00;}
     else{
     $fees = 1.99;}

     $woocommerce->cart->add_fee( 'Handling', $fees, true, 'standard' );
}
