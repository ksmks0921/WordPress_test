<?php
require('pdf-templates/fpdf.php');
class PDF4x6 extends FPDF
{
	//function to addpage
	public $xfactor=0;
	public $yfactor=0;
	public $fontfactor=1;
	function init($par)
	{
		$this->AddPage();
		$this->SetFont('Arial','',8*$this->xfactor);
		$this->xfactor=$par+0.18;
		if($this->xfactor>1)
		{
			$this->yfactor=2.5;
			$this->fontfactor=2;
		}
		else
		{
			$this->yfactor=2;
			$this->fontfactor=1.5;
		}
	}

	//function to add logo
	function addImage($img, $dimensions)
	{
		$image_path = WP_CONTENT_DIR.'/'.strstr($img,'uploads');
		$image_format = strtolower(pathinfo($img, PATHINFO_EXTENSION));
		$this->Image($image_path,10,10,$dimensions['width']*0.264,$dimensions['height']*0.264, $image_format);
	}

	//function to add company name
	function addCompanyname($companyname)
	{
		$this->SetFont('Arial','B',14*$this->fontfactor);
		$this->Cell(410*$this->xfactor,20,__($companyname,'wf-woocommerce-packing-list'),0,0,'R');
		$this->Ln(4);
	}

	//function to add shipping to address
	function addShippingToAddress($addr, $contact_number)
	{
                
                $addr = apply_filters('wf_alter_labelpdf_shipto_addr', $addr);
		$i = 25*$this->yfactor;
		$x = 300*$this->xfactor;
		$this->setXY($x,22*$this->yfactor);
		$this->SetFont('Arial','B',12*$this->fontfactor);
		$this->Cell(65*$this->xfactor,30*$this->yfactor,__('TO:','wf-woocommerce-packing-list'),0,0,'L');
		$this->SetFont('Arial','',12*$this->fontfactor);
		$this->setXY($x,$i);
                
                if (get_option('woocommerce_wf_packinglist_enable_cyrillic') == 'Yes') {

                    $this->AddFont('ArialMT', '', 'Arial-Regular.php');
                    $this->SetFont('ArialMT', '', 14);
                    $addr['first_name']          = iconv('UTF-8', 'ISO-8859-5', $addr['first_name']);
                    $addr['last_name']          = iconv('UTF-8', 'ISO-8859-5', $addr['last_name']);
                    $addr['company']          = iconv('UTF-8', 'ISO-8859-5', $addr['company']);
                    $addr['address_1'] = iconv('UTF-8', 'ISO-8859-5', $addr['address_1']);
                    if($addr['address_2']!=''){
                    $addr['address_2'] = iconv('UTF-8', 'ISO-8859-5', $addr['address_2']);
                    }
                    $addr['city'] = iconv('UTF-8', 'ISO-8859-5', $addr['city']);
                    $addr['state'] = iconv('UTF-8', 'ISO-8859-5', $addr['state']);
                    $addr['country'] = iconv('UTF-8', 'ISO-8859-5', $addr['country']);
                }
                
		$this->Cell(65*$this->xfactor,35*$this->yfactor,__($addr['first_name'].' '.$addr['last_name'],'wf-woocommerce-packing-list'),0,0,'L');
		if($addr['company'] != '')
		{
		$this->Ln(4);
		$this->setyval($x);
		$this->Cell(65*$this->xfactor,35*$this->yfactor,__($addr['company'],'wf-woocommerce-packing-list'),0,0,'L');
		}
		$this->Ln(4);
		$this->setyval($x);
		$this->Cell(65*$this->xfactor,35*$this->yfactor,__($addr['address_1'],'wf-woocommerce-packing-list'),0,0,'L');
		if($addr['address_2']!='')
		{
			$this->Ln(4);
			$this->setyval($x);
			$this->Cell(65*$this->xfactor,35*$this->yfactor,__($addr['address_2'],'wf-woocommerce-packing-list'),0,0,'L');
		}
		$this->Ln(4);
		$this->setyval($x);
		$this->Cell(65*$this->xfactor,35*$this->yfactor,__($addr['city'].' - '.$addr['postcode'],'wf-woocommerce-packing-list'),0,0,'L');
		
		if($addr['state']!=''){
		$this->Ln(4);
		$this->setyval($x);
        $this->Cell(65*$this->xfactor,35*$this->yfactor,__(str_replace('&rsquo;', "'",$addr['state']).', '.$addr['country'],'wf-woocommerce-packing-list'),0,0,'L');
            }
            else
            {
        $this->Ln(4);
		$this->setyval($x);
            	$this->Cell(65*$this->xfactor,35*$this->yfactor,__($addr['country'],'wf-woocommerce-packing-list'),0,0,'L');
            }
		//$this->Cell(65*$this->xfactor,5*$this->yfactor,__($addr['state'].', '.$addr['country'],'wf-woocommerce-packing-list'),0,0,'L');
		if ($contact_number == 'Yes') {
			$this->Ln(4);
			$this->setXY($x,($this->getY()+6));
			$this->SetFont('Arial','',10*$this->fontfactor);
			$this->Cell(65*$this->xfactor,40*$this->yfactor,__('Ph no : '.$addr['phone'],'wf-woocommerce-packing-list'),0,0,'L');
		}		
	}

