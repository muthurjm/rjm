<?php $title = "Add Product"; ?> 
@extends('../admin/layouts/index')
@section('content')
<div class="content-wrapper">
  <section class="content-header">
      <div class="row md-1">
        <div class="col-sm-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Stock </h3>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <ol class="float-sm-right">
            <a href="{{ url('product')}}" class="btn btn-flat btn-custom btn1"><i class="fa fa-bars"></i>&nbsp;Stock List</a>
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
          <form method="post" action="{{url('product_stock')}}">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label class="form-check-label" for="product_name"><b>Product Name*</b></label>
                <select class="form-control select2" name="product_id" id="product_name" style="width:100%;" required>
                    <option value="" selected="selected">Select Code</option>
                  @foreach($products as $product){
                    <option value="{{ $product['id'] }}" >{{ $product['product_no'] }} - {{ $product['product_name'] }}</option>
                    }
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="quantity">Quantity*</label>
                <input type="text" class="form-control" id="quantity" title="Quantity" name="quantity" placeholder="Enter Quantity" required>
                  </div>
              <div class="card-footer">
                <button type="submit" id="add_client" class="btn btn-primary">Add Stock</button>
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
  $(document).ready(function () { 
          $(function () {
            $('.select2').select2()
        });
    });

</script>

@endpush