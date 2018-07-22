<?php $title = "Product"; ?> 
@extends('../admin/layouts/index') @push('css')
<link rel="stylesheet" href="{{asset('website/plugins/datatables/jquery.dataTables.min.css')}}"> 
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
      @if ($message = Session::get('error'))
      <div class="alert  alert-danger">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>{{ $message }}</p>
      </div>
        @endif
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ action('admin\ProductStockController@create') }}" class="btn btn-flat btn-custom btn1"><i class="fa fa-plus"></i> Add</a>
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
                  <th>Product No</th>
                  <th>HSN Code</th>
                  <th>Product Name</th>
                  <th>Price(MRP) & Tax</th>
                  <th>Invoice Price(GST)</th>
                  <th>Sales</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?> @foreach($products as $product)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $product['no'] }}</td>
                  <td>{{ $product['product_no'] }}</td>
                  <td>{{ $product['hsn_code'] }}</td>
                  <td>{{ $product['description'] }}</td>
                  <td>{{ $product['mrp'] }} = {{ $product['tax'] }}</td>
                  <td>{{ $product['invoice_price'] }}</td>
                  <td>{{ $product['sales'] }}</td>
                  <td>
                      <a href="{{action('admin\productController@edit', $product['id'])}}" title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                 </td>
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