<?php $title = "Clients"; ?> 
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
          <h1>Clients</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ action('admin\ClientController@create') }}" class="btn btn-flat btn-custom btn1"><i class="fa fa-plus"></i> Add</a>
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
                  <th>Client Code</th>
                  <th>Name</th>
                  <th>Street</th>
                  <th>City</th>
                  <th>TIN No</th>
                  <th>Phone </th>
                  <th>Phone </th>
                  {{--
                  <th>Expiry Date</th> --}}
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?> @foreach($clients as $client)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $client['client_no'] }}</td>
                  <td>{{ $client['name'] }}</td>
                  <td>{{ $client['street'] }}</td>
                  <td>{{ $client['city'] }}</td>
                  <td>{{ $client['tin'] }}</td>
                  <td>{{ $client['phone1'] }}</td>
                  <td>{{ $client['phone2'] }}</td>
                  <td>
                    <form action="{{action('admin\ClientController@destroy', $client['id'])}}" method="post">
                      @csrf
                      <a href="{{action('admin\ClientController@edit', $client['id'])}}" title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" onclick="if (!confirm('Are you sure,You want to delete this clients?')) { return false }"
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