<?php $title = "Add Product"; ?> 
@extends('../admin/layouts/index')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <div class="row md-1">
        <div class="col-sm-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Purchase </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <ol class="float-sm-right">
            <a href="{{ url('purchase')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Purchase List</a>
          </ol>
        </div>
        <div class="col-md-10">
            @if ($message = Session::get('success'))
            <div class="alert  alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <p>{{ $message }}</p>
            </div>
              @endif
              @if ($message = Session::get('error'))
              <div class="alert  alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <p>{{ $message }}</p>
              </div>
                @endif
        </div>
        <div class="col-md-2"></div>
        <div class="col-sm-8">
          <form method="post" action="{{url('purchase')}}">
            @csrf
            <div class="card-body">
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
                <div class="form-group">
                  <label for="taxable">Taxable*</label>
                  <input type="text" class="form-control" id="taxable" title="Taxable" name="taxable" placeholder="Enter Taxable" required>
                    </div>
                    <div class="form-group">
                      <label for="quantity">SGST*</label>
                      <input type="text" class="form-control" id="quantity" title="SGST" name="sgst" placeholder="Enter SGST" required>
                    </div>
                  <div class="form-group">
                      <label for="cgst">CGST*</label>
                      <input type="text" class="form-control" id="cgst" title="CGST" name="cgst" placeholder="Enter CGST" required>
                  </div>
                <div class="card-footer">
                    <button type="submit" id="add_client" class="btn btn-primary">Add Purchase</button>
                </div>
          </form>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@stop
@push("js")
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function () { 
          $(function () {
            $('.select2').select2()
        });
    });

</script>

@endpush