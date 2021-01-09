<?php

require_once __DIR__ . '/vendor/autoload.php';



// -----------------------------------------------------------------------------

$style_pdf = '
<style>
			.no-border-bottom{
				border-bottom:none;
			}
			.padding-10{
				padding:10px;
			}
			.invoice {
					text-align: center;
			}
			.address {
				border: 1px solid black;
				text-align: center;
				
			}			
			.address > p{
				margin-bottom:-5px;
			}
			
			.client-address-table{
				border-collapse: collapse;
				width:100%;
			}
			
			.client-address-table, th, td{				
				border: 1px solid black;
				
			}
			
			.div-item-table{				
				height:0px;
				text-align:top;
				border: 1px solid red;
			}
			.item-table{
				border-collapse: collapse;
				width:100%;
				min-height:100%;
			}
			.item-table, thead{				
				border: 1px solid black;
				
			}
			.item-table, tbody tr td{
				border-top:none;
				border-bottom:none;
				
			}
			.item-table tbody td{
					padding:15px;
			}
			.total-table {
				border-collapse: collapse;
				width:100%;
				border: 1px solid black;
			}			
			
			.bank-table{
				border-collapse: collapse;
				width:100%;
				border: 1px solid black;
			}

	</style>
<div class="invoice">Invoice</div>   
   
<div class="address no-border-bottom">
		<h3>SRI KULAVILAKKU XXXX XXXXX</h3>
		<p>s/XX. A XXXXXXX PALAYAM</p>
		<p>XXXXX PATTI,XXXXX XXXXXXX-63XXXX</p>
		<p><strong>STATE:</strong> TAMIL NADU &nbsp;  <strong>GSTIN:</strong> 33AHBPNXXXXXXXX</p>
		<p>PHONE : 99429 XXXXX,9442XXXXX &nbsp;  Email : kingmakerpraveenraja.2018@gmail.com</p>
</div>

<table class="client-address-table no-border-bottom" >
    <tr>
        <td rowspan="3" class="padding-10">
					T0: <h3>'.$_POST['cName'].'</h3>
					'.$_POST['address1'].'<br/>
					'.$_POST['address2'].'<br/>
					'.$_POST['city'].' - '.$_POST['pincode'].'<br/>
					'.$_POST['state'].'<br/>
					GSTIN : '.$_POST['gstin'].'<br/>
		</td>
	</tr>
	 <tr>
		<td style="border-top:none;" class="padding-10">
						
						Invoice No : <b>C 14</b><br/>
						Invoice Date : '.date('d-M-Y').'
					</td >
	 </tr>
	  <tr>
			
					<td class="padding-10">
						Bill No : <br/>
						Bill Date : '.date('d-M-Y').'<br/>
						Vehicle No : TNXXXXXX7
					</td>
			
		
    </tr>
    

</table>

		<table class="item-table no-border-bottom" >
			<thead>
			   <tr style="text-align: center">
					<th >S.No</th>
					<th >PARTICULARS</th>
					<th >HSN CODE</th>
					<th >GST %</th>
					<th >QUANTITY</th>
					<th >UNIT</th>
					<th >Rate</th>
					<th >AMOUNT</th>
			   </tr>
		   </thead>
		    <div style="min-height:100% !important; border:2px solid red;">
		   <tbody >';
			$tot = 0;
			for($i=0;$i<count($_POST['itemName']);$i++) {
				$tot = $tot + $_POST['itemPrice'][$i];
				$style_pdf.= '<tr >		
					<td  style="text-align: center">'.($i+1).'</td>
					<td  style="text-align: left">'.$_POST['itemName'][$i].'</td>
					<td  style="text-align: right">5202</td>
					<td  style="text-align: right">5.00</td>
					<td  style="text-align: right">7980.00</td>
					<td  style="text-align: right">KGS</td>
					<td  style="text-align: right">1.00</td>
					<td style="text-align: right">'.$_POST['itemPrice'][$i].'</td> 
				</tr>';		
			}
			
			if(count($_POST['itemName']) < 9 ) {
				for($i=0;$i<9-count($_POST['itemName']);$i++){
					$style_pdf.= "<tr >		
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td ></td>
				<td></td>
				<td></td>
				<td></td> 
				</tr>";
				}		
			}
		$style_pdf.= '<tr style="border:1px solid black;">		
			<td  >&nbsp;</td>
			<td  style="text-align: right;" >TOTAL</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td   style="text-align: right">7980.00</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td   style="text-align: right">'.$tot.'</td> 
		</tr>
		   </tbody>
  </div>

</table>

<table class="bank-table"  >	
   <tbody style="border:none;" >
		<tr >
			<td colspan="7" style="border:none;" class="padding-10" >
					<b><u>OUR BANK</u><br/>
					BANK NAME : xxxx xxxxxxx BANK<br/>
					BRANCH :xxxxxxxx<br/>
					A/C NUMBER : 100xxxxxxxxxxxxx<br/>
					IFSC CODE : xxx000100xx</b>
			</td>
			<td style="text-align: right;border:none;"    >
					<b>Taxable Value</b><br/>
					CGST @ 2.5 %<br/>
					SGST @ 2.5 %<br/>							
			</td>
			<td style="text-align: right">
				<b>'.$tot.'</b><br/>
				199.5<br/>
				199.5<br/>
			</td> 
		</tr>
		<tr  >
			<td style="text-align: right;" colspan="8"  ><h2>Net Amount</h2></td>
			<td style="text-align: right;border-top:1px solid black;"  ><h2>'.$tot.'</h2></td>
		</tr>
   </tbody> 
</table>

<div style="border: 2px solid black;" >
	<strong>Amount Chargeable (In Words): Eight Thousand Three Hundred And Seventy Nine Only</strong>
</div>

<table cellspacing="0" cellpadding="0" border="1" >
	
		<tr>		
			<td>Declaration:<br/>
				We Declare that this invoice shows the actual price of the goals
				descrobed and that all particulars are ture and correct
			</td>
			<td >
			<strong>
					For NILA TEXTILE
			</strong><br/>
					<br/>
					<br/>
					<br/>
					<br/>
			<span>Authorised Signatory</span>
			</td>
			 
		</tr>
</table>

';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($style_pdf);
$mpdf->Output();