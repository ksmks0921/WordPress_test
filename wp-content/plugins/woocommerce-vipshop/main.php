<?php
/*
Plugin Name: Advanced Woocommerce VIP plugin
Plugin URI: http://proword.net/woocommerce_vipshop/
Description: Woocommerce Vipshop For Woocommerce
Author: Proword
Version: 1.2
Author URI: http://support.proword.net/
Text Domain: pw_wc_vipshop
Domain Path: /languages/
*/


/*
	change log
	
	V1.1
		26-12-2016  fixed email for send 
*/
define('plugin_dir_url_wc_advanced_vip', plugin_dir_url( __FILE__ ));
define ('PW_WC_VIP_SHOP_URL',plugin_dir_path( __FILE__ ));
class woocommerce_advanced_gift {

	public function __construct() 
	{
		add_action( 'init' , array( $this, 'woo_advanced_vip_js_css' ) );
		add_action( 'admin_menu', array( $this, 'add_menu' ) );
		
		$this->includes();
		
	}
	public function includes()
	{
		//$u=$this->fused_get_all_user_orders(2);
		require( 'core/calss-wc-roles-category-product.php' );			
		require( 'core/calss-wc-vipshop-user-profile.php' );			
		require( 'core/calss-wc-roles-product.php' );			
		require( 'core/calss-wc-admin-rule-single-product.php' );			
	}
	public function woo_advanced_vip_js_css()
	{
		if(is_admin())
		{
			//Two Side Multi Select
			wp_register_style( 'two-side-multi-select', plugin_dir_url_wc_advanced_vip.'css/two-side-multiselect/jquerysctipttop.css');
			wp_register_style( 'two-side-multi-select-style', plugin_dir_url_wc_advanced_vip.'css/two-side-multiselect/style.css');
			wp_register_style( 'two-side-multi-select-bootstrap', plugin_dir_url_wc_advanced_vip.'css/two-side-multiselect/bootstrap.min.css');

	
			wp_enqueue_style('cart_rule_vip', plugin_dir_url_wc_advanced_vip.'css/admin-css.css');
			
			wp_enqueue_style('pw-vipshop-chosen-style',plugin_dir_url_wc_advanced_vip.'css/chosen/chosen.css', array() , null);
		  
			//JS
			wp_enqueue_script( 'pw-vipshop-chosen-script', plugin_dir_url_wc_advanced_vip.'js/chosen/chosen.jquery.min.js', array( 'jquery' ));		  
			
		    wp_enqueue_script( 'pw-dependsOn-vipshop', plugin_dir_url_wc_advanced_vip.'js/dependsOn-1.0.1.min.js', array( 'jquery' ));

			//Two Side Multi Select	
			//wp_enqueue_script( 'pw-dependsOn-vipshop', plugin_dir_url_wc_advanced_vip.'js/dependsOn-1.0.1.min.js', array( 'jquery' ));			
			wp_enqueue_script('two-side-multi-select-bootstrap-js',plugin_dir_url_wc_advanced_vip.'js/two-side-multiselect/bootstrap.min.js',array( 'jquery' ));
			//wp_enqueue_script('two-side-multi-select-jquery-js',plugin_dir_url_wc_advanced_vip.'js/two-side-multiselect/jquery-1.11.2.min.js',array( 'jquery' ));
			wp_enqueue_script('two-side-multi-select-js',plugin_dir_url_wc_advanced_vip.'js/two-side-multiselect/multiselect.js',array( 'jquery' ));
		}
		else
		{
			
		}			
	}		
	private function show_level_tab() {
		$current_tab = (isset($_GET['tab'])) ? $_GET['tab'] : 'vip_rules';
		$tabs=array(
			array('name'=>"VIP Rule",'url'=>"vip_rules"),
			array('name'=>"VIP Email",'url'=>"email"),
			array('name'=>"Customer List",'url'=>"users"),
			array('name'=>"Settings",'url'=>"setting"),
		);
		echo '<h2>';
		foreach ($tabs as $name =>$a) {
			echo '<a href="' . admin_url('admin.php?page=vip_rules&tab=' . $a['url'] .'&pw_action_type=list') . '" class="nav-tab ';
			if ($current_tab == $a['url'])
				echo 'nav-tab-active';
			echo '">' .$a['name'] . '</a>';
		}
		echo '</h2>';
		if(@$_GET['tab']=="localization")
		{
			require( 'core/admin/localization.php' );
		}
		if(@$_GET['tab']=="email")
		{
			require( 'core/admin/email.php' );
		}
		else if(@$_GET['tab']=="setting")
		{
			require( 'core/admin/setting.php' );
		}
		else if(@$_GET['tab']=="users")
		{
			require( 'core/admin/users.php' );
		}
		else
		{
			if(@$_GET['pw_action_type']=="list_product")
			{
			}
			require( 'core/admin/add_edit_rule.php' );
		}
		echo '<input type="hidden" name="page" value="' . esc_attr( $_REQUEST['page'] ) . '" />';		
		
	}
	public function show_sub_menu_page() {

		$current_tab = ( empty( $_GET['page'] ) ) ? 'vip_rules' : urldecode( $_GET['page'] );
		if( 'vip_rules' === $current_tab)
			$this->show_level_tab();
	}

