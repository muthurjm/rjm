
<!DOCTYPE html>
<html lang="en" > 
	<head>
		<meta charset="utf-8"> 
		<title>Invoice</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="{{asset('js/jquery.printPage.js')}}"></script>
		<style>
body{
	font-size: 17px !important;
}
		.table-condensed>tbody>tr>td, .table-condensed>tbody>tr>th, .table-condensed>tfoot>tr>td, .table-condensed>tfoot>tr>th, .table-condensed>thead>tr>td, .table-condensed>thead>tr>th {
    padding: 0px !important;
}

.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 0px !important;
}
table{
	border: 1px solid #000 !important;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    border-top: 1px solid #000;
    border-left: 1px solid #000;
}
.bl{
	border-left-color:#fff !important;
}
.bt{
	border-top-color:#fff !important;
}
.br{
	border-right-color:#fff !important;
}
.bb{
	border-bottom-color:#fff !important;
}
.table_t{
	border-bottom-color:#fff !important;
}
@media print
{
.btn  { display: none; }
}
</style>
	</head>
<body>
<center><a href="{{ url('/') }}" class="btn btn-primary">Invoice</a>
	<a onclick="myFunction()" class="btn btn-primary">Print Preview</a></center>
    <div class="container-fluid">
		<div class="row">
		  <div class="col-md-7">
	  <div class="row">
		  <div class="col-xs-12">
			  <div class="row">
					<br><strong><center>Tax Invoice</center></strong><br>
				  <div class="col-xs-5">
					<address>
					<strong>Bill No:{{ $invoice->invoice_number }}</strong><br>
						<strong>Date:{{ $invoice->invoice_date }}</strong><br>
						<strong>Client Code:{{ $invoice->client_code }}</strong><br>
						<strong>GST No :33BJSPM6833M1ZI</strong><br>
					</address>
				  </div>
				  <div class="col-xs-3">
					<address>
						<strong>Bill From:</strong><br>
						RJM Agency,
						Vasantha nagar,<br>Ramanathapuram<br>
						Mobile No : 7010098300<br>
					</address>
				  </div>
				  <div class="col-xs-4 text-right" >
					<address>
						<strong>Bill To:</strong><br>
						{{ $invoice->name }},<br>
						{{ $invoice->street }},{{ $invoice->city }}<br>
						{{ $invoice->phone }}<br>
						GST No :{{ $invoice->tin }}<br>
					</address>
				  </div>
			  </div>
		  </div>
	  </div>
	  
	  <div class="row">
		  <div class="col-md-12">
			  <div class="panel panel-default">
				  <div>
					  <div class="table-responsive">
						  <table class="table table-condensed">
							  <thead>
								  <tr>
									  <td class="text-center"><strong>S NO</strong></td>
									  <td class="text-center"><strong>HSN</strong></td>
									  <td class="text-center"><strong>MRP</strong></td>
									  <td class="text-center"><strong>DESCRIPTION</strong></td>
									  <td class="text-center"><strong>QTY</strong></td>
									  <td class="text-center"><strong>PRICE</strong></td>
									  <td class="text-center"><strong>GST</strong></td>
									  <td class="text-center"><strong>AMOUNT</strong></td>
								  </tr>
							  </thead>
							  <tbody>
									<?php $i=1 ?> @foreach($invoicepurchases as $invoicepurchase)
									<?php if($invoicepurchase->invoice_id == $invoice->id){  ?>
								  <tr>
										<td class="text-center">{{ $i }}</td>
									  <td class="text-center">{{ $invoicepurchase['hsn'] }}</td>
									  <td class="text-center">{{ $invoicepurchase['mrp'] }}</td>
									  <td class="text-center">{{ $invoicepurchase['product_name'] }}</td>
									  <td class="text-center">{{ $invoicepurchase['quantity'] }}</td>
									  <td class="text-center">{{ $invoicepurchase['price'] }}</td>
									  <td class="text-center">{{ $invoicepurchase['gst'] }}</td>
									  <td class="text-center">{{ $invoicepurchase['amount'] }}</td>
								  </tr>
								<?php  $i = $i+1; }?> @endforeach
									<tr style="    font-size: 14px;font-weight:bold;">
											<td class="br "></td>
											<td class="bl br "></td>
											<td class="bl br "></td>
											<td class="bl br "></td>
											<td class="bl br "></td>
											<td class="bl br "></td>
											<td class="bl br ">SUB TOTAL</td>
											<td  class="text-center">{{ $invoice["sub_total"] }}</td>
										</tr>
								  <tr style="    font-size: 14px;font-weight:bold;">
										<td class="br bt "></td>
										<td class="bl br bt "></td>
										<td class="bl br bt ">CGST 6%</td>
										<td class="bl br bt ">{{ $invoice["cgst_6"] }}</td>
										<td class="bl br bt ">SGST 6%</td>
										<td class="bl br bt ">{{ $invoice["sgst_6"] }}</td>
									  <td class="bl br bt ">GST 12%</td>
										<td class="text-center">{{ $invoice["gst_12"] }}</td>
								  </tr>
								  <tr style="    font-size: 14px;font-weight:bold;">
											<td class="br  bt "></td>
											<td class="bl br bt "></td>	
											<td class="bl br bt ">CGST 9%</td>
											<td class="bl br bt ">{{ $invoice["cgst_9"] }}</td>
											<td class="bl br bt ">SGST 9%</td>
											<td class="bl br bt ">{{ $invoice["sgst_9"] }}</td>
											<td class="bl br bt ">GST 18%</td>
										<td  class="text-center">{{ $invoice["gst_18"] }}</td>
									</tr>
									<tr style="    font-size: 14px;font-weight:bold;">
											<td class="br  bt "></td>
											<td class="bl br  bt "></td>
											<td class="bl br  bt ">CGST 14%</td>
										<td class="bl br  bt ">{{ $invoice["cgst_14"] }}</td>
										<td class="bl br  bt ">SGST 14%</td>
										<td class="bl br  bt ">{{ $invoice["sgst_14"] }}</td>
											<td class="bl br  bt ">GST 28%</td>
											<td class="text-center">{{ $invoice["gst_28"] }}</td>
										</tr>
										<tr style="font-weight:bold;">
												<td class="br  bt bb "></td>
												<td colspan="5" class="text-center bl br  bt bb ">Thank you for your business!</td>
												<td  class="bl br  bt  ">GRAND TOTAL</td>
												<td class="text-center">{{ $invoice["grand_total"] }}</td>
											</tr>
							  </tbody>
						  </table>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>
  </div>
  <div class="col-md-5">
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
						<br><strong><center>Acknowledgement</center></strong><br>
					  <div class="col-xs-5">
						<address>
						<strong>Bill No:{{ $invoice->invoice_number }}</strong><br>
							<strong>Date:{{ $invoice->invoice_date }}</strong><br>
							<strong>Client Code:{{ $invoice->client_code }}</strong><br>
							<strong>GST NO :33BJSPM6833M1ZI</strong><br>
						</address>
					  </div>
					  <div class="col-xs-3">
						<address>
							<strong>Bill From:</strong><br>
							RJM Agency,
							Vasantha nagar,<br>Ramanathapuram<br>
							 7010098300<br>
						</address>
					  </div>
					  <div class="col-xs-4 text-right" >
						<address>
							<strong>Bill To:</strong><br>
							{{ $invoice->name }},<br>
							{{ $invoice->street }},{{ $invoice->city }}<br>
							{{ $invoice->phone }}<br>
							GST NO :{{ $invoice->tin }}<br>
						</address>
					  </div>
				  </div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div>
						<div class="table-responsive">
								<table class="table table-condensed">
										<thead>
											<tr>
												<td class="text-center"><strong>S.NO</strong></td>
												<td class="text-center"><strong>DESCRIPTION</strong></td>
												<td class="text-center"><strong>QTY</strong></td>
												<td class="text-center"><strong>PRICE</strong></td>
											</tr>
										</thead>
										<tbody>
											  <?php $j=1 ?> @foreach($invoicepurchases as $invoicepurchase)
											  <?php if($invoicepurchase->invoice_id == $invoice->id){ ?>
											<tr>
												  <td class="text-center">{{ $j }}</td>
												<td class="text-center">{{ $invoicepurchase['product_name'] }}</td>
												<td class="text-center">{{ $invoicepurchase['quantity'] }}</td>
												<td class="text-center">{{ $invoicepurchase['amount'] }}</td>
											</tr>
										  <?php  $j = $j+1; } ?> @endforeach
										  <tr style="font-weight:bold;">
												<td class=" br  text-center"></td>
												<td class="bl br  text-center"></td>
											  <td class="bl br  text-center">Sub Total</td>
											  <td class="bl br   text-center">{{ $invoice["sub_total"] }}</td>
										  </tr>
										  <tr style="font-weight:bold;">
												<td class=" br  bt text-center"></td>
												<td class="bl br  bt text-center"></td>
											  <td class="bl br  bt text-center">GST 12%</td>
											  <td class="bl br  bt text-center">{{ $invoice["gst_12"] }}</td>
											</tr>
											<tr style="font-weight:bold;">
												<td class=" br  bt text-center"></td>
												<td class="bl br  bt text-center"></td>
											  <td class="bl br  bt text-center">GST 18%</td>
											  <td class="bl br  bt text-center">{{ $invoice["gst_18"] }}</td>
											</tr>
											<tr style="font-weight:bold;">
												<td class=" br  bt text-center"></td>
												<td class="bl br  bt text-center"></td>
											  <td class="bl br  bt text-center">GST 28%</td>
											  <td class="bl br  bt text-center">{{ $invoice["gst_28"] }}</td>
											</tr>
											<tr style="font-weight:bold;">
												<td class=" br  bt text-center"></td>
												<td class="bl br  bt text-center"></td>
											  <td class="bl br  bt text-center">Grand Total</td>
											  <td class="bl br  bt text-center">{{ $invoice["grand_total"] }}</td>
										  </tr>
										</tbody>
									</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
<script type="text/javascript">
function myFunction() {
    window.print();
}
</script>
</body>
</html>
