<?php $title = "HSN"; ?> 
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
          <h1>HSN</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ action('admin\HsnController@create') }}" class="btn btn-flat btn-custom btn1"><i class="fa fa-plus"></i> Add</a>
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
                  <th>HSN Code</th>
                  <th>Tax %</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1 ?> @foreach($taxes as $tax)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $tax['hsn_code'] }}</td>
                  <td>{{ $tax['tax'] }}</td>
                  <td>
                    <form action="{{action('admin\HsnController@destroy', $tax['id'])}}" method="post">
                      @csrf
                      <a href="{{action('admin\HsnController@edit', $tax['id'])}}" title='Edit' class='btn btn-flat btn-primary'><i class='fa fa-edit'></i></a>
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-danger" onclick="if (!confirm('Are you sure,You want to delete this Code?')) { return false }"
                        type="submit"><i class='fa fa-trash-o'></i></button>
                    </form>
                    <a href="{{action( 'admin\HsnController@show', $tax[ 'id'])}}"> <button  class="btn btn-info info1" type="submit"><i class="fa fa-eye"></i></button></a>
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