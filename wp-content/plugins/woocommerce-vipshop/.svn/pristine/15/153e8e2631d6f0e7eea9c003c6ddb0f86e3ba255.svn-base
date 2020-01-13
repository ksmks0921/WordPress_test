<?php

function pw_vip_html_content_typea() {

	return 'text/html';

}

if(isset($_POST['pw_vipshop_email']))

{

	update_option( 'pw_vipshop_content_email',$_POST['pw_vipshop_content_email']);

	update_option( 'pw_vipshop_subject_email',$_POST['pw_vipshop_subject_email']);

	update_option( 'pw_vipshop_email', $_POST['pw_vipshop_email'] );

	if(isset($_POST['pw_vipshop_email']['by_code']) && !empty($_POST['pw_vipshop_email']['difine_code']))

	{

		//Send Code to email

		if(isset($_POST['to']))

		{

			foreach($_POST['to'] as $to)

			{

				$pw_vipshop_subject_email=get_option("pw_vipshop_subject_email");

				

				$from=get_option('admin_email');

				//$headers = 'From:'.$from.'"\r\n"';			

				$pw_email_message=(get_option("pw_vipshop_content_email")=='' ? '<p>Dear user</p><p>Your VIP code is : {code}</p>

you can enter this code in My Account section of shop then you will be one our VIP member.<p>Enjoy</p>' : get_option("pw_vipshop_content_email"));

				

				$content = str_replace('{code}', $_POST['pw_vipshop_email']['difine_code'],$pw_email_message);		

				

				$html='

					<div style="display:inline-block; width:92%;background:#ffffff; border:4px dashed #ccc; padding:20px; background:#f5f5f5;">

						<div style="font-family:Arial,Tahoma; font-size:20px;margin-bottom:10px;" >

							<span>'.$content.' </span>

						</div>

					</div>

					';

				

				$subject = 'The subject';

				$body = 'The email body content';

				$headers = array('Content-Type: text/html; charset=UTF-8','From: Pura Jade<'.$from);

				

				add_filter( 'wp_mail_content_type', 'pw_vip_html_content_typea' );  					

				$sent = wp_mail($to, $pw_vipshop_subject_email, $html, $headers);

				remove_filter( 'wp_mail_content_type', 'pw_vip_html_content_typea' );

				

			}

		}

	}

	elseif(isset($_POST['pw_vipshop_email']['by_code']) && empty($_POST['pw_vipshop_email']['difine_code']))

		echo 'Please Generate Code For Send Email';

}



$pw_vipshop_subject_email=get_option("pw_vipshop_subject_email");

$pw_vipshop_content_email=(get_option("pw_vipshop_content_email")=='' ? '<p>Dear user</p><p>Your VIP code is : {code}</p>

you can enter this code in My Account section of shop then you will be one our VIP member.<p>Enjoy</p>' : get_option("pw_vipshop_content_email"));



$setting=get_option("pw_vipshop_email");

(!isset($setting['by_code']) ? $setting['by_code']="" : "" );

(!isset($setting['difine_code']) ? $setting['difine_code']="" : "" );

	

wp_enqueue_style( 'two-side-multi-select' );

wp_enqueue_style( 'two-side-multi-select-style' );

wp_enqueue_style( 'two-side-multi-select-bootstrap' );

add_action( 'init' , 'woo_advanced_vip_js_css' );

function woo_advanced_vip_js_css()

{

	if(is_admin())

	{

		wp_enqueue_script('two-side-multi-select-jquery-js',plugin_dir_url_wc_advanced_vip.'js/two-side-multiselect/jquery-1.11.2.min.js',array( 'jquery' ));

	}

}

wp_enqueue_script( 'two-side-multi-select-bootstrap-js' );

//wp_enqueue_script( 'two-side-multi-select-jquery-js' );

wp_enqueue_script( 'two-side-multi-select-js' );

?>

	<form action="" method="POST" class="form-email">

         <h3>Send VIP Code By Email</h3>

		 <span>

			In this section you can define VIP code and then select desired users, the system will send VIP code to these users by email and they can enter this code in my account page and then access to VIP sectoin of the shop.		 

		 </span>

         <table class="form-table" cellpadding="0" cellspacing="0">

			<tr>

				<td>Active Code</td>

				<td>				

					<input type="checkbox" name="pw_vipshop_email[by_code]" value="yes" <?php checked( $setting['by_code'], "yes" ); ?> class="by_code">

					<span class="description">

						<?php _e('By Code', 'pw_wc_vipshop'); ?>

					</span>

				</td>

			</tr>		 

			<tr class="difine_code">

				<td>Generate</td>

				<td>

					<span class="description">

						<?php _e('Code :', 'pw_wc_vipshop'); ?>

					</span>

					<input type="text"  class="input_class" name="pw_vipshop_email[difine_code]" value="<?php echo $setting['difine_code'];?>">

					<input type="button" class="btn_class" value="<?php _e('Generate Code', 'pw_wc_vipshop') ?>">

				</td>

			</tr>

		</table>

		<table class="form-table" cellpadding="0" cellspacing="0">

			<tr>

				<td>

					<div class="col-xs-5">

						<select name="from" id="undo_redo" class="form-control" size="13" multiple="multiple">

							<?php

							foreach(get_users() as $user)

							{						

								echo '<option value="'. $user->user_email .'">ID:'.$user->ID.' '.$user->user_email.'</option>';

								//<option value="1">C++</option>

							}

							?>

						</select>

					</div>

					<div class="col-xs-2">

						<button type="button" id="undo_redo_undo" class="btn btn-primary btn-block">undo</button>

						<button type="button" id="undo_redo_rightAll" class="btn btn-default btn-block"><i>>></i></button>

						<button type="button" id="undo_redo_rightSelected" class="btn btn-default btn-block"><i>></i></button>

						<button type="button" id="undo_redo_leftSelected" class="btn btn-default btn-block"><i><</i></button>

						<button type="button" id="undo_redo_leftAll" class="btn btn-default btn-block"><i><<</i></button>

						<button type="button" id="undo_redo_redo" class="btn btn-warning btn-block">redo</button>

					</div>

					<div class="col-xs-5">

						<select name="to[]" id="undo_redo_to" class="form-control" size="13" multiple="multiple"></select>

					</div>

				</td>

			</tr>

			</table>

			<table class="form-table" cellpadding="0" cellspacing="0">			

			<tr>

				<td>subject

				</td>

				<td>

					

					<input type="text" name="pw_vipshop_subject_email" value="<?php echo $pw_vipshop_subject_email;?>">

				</td>

			</tr>

			<tr>

							<td>content

				</td>

				<td rowspan="2">

				<?php

					$editor_args = array(

						'textarea_rows' => 7,

					);

					$editor_id ='pw_vipshop_content_email';

					wp_editor( $pw_vipshop_content_email, $editor_id, $editor_args );

				?>

				</td>

			</tr>		

		</table>		

        <p class="submit">

           <input type="submit" class="button-primary" value="<?php _e('Save Changes/Send Email', 'pw_wc_vipshop') ?>">

        </p>

	</form>

<script language="javascript">  

jQuery('.btn_class').click(function(){

	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";

	var string_length = 8;

	var randomstring = '';

	for (var i=0; i<string_length; i++) {

		var rnum = Math.floor(Math.random() * chars.length);

		randomstring += chars.substring(rnum,rnum+1);

	}

	jQuery('.input_class').val(randomstring);

	

});



jQuery(document).ready(function() {

	jQuery('.form-email').submit(function(){

		jQuery('#undo_redo_to option'). prop('selected', true);

		

	});

	jQuery('#undo_redo').multiselect();

});

</script>