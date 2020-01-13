
<?php 
if(isset($_POST['pw_vipshop_options']))
{
	update_option( 'pw_vipshop_options', $_POST['pw_vipshop_options'] );
}
$setting=get_option("pw_vipshop_options");

(!isset($setting['rule_active']) ? $setting['rule_active']="deactive" : "" );
(!isset($setting['auto_reg']) ? $setting['auto_reg']="no" : "" );
(!isset($setting['total_purchase']) ? $setting['total_purchase']="no" : "" );
(!isset($setting['total_amount']) ? $setting['total_amount']="0" : "" );
(!isset($setting['number_purchase']) ? $setting['number_purchase']="no" : "" );
(!isset($setting['number_amount']) ? $setting['number_amount']="0" : "" );
(!isset($setting['users']) ? $setting['users']="" : "" );
(!isset($setting['auto']) ? $setting['auto']="yes" : "" );
(!isset($setting['by_code']) ? $setting['by_code']="yes" : "" );
(!isset($setting['difine_code']) ? $setting['difine_code']="" : "" );

?>
    <form id="pw_create_level_form" class="pw_create_level_form" method="POST">	
        <table class="form-table pw-fs-table">
        	<tr class="title-row">
            	<td colspan="2" >
					<strong><?php _e('Setting Rule', 'pw_wc_vipshop') ?></strong>
                </td>
            </tr>
			<tr>
				<td><?php _e('Status', 'pw_wc_vipshop'); ?></td>
				<td>
					<input type="radio" name="pw_vipshop_options[rule_active]" value="active" <?php checked( $setting['rule_active'], "active" ); ?> checked>Active
					<input type="radio" name="pw_vipshop_options[rule_active]" value="deactive" <?php checked( $setting['rule_active'], "deactive" ); ?>>Deactive
				</td>
			</tr>
			<tr>
				<td><?php _e('Automatic convert all register users to VIP', 'pw_wc_vipshop'); ?></td>
				<td>
					<input type="radio" name="pw_vipshop_options[auto_reg]" value="yes" <?php checked( $setting['auto_reg'], "yes" ); ?> class="auto_reg">Yes
					<input type="radio" name="pw_vipshop_options[auto_reg]" value="no" <?php checked( $setting['auto_reg'], "no" ); ?> class="auto_reg">No
					<br/>

				</td>
			</tr>
			<tr class="auto_reg_hide">
				<td><?php _e('Auto Add to VIP by total purchase', 'pw_wc_vipshop'); ?></td>
				<td>
					<input type="radio" name="pw_vipshop_options[total_purchase]" value="yes" <?php checked( $setting['total_purchase'], "yes" ); ?> class="total_purchase">Yes
					<input type="radio" name="pw_vipshop_options[total_purchase]" value="no" <?php checked( $setting['total_purchase'], "no" ); ?> class="total_purchase">No
					<br/>

				</td>
			</tr>
			<tr class="total_amount auto_reg_hide">
				<td>
					<?php _e('amount', 'pw_wc_vipshop') ?>
				</td>
				<td>
					<input type="text" name="pw_vipshop_options[total_amount]" value="<?php echo $setting['total_amount'];?>">
					<br/>
					<span class="description">
					<?php _e('Enter total amount of purchase to add user to VIP automatically.'); ?>
					</span>
					
				</td>
			</tr>
			<tr class="auto_reg_hide">
				<td><?php _e('Auto Add to VIP by number of purchase', 'pw_wc_vipshop'); ?></td>
				<td>
					<input type="radio" name="pw_vipshop_options[number_purchase]" value="yes" <?php checked( $setting['number_purchase'], "yes" ); ?> class="number_purchase">Yes
					<input type="radio" name="pw_vipshop_options[number_purchase]" value="no" <?php checked( $setting['number_purchase'], "no" ); ?> class="number_purchase">No
				</td>
			</tr>
			<tr class="number_amount auto_reg_hide">
				<td>
					<?php _e('Total number of purchase', 'pw_wc_vipshop') ?>
				</td>
				<td>
					<input type="text" name="pw_vipshop_options[number_amount]" value="<?php echo $setting['number_amount'];?>">
					<br/>
					<span class="description">
					<?php _e('Enter total number of purchase to add user to VIP automatically.'); ?>
					</span>
				</td>
			</tr>			

			<tr class="pw_users_depends auto_reg_hide">
				<td>
					<?php _e('Pre-defined Users','pw_wc_vipshop');?>
				</td>
				<td>
					<?php
					echo '<select name="pw_vipshop_options[users][]" class="chosen-select" multiple="multiple" data-placeholder="Choose Users">';
					foreach(get_users() as $user) {
						$meta=$setting['users'];
						$selected="";
						if(is_array($meta))
						{
							$selected=(in_array($user->ID ,$meta) ? "SELECTED":"");
						}
						echo '<option '.$selected.' value="'. $user->ID .'">ID:'.$user->ID.' '.$user->user_email.'</option>';
					}
					echo '</select>';
					?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>	
                	<input type="submit" value="<?php _e('Save', 'pw_wc_vipshop') ?>">
				</td>
			</tr>
		</table>
	</form>
<script language="javascript">  



jQuery(document).ready(function() {
	
	jQuery('.chosen-select').chosen();


	
	jQuery('.total_amount').dependsOn({
		'.total_purchase': {
			values: ['yes']
		}	
	});
	jQuery('.number_amount').dependsOn({
		'.number_purchase': {
			values: ['yes']
		}	
	});
	jQuery('.auto_reg_hide').dependsOn({
		'.auto_reg': {
			values: ['no']
		}	
	});	
	jQuery('.difine_code').dependsOn({
		'.by_code': {
			checked: true
		}	
	});
/*	jQuery('.pw_roles_depends').dependsOn({
		'.roles_depends': {
			values: ['yes']
		}	
	});*/
});
</script>