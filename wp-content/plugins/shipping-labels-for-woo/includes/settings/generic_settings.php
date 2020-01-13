<div id="General" class="tabcontent">
						<h3 class="settings_headings"><?php	_e('Generic Settings :', 'wf-woocommerce-packing-list'); ?></h3>
						<div class="inside packinglist-printing-preview">
							<table class="form-table">
								<tr>
									<th><label for="woocommerce_wf_packinglist_companyname"><b><?php _e('Company Name', 'wf-woocommerce-packing-list'); ?></b></label></th>
									<td><input type="text" name="woocommerce_wf_packinglist_companyname" class="regular-text" value="<?php echo stripslashes(get_option('woocommerce_wf_packinglist_companyname')); ?>" /><br />
										<span class="description"><?php
											echo '<strong>' . __('Note:', 'wf-woocommerce-packing-list') . '</strong> ';
											echo __('Leave blank to not to print a company name.', 'wf-woocommerce-packing-list');?>
										</span>
									</td>
								</tr>
								<tr>
									<th> <label for="woocommerce_wf_packinglist_logo"><b><?php _e('Custom Logo', 'wf-woocommerce-packing-list'); ?></b></label></th>
									<td><input id="woocommerce_wf_packinglist_logo" type="text" size="36" name="woocommerce_wf_packinglist_logo" value="<?php echo get_option('woocommerce_wf_packinglist_logo'); ?>" />
										<input id="upload_image_button" type="button" class="button button-primary" value="<?php _e('Upload Image', 'wf-woocommerce-packing-list'); ?>" /><br />
										<span class="description"><?php
											echo '<strong>' . __('Note:', 'wf-woocommerce-packing-list') . '</strong> ';
											echo __('Leave blank to not to use a custom logo.', 'wf-woocommerce-packing-list');?>
										</span>
									</td>
								</tr>
								<tr>
									<th><label for="woocommerce_wf_packinglist_return_policy"><b><?php _e('Returns Policy, Conditions, etc.', 'wf-woocommerce-packing-list'); ?></b></label></th>
									<td>
										<textarea name="woocommerce_wf_packinglist_return_policy" cols="45" rows="3" class="regular-text"><?php	echo stripslashes(get_option('woocommerce_wf_packinglist_return_policy')); ?></textarea><br />
										<span class="description"><?php
											echo '<strong>' . __('Note:', 'wf-woocommerce-packing-list') . '</strong> ';
											echo __('Leave blank to not to print any policy.', 'wf-woocommerce-packing-list');?>
										</span>
									</td>
								</tr>
								<tr>
									<th><label for="woocommerce_wf_packinglist_footer"><b><?php	_e('Custom Footer', 'wf-woocommerce-packing-list'); ?></b></label></th>
									<td>
										<textarea name="woocommerce_wf_packinglist_footer" cols="45" rows="3" class="regular-text"><?php echo stripslashes(get_option('woocommerce_wf_packinglist_footer')); ?></textarea><br />
										<span class="description"><?php
											echo '<strong>' . __('Note:', 'wf-woocommerce-packing-list') . '</strong> ';
											echo __('Leave blank to not to print a footer.', 'wf-woocommerce-packing-list');?>
										</span>
									</td>
								</tr>
								<tr>
									<th>
										<label for="label_size"><b><?php _e('Packaging Type', 'wf-woocommerce-packing-list'); ?></b>
										</label>
									</th>
									<td>
										<select name="woocommerce_wf_packinglist_package_type" id="woocommerce_wf_packinglist_package_type"><?php
											foreach ($this->wf_package_type_options as $id => $value) {
												if ($this->wf_package_type == $id) { ?>
													<option value=<?php _e($id, 'wf-woocommerce-packing-list'); ?> selected><?php _e($value, 'wf-woocommerce-packing-list'); ?></option><?php } else { ?>
													<option value=<?php _e($id, 'wf-woocommerce-packing-list'); ?> ><?php _e($value, 'wf-woocommerce-packing-list'); ?></option><?php } 
											}?>
										</select>
									</td>
								</tr>
							</table>
						</div>
						<h3 class="settings_headings"><?php	_e('Shipping From Address : ', 'wf-woocommerce-packing-list'); ?></h3>
							<div class="inside shipment-label-printing-preview">
								<table class="form-table">
									<tr>
										<th><label for="woocommerce_wf_packinglist_sender_name"><b><?php _e('Sender Name', 'wf-woocommerce-packing-list'); ?></b></label></th>
										<td>
											<input type="text" name="woocommerce_wf_packinglist_sender_name" class="regular-text" value="<?php echo stripslashes(get_option('woocommerce_wf_packinglist_sender_name')); ?>" /><br />
											
										</td>
									</tr>
									<tr>
										<th><label for="woocommerce_wf_packinglist_sender_address_line1"><b><?php _e('Sender Address Line1', 'wf-woocommerce-packing-list'); ?></b></label></th>
										<td>
											<input type="text" name="woocommerce_wf_packinglist_sender_address_line1" class="regular-text" value="<?php	echo stripslashes(get_option('woocommerce_wf_packinglist_sender_address_line1')); ?>" /><br />
										
										</td>
									</tr>
									<tr>
										<th><label for="woocommerce_wf_packinglist_sender_address_line2"><b><?php _e('Sender Address Line2', 'wf-woocommerce-packing-list'); ?></b></label></th>
										<td>
											<input type="text" name="woocommerce_wf_packinglist_sender_address_line2" class="regular-text" value="<?php	echo stripslashes(get_option('woocommerce_wf_packinglist_sender_address_line2')); ?>" /><br />
											
										</td>
									</tr>
									<tr>
										<th><label for="woocommerce_wf_packinglist_sender_city"><b><?php _e('Sender City', 'wf-woocommerce-packing-list'); ?></b></label></th>
									<td>
										<input type="text" name="woocommerce_wf_packinglist_sender_city" class="regular-text" value="<?php	echo stripslashes(get_option('woocommerce_wf_packinglist_sender_city')); ?>" /><br />
											
									</td>
									</tr>
									<tr>
										<th><label for="woocommerce_wf_packinglist_sender_country"><b><?php	_e('Sender Country', 'wf-woocommerce-packing-list'); ?></b></label></th>
										<td>
											<input type="text" name="woocommerce_wf_packinglist_sender_country" class="regular-text" value="<?php echo stripslashes(get_option('woocommerce_wf_packinglist_sender_country')); ?>" /><br />
											
										</td>
									</tr>
									<tr>
										<th><label for="woocommerce_wf_packinglist_sender_postalcode"><b><?php	_e('Sender Postal Code', 'wf-woocommerce-packing-list'); ?></b></label></th>
										<td>
											<input type="text" name="woocommerce_wf_packinglist_sender_postalcode" class="regular-text" value="<?php echo stripslashes(get_option('woocommerce_wf_packinglist_sender_postalcode')); ?>" /><br />
											
										</td>
									</tr>
								</table>
							</div>
							<h3 class="settings_headings"><?php	_e('Shipping Label Settings :', 'wf-woocommerce-packing-list'); ?></h3>
							<div class="inside shipment-label-printing-preview">
								<table class="form-table">
									<tr>
										<th><label for="label_size"><b><?php _e('Shipping Label Size', 'wf-woocommerce-packing-list'); ?></b></label></th>
										<td>
											<input type="text" name="woocommerce_wf_packinglist_label_size" class="regular-text" value="Full page" disabled="true" />
										</td>
									</tr>
									<tr>
										<th><span><?php _e('Enable Contact Number', 'wf-woocommerce-packing-list'); ?></span></th>
										<td>
											<input type="checkbox" value="Yes" name="woocommerce_wf_packinglist_contact_number" class=""<?php if($this->wf_enable_contact_number == 'Yes') 
												_e('checked', 'wf-woocommerce-packing-list');					
											?> >
											<span class="description"><?php
												_e('Check to add Contact Number to Shipping Label', 'wf-woocommerce-packing-list'); ?>
											</span>
										</td>
									</tr>
                                                                        <tr>
										<th><span><?php _e('Enable Encoding', 'wf-woocommerce-packing-list'); ?></span></th>
										<td>
											<input type="checkbox" value="Yes" name="woocommerce_wf_packinglist_enable_cyrillic" class=""<?php if($this->woocommerce_wf_packinglist_enable_cyrillic == 'Yes') 
												_e('checked', 'wf-woocommerce-packing-list');					
											?> >
											<span class="description"><?php _e('Check this to enable Cyrillic encoding', 'wf-woocommerce-packing-list'); ?></span>
										</td>
									</tr>
								</table>
							</div>
							</div>