	//function to set XY
	function setyval($x)
	{
		$this->setXY($x,($this->getY()+3));
	}

	//function to add from address
	function addShippingFromAddress($faddress, $orderdata)
	{
		$x = 12;
		$this->setXY($x,($this->getY()+(4*$this->yfactor)));
		$i = $this->getY()+(2*$this->yfactor);

		$this->SetFont('Arial','B',9*$this->fontfactor);
		$this->Cell(35*$this->xfactor,8*$this->yfactor,__('FROM:','wf-woocommerce-packing-list'),0,0,'L');

		$this->SetFont('Arial','',6*$this->fontfactor);
		$this->setyval(900*$this->xfactor);
		$this->Cell(22*$this->xfactor,5*$this->yfactor,__('Order Number ','wf-woocommerce-packing-list'),0,0,'L');
                $this->SetFont('Arial','B',6*$this->fontfactor);
		$this->Cell(120*$this->xfactor,5*$this->yfactor,__(': ','wf-woocommerce-packing-list'),0,0,'R');
		$this->Cell(10*$this->xfactor,5*$this->yfactor,__($orderdata['order_id'],'wf-woocommerce-packing-list'),0,0,'L');
		$this->Ln(4);
		$this->setyval(900*$this->xfactor);
		$this->SetFont('Arial','',6*$this->fontfactor);
		$this->Cell(22*$this->xfactor,5*$this->yfactor,__('Weight ','wf-woocommerce-packing-list'),0,0,'L');
                $this->SetFont('Arial','B',6*$this->fontfactor);
		$this->Cell(120*$this->xfactor,5*$this->yfactor,__(': ','wf-woocommerce-packing-list'),0,0,'R');
		$this->Cell(10*$this->xfactor,5*$this->yfactor,__($orderdata['weight'],'wf-woocommerce-packing-list'),0,0,'L');
		$this->setXY($x,$i);
                
                if (get_option('woocommerce_wf_packinglist_enable_cyrillic') == 'Yes') {

                    $this->AddFont('ArialMT', '', 'Arial-Regular.php');
                    $this->SetFont('ArialMT', '', 14);
                    $faddress['sender_name']          = iconv('UTF-8', 'ISO-8859-5', $faddress['sender_name']);
                    $faddress['sender_address_line1'] = iconv('UTF-8', 'ISO-8859-5', $faddress['sender_address_line1']);
                    if($faddress['sender_address_line2']!=''){
                    $faddress['sender_address_line2'] = iconv('UTF-8', 'ISO-8859-5', $faddress['sender_address_line2']);
                    }
                    $faddress['sender_city'] = iconv('UTF-8', 'ISO-8859-5', $faddress['sender_city']);
                    $faddress['sender_country'] = iconv('UTF-8', 'ISO-8859-5', $faddress['sender_country']);
                }
                
		$this->Cell(35*$this->xfactor,10*$this->yfactor,__($faddress['sender_name'],'wf-woocommerce-packing-list'),0,0,'L');

		
		$this->Ln(4);
		$this->setyval($x);
		$this->Cell(35*$this->xfactor,10*$this->yfactor,__($faddress['sender_address_line1'],'wf-woocommerce-packing-list'),0,0,'L');
		if($faddress['sender_address_line2']!='')
		{
			$this->Ln(4);
			$this->setyval($x);
			$this->Cell(65*$this->xfactor,10*$this->yfactor,__($faddress['sender_address_line2'],'wf-woocommerce-packing-list'),0,0,'L');
		}
		$this->Ln(4);
		$this->setyval($x);
		$this->Cell(65*$this->xfactor,10*$this->yfactor,__($faddress['sender_city'],'wf-woocommerce-packing-list'),0,0,'L');
		$this->Ln(4);
		$this->setyval($x);
		$this->Cell(65*$this->xfactor,10*$this->yfactor,__($faddress['sender_country'].' - '. $faddress['sender_postalcode'],'wf-woocommerce-packing-list'),0,0,'L');
		$this->setyval($x);
	}

	//function to add customized return policy, company policy, etc...
	function addPolicies($policy)
	{
		$this->SetFont('Arial','',5*$this->fontfactor);
		$this->setXY(12,($this->getY()+(10*$this->yfactor)));
		$this->MultiCell(80*$this->xfactor,3*$this->yfactor,__(strip_tags($policy),'wf-woocommerce-packing-list'),0,'L',0);
	}

	//function to add customized footer
	function addFooter($footer)
	{
		$this->SetFont('Arial','',5*$this->fontfactor);
		$this->setXY(12,($this->getY()+($this->yfactor)));
		$this->MultiCell(80*$this->xfactor,14*$this->yfactor,__(strip_tags($footer),'wf-woocommerce-packing-list'),0,'L',0);
	}
}
