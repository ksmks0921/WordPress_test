<?php
global $wpdb;
$status=$pw_name=$pw_rule_description=$pw_gifts=$product_depends=$pw_product_depends=$category_depends=$pw_category_depends=$users_depends=$roles_depends=$pw_roles=$pw_users=$pw_cart_amount=$pw_from=$pw_to=$criteria_nb_products=$gift_preselector_product_page="";

if(@$_GET['pw_action_type']=="add" || @$_GET['pw_action_type']=="edit" || @$_GET['pw_action_type']=="delete" || @$_GET['pw_action_type']=="status")
{
	if(@$_POST['pw_action_type']=='add' || @$_POST['pw_action_type']=='' && isset($_POST['pw_id']))
	{
		include_once (PW_WC_VIP_SHOP_URL.'/core/admin/add_rule.php') ;
		?>
		<script type="text/javascript">
			window.location="<?php echo admin_url( 'admin.php?page=rule_gift');?>";
		</script>';	
		<?php			
	}
	else if(@$_POST['pw_action_type']=='edit' && isset($_POST['pw_name']))
	{
		include_once (PW_WC_VIP_SHOP_URL.'/core/admin/edit_rule.php') ;
	}
	else if(@$_GET['pw_action_type']=='delete' && isset($_GET['pw_id']))
	{
		wp_delete_post($_GET['pw_id']);
		?>
		<script type="text/javascript">
			window.location="<?php echo admin_url( 'admin.php?page=rule_gift');?>";
		</script>';	
		<?php
	//	header('Location:'.admin_url( 'admin.php?page=rule_list'));
	}
	else if(@$_GET['pw_action_type']=='status' && isset($_GET['pw_id']))
	{
		update_post_meta($_GET['pw_id'], 'status', @$_GET['status_type']);
		?>
		<script type="text/javascript">
			window.location="<?php echo admin_url( 'admin.php?page=rule_gift');?>";
		</script>';	
		<?php
	//	header('Location:'.admin_url( 'admin.php?page=rule_list'));
	}		
	$pw_action_type='add';
	if(@$_GET['pw_action_type']=="edit"){
		$pw_action_type='edit';
		if(isset($_GET['pw_id']))
		{
			$status=get_post_meta($_GET['pw_id'],'status',true);
			$pw_name=get_post_meta($_GET['pw_id'],'pw_name',true);
			$pw_rule_description=get_post_meta($_GET['pw_id'],'pw_rule_description',true);
			$pw_gifts=get_post_meta($_GET['pw_id'],'pw_gifts',true);
			$product_depends=get_post_meta($_GET['pw_id'],'product_depends',true);
			$pw_product_depends=get_post_meta($_GET['pw_id'],'pw_product_depends',true);
			$category_depends=get_post_meta($_GET['pw_id'],'category_depends',true);
			$pw_category_depends=get_post_meta($_GET['pw_id'],'pw_category_depends',true);
			$users_depends=get_post_meta($_GET['pw_id'],'users_depends',true);
			$pw_users=get_post_meta($_GET['pw_id'],'pw_users',true);
			$roles_depends=get_post_meta($_GET['pw_id'],'roles_depends',true);
			$pw_roles=get_post_meta($_GET['pw_id'],'pw_roles',true);
			$pw_cart_amount=get_post_meta($_GET['pw_id'],'pw_cart_amount',true);
			$pw_from=get_post_meta($_GET['pw_id'],'pw_from',true);
			$pw_to=get_post_meta($_GET['pw_id'],'pw_to',true);
			$criteria_nb_products=get_post_meta($_GET['pw_id'],'criteria_nb_products',true);
			$gift_preselector_product_page=get_post_meta($_GET['pw_id'],'gift_preselector_product_page',true);
		}	
	}		

	include_once (PW_WC_VIP_SHOP_URL.'/core/admin/add_edit_rule.php') ;
}
//list_rule
elseif(!isset($_GET['pw_action_type']) || ($_GET['page']="vip_rules" && $_GET['pw_action_type']=="list"))
{
	include_once (PW_WC_VIP_SHOP_URL.'/core/admin/list_rule.php') ;
}
?>