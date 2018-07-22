<?php $title = "Edit Client"; ?> 
@extends('../admin/layouts/index')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      </div>
      <div class="row md-1">
        <div class="col-sm-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Hsn Code </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <ol class="float-sm-right">
            <a href="{{ url('hsn')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Hsn Code List</a>
          </ol>
        </div>
        <div class="col-sm-8">
          <form id="formid" method="post" action="{{action('admin\HsnController@update', $id)}}">
              @csrf @method('PUT')
            <div class="card-body">
              <div class="form-group">
                <label for="code">Hsn code*</label>
              <input type="text" class="form-control" value="{{ $hsn['hsn_code'] }}" id="hsn_code" required name="hsn_code" title="Hsn Code">
              </div>
              <div class="form-group">
                  <label for="tax">Tax (In Percent)*</label>
                  <input type="text" class="form-control" value="{{ $hsn['tax'] }}" id="tax" title="Tax" name="tax" placeholder="Enter Tax" required>
                    </div>
              <div class="card-footer">
                <button type="submit" id="add_client" class="btn btn-primary">Submit</button>
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
{{-- <script>
$('#formid').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
</script> --}}
@endpush