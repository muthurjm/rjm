<link rel="stylesheet" href="{{asset('website/plugins/select2/select2.min.css')}}">
<div class="row">
                                <div id="remove">
                              <div class="form-group">
                                <label class="form-check-label" for="product_name"><b>Product Name*</b></label><br>
                                  <select class="form-control select2" name="product[]" id="product_name" style="width:360px;" >
                                        <option value="" selected="selected">Select Product</option>
                                        @foreach($products as $product){
                                        <option value="{{ $product['id'] }}" >{{ $product['product_no'] }} - {{ $product['product_name'] }}</option>
                                        }
                                        @endforeach
                                  </select>
                              </div>
                                <div class="form-group" style="margin-top:-85px;margin-left: 370px;">
                                      <label for="quantity">Quantity*</label>
                                      <input type="text" class="form-control" id="quantity"  style="width:360px;" title="Quantity" name="quantity[]" placeholder="Enter Quantity">
                                </div>
                                <button style="margin-top:-103px;margin-left: 740px;" class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-plus"></i>Remove</button>
                          </div>
                        </div>
                            <div class="csample increment"></div>
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script>
    $('.select2').select2()
</script>