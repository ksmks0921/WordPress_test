<?php
class class_wc_roles_product {

	/**
	 * Constructor
	 */
	public $clean = false;	 
	public $removed = false;	
	public $check_rule = "";	
	public function __construct() {
		add_filter( 'woocommerce_get_price_html', array(&$this, 'pw_vipshop_price_html'), 99, 2 );
		add_filter( 'woocommerce_sale_flash', array(&$this, 'pw_vipshop_sale_flash'), 99, 3 );		
		
		add_action( 'woocommerce_before_add_to_cart_button', array(&$this, 'vipshop_before_add_to_cart_button'), 0 );
		add_action( 'woocommerce_after_add_to_cart_button', array(&$this, 'on_after_add_to_cart_button'), 998 );

		add_action( 'woocommerce_before_shop_loop_item', array($this, 'vipshop_before_shop_loop_item'), 0 );
		add_action( 'woocommerce_after_shop_loop_item', array(&$this, 'vipshop_after_shop_loop_item'), 0 );
		
	}

	public function vipshop_before_shop_loop_item() {
		global $post, $product;

		if ( $this->removed ) {
			add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		}

		if ( !$this->check_user_can_purchase( $product ) ) {
			$this->removed = true;
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		}
	}

	public function vipshop_after_shop_loop_item() {
		global $post, $product;
		if ( is_single() )
		{
			if ( !$this->check_user_can_purchase( $product ) ) {
			
				$setting=get_option("pw_vipshop_setting");
				(!isset($setting['add_to_cart_text_single']) ? $setting['add_to_cart_text_single']="" : "" );	
				
				$label = wptexturize( $setting['add_to_cart_text_single'] );
				if ( empty( $label ) ) {
					return;
				}
				$link = get_permalink( $post->ID );
				echo apply_filters( 'vipshop_add_to_cart_link', sprintf( '<a href="%s" data-product_id="%s" class="button product_type_%s">%s</a>', $link, $product->get_id(), $product->product_type, $label ) );
			}
		}
	}
	
	public function on_after_add_to_cart_button() {
		global $product;

		if ( !$this->check_user_can_view_price( $product ) || !$this->check_user_can_purchase( $product ) ) {
			ob_end_clean();
		} else {
			return;
		}
		
		$setting=get_option("pw_vipshop_setting");
		(!isset($setting['add_to_cart_text_single']) ? $setting['add_to_cart_text_single']="" : "" );
		
		// for Variable product price
		if ( $product->is_type( 'variable' ) ) {
			if ( !$this->check_user_can_view_price( $product ) ) {
				?>
				<div class="single_variation_wrap" style="display:none;">
					<div class="variations_button">
						<input type="hidden" name="variation_id" value="" />
					</div>
				</div>
				<div><input type="hidden" name="product_id" value="<?php echo esc_attr( $product->get_id() ); ?>" /></div>
				<?php
			}
		}

		$html = apply_filters( 'vipshop_add_to_cart_button', wpautop( wptexturize( $setting['add_to_cart_text_single'] ) ), $product );
		echo $html;
	}
	
	public function vipshop_before_add_to_cart_button() {
		global $product;

		if ( !$this->check_user_can_view_price( $product ) || !$this->check_user_can_purchase( $product ) ) {
			$this->clean = ob_start();
		}
	}
	
	public function pw_vipshop_sale_flash( $html, $post, $product ) {
		if ( !$this->check_user_can_view_price( $product ) )
			return '';

		return $html;
	}
	
	public function pw_vipshop_price_html( $html, $_product ) {
		$setting=get_option("pw_vipshop_setting");
		(!isset($setting['price_text_single']) ? $setting['price_text_single']="" : "" );

		if ( !$this->check_user_can_view_price( $_product ) ) {
			return apply_filters( 'vipshop_price_html', wptexturize( $setting['price_text_single']), $_product );
		}

		return $html;
	}

	public function check_user_can_purchase( $product ) {
		$flag=false;
		$view_purchase = get_post_meta( $product->get_id(), 'view_purchase', true );
		$can_view_price=$this->check_user_can_view_price($product);
		if($can_view_price)
		{
			if($view_purchase=="vipshop")
			{
				if ( !is_user_logged_in() )
					return false;
				
				if($this->check_rule=="")
					$flag=$this->check_rule_user();
				else
					$flag=$this->check_rule;
			}
			else
			{
				$flag=true;
				$product_cats = wp_get_post_terms( $product->get_id(), 'product_cat', array("fields" => "ids"));				
				//print_r($product_cats);
				foreach($product_cats as $cat)
				{
					$view_purchase_cat	= get_woocommerce_term_meta( $cat, 'view_purchase', true );
					if($view_purchase_cat=="vipshop")
					{
						if($this->check_rule=="")
							$flag=$this->check_rule_user();
						else
							$flag=$this->check_rule;						
					}
					else
						$flag=true;
				}
			}
		}
		else
		{
			$flag=false;
		}
		return apply_filters( 'check_user_purchase', $flag, $product );
	}
	
