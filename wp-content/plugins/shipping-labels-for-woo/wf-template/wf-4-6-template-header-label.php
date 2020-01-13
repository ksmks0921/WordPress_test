<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title><?php _e('Print Shipment Label','wf-woocommerce-shipment-label-printing');?></title>
		<link href="<?php echo $this->wf_packinglist_template('uri','wf-4-6-template-header.php');?>css/wf-shipment.css" rel="stylesheet" type="text/css" media="scrren,print" />
		<link href="<?php echo $this->wf_packinglist_template('uri','wf-4-6-template-header.php');?>css/wf-shipment-print.css" rel="stylesheet" type="text/css" media="print" />
	</head>
	<body<?php echo $this->wf_packinglist_preview();?>>