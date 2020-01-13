<?php
	if($_POST['oscimp_hidden'] == 'Y') {

	$enablepreorders = $_POST['enable-preorders'];
	$sellpreordertext = $_POST['sell-preorder-button-text'];
	$selling_checkout_page=$_POST['preorder-selling-checkout-page'];
        update_option('enable-preorders',$enablepreorders);
        update_option('enable-preorders',$enablepreorders);
		update_option('preorder-selling-checkout-page',$selling_checkout_page);
    }
        else {
        
        $enablepreorders = get_option('enable-preorders');
		$sellpreordertext = get_option('sell-preorder-button-text');
		$selling_checkout_page = get_option('preorder-selling-checkout-page');
       
    }
?>
<form name="oscimp_form" method="post" class="preorder-form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
<table class="form-table">
<tbody>
<label><input name="enable-preorders" type="checkbox" id="enable-preorders" value="Enable" <?php if($enablepreorders!=""){echo " checked";}?>><?php echo esc_html('Enable Customer Preorder Exchange');?></label>
<tr><th><label><?php echo esc_html('Preorder sell button text');?></label></th> <td><input name="sell-preorder-button-text" class="regular-text" value="<?php if($sellpreordertext!=""){echo $sellpreordertext;}else {echo "Sell";} ;?>" type="text" />
<input type="hidden" name="oscimp_hidden" value="Y"></td></tr>
<tr><th>Select checkout page</th>
<td><select name="preorder-selling-checkout-page"> 
 <option value="">
<?php echo esc_attr( __( 'Select page' ) ); ?></option> 
 <?php 
  $pages = get_pages(); 
  foreach ( $pages as $page ) {
	  ?>
  <option value="<?php echo get_page_link( $page->ID );?>" <?php if(get_page_link( $page->ID )==$selling_checkout_page){ echo "selected";}?>>
   <?php echo $page->post_title;?>
  </option>
<?php
  }
 ?>
</select>
</td></tr>

<tr>
<td>
<input type="hidden" name="oscimp_hidden" value="Y">
<input type="submit" class="button button-primary" name="Submit" value="Update" /></td></tr>
</table>
</tbody>
	</form>



