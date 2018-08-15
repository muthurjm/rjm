<?php $title = "Invoice Report"; ?> 
@extends('../admin/layouts/index') @push('css')
<link rel="stylesheet" href="{{asset('website/plugins/datatables/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('website/plugins/datepicker/datepicker3.css')}}"> 
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
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Invoice Report</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label for="NoIconDemo">Search By Date*</label>
            <input type="text" class="form-control sdate" name="sdate" id="NoIconDemo1" placeholder="Choose Start Date" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="NoIconDemo">Search By Date*</label>
            <input type="text" class="form-control edate" name="edate" id="NoIconDemo2" placeholder="Choose End Date" required autocomplete="off">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="NoIconDemo">Search By Category*</label>
              <select required name="category" class="form-control select2" id="NoIconDemo3"  name="category" placeholder="Choose Category" id="NoIconDemo3" style="width: 100%;">
                <option value="" selected="selected">Select Category</option>
                <option value="medical">Medical</option>
                <option value="gt">GT</option>
              </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="NoIconDemo">Search By Shop Name*</label>
              <select required name="category" class="form-control select2" id="NoIconDemo4" name="category" placeholder="Choose Category" id="NoIconDemo3" style="width: 100%;">
                <option value="" selected="selected">Select Shop Name</option>
                @foreach($reports as $report){
                  <option value="{{ $report['id'] }}" >{{ $report['name'] }} - {{ $report['client_no'] }}</option>
                  }
                  @endforeach
              </select>
          </div>
        </div>
        <div class="col-md-2">
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
                    <th>Shop Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Amount</th>
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
<script src="{{asset('website/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script type="text/javascript">
  var RootUrl = '@Url.Content("~/")';
</script>
<script>
  $(document).ready(function(){
    $('#NoIconDemo').MonthPicker({ Button: false });
    $('.select2').select2()
      $('input[class$=date]').datepicker({
          format: "yyyy-mm-dd",
          endDate: "today",
          selectOtherMonths: true,
          changeMonth: true,
          changeYear: true,
          showButtonPanel: true,
          autoclose: true, 
        });
    $('#search').click(function(e) {
    e.preventDefault();
    if(!$("#NoIconDemo1").val() == ""){
      if($("#NoIconDemo2").val() == ""){
        alert("Choose Date Correctly");
        return false;
      }
    }
    else if($("#NoIconDemo4").val() == "" && $("#NoIconDemo3").val() == "" &&  $("#NoIconDemo1").val() == ""){
      alert("s");
      return false;
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var splitdata = [];
    splitdata[0] = $("#NoIconDemo1").val();
    splitdata[1] = $("#NoIconDemo2").val();
    splitdata[2] = $("#NoIconDemo3").val();
    splitdata[3] = $("#NoIconDemo4").val();
    $.ajax({
         type:"POST",
         url:"/invoicereport/ajax",
         data: {month:splitdata},
         dataType:"json", 
         success : function(data) {
             test = JSON.stringify(data);
             console.log(test);
             if(data.length != 0){
                var len = data.length;
                var txt = "";
            for (var i=0; i<len; i++) {
                txt += "<tr><td>"+(i+1)+"</td><td>"+data[i].number+"</td><td>"+data[i].date+"</td><td>"+data[i].name+"</td><td>"+data[i].product_name+"</td><td>"+data[i].quantity+"</td><td>"+data[i].amount+"</td></tr>";
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