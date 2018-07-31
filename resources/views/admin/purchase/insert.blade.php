<?php $title = "Add Purchase"; ?> 
@extends('../admin/layouts/index') @push('css')
<link rel="stylesheet" href="{{asset('website/plugins/datatables/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('website/plugins/datepicker/datepicker3.css')}}"> 
<style>
    body{
        overflow-x: hidden;
    }
</style>
@endpush 
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        @if ($message = Session::get('success'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-10 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Purchases </h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <ol class="float-sm-right">
                    <a href="{{ url('purchase')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Purchase List</a>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
            <br>
            <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <form id="regiration_form" autocomplete="off" action="{{url('purchase')}}" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <br/>
                    <h2>Step 1: Basic Details</h2>
                    <br/>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="invoice_number">Invoice Number*</label>
                                <input type="text" class="form-control" id="invoice_number" title="Invoice Number" name="invoice_number" placeholder="Enter Invoice Number" required>
                            </div>
                                <div class="form-group">
                                    <label for="invoice_date">Invoice Date*</label>
                                    <input type="text" class="form-control" id="invoice_date" title="Invoice Date" name="invoice_date" placeholder="Enter Invoice Date" required>
                                </div>
                                <div class="form-group">
                                        <label for="invoice_amount">Invoice Amount*</label>
                                        <input type="text" class="form-control" id="invoice_amount" title="Invoice Amount" name="invoice_amount" placeholder="Enter Invoice Amount" required>
                                </div>
                        </div>
                        <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="taxable">Taxable*</label>
                                        <input type="text" class="form-control" id="taxable" title="Taxable" name="taxable" placeholder="Enter Taxable" required>
                                          </div>
                                    <div class="form-group">
                                      <label for="sgst">SGST*</label>
                                      <input type="text" class="form-control" id="sgst" title="SGST" name="sgst" placeholder="Enter SGST" required>
                                    </div>
                                  <div class="form-group">
                                      <label for="cgst">CGST*</label>
                                      <input type="text" class="form-control" id="cgst" title="CGST" name="cgst" placeholder="Enter CGST" required>
                                  </div>
                        </div>
                    </div>
                    <input type="button" name="" id="next" class="next btn btn-info" value="Next" />
                </fieldset>
                <fieldset> 
                    <br><br>
                    <h2>Step 2: Media</h2>
                    <div class="row">
                        <?php for($i =0;$i<=7;$i++){ ?>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label class="form-check-label" for="product_name"><b>Product Name*</b></label>
                              <select class="form-control select2" name="product[]" id="product_name" style="width:100%;" >
                                <option value="" selected="selected">Select Product</option>
                                  @foreach($products as $product){
                                  <option value="{{ $product['id'] }}" >{{ $product['product_no'] }} - {{ $product['product_name'] }}</option>
                                  }
                                  @endforeach
                              </select>
                          </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                  <label for="quantity">Quantity*</label>
                                  <input type="text" class="form-control" id="quantity" title="Quantity" name="quantity[]" placeholder="Enter Quantity" >
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-4">
                                <div class="form-group">
                                  <label class="form-check-label" for="product_name"><b>Product Name*</b></label>
                                    <select class="form-control select2" name="product[]" id="product_name" style="width:100%;" >
                                      <option value="" selected="selected">Select Product</option>
                                        @foreach($products as $product){
                                        <option value="{{ $product['id'] }}" >{{ $product['product_no'] }} - {{ $product['product_name'] }}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                        <label for="quantity">Quantity*</label>
                                        <input type="text" class="form-control" id="quantity" title="Quantity" name="quantity[]" placeholder="Enter Quantity" >
                                  </div>
                              </div>
                                <div class="col-md-4">
                                  <button style="margin-top:30px;" class="btn btn-success success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                        <div class="increment">
                      </div>
                    <div  class="clone hide">
                                <div id="remove">
                              <div class="form-group">
                                <label class="form-check-label" for="product_name"><b>Product Name*</b></label><br>
                                  <select class="form-control" name="product[]" id="product_name" style="width:360px;" >
                                        <option value="" selected="selected">Select Product</option>
                                        @foreach($products as $product){
                                        <option value="{{ $product['id'] }}" >{{ $product['product_no'] }} - {{ $product['product_name'] }}</option>
                                        }
                                        @endforeach
                                  </select>
                              </div>
                                <div class="form-group" style="margin-top:-85px;margin-left: 370px;">
                                      <label for="quantity">Quantity*</label>
                                      <input type="text" class="form-control" id="quantity"  style="width:360px;" title="Quantity" name="quantity[]" placeholder="Enter Quantity">
                                </div>
                                <button style="margin-top:-103px;margin-left: 740px;" class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-plus"></i>Remove</button>
                          </div>
                        </div>
                        </div>
                    <br>
                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
                    <input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit_data" />
                </fieldset>
            </form>
        </div>
    </section>
</div>
@stop @push('js')
<script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('website/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('website/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function(){
       var current = 1,current_step,next_step,steps;
       steps = $("fieldset").length;
       $(".next").click(function(){
        if(!$('#invoice_date').val() || !$('#invoice_amount').val() || !$('#invoice_number').val() || !$('#taxable').val() || !$('#sgst').val() || !$('#cgst').val()) {
                alert('Please fill the first row');
                return false;
        }
           current_step = $(this).parent();
           next_step = $(this).parent().next();
           next_step.show();
           current_step.hide();
           setProgressBar(++current);
       });
       $(".previous").click(function(){
           current_step = $(this).parent();
           next_step = $(this).parent().prev();
           next_step.show();
           current_step.hide();
           setProgressBar(--current);
       });
       setProgressBar(current);
       function setProgressBar(curStep){
           var percent = parseFloat(100 / steps) * curStep;
           percent = percent.toFixed();
           $(".progress-bar")
               .css("width",percent+"%")
               .html(percent+"%");		
       }                                    
        $(".success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents("#remove").remove();
      });
    });
    $(function () {
        $('.select2').select2()
      $('input[id$=invoice_date]').datepicker({
          format: "yyyy-mm-dd",
          endDate: "today",
          selectOtherMonths: true,
          changeMonth: true,
          changeYear: true,
          showButtonPanel: true,
          autoclose: true, 
        });
    })
</script>
@endpush