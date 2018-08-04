<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Invoices</title>
    <link rel="stylesheet" href="{{asset('website/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/main.css')}}">
    <link rel="stylesheet" href="{{asset('website/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> @stack('css')
    <style>
      .border_alert{
        border: 1px solid red !important;
      }
      textarea{
      height: 40px !important;
      }
      .submit-btn{
        display: inline-block;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
    touch-action: manipulation;
    cursor: pointer;
    user-select: none;
    transition-duration: 300ms;
    transition-property: all;
    transition-timing-function: cubic-bezier(0.7, 1, 0.7, 1);
    text-transform: uppercase;
    border-width: 0.0625rem;
    border-style: solid;
    border-color: #13b1cd;
    color: #fff;
    background: #13b1cd;
    border-width: 0.0625rem;
    border-style: solid;
    padding: 15px;
    border-radius: 20px;
    width: 250px;
      }
      .submit-btn:hover {
    color: #13b1cd;
    background: #fff;
}
    </style>
</head>
<body> 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row md-1">
        <div class="col-md-10 ">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Invoices RJM </h3>
            </div>
          </div>
        </div>
        <div class="col-md-2">
        <a target="_blank" href="{{ url('login') }}" ><button  style="width:100px;height:50px;" class="btn btn-primary">Login</button></a>
        </div>
      </div>
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
          <form id="formid" method="post" action="{{url('/')}}">
            @csrf
            <div class="card-body">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
              <div class="form-group">
                <label for="code">Bill No*</label>
              <input type="text" class="form-control" id="invoice_number" value="{{ $bill_no }}"  disabled title="Client Name">
              <input type="hidden" name="invoice_number" value="{{ $bill_no }}">
              </div>
                </div>
                <div class="col-md-5">
              <div class="form-group">
                  <label style="margin-top: 10px;" class="form-check-label" for="client_code"><b>Client Code*</b></label>
                    <select class="form-control select2" name="client_code" id="client_code" style="width:100%;" >
                      <option value="" selected="selected">Select Client Code</option>
                        @foreach($clients as $client){
                        <option value="{{ $client['id'] }}" >{{ $client['id'] }} - {{ $client['name'] }} - {{ $client['street'] }}</option>
                        }
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="name">Name*</label>
                  <textarea  readonly class="form-control name" id="name" title="Name" placeholder="Select Client" required></textarea>
                  <textarea class="hide form-control name"  name="name"></textarea>
                    </div>
                  </div>
              <div class="col-md-5">
              <div class="form-group">
                <label for="street">Street*</label>
                <textarea  readonly class="form-control street  " id="street" title="Street" placeholder="Select Client" required></textarea>
                <textarea class="hide form-control street"  name="street"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
              <div class="form-group">
                  <label for="city">City*</label>
                  <textarea  readonly class="form-control city" id="city" title="City"  placeholder="Select Client" required></textarea>
                  <textarea class="hide form-control city" name="city"></textarea>
                    </div>
                  </div>
                  <div class="col-md-4">
                <div class="form-group">
                    <label for="tin">Tin Number*</label>
                    <textarea readonly class="form-control tin" id="tin" title="Street" placeholder="Select Client" required></textarea>
                    <textarea class="hide form-control tin" name="tin"></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                  <div class="form-group">
                      <label for="Phone">Phone Number*</label>
                      <textarea readonly class="form-control phone" id="phone" title="Phone" placeholder="Select Client" required></textarea>
                      <textarea class="hide form-control phone" name="phone"></textarea>
                        </div>
                      </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="total">Sub Total*</label>
                        <textarea readonly class="form-control total" id="total" title="Sub Total" placeholder="Click Calculate" required></textarea>
                        <textarea class="hide form-control total"  name="subtotal"></textarea>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="gst12">Gst 12%*</label>
                        <textarea readonly class="form-control gst12" id="gst12" title="GST 12%" placeholder="Click Calculate" required></textarea>
                        <textarea class="hide form-control gst12"  name="gst12"></textarea>
                  </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="gst18">Gst 18%*</label>
                        <textarea readonly class="form-control gst18" id="gst18" title="GST 18%" placeholder="Click Calculate" required></textarea>
                        <textarea class="hide form-control gst18"  name="gst18"></textarea>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                        <label for="gst28">Gst 28%*</label>
                        <textarea readonly class="form-control gst28" id="gst28" title="GST 28%" placeholder="Click Calculate" required></textarea>
                        <textarea class="hide form-control gst28"  name="gst28"></textarea>
                  </div>
                </div> 
                <div class="col-md-2">
                  <div class="form-group">
                      <label for="grandtotal">Grand Total*</label>
                      <textarea readonly class="form-control grandtotal" id="grandtotal" title="Grand Total" placeholder="Click Calculate" required></textarea>
                      <textarea class="hide form-control grandtotal"  name="grandtotal"></textarea>
                  </div>
                </div>
                <div class="col-md-2">
                    <button style="margin-top:34px;"  id="cal" class="btn btn-primary">Calculate </button>
                    <button style="margin-top:34px;" type="submit" id="submit_btn" class="btn btn-success">Save Invoice</button>
                </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                 <label><b>Product Code*</b></label>
              </div>
              <div class="col-md-1">
                 <label>Hsn Code*</label>
                </div>
                <div class="col-md-1">
                  <label>MRP*</label>
                </div>
                <div class="col-md-1">
                  <label>Quantity*</label>
                </div>
                <div class="col-md-1">
                  <label>Tax*</label>
                </div>
                <div class="col-md-1">
                    <label>Price*</label>
                  </div>
                <div class="col-md-1">
                  <label>GST*</label>
                </div>
                <div class="col-md-1">
                  <label>Amount*</label>
                </div>
              </div>
            </div>
                <div class="row">
              <?php for($i=0;$i<=20;$i++){ ?>
                      <div class="col-md-4">
                          <div class="form-group">
                          <select class="form-control select2 product_code{{ $i }} product_code" data="{{ $i }}" id="product_code{{ $i }}" name="product_code[{{ $i }}]" id="product_code" style="width:100%;">
                                  <option value="" selected="selected">Select Product</option>
                                    @foreach($products as $product){
                                      <?php if($product->stock > 0) {?>
                                    <option value="{{ $product['id'] }}" >{{ $product['product_no'] }} - {{ $product['product_name'] }}</option>
                                      <?php } ?>
                                    }
                                    @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="col-md-1">
                              <div class="form-group">
                                  
                              <textarea readonly class="form-control hsn{{ $i }}" id="hsn{{ $i }}" title="Hsn Code" placeholder="Hsn" required></textarea>
                                  <textarea class="hide form-control hsn{{ $i }}" name="hsn[{{ $i }}]"></textarea>
                                    </div>
                          </div>
                          <div class="col-md-1">
                              <div class="form-group">
                                  <textarea readonly class="form-control mrp{{ $i }}" id="mrp{{ $i }}" title="MRP"  placeholder="MRP"  required></textarea>
                                  <textarea class="hide form-control mrp{{ $i }}" name="mrp[{{ $i }}]"></textarea>
                                    </div>
                          </div>
                          <textarea class="hide form-control product{{ $i }}" name="product[{{ $i }}]"></textarea>
                          <div class="col-md-1">
                              <div class="form-group">
                                  <input type="text" disabled class="form-control quantity quantity{{ $i }}" data="{{ $i }}" id="quantity{{ $i }}" name="quantity[{{ $i }}]" title="Quantity" >
                                    </div>
                          </div>
                          
                          <div class="col-md-1">
                              <div class="form-group">
                              <input type="text" disabled class="form-control math math{{ $i }}" data="{{ $i }}" id="math{{ $i }}" title="Tax">
                                    </div>
                          </div>
                          <div class="col-md-1">
                              <div class="form-group">
                                  <textarea readonly class="form-control price{{ $i }}" id="price{{ $i }}" title="Price"></textarea>
                                  <textarea class="hide form-control price{{ $i }}" name="price[{{ $i }}]"></textarea>
                                    </div>
                          </div>
                          <div class="col-md-1">
                              <div class="form-group">
                                  <textarea readonly class="form-control tax{{ $i }}" id="tax{{ $i }}" title="GST"></textarea>
                                  <textarea class="hide form-control tax{{ $i }}" name="tax[{{ $i }}]"></textarea>
                                    </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                  <textarea readonly class="form-control amount{{ $i }}" id="amount{{ $i }}" title="Amount"  required></textarea>
                                  <textarea class="hide form-control amount{{ $i }}" name="amount[{{ $i }}]"></textarea>
                                    </div>
                          </div>
                          <br>
                      <?php } ?>
            </div>
          </form>
  </section>
