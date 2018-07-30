<?php $title = "Add HSN"; ?> 
@extends('../admin/layouts/index')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <div class="row md-1">
        <div class="col-sm-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Hsn Code </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <ol class="float-sm-right">
            <a href="{{ url('hsn')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Hsn List</a>
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
          <form id="formid" method="post" action="{{url('hsn')}}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="hsn">Hsn Code*</label>
              <input type="text" id="hsn" class="form-control" required name="hsn_code" placeholder="Enter HSN Code"  title="Hsn Code">
              </div>
              <div class="form-group">
                  <label for="tsx">Tax (In Percent)*</label>
                  <input type="text" id="tax" class="form-control" id="tax" title="Tax" name="tax" placeholder="Enter Product Name" required>
                    </div>
              <div class="card-footer">
                <button type="submit" id="add_hsn" class="btn btn-primary">Add Hsn Code</button>
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