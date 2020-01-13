<?php

function preorders_admin_actions() {
	$user = wp_get_current_user();
	$role =$user->roles;
	$icon_url   = 'dashicons-groups';
	if($role[0]=="administrator") {
	add_menu_page(
	'Setting',  
	'Sellpreorder', 
	'manage_options',
	'customer-sell-preorders/admin/setting.php',
	'',
	$icon_url
	
       );
   }
 }

add_action('admin_menu', 'preorders_admin_actions');

// Create post type preorder sell
if ( post_type_exists( 'customer-preorders' ) ) {
}
else
{
function customer_preorders_init() {
    $args = array(
      'label' => 'Preorder Sell',
       'title'                =>'product',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'customer-preorders'),
        'query_var' => true,
        'menu_icon' => 'dashicons-align-right',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
    register_post_type( 'customer-preorders', $args );
}
add_action( 'init', 'customer_preorders_init' );
}

// create selling page shortcode

function customer_preorder_sell_products() {
require_once ('sellarchive.php');

}
add_shortcode( 'customers-sell-products', 'customer_preorder_sell_products' );
// checkout selling page shortcode
function customer_preorder_sell_checkout() {
require_once ('preorder-selling-checkout.php');

}
add_shortcode( 'preorder-selling-checkout', 'customer_preorder_sell_checkout' );


function add_new_gallery_columns($gallery_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
     
    $new_columns['id'] = __('Product ID');
    $new_columns['title'] = _x('Product Name', 'column name');
    $new_columns['author'] = __('Author');
     
    $new_columns['categories'] = __('Categories');
    $new_columns['tags'] = __('Tags');
 
    $new_columns['date'] = _x('Date', 'column name');
 
    return $new_columns;
}
add_filter('manage_edit-customer-preorders_columns', 'add_new_gallery_columns');

    // Add to admin_init function
add_action('manage_customer-preorders_posts_custom_column', 'manage_preorder_sell_columns', 10, 2);
 
function manage_preorder_sell_columns($column_name, $id) {
    global $wpdb;
    switch ($column_name) {
    case 'id':
    $productid=get_post_meta($id,'preorder-sellprdctid',true);
        echo $productid;
            break;
      default:
        break;
            
            }
            
            }
            
  function preorder_custom_field($post){ ?>
    <table width="100%" >
        <tr>
            <td>Product ID</td>
          
        </tr>
        
        <tr><td><input type="text" readonly name="preorder-sellprdctid" id="preorder-sellprdctid" value="<?php echo get_post_meta($post->ID,"preorder-sellprdctid",true); ?>"></tr>
      <tr>
            <td>User ID</td>
          
        </tr>
      
      <tr><td><input type="text" readonly name="preorder-selluserid" id="preorder-selluserid" value="<?php echo get_post_meta($post->ID,"preorder-selluserid",true); ?>">

</td></tr>
		</table>
 <?php } 
add_action( 'add_meta_boxes', 'preorder_product_data' );   
    function preorder_product_data()
{
      add_meta_box('pr-details-section','Product Data','preorder_custom_field','customer-preorders', 'normal', 'high');
     
}
add_action('save_post', 'save_preordersell_product_data');
function save_preordersell_product_data(){
     global $post;
     if($post->post_type == 'customer-preorders')
    {
            update_post_meta($post->ID, 'preorder-sellprdctid', $_POST['preorder-sellprdctid']);
            update_post_meta($post->ID, 'preorder-selluserid', $_POST['preorder-selluserid']);

       
    }
}		           
 
 function iconic_account_menu_items( $items ) {
 
    $items['information'] = __( 'Payments', 'iconic' );
 
    return $items;
 
}

function iconic_add_my_account_endpoint() {
 
    add_rewrite_endpoint( 'information', EP_PAGES );
 
}
 
add_action( 'init', 'iconic_add_my_account_endpoint' );
 
add_filter( 'woocommerce_account_menu_items', 'iconic_account_menu_items', 10, 1 );
 
 
function iconic_information_endpoint_content() {
require_once ('payments.php');
}
 
add_action( 'woocommerce_account_information_endpoint', 'iconic_information_endpoint_content' ); 
 

?>