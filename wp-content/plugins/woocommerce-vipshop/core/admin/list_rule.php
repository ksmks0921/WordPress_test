<?php
$pw_action_type=(isset($_GET['pw_action_type'])? $_GET['pw_action_type'] : "list");
if($pw_action_type=="list")
{
	?>
	<h2>
	<?php 
		echo __( 'Rule List', 'wc_advanced_points' ) ;
		echo ' <a href="'. wp_nonce_url( remove_query_arg( 'points_balance', add_query_arg( array( 'pw_action_type' => 'add') ) ), 'wc_points_rewards_update' )
	.'">Add Rule</a>';
	?>

	</h2>
	<script type="text/javascript">
		jQuery(document).ready(function(e) {
			jQuery('tr.pw_list_rule_tr')
				.mouseenter(function(){
					var $this=jQuery(this);

					var $url="<?php echo admin_url( 'admin.php?page=rule_gift&pw_action_type=edit');?>"+'&pw_id='+$this.attr('id');
					var $url_del="<?php echo admin_url( 'admin.php?page=rule_gift&pw_action_type=delete');?>"+'&pw_id='+$this.attr('id');
					
					var $status=$this.attr('data-active-status');
					
					if($status=='active'){
						var $url_active="<?php echo admin_url( 'admin.php?page=rule_gift&pw_action_type=status&status_type=deactive');?>"+'&pw_id='+$this.attr('id');
						$this.find("td:first").append('<div class="pw_rule_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","pw_wc_vipshop") ?></a></span>|<span><a href="'+$url_del+'"><?php _e("Delete","pw_wc_vipshop") ?></a></span>|<span><a href="'+$url_active+'"><?php _e("Deactive","pw_wc_vipshop") ?></a></span></div>');
					}else{
						var $url_active="<?php echo admin_url( 'admin.php?page=rule_gift&pw_action_type=status&status_type=active');?>"+'&pw_id='+$this.attr('id');
						$this.find("td:first").append('<div class="pw_rule_edit_delete"><span><a href="'+$url+'"><?php _e("Edit","pw_wc_vipshop") ?></a></span>|<span><a href="'+$url_del+'"><?php _e("Delete","pw_wc_vipshop") ?></a></span>|<span><a href="'+$url_active+'"><?php _e("Active","pw_wc_vipshop") ?></a></span></div>');
					}
				})
				.mouseleave(function(){
					jQuery('.pw_rule_edit_delete').remove();
				});
		});
	</script>
	<table class="wp-list-table widefat fixed posts fs-rolelist-tbl" data-page-size="5" data-page-previous-text = "prev" data-filter-text-only = "true" data-page-next-text = "next" cellspacing="0">
			<thead>
				<tr>
					<th scope='col' data-toggle="true" class='manage-column column-serial_number'  style="">
						<a href="#"><span><?php _e('S.No', 'pw_wc_vipshop'); ?></span></a>
					</th>
					<th scope='col' class='manage-column'  style=""><?php _e('Rule Name', 'pw_wc_vipshop'); ?></th>
					<th scope='col' class='manage-column'  style=""><?php _e('From Date', 'pw_wc_vipshop'); ?></th>				
					<th scope='col' class='manage-column'  style=""><?php _e('To Date', 'pw_wc_vipshop'); ?></th>				
					<th scope="col" class="manage-column" style="width: 165px"><?php _e('Remaining Time', 'pw_wc_vipshop'); ?></th>
					<th scope="col" class="manage-column" style="width: 50px"><?php _e('Status', 'pw_wc_vipshop'); ?></th>
					<th scope="col" class="manage-column" style=""><?php _e('Date Modified', 'pw_wc_vipshop'); ?></th>
				</tr>
			</thead>
			<tbody id="grid_level_result">
			   <?php
				$blogtime = current_time( 'mysql' );
				$args=array(
					'post_type'=>'pw_gift_rule',
					'posts_per_page'=>-1,
					'orderby'	=>'modified',
				);
				$output='';
				$i=1;
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : 
					$loop->the_post();
					$type=get_post_meta(get_the_ID(),'pw_type',true);
					if($type=="rule")
					{
						$id=$html=$pw_to=$pw_from="";
						$pw_to=get_post_meta(get_the_ID(),'pw_to',true);
						$pw_type=get_post_meta(get_the_ID(),'pw_to',true);
						$pw_from=get_post_meta(get_the_ID(),'pw_from',true);
						$id=rand(0,1000);
						$countdown="style-1";
						$fontsize="medium";
						$html='
							<ul class="fl-'.$countdown.' fl-'.$fontsize.' fl-countdown fl-countdown-pub countdown_'.$id.'">
							  <li><span class="days">--</span><p class="days_text">'.__('Days','pw_wc_vipshop').'</p></li>
								<li class="seperator">:</li>
								<li><span class="hours">--</span><p class="hours_text">'.__('Hours','pw_wc_vipshop').'</p></li>
								<li class="seperator">:</li>
								<li><span class="minutes">--</span><p class="minutes_text">'.__('Minutes','pw_wc_vipshop').'</p></li>
								<li class="seperator">:</li>
								<li><span class="seconds">--</span><p class="seconds_text">'.__('Seconds','pw_wc_vipshop').'</p></li>
							</ul>
							<script type="text/javascript">
								jQuery(".countdown_'.$id.'").countdown({
									date: "'.$pw_to.'",
									offset: -8,
									day: "Day",
									days: "Days"
								}, function () {
								//	alert("Done!");
								});
							</script>';
						$res=strtotime(get_post_meta(get_the_ID(),'pw_to',true))-strtotime(get_post_meta(get_the_ID(),'pw_from',true));
						$days= floor(($res)/86400);
						$hours=floor(($res-($days*86400))/3600);
						$res='Days: '.$days.' H : '.$hours;
						
						$status=get_post_meta(get_the_ID(),'status',true);
						$imgstatus="";
						if($status=="active")
							$imgstatus=plugin_dir_url_wc_advanced_gift."img/active.png";
						else
							$imgstatus=plugin_dir_url_wc_advanced_gift."img/deactive.png";
							
						$output.='
						<tr class="pw_list_rule_tr" id="'.get_the_ID().'" data-active-status="'.$status.'">
							<td>'.$i++.'</td>
							<td><a href="'.wp_nonce_url( remove_query_arg( "points_balance", add_query_arg( array( "pw_action_type" => "edit", 'pw_id' => get_the_ID()) ) ), "wc_points_rewards_update" ).'">'.get_post_meta(get_the_ID(),'pw_name',true).'</a></td>
							<td>'.get_post_meta(get_the_ID(),'pw_from',true).'</td>
							<td>'.get_post_meta(get_the_ID(),'pw_to',true).'</td>
							<td>'.$html.'</td>
							<td><img src="'.$imgstatus.'" alt="status" style="height: 25px;width: 25px;"/></td>
							<td>'.get_the_modified_date('F j, Y g:i a').'</td>
						</tr>';
					}							
				endwhile;						
				echo $output;
			   ?>
			</tbody>
	</table>
<?php 
}
elseif($pw_action_type=="add")
{
	
}
?>