</body>
<script src="{{asset('website/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
   
</script>
<script src="{{asset('website/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('website/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('website/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('website/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('website/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('website/dist/js/adminlte.js')}}"></script>
<script src="{{asset('website/dist/js/demo.js')}}"></script>
<script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $("#cal").click(function(e){
      e.preventDefault(); 
      $(".gst12").empty();
     $(".gst18").empty();
     $(".gst28").empty();
     $(".total").empty();
     $(".grandtotal").empty();
      var gst12 = 0;
       var gst18 = 0;
       var gst28 = 0;
       var subtotal = 0;
       var amount = 0;
       var gst = 0;
     for(i= 0;i<=20;i++){
        var gst = $("#tax"+i).val();
        if($("#amount"+i).val()){
          var amount = $("#amount"+i).val();
       subtotal = parseFloat(amount) + subtotal;
        }
       if(gst == 12){
         gst12 = gst12+parseFloat(amount);
       }else if(gst == 18){
         gst18 = gst18+parseFloat(amount);
       }
       else if(gst == 28){
         gst28 = gst28+parseFloat(amount);
       } 
     }
     gst12 = gst12*0.12;
     gst18 = gst18*0.18;
     gst28 = gst12*0.28;
    var grandtotal = parseFloat(subtotal+gst18+gst12+gst28);
     $(".total").append(subtotal.toFixed(3));
     $(".gst12").append(gst12.toFixed(3));
     $(".gst18").append(gst18.toFixed(3));
     $(".gst28").append(gst28.toFixed(3));
     $(".grandtotal").append(parseFloat(grandtotal.toFixed(3)));
    //  alert(subtotal);
    //  alert(gst12);
    //  alert(gst18);
    //  alert(gst28);
    //  alert(grandtotal);
  });
  $("#submit_btn").click(function(){
      if(!$('#city').val() || !$('#street').val()|| !$('#name').val()) {
                alert('Select Client');
                return false;
        }
        else if(!$('#product_code0').val()) {
                alert('Atleast One Product is required');
                return false;
          }
         else if(!$('#quantity0').val() || !$('#price0').val()) {
                alert('Enter Product details correctly');
                return false;
        }
        for(i= 1;i<=20;i++){
            if($('#product_code'+i).val()) {
              if(!$('#quantity'+i).val() || !$('#price'+i).val() || !$('#math'+i).val()) {
                alert('Enter Detail Correctly');
                $(".quantity"+i).addClass("border_alert");
                $(".tax"+i).addClass("border_alert");
                $(".mrp"+i).addClass("border_alert");
                $(".amount"+i).addClass("border_alert");
                $(".price"+i).addClass("border_alert");
                $(".hsn"+i).addClass("border_alert");
                $(".math"+i).addClass("border_alert");
                return false;
            }
          }
        }
          if(confirm('Are You want to print the Invoice')){
          $("#cal").trigger("click");
          $('#formId').submit();
          }
          else{
            return false;
          } 
    });
        $('.select2').select2()
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });
      $("#client_code").change(function(){
          var id= $(this).val();
          $.ajax({
    url: "/invoice/ajax1/",
    type: "POST",
    data:{id:id},
    success: function (data) {
        test = JSON.stringify(data);
        if(test == "something is wrong"){
          alert(test);
          return false;
        }
        $( ".street" ).empty();
        $( ".city" ).empty();
        $( ".tin" ).empty();
        $( ".phone" ).empty();
        $( ".name" ).empty();
        $(".street").append(data['street']);
        $(".name").append(data['name']);
        $(".city").append(data['city']);
        $(".tin").append(data['tin']);
        $(".phone").append(data['phone1']);
    },
})
    });
    $(".product_code").change(function(){
      var id= $(this).val();
      var card= $(this).attr('data');
      $(".quantity"+card).removeAttr('disabled');
      for(i= 0;i<=20;i++){
        if(i != card){
            if($('.product_code'+i).val() == id) {
                alert('Product is already selected');
                $(".quantity"+card).addClass("border_alert");
                $(".product_code"+card).addClass("border_alert");
                $(".hsn"+card).addClass("border_alert");
                $(".mrp"+card).addClass("border_alert");
                $(".product"+card).addClass("border_alert");
                $(".amount"+card).addClass("border_alert");
                $(".tax"+card).addClass("border_alert");
                $(".math"+card).addClass("border_alert");
                $(".price"+card).addClass("border_alert");
                $(".quantity"+card).attr('disabled','disabled');
                $("#submit_btn").attr('disabled','disabled');
                $("#cal").attr('disabled','disabled');
                return false;
          }
        }
      }
          $.ajax({
    url: "/invoice/ajax2/",
    type: "POST",
    data:{id:id},
    success: function (data) {
        test = JSON.stringify(data);
        if(test == "something is wrong"){
          alert(test);
          return false;
        }
        $(".hsn"+card).empty();
        $(".mrp"+card).empty();
        $(".product"+card).empty();
        $(".tax"+card).empty();
        $(".hsn"+card).append(data['hsn']);
        $(".tax"+card).append(data['tax']);
        $(".mrp"+card).append(data['mrp']);
        $(".product"+card).append(data['product_name']);
    },
})
    });
      $(".math").keyup(function(){
          var price;
          var card= $(this).attr('data');
          var quantity= $(".quantity"+card).val();
          var mrp = $(".mrp"+card).val();
          var math= $(".math"+card).val();
          price = parseFloat(mrp * math/100);
          price = mrp-price;
          var amount = parseFloat(price * quantity);
          $(".amount"+card).empty();
          $(".price"+card).empty();
          $(".amount"+card).append(amount);
          $(".price"+card).append(price);
    });
    $(".quantity").keyup(function(){
      var card= $(this).attr('data');
      var id= $(".product_code"+card).val();
      var quantity= $(".quantity"+card).val();
      $.ajax({
    url: "/invoice/ajax3/",
    type: "POST",
    data:{id:id},
    success: function (data) {
        // alert(data);
        if(parseFloat(data) < parseFloat(quantity)){
          $(".quantity"+card).addClass("border_alert");
          $(".product_code"+card).addClass("border_alert");
          $(".hsn"+card).addClass("border_alert");
          $(".mrp"+card).addClass("border_alert");
          $(".product"+card).addClass("border_alert");
          $(".amount"+card).addClass("border_alert");
          $(".tax"+card).addClass("border_alert");
          $(".math"+card).addClass("border_alert");
          $(".price"+card).addClass("border_alert");
          $("#submit_btn").attr('disabled','disabled');
          $("#cal").attr('disabled','disabled');
          $(".price"+card).append("");
          $(".amount"+card).append("");
          $(".product_code").attr('disabled','disabled');
        }else{
          $(".math"+card).removeAttr('disabled');
          $(".quantity"+card).removeClass("border_alert");
          $(".product_code"+card).removeClass("border_alert");
          $(".hsn"+card).removeClass("border_alert");
          $(".mrp"+card).removeClass("border_alert");
          $(".product"+card).removeClass("border_alert");
          $(".math"+card).removeClass("border_alert");
          $(".amount"+card).removeClass("border_alert");
          $(".tax"+card).removeClass("border_alert");
          $(".price"+card).removeClass("border_alert");
          $("#submit_btn").removeAttr('disabled');
          $("#cal").removeAttr('disabled');
          $(".product_code").removeAttr('disabled');
          var price= $(".price"+card).val();
          var amount = parseFloat(price * quantity);
          $(".amount"+card).empty();
          $(".amount"+card).append(amount.toFixed(3));
        }
    }
})
    });
  });
</script>
</html>