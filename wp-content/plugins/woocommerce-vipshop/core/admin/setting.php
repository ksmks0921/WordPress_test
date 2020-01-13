<?php
if(isset($_POST['pw_vipshop_setting']))
{
	update_option( 'pw_vipshop_setting', $_POST['pw_vipshop_setting'] );
}
$setting=get_option("pw_vipshop_setting");
(!isset($setting['add_to_cart_text_single']) ? $setting['add_to_cart_text_single']="" : "" );
(!isset($setting['price_text_single']) ? $setting['price_text_single']="" : "" );
(!isset($setting['add_to_cart_text_cat']) ? $setting['add_to_cart_text_cat']="" : "" );
(!isset($setting['price_text_cat']) ? $setting['price_text_cat']="" : "" );
(!isset($setting['my_account_title']) ? $setting['my_account_title']="" : "" );
(!isset($setting['my_account_description']) ? $setting['my_account_description']="" : "" );
(!isset($setting['my_account_success']) ? $setting['my_account_success']="Success" : "" );
(!isset($setting['my_account_notsuccess']) ? $setting['my_account_notsuccess']="Invalid Code!!!" : "" );


?>
<br/>
<div>
	<form action="" method="POST">
         <h3>Localization</h3>
         <table class="form-table" cellpadding="0" cellspacing="0">
            <tr>
				<th scope="row" class="titledesc"><label>Add to Cart Button Text</label></th>
				<td>
					<input type="text" name="pw_vipshop_setting[add_to_cart_text_cat]" style="width: 30%;" value="<?php echo $setting['add_to_cart_text_cat'];?>" />
				</td>
			</tr>
            <tr>
				<th scope="row" class="titledesc"><label>single product Add to Cart Button Text</label></th>
				<td>
					<input type="text" name="pw_vipshop_setting[add_to_cart_text_single]" style="width: 30%;" value="<?php echo $setting['add_to_cart_text_single'];?>" />
				</td>
			</tr>
            <tr>
				<th scope="row" class="titledesc"><label>Price Text</label></th>
				<td>
					<input type="text" name="pw_vipshop_setting[price_text_single]" style="width: 30%;" value="<?php echo $setting['price_text_single'];?>" />
				</td>
			</tr>
            <tr>
				<th scope="row" class="titledesc"><label>My Account Text Title</label></th>
				<td>
					<input type="text" name="pw_vipshop_setting[my_account_title]" style="width: 30%;" value="<?php echo $setting['my_account_title'];?>" />
				</td>
			</tr>
            <tr>
				<th scope="row" class="titledesc"><label>My Account Text description</label></th>
				<td>
					<input type="text" name="pw_vipshop_setting[my_account_description]" style="width: 30%;" value="<?php echo $setting['my_account_description'];?>" />
				</td>
			</tr>
            <tr>
				<th scope="row" class="titledesc"><label>My Account Text valid Code</label></th>
				<td>
					<input type="text" name="pw_vipshop_setting[my_account_success]" style="width: 30%;" value="<?php echo $setting['my_account_success'];?>" />
				</td>
			</tr>
			<tr>
				<th scope="row" class="titledesc"><label>My Account Text Invalid Code</label></th>
				<td>
					<input type="text" name="pw_vipshop_setting[my_account_notsuccess]" style="width: 30%;" value="<?php echo $setting['my_account_notsuccess'];?>" />
				</td>
			</tr>
		</table>
        <p class="submit">
           <input type="submit" class="button-primary" value="<?php _e('Save Changes', 'pw_wc_vipshop') ?>">
        </p>
	</form>
</div>