	public function check_rule_user()
	{
		$flag=false;
		$order_count=0;$order_price=0;
		
		$setting=get_option("pw_vipshop_options");
		(!isset($setting['total_purchase']) ? $setting['total_purchase']="no" : "" );
		(!isset($setting['total_amount']) ? $setting['total_amount']="" : "" );
		(!isset($setting['number_purchase']) ? $setting['number_purchase']="no" : "" );
		(!isset($setting['number_amount']) ? $setting['number_amount']="" : "" );	
		(!isset($setting['rule_active']) ? $setting['rule_active']="deactive" : "" );	
		(!isset($setting['users']) ? $setting['users']=array() : "" );

		(!isset($setting['auto_reg']) ? $setting['auto_reg']="no" : "" );		
		if($setting['rule_active']=="deactive")
		{
			$this->check_rule = true;			
			return true;
		}
		if($setting['auto_reg']=="yes")
		{
			$setting['total_purchase']="yes";
			$setting['number_purchase']="yes";
			$setting['number_amount']=0;
			$setting['total_amount']=0;
		}
		
		$wc_vipshop_users = get_user_meta( get_current_user_id(), 'wc_vipshop_users', true );
		if($wc_vipshop_users=="yes")
		{
			$this->check_rule = true;			
			return true;
		}		
		
		$meta=$setting['users'];
		if(in_array(get_current_user_id() ,$meta))
		{
			$this->check_rule = true;			
			return true;
		}
		
		$order_count=$this->get_order_total_user(get_current_user_id());
		$order_price=$this->get_order_total_price_user(get_current_user_id());
		
		if($setting['total_purchase']=="yes" )
		{
			if($setting['total_amount']<=$order_price)
				$flag=true;
			else
			{
				$flag=false;
				$this->check_rule = $flag;
				return $flag;		
			}
		}
		
		if($setting['number_purchase']=="yes")
		{
			if($setting['number_amount']<=$order_count)
				$flag=true;
			else
			{
				$flag=false;
				$this->check_rule = $flag;
				return $flag;
			}		
		}	

		//echo $setting['number_amount'];
	//	if()
	//		$flag=true;
	//	else
	//		$flag=false;

/*		if($flag==true)
			echo 'a';
		else
			echo 'b';
		*/
			
		$this->check_rule = $flag;
		
		return $flag;
	}
	public function check_user_can_view_price( $product ) {
		$view_price = get_post_meta( $product->get_id(), 'view_price', true );
		$flag=false;
		
		if($view_price=="vipshop")
		{
			if ( !is_user_logged_in() )
				return false;
			
			if($this->check_rule=="")
				$flag=$this->check_rule_user();
			else
				$flag=$this->check_rule;
		}
		else
		{
			$flag=true;
			$product_cats = wp_get_post_terms( $product->get_id(), 'product_cat', array("fields" => "ids"));				
			//print_r($product_cats);
			foreach($product_cats as $cat)
			{
				$view_purchase_cat	= get_woocommerce_term_meta( $cat, 'view_price', true );
				if($view_purchase_cat=="vipshop")
				{
					if($this->check_rule=="")
						$flag=$this->check_rule_user();
					else
						$flag=$this->check_rule;						
				}
				else
					$flag=true;
			}
		}
		return apply_filters( 'vipshop_price_html', $flag, $product );
	}

	public function get_order_total_user($user_id)
	{
		global $wpdb;
		
		if ( ! $count = get_user_meta( $user_id, '_order_count', true ) ) {

			$count = $wpdb->get_var( "SELECT COUNT(*)
				FROM $wpdb->posts as posts

				LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id

				WHERE   meta.meta_key       = '_customer_user'
				AND     posts.post_type     IN ('" . implode( "','", wc_get_order_types( 'order-count' ) ) . "')
				AND     posts.post_status   = 'wc-completed'
				AND     meta_value          = $user_id
			" );

			update_user_meta( $user_id, '_order_count', $count );
		}
		return absint( $count );
	}
	
	public function get_order_total_price_user( $user_id )
	{
		global $wpdb;
		if ( ! $spent = get_user_meta( $user_id, '_money_spent', true ) ) {

			$spent = $wpdb->get_var( "SELECT SUM(meta2.meta_value)
				FROM $wpdb->posts as posts

				LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
				LEFT JOIN {$wpdb->postmeta} AS meta2 ON posts.ID = meta2.post_id

				WHERE   meta.meta_key       = '_customer_user'
				AND     meta.meta_value     = $user_id
				AND     posts.post_type     IN ('" . implode( "','", wc_get_order_types( 'reports' ) ) . "')
				AND     posts.post_status   = 'wc-completed'
				AND     meta2.meta_key      = '_order_total'
			" );

			update_user_meta( $user_id, '_money_spent', $spent );
		}
		return $spent;
		//return wc_price( $spent );
	}
	public function get_all_user_orders($user_id)
	{
		if(!$user_id)return false;	
		$user_orderd = query_posts(
			array(
				'post_type'   => 'shop_order', 
				'meta_key'    => '_customer_user', 
				'meta_value'  => $user_id,
				'posts_per_page' => -1,
			)
		);
		/* getting each order of single user..... where order status = completed */
		$c = 0;
		foreach ($user_orderd as $customer_order) {
			$order = new WC_Order();
			$order->populate($customer_order);
			$orderdata = (array) $order;
			if( $orderdata['status'] == 'completed' ){$c++;}
		}
		/* return counted array */
		return $c;
	}	
}
new class_wc_roles_product();



?>