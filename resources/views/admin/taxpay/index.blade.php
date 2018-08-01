<?php $title = "Tax Pay"; ?> 
@extends('../admin/layouts/index') @push('css')
<link rel="stylesheet" href="{{asset('website/plugins/datatables/jquery.dataTables.min.css')}}">
<link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
<style>
  .month-picker {
    font-size: 12px;
    font-family: Verdana, Arial, sans-serif;
    width: 180px !important;
  }
</style>
@endpush 
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      @if ($message = Session::get('success'))
      <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{ $message }}</p>
      </div>
      @endif
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tax Pay</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="NoIconDemo">Choose Month*</label>
            <input type="text" class="form-control" name="month" id="NoIconDemo" placeholder="Choose Month" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-3">
          <button style="margin-top:30px!important" type="submit" name="search" id="search" class="btn btn-primary">Search</button>
        </div>
      </div>
    </div>
    <button id="btnExportToPDF" onclick="generate()" class="block buttons-pdf">Generate PDF</button>
    <button id="button1" class="block buttons-excel" onclick="tableToExcel('example5', 'W3C Example Table')">Export to Excel</button>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table id="example5" class="table table-bordered table-striped block">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
                    <th>Invoice Amount</th>
                    <th>Taxable</th>
                    <th>SGST</th>
                    <th>CGST</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>







@stop @push('js')
<script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src='https://cdn.rawgit.com/simonbengtsson/jsPDF/requirejs-fix-dist/dist/jspdf.debug.js'></script>
<script src='https://unpkg.com/jspdf-autotable@2.3.2'></script>
<script src="{{asset('admin/js/taxpay.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="{{asset('admin/js/MonthPicker.min.js')}}"></script>
<script type="text/javascript">
  var RootUrl = '@Url.Content("~/")';

</script>
<script>
  $(document).ready(function(){
    $('#NoIconDemo').MonthPicker({ Button: false });
$('#search').click(function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if($("#NoIconDemo").val() == ""){
      alert("Enter Month");
      return false;
    }
    var month = $("#NoIconDemo").val();
   var  splitdata = month.split('/');
    $.ajax({
         type:"POST",
         url:"/taxpay/ajax",
         data: {month:splitdata},
         dataType:"json", 
         success : function(data) {
             test = JSON.stringify(data);
             console.log(test);
             if(data.length != 0){
                var len = data.length;
                var txt = "";
            for (var i=0; i<len; i++) {
                txt += "<tr><td>"+(i+1)+"</td><td>"+data[i].invoice_number+"</td><td>"+data[i].invoice_date+"</td><td>"+data[i].invoice_amount+"</td><td>"+data[i].taxable+"</td><td>"+data[i].sgst+"</td><td>"+data[i].cgst+"</td></tr>";
            }
                     $("#example5").append(txt).removeClass("block");
                    $("#btnExportToPDF").removeClass("block");
                    $("#button1").removeClass("block");
          }
          if(data.length == 0){
            alert("No Data Found");
            $("#NoIconDemo").val("");
                $("#btnExportToPDF").addClass("block");
                    $("#button1").addClass("block");
                    $("#example5").addClass("block");
            }
         }
    }); 
});
$('#search').click(function() {
$('#example5 > tbody > tr > td').parent('tr').empty();
});
});

</script>
@endpush