	public function add_menu() {
		$this->page_id = add_submenu_page(
			'woocommerce',
			__( 'VIP Shop', 'pw_wc_vipshop' ),
			__( 'VIP Shop', 'pw_wc_vipshop' ),
			'manage_woocommerce',
			'vip_rules',
			array( $this, 'show_sub_menu_page' )
		);
	}
	


}
new woocommerce_advanced_gift();




		function fused_get_all_user_ordersdd($user_id){
			//if(!$user_id)return false;

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
		
function fused_get_all_user_ordersd($user_id,$status='completed'){
    if(!$user_id)
        return false;
    
    $orders=array();//order ids
     
    $args = array(
        'numberposts'     => -1,
        'meta_key'        => '_customer_user',
        'meta_value'      => $user_id,
        'post_type'       => 'shop_order',
        'post_status'     => 'publish',
        'tax_query'=>array(
                array(
                    'taxonomy'  =>'shop_order_status',
                    'field'     => 'slug',
                    'terms'     =>$status
                    )
        )  
    );
    
    $posts=get_posts($args);
    //get the post ids as order ids
    $orders=wp_list_pluck( $posts, 'ID' );
    
    return $orders;
 
}

//add_action('init','sales_order_count_value');
		function sales_order_count_value(){
			global $wpdb;		

  //    return false;
		//$order_ids=fused_get_all_user_orders(2);
	return ;
  $result = $wpdb->get_row("
      SELECT SUM(pm.meta_value) AS total_sales
      FROM $wpdb->posts AS p
      LEFT JOIN $wpdb->postmeta AS pm ON (p.ID = pm.post_id AND pm.meta_key = 'total_sales') 
      WHERE p.post_type = 'product'
  ");
  echo $result->total_sales;
			/*Today*/
		$sql = "SELECT 
					SUM(postmeta.meta_value)AS 'OrderTotal' 
					,COUNT(*) AS 'OrderCount'
					,'Today' AS 'SalesOrder'
					
					FROM {$wpdb->prefix}postmeta as postmeta 
					LEFT JOIN  {$wpdb->prefix}posts as posts ON posts.ID=postmeta.post_id
					
					WHERE meta_key='_order_total' 
					AND DATE(posts.post_date) = DATE(NOW())";
				 
			$sql .= "	 UNION ";
			/*Yesterday*/
		    $sql .= "	 SELECT 
					SUM(postmeta.meta_value)AS 'OrderTotal' 
					,COUNT(*) AS 'OrderCount'
					,'Yesterday' AS 'Sales Order'
					
					FROM {$wpdb->prefix}postmeta as postmeta 
					LEFT JOIN  {$wpdb->prefix}posts as posts ON posts.ID=postmeta.post_id
					
					WHERE meta_key='_order_total' 
						AND  DATE(posts.post_date)= DATE(DATE_SUB(NOW(), INTERVAL 1 DAY))
						
						";
						
			$sql .= "	 UNION ";	
			/*Week*/		
			$sql .= " SELECT 
					SUM(postmeta.meta_value)AS 'OrderTotal' 
					,COUNT(*) AS 'OrderCount'
					,'Week' AS 'Sales Order'
					
					FROM {$wpdb->prefix}postmeta as postmeta 
					LEFT JOIN  {$wpdb->prefix}posts as posts ON posts.ID=postmeta.post_id
					
					WHERE meta_key='_order_total' 
						
				 	AND WEEK(DATE(CURDATE())) = WEEK( DATE(posts.post_date))
					";
			/*Month*/	
			$sql .= "	 UNION ";		
			
			$sql .= "SELECT 
					SUM(postmeta.meta_value)AS 'OrderTotal' 
					,COUNT(*) AS 'OrderCount'
					,'Month' AS 'Sales Order'
					
					FROM {$wpdb->prefix}postmeta as postmeta 
					LEFT JOIN  {$wpdb->prefix}posts as posts ON posts.ID=postmeta.post_id
					
					WHERE meta_key='_order_total' 
				 	AND MONTH(DATE(CURDATE())) = MONTH( DATE(posts.post_date))
					
					AND YEAR(DATE(CURDATE())) = YEAR( DATE(posts.post_date))
					";
					
					
			/*Year*/		
			$sql .= "	 UNION ";	
			
			$sql .= "SELECT 
					SUM(postmeta.meta_value)AS 'OrderTotal' 
					,COUNT(*) AS 'OrderCount'
					,'Year' AS 'Sales Order'
					
					FROM {$wpdb->prefix}postmeta as postmeta 
					LEFT JOIN  {$wpdb->prefix}posts as posts ON posts.ID=postmeta.post_id
					
					WHERE meta_key='_order_total' 
				 	AND YEAR(DATE(CURDATE())) = YEAR( DATE(posts.post_date))
					
					";
					$order_items = $wpdb->get_results($sql ); 				
				/*		foreach ( $order_items as $key => $order_item ) {
						if($key%2 == 1){$alternate = "alternate ";}else{$alternate = "";};
					
						<tr class="<?php echo $alternate."row_".$key;?>">
							<td><?php echo $order_item->SalesOrder?></td><br/>
							<td><?php echo $order_item->OrderCount?></td><br/>
							<td class="amount"><?php echo woocommerce_price($order_item->OrderTotal);?></td><br/>
						</tr>
					 <?php ?>
					 } */ 
					 
			//global $wpdb;
			//$per_page = apply_filters( 'wcismispro_top_customer_per_page', $this->per_page);
			$sql = "SELECT SUM(postmeta.meta_value) AS 'Total' 
							,postmeta4.meta_value AS '_customer_user'
							,postmeta3.meta_value AS 'BillingEmail'
							,postmeta2.meta_value AS 'BillingFirstName'
							,Count(*) AS 'OrderCount'
					FROM {$wpdb->prefix}postmeta as postmeta 
					LEFT JOIN  {$wpdb->prefix}postmeta as postmeta3 ON postmeta3.post_id=postmeta.post_id
					LEFT JOIN  {$wpdb->prefix}postmeta as postmeta2 ON postmeta2.post_id=postmeta.post_id
					LEFT JOIN  {$wpdb->prefix}postmeta as postmeta4 ON postmeta4.post_id=postmeta.post_id
					WHERE  postmeta.meta_key='_order_total' AND postmeta4.meta_key='_customer_user' AND  postmeta3.meta_key='_billing_email' AND postmeta4.meta_value='2' AND postmeta2.meta_key='_billing_first_name' 
			 		GROUP BY  postmeta3.meta_value 
					Order By Total DESC";
					//print_r($sql);
			$order_items = $wpdb->get_results($sql );
			//if(count($order_items)>0)
				//ok go
			   foreach ( $order_items as $key => $order_item ) {
				   print_r($order_item);
				   echo '<br/>';
				   //echo woocommerce_price($order_item->Total);
			   }
			
		}
?>