<?php $title = "products"; ?> 
@extends('../admin/layouts/index') @push('css')
<link rel="stylesheet" href="{{asset('website/plugins/datatables/jquery.dataTables.min.css')}}"> 
@endpush 
@section('content')
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      @if ($message = Session::get('success'))
      <div class="alert alert-dismissible alert-success">
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
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Purchase</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ action('admin\PurchaseController@create') }}" class="btn btn-flat btn-custom btn1"><i class="fa fa-plus"></i> Add Purchase Items</a>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">
        <!-- .card-header -->
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Invoice No</th>
                  <th>Invoice Date</th>
                  <th>Invoice Amount</th>
                  <th>Tax</th>
                  <th>SGST</th>
                  <th>CGST</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?> @foreach($purchases as $purchase)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $purchase['invoice_number'] }}</td>
                  <td>{{ $purchase['invoice_date'] }}</td>
                  <td>{{ $purchase['invoice_amount'] }}</td>
                  <td>{{ $purchase['taxable'] }} </td>
                  <td>{{ $purchase['sgst'] }}</td>
                  <td>{{ $purchase['cgst'] }}</td>
                </tr>
                <?php $i = $i+1 ?> @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@stop @push('js')
<script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
  $(document).ready(function(){
      $("#example1").DataTable();   
    });

</script>
@endpush