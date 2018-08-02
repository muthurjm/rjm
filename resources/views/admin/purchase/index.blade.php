<?php $title = "Purchase"; ?> 
@extends('../admin/layouts/index') @push('css')
<link rel="stylesheet" href="{{asset('website/plugins/datatables/jquery.dataTables.min.css')}}"> 
<style>
  #example1_filter,
  #example2_filter {
    margin-left: 330px !important;
    width: 50%;
  }
</style>


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
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?> @foreach($purchases as $purchase)
                <tr>
                  <td>{{ $i }}</td>
                  <td><a href="{{action('admin\PurchaseController@show',  $purchase['id']) }}">{{ $purchase['invoice_number'] }}</a></td>
                  <td>{{ $purchase['invoice_date'] }}</td>
                  <td>{{ $purchase['invoice_amount'] }}</td>
                  <td>{{ $purchase['taxable'] }} </td>
                  <td>{{ $purchase['sgst'] }}</td>
                  <td>{{ $purchase['cgst'] }}</td>
                  <td>
                      <form action="{{action('admin\PurchaseController@destroy', $purchase['id'])}}" method="post">
                          @csrf
                          <a href="{{action('admin\PurchaseController@edit', $purchase['id'])}}" title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                          <input name="_method" type="hidden" value="DELETE">
                          <button class="btn btn-danger" onclick="if (!confirm('Are you sure,You want to delete this Purchase?')) { return false }"
                            type="submit"><i class='fa fa-trash-o'></i></button>
                        </form>
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