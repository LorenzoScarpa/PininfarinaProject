<?php 
	$public_authority = add_role( 
				'public_authority', 
				__('Public Authority' ),
				array('read' => true)
			);

  	$public_authority = get_role('public_authority');
	$public_authority->add_cap('should_not_pay');

	$role = get_role( 'customer' );
  	$role->remove_cap( 'should_not_pay' );


	function return_custom_price($price, $product) 
	{
	    if (current_user_can('should_not_pay')) 
			return 0;
		else
			return $price;
	}

	function hide_price_html( $price, $product ) 
	{
		if (current_user_can('should_not_pay'))
			$price = "";
		return $price;
	}

	add_filter('woocommerce_get_price', 'return_custom_price', 10, 2);
	add_filter( 'woocommerce_get_price_html', 'hide_price_html', 10, 2);
