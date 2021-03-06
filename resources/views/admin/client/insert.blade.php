<?php $title = "Add Client"; ?> 
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
              <h3 class="card-title">Add Client </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <ol class="float-sm-right">
            <a href="{{ url('client')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Client List</a>
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
          <form id="formid" method="post" action="{{url('client')}}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="code">Client No*</label>
              <input type="text" class="form-control" value="{{ $client_no }}"  disabled title="Client Name">
              <input type="hidden" name="client_no" value="{{ $client_no }}">
              </div>
              <div class="form-group">
                  <label for="Client Name">Client Name*</label>
                  <input type="text" class="form-control" id="Client_Name" title="Client Name" name="name" placeholder="Enter Client Name" required>
                    </div>
              <div class="form-group">
                <label for="Street">Street</label>
                <input type="text" class="form-control" id="Street" title="Street" name="street" placeholder="Enter Street" >
                  </div>
              <div class="form-group">
                  <label for="City">City*</label>
                  <input type="text" class="form-control" id="City" title="City" name="city" placeholder="Enter City" required>
                    </div>
                    <div class="form-group">
                      <label>Choose Category</label>
                      <select required name="category" class="form-control select2" style="width: 100%;">
                        <option value="" selected="selected">Select Category</option>
                        <option value="medical">Medical</option>
                        <option value="gt">GT</option>
                      </select>
                    </div>
                <div class="form-group">
                    <label for="Tin">GST</label>
                    <input type="text" class="form-control" id="Tin" title="Street" name="tin" placeholder="Enter Tin" >
                      </div>
                  <div class="form-group">
                      <label for="Phone1">Phone1*</label>
                      <input type="text" class="form-control" id="Phone1" title="Phone1" name="phone1" placeholder="Enter Phone1" >
                        </div>
                  <div class="form-group">
                        <label for="Phone2">Phone2</label>
                        <input type="text" class="form-control" id="Phone2" title="Phone2" name="phone2" placeholder="Enter Phone2" >
                  </div>
              <div class="card-footer">
                <button type="submit" id="add_client" class="btn btn-primary">Add Client</button>
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
$('.select2').select2()
</script>
@endpush