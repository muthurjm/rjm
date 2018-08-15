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
          <h1>Product Stock</h1>
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
                  <th>Product Name</th>
                  <th>Invoice Price</th>
                  <th>Stock</th>
                  <th>Tax</th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?> @foreach($products as $product)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $product['product_no'] }}</td>
                  <td>{{ $product['product_name'] }}</td>
                  <td>{{ $product['invoice_price'] }}</td>
                  <td>{{ $product['stock'] }} </td>
                  <td>{{ $product['tax'] }}%</td>
                  <td><?php echo $product['invoice_price']*$product['stock']; ?></td>
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
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script>
  $(document).ready(function(){
    $("#example1").DataTable({
        dom: 'lfBrtip',
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            buttons: [
                'excelHtml5',
                'pdfHtml5'
            ]
      });    
    });

</script>
@endpush