<?php
$pw_action_type=(isset($_GET['pw_action_type'])? $_GET['pw_action_type'] : "list");
if($pw_action_type=="list")
{
?>
	<table class="wp-list-table widefat fixed posts fs-rolelist-tbl" data-page-size="5" data-page-previous-text = "prev" data-filter-text-only = "true" data-page-next-text = "next" cellspacing="0">
			<thead>
				<tr>
					<th scope='col' class='manage-column'  style=""><?php _e('Customer', 'pw_wc_vipshop'); ?></th>
					<th scope='col' class='manage-column'  style=""><?php _e('Add By', 'pw_wc_vipshop'); ?></th>
					<th scope='col' class='manage-column'  style=""><?php _e('Total Order', 'pw_wc_vipshop'); ?></th>
					<th scope='col' class='manage-column'  style=""><?php _e('Count Order', 'pw_wc_vipshop'); ?></th>
				</tr>
			</thead>
			<tbody id="grid_level_result">
			   <?php
				$output="";
					$setting=get_option("pw_vipshop_options");
					(!isset($setting['total_purchase']) ? $setting['total_purchase']="no" : "" );
					(!isset($setting['total_amount']) ? $setting['total_amount']="" : "" );
					(!isset($setting['number_purchase']) ? $setting['number_purchase']="no" : "" );
					(!isset($setting['number_amount']) ? $setting['number_amount']="" : "" );	
					(!isset($setting['rule_active']) ? $setting['rule_active']="deactive" : "" );
					(!isset($setting['users']) ? $setting['users']=array() : "" );
					$meta=$setting['users'];
				foreach(get_users() as $user)
				{
					$flag=false;
					$wc_vipshop_users="";
					$add_by="VIP Rule";
					$order_price=get_order_total_price_user($user->ID);	
					$order_count=get_order_total_user($user->ID);
					$wc_vipshop_users = get_user_meta( $user->ID, 'wc_vipshop_users', true );
					
					if($wc_vipshop_users=="yes")
					{
						$flag=true;
						$add_by="By Code";
					}
					

					
					if($setting['total_purchase']=="yes" && $flag!=true)
						if($setting['total_amount']<=$order_price)
							$flag=true;
						else
							$flag=false;
						
					if($setting['number_purchase']=="yes" && $flag!=true)
						if($setting['number_amount']<=$order_count)
							$flag=true;
						else
							$flag=false;

					if($setting['rule_active']=="deactive")
						$flag=false;


					if(in_array($user->ID ,$meta))
					{
						$add_by="Pre-defined Users";
						$flag=true;
					}

					if($flag==true)
					{
						$output.='
						<tr class="pw_list_rule_tr" id="'.get_the_ID().'">
							<td>ID:'.$user->ID.' '.$user->user_email.'</td>
							<td>'.$add_by.'</td>
							<td>'.$order_price.'</td>
							<td>'.$order_count.'</td>
						</tr>';
					}				
					
					//update_user_meta( $user_id, 'wc_vipshop_users', 0 );
				}
				echo $output;
			   ?>
			</tbody>
	</table>
<?php 
}

function get_order_total_user($user_id)
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
	
function get_order_total_price_user( $user_id )
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
?>