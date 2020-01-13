<?php
function pagination($pages = '', $range = 12)
{

    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
        if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
        echo "</div>\n";
    }
}
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type'              =>'customer-preorders',
	'order'                  => 'ASC',
	'orderby'                => 'title',
	'paged'                  => $paged,
	'posts_per_page'          =>12
);
$the_query = new WP_Query( $args );

if ($the_query->have_posts()) {?>
 <div class="row products"><?php
while ( $the_query->have_posts() ) :
$the_query->the_post();
$size = 'medium'; 
$productid=get_post_meta(get_the_ID(),'preorder-sellprdctid',true);
$sellerid= get_post_meta(get_the_ID(),'preorder-selluserid',true);
$user_info = get_userdata($sellerid);
$rand=rand();
$data = base64_encode($productid.'|'.$rand) ;
$userdata = base64_encode($sellerid.'|'.$rand) ;

?>

 <div class="col-sm-3"><a href="<?php echo get_post_permalink($productid);?>"><img src="<?php echo get_the_post_thumbnail_url($productid, array( 300, 300 ));?>"></a>
 <h2 class="woocommerce-loop-product__title"><?php echo get_the_title($productid);?></h2>
 <?php $_product = wc_get_product($productid);?>
 
 <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol preprice"><?php echo get_woocommerce_currency_symbol() ?></span><?php echo $_product->get_price();?>.00</span></span>
<span><a href="<?php echo get_option('preorder-selling-checkout-page');?>?preorder_productid=<?php echo $data;?>&sellinguserid=<?php echo $userdata; ?>" data-quantity="1" class="button product_type_simple add_to_cart_button" data-product_id="184" data-product_sku=""rel="nofollow"style="border-radius: 5px;">Buy</a></span>

<p style="font-size:14px;">Selling By: <i style="color:#ff5ba9;"><?php echo $user_info->user_login;?></i></p>


 </div>  
    
     <?php

  endwhile;
if (function_exists("pagination")) {

          pagination($the_query ->max_num_pages);
      } 
}


?>
</div> 
<style>
div#comments {
    display: none;
}
span.woocommerce-Price-amount.amount
{
    margin: 20px 0 !important;
    position: relative;
    
    display: inline-block;

}
.price
{
font-weight: bold;
}
</style>



