
<!DOCTYPE html>
<html lang="en" > 
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="{{asset('js/jquery.printPage.js')}}"></script>
	</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-3">
							<b>RJM Agency</b>
							Vasantha nagar
							Ramanathapuram 
					<br>		<b>Bill To:</b><br>
							<b>RJM Agency</b>
							Vasantha nagar
							Ramanathapuram 
					</div>
					<div class="col-md-3">
					</div>
					<div class="col-md-3">
							<b>Mobile Number: 9566711894</b>
							<br>
							<b>GSTN : 9566711894</b>
					</div>
				</div>
			</div>
		</div>
	</div>
<center><a href="{{ url('/printinvoice') }}" class="btnprn btn">Print Preview</a></center>
<script type="text/javascript">
$(document).ready(function(){
	$('.btnprn').printPage();
});
</script>
</body>
</html>
