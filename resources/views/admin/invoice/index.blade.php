<?php $title = "Invoices"; ?> 
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
          <h1>Invoices</h1>
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
                  <th>Invoices No</th>
                  <th> Date</th>
                  <th>Client Name</th>
                  <th>GST No</th>
                  <th>Phone Number</th>
                  <th>Count</th>
                  <th>Sub Total</th>
                  <th>Grand Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?> @foreach($invoice as $invoices)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $invoices['invoice_number'] }}</td>
                  <td>{{ $invoices['invoice_date'] }}</td>
                  <td>{{ $invoices['name'] }}</td>
                  <td>{{ $invoices['tin'] }} </td>
                  <td>{{ $invoices['phone'] }} </td>
                  <td>{{ $invoices['count'] }}</td>
                  <td>{{ $invoices['sub_total'] }}</td>
                  <td>{{ $invoices['grand_total'] }}</td>
                  <td>
                      <form action="{{action('admin\AdminInvoiceController@destroy', $invoices['id'])}}" method="post">
                          @csrf
                          {{-- <a href="{{action('admin\AdminInvoiceController@edit', $invoices['id'])}}" title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a> --}}
                          <a target="_blank" href="{{action('InvoiceController@print1', $invoices['id'])}}" title='View' class='btn btn-flat btn-success'><i class="fa fa-print"></i></button></a>
                          <a href="{{action('admin\AdminInvoiceController@show', $invoices['id'])}}" title='View' class='btn btn-flat btn-info'><i class="fa fa-eye"></i></button></a>
                          <input name="_method" type="hidden" value="DELETE">
                          <button style="margin-top: -67px;margin-left: 90px;" class="btn btn-danger" onclick="if (!confirm('Are you sure,You want to delete this Invoice  ?')) { return false }"
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
<script>
  $(document).ready(function(){
      $("#example1").DataTable();   
    });

</script>
@endpush 