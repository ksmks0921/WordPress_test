<div style="<?php 
				$var=$this->wf_shipment_label_get_label_size();
				$size_factor;
				if($var==1) {
					_e('height:576px;width:384px;','wf-woocommerce-packing-list');
					$size_factor = 0.75;
					$to_size_factor = 0.5;
				} else {
					_e('height:100%;width:100%;','wf-woocommerce-packing-list');
					$size_factor = 1;
					$to_size_factor = 1;
				}
				$faddress=$this->wf_shipment_label_get_from_address();
				?> "><header >
				<a class="print" href="#" onclick="window.print()" ><?php _e('Print','wf-woocommerce-packing-list');?></a><?php if($this->wf_packinglist_get_logo() != '') { ?>
		<div style="float:left; width:49%; text-align:left; margin: 10px 20px 0 0;"><?php 
				$dimensions = $this->wf_pklist_get_new_dimensions($this->wf_packinglist_get_logo(), 50, 200);
				echo '<img src="'.$this->wf_packinglist_get_logo().'" style="height:'.$dimensions['height'].' ;width:'.$dimensions['width'].'" ><br/>';
			?>
		</div><?php } else { ?>
		<div style="float:left; width:49%; text-align:right; margin: 10px 20px 0 0;font-size:22px;"><strong><?php echo $this->wf_packinglist_get_companyname();?></strong><br/>
		</div><?php } ?>
		<div style="clear:both;"></div>
	</header>
	<div >
		<div class="article" >
			<header style="height:<?php echo 150 * $size_factor; ?>px;">
				<div style="width: %;float:right;font-size:<?php echo 18 * $size_factor; ?>px;line-height:<?php echo 15 * $size_factor; ?>px;"><?php $orderdetails = $this->wf_packinglist_get_table_content($order, $order_package); ?>
					<div>
						<table>
							<tr>
								<td style="font-size:<?php echo 16 * $size_factor; ?>px;"><?php _e('Order Number','wf-woocommerce-packing-list');?></td>
								<td> : </td>
								<td style="font-size:<?php echo 16 * $size_factor; ?>px;"><strong><?php _e($orderdetails['order_id'],'wf-woocommerce-packing-list');?></strong></td>
							</tr>
							<tr>
								<td style="font-size:<?php echo 16 * $size_factor; ?>px;"><?php _e('Weight','wf-woocommerce-packing-list');?></td>
								<td> : </td>
								<td style="font-size:<?php echo 16 * $size_factor; ?>px;"><strong><?php _e($orderdetails['weight'],'wf-woocommerce-packing-list');?></strong></td>
							</tr>
						</table>
					</div>
				</div>
				<div style="float:left; width:49%;font-size:<?php echo 18 * $size_factor; ?>px;">
					<div style="padding-bottom:4px;" ><strong><?php _e('FROM:','wf-woocommerce-packing-list');?></strong></div>
					<div style="font-size:<?php echo 16 * $size_factor; ?>px; line-height:<?php echo 20 * $size_factor; ?>px;"><?php 
							$faddress=$this->wf_shipment_label_get_from_address();
							foreach ($faddress as $key => $value) {
								if (!empty($value)) {
									_e($value,'wf-woocommerce-packing-list');
									echo '<br>';
								}
							}
						?>
					</div>
				</div>
				<div style="clear:both;"></div>
			</header>
			<div style="width: 100%;font-size:<?php echo 30 * $to_size_factor; ?>px;margin-left: 20%;">
				<div><strong><?php _e('TO:','wf-woocommerce-packing-list');?></strong></div>
				<div style="font-size:<?php echo 28 * $to_size_factor; ?>px;line-height:<?php echo 35 * $to_size_factor; ?>px;"><?php 
					$this->wf_shipment_label_get_to_address($order);
				?>
				</div>
				</div>
			<div class="datagrid">
				<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
		</div><?php if($this->wf_packinglist_get_return_policy() !=''){?>
		<div class="article" style="font-size:16px;  line-height: 25px;"><?php echo $this->wf_packinglist_get_return_policy(); }?></div>
		<div class="footer" style="font-size:16px;  line-height: 25px;"><?php echo $this->wf_packinglist_get_footer(); ?></div>
	</div>
<div style="clear:both;"></div>
</div>