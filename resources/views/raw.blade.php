<?php
$x = 2;//want number of digits for the random number
$sum = 0;
for($i=0;$i<$x;$i++)
{
    $sum = $sum + rand(0,9)*pow(10,$i);

}
$i =  $sum;
?>
<link rel="stylesheet" href="{{asset('website/plugins/select2/select2.min.css')}}">
<div class="row">
        <div class="col-md-4">
                              <div class="form-group">
                                  <label style="margin-top: 10px;" class="form-check-label" for="product_code{{ $i }}"><b>Product Code*</b></label>
                              <select class="form-control select2 product_code" data="{{ $i }}" id="product_code{{ $i }}" name="product_code[]" id="product_code" style="width:100%;">
                                      <option value="" selected="selected">Select Product</option>
                                        @foreach($products as $product){
                                        <option value="{{ $product['id'] }}" >{{ $product['id'] }} - {{ $product['product_name'] }}</option>
                                        }
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                              {{-- <div class="col-md-1">
                                  <div class="form-group">
                                      <label for="hsn{{ $i }}">Hsn Code*</label>
                                  <textarea readonly class="form-control hsn{{ $i }}" id="hsn{{ $i }}" title="Hsn Code" placeholder="Hsn" required></textarea>
                                      <textarea class="hide form-control hsn{{ $i }}" name="hsn[]"></textarea>
                                        </div>
                              </div>
                              <div class="col-md-1">
                                  <div class="form-group">
                                      <label for="mrp{{ $i }}">MRP*</label>
                                      <textarea readonly class="form-control mrp{{ $i }}" id="mrp{{ $i }}" title="MRP"  placeholder="MRP"  required></textarea>
                                      <textarea class="hide form-control mrp{{ $i }}" name="mrp[]"></textarea>
                                        </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="product{{ $i }}">Product Name*</label>
                                      <textarea readonly class="form-control product{{ $i }}" id="product{{ $i }}" title="Product Name" placeholder="Select Product Name" required></textarea>
                                      <textarea class="hide form-control product{{ $i }}" name="product[]"></textarea>
                                        </div>
                              </div> --}}
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="quantity{{ $i }}">Quantity*</label>
                                      <input type="text" class="form-control quantity quantity{{ $i }}" id="quantity{{ $i }}" name="quantity[]" title="Quantity" >
                                        </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="price{{ $i }}">Price*</label>
                                  <input type="text" class="form-control price price{{ $i }}" data="{{ $i }}" id="price{{ $i }}" title="Price" name="price[]">
                                        </div>
                              </div>
                              {{-- <div class="col-md-1">
                                  <div class="form-group">
                                      <label for="tax{{ $i }}">GST*</label>
                                      <textarea readonly class="form-control tax{{ $i }}" id="tax{{ $i }}" title="GST"></textarea>
                                      <textarea class="hide form-control tax{{ $i }}" name="tax[]"></textarea>
                                        </div>
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="amount{{ $i }}">Amount*</label>
                                      <textarea readonly class="form-control amount{{ $i }}" id="amount{{ $i }}" title="Amount"  required></textarea>
                                      <textarea class="hide form-control amount{{ $i }}" name="amount[]"></textarea>
                                        </div>
                              </div> --}}
                            </div>
                            <div class="csample increment"></div>
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $('.select2').select2()
</script>