<?php
 $title = "View Purchases"; 
?>
@extends('../admin/layouts/index') @push('css')

    <link rel="stylesheet" href="{{asset('website/plugins/datatables/jquery.dataTables.min.css')}}"> 
@endpush 
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Purchased Products</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('purchase')}}">Purchase List</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- Main content -->

        <section class="content">
            <div class="row">
                <div class="col-md-3">
                        <div class="form-group">
                                <label for="invoice_number">Invoice Number*</label>
                        <input type="text" readonly class="form-control" id="invoice_number" value="{{ $productpurchase['invoice_number'] }}" title="Invoice Number" name="invoice_number" placeholder="Enter Invoice Number" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label for="invoice_date">Invoice Date*</label>
                                    <input readonly type="text" class="form-control"  value="{{ $productpurchase['invoice_date'] }}"  id="invoice_date" title="Invoice Date" name="invoice_date" placeholder="Enter Invoice Date" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                        <label for="invoice_amount">Invoice Amount*</label>
                                        <input readonly type="text" class="form-control"  value="{{ $productpurchase['invoice_amount'] }}"  id="invoice_amount" title="Invoice Amount" name="invoice_amount" placeholder="Enter Invoice Amount" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                        <label for="taxable">Taxable*</label>
                                        <input readonly type="text" class="form-control" value="{{ $productpurchase['taxable'] }}"  id="taxable" title="Taxable" name="taxable" placeholder="Enter Taxable" required>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="sgst">SGST*</label>
                                      <input readonly type="text" class="form-control" value="{{ $productpurchase['sgst'] }}"  id="sgst" title="SGST" name="sgst" placeholder="Enter SGST" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="cgst">CGST*</label>
                                      <input readonly type="text" class="form-control" value="{{ $productpurchase['cgst'] }}"  id="cgst" title="CGST" name="cgst" placeholder="Enter CGST" required>
                                  </div>
                                </div>
                
            </div>
                <div class="row">
                    <div class="col-md-10">
                        <h3>Products</h3>
                    </div>
                </div>
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
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($purchases as $purchase)
                                                    <?php $j=1;  if($productpurchase['id'] == $purchase['purchase_id']){ ?>
                                                    <tr>
                                                        <td>{{ $j }}</td>
                                                        <td>{{ $purchase['id']}}</td>
                                                        <td>{{ $purchase['quantity'] }}</td>
                                                    </tr>
                                                    <?php  $j = $j+1;  } ?> @endforeach
                                                </tbody>
                                        </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                </div>
        </section>     
@stop @push('js')
        <script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script>
            $(document).ready(function(){
              $("#example1").DataTable();   
            });
</script>
@endpush