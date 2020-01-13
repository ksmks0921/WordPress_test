<?php
class calss_wc_vipshop_user_profile {

	/**
	 * Constructor
	 */

	public function __construct() {

		add_action( 'woocommerce_before_my_account', array( $this, 'woocommerce_vipshop_user_profile' ));	
	}


	public function woocommerce_vipshop_user_profile()
	{
		$setting=get_option("pw_vipshop_setting");
		(!isset($setting['my_account_title']) ? $setting['my_account_title']="" : "" );
		(!isset($setting['my_account_description']) ? $setting['my_account_description']="" : "" );
		(!isset($setting['my_account_success']) ? $setting['my_account_success']="Success" : "" );
		(!isset($setting['my_account_notsuccess']) ? $setting['my_account_notsuccess']="Invalid Code!!!" : "" );
		(!isset($setting['users']) ? $setting['users']=array() : "" );
		
		$wc_vipshop_users="";
		$wc_vipshop_users = get_user_meta( get_current_user_id(), 'wc_vipshop_users', true );
		(!isset($setting['auto_reg']) ? $setting['auto_reg']="no" : "" );		
		$meta=$setting['users'];
		//if($wc_vipshop_users!="yes" && $setting['auto_reg']!="yes" && in_array(get_current_user_id() ,$meta))
		//{
			?>
				<form id="pw_vipshop_form_cart">
					<h2><?php echo $setting['my_account_title'];?></h2>
					<p><?php  echo $setting['my_account_description'];?></p>
					<input type="text" id="vipshop_txt_code" class="input_class" name="vipshop_txt_code" value="" placeholder="Add Code Vip shop">
					<input type="hidden" name="id_user" value="<?php echo get_current_user_id();?>">
					<input type="button" class="btn_class" id="vipshop_btn_code" value="<?php _e('Check Code', 'pw_wc_vipshop') ?>">
					<p class="hide_vpshop"></p>
				</form>	
				<script type="text/javascript">				
					jQuery(document).ready(function(e) {
					jQuery('#vipshop_btn_code').click(function(){
					//jQuery("#loading").html('loding...');
					jQuery('#vipshop_btn_code').val('<?php _e('Loading...','pw_wc_vipshop');?>');
					
					jQuery.ajax ({
						type: "POST",
						url: "<?php echo admin_url( 'admin-ajax.php');?>",
						data:   jQuery('#pw_vipshop_form_cart').serialize()+ "&action=pw_save_vipshop_code",
						success: function(data) {
							jQuery('#vipshop_btn_code').val('<?php _e('Check Code','pw_wc_vipshop');?>');
								if(data==1)
								{
									jQuery('.hide_vpshop').html('<?php echo $setting['my_account_success'];?>');
								}
								else
								{
									jQuery('.hide_vpshop').html('<?php echo $setting['my_account_notsuccess'];?>');
								}
								
							}
						});	
					});
					});
				</script>
				
			<?php			
		//}
	}
}
new calss_wc_vipshop_user_profile();

add_action('wp_ajax_pw_save_vipshop_code', 'pw_save_vipshop_code');
add_action('wp_ajax_nopriv_pw_save_vipshop_code', 'pw_save_vipshop_code');
function pw_save_vipshop_code() 
{

	if(!isset($_POST['id_user']) || !isset($_POST['vipshop_txt_code']))
		exit();
	//update_user_meta($_POST['id_user'],'wc_vipshop_users',"yes");
	$setting=get_option("pw_vipshop_email");
	(!isset($setting['by_code']) ? $setting['by_code']="" : "" );
	(!isset($setting['difine_code']) ? $setting['difine_code']="" : "" );
	
	if($setting['by_code']!="yes" || empty($setting['difine_code']))
		exit();
	
	if($_POST['vipshop_txt_code']==$setting['difine_code'])
	{
		update_user_meta($_POST['id_user'],'wc_vipshop_users',"yes");
		echo '1';
		exit();
	}	
	exit();
}


?>