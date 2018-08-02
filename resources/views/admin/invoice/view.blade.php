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
                        <h1>Invoice Details</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/invoice')}}">Invoice List</a></li>
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
                        <input type="text" readonly class="form-control" id="invoice_number" value="{{ $invoice['invoice_number'] }}" title="Invoice Number" name="invoice_number" placeholder="Enter Invoice Number" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                                <div class="form-group">
                                    <label for="invoice_date">Invoice Date*</label>
                                    <input readonly type="text" class="form-control"  value="{{ $invoice['invoice_date'] }}"  id="invoice_date" title="Invoice Date" name="invoice_date" placeholder="Enter Invoice Date" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                        <label for="invoice_amount">Invoice Amount*</label>
                                        <input readonly type="text" class="form-control"  value="{{ $invoice['client_code'] }}"  id="invoice_amount" title="Invoice Amount" name="invoice_amount" placeholder="Enter Invoice Amount" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                        <label for="name">Name*</label>
                                        <input readonly type="text" class="form-control" value="{{ $invoice['name'] }}"  id="name" title="Name" required>
                                          </div>
                                        </div>
                                        <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="sgst">TIN No*</label>
                                      <input readonly type="text" class="form-control" value="{{ $invoice['tin'] }}"  id="sgst" title="TIN No" name="sgst" placeholder="TIN number not found" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                                <div class="form-group">
                                                        <label for="street">Street*</label>
                                                        <input readonly type="text" class="form-control" value="{{ $invoice['street'] }}"  id="name" title="Street" required>
                                                          </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                    <label for="city">City*</label>
                                                                    <input readonly type="text" class="form-control" value="{{ $invoice['city'] }}"  id="city" title="City" required>
                                                                      </div>
                                                                    </div>
                                            <div class="col-md-3">
                                        <div class="form-group">
                                          <label for="phone">Phone No*</label>
                                          <input readonly type="text" class="form-control" value="{{ $invoice['phone'] }}"  id="phone" title="Phone Number">
                                        </div>
                                    </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label for="sgst">SGST 6%*</label>
                                      <input readonly type="text" class="form-control" value="{{ $invoice['sgst_6'] }}"  id="sgst" title="SGST" name="sgst" placeholder="Enter SGST" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label for="sgst">SGST 9%*</label>
                                      <input readonly type="text" class="form-control" value="{{ $invoice['sgst_9'] }}"  id="sgst" title="SGST" name="sgst" placeholder="Enter SGST" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label for="sgst">SGST 14%*</label>
                                      <input readonly type="text" class="form-control" value="{{ $invoice['sgst_14'] }}"  id="sgst" title="SGST" name="sgst" placeholder="Enter SGST" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="cgst">CGST 6%*</label>
                                      <input readonly type="text" class="form-control" value="{{ $invoice['cgst_6'] }}"  id="cgst" title="CGST" name="cgst" placeholder="Enter CGST" required>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cgst">CGST 9%*</label>
                                        <input readonly type="text" class="form-control" value="{{ $invoice['cgst_9'] }}"  id="cgst" title="CGST" name="cgst" placeholder="Enter CGST" required>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cgst">CGST 14%*</label>
                                        <input readonly type="text" class="form-control" value="{{ $invoice['cgst_14'] }}"  id="cgst" title="CGST" name="cgst" placeholder="Enter CGST" required>
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
                                                    <th>HSN</th>
                                                    <th>MRP</th>
                                                    <th>Price</th>
                                                    <th>GST</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1 ?> @foreach($products as $product)
                                                <?php if($invoice['id'] == $product['invoice_id']){ ?>
                                                <tr>
                                                  <td>{{ $i }}</td>
                                                  <td>{{ $product['product_name'] }}</td>
                                                  <td>{{ $product['quantity'] }}</td>
                                                  <td>{{ $product['hsn'] }}</td>
                                                  <td>{{ $product['mrp'] }} </td>
                                                  <td>{{ $product['price'] }} </td>
                                                  <td>{{ $product['gst'] }}</td>
                                                  <td>{{ $product['amount'] }}</td>
                                                </tr>
                                                <?php $i = $i+1; }?> @endforeach
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