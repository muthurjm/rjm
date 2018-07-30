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
</head>
<body>
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
            @if ($message = Session::get('succdess'))
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
                <?php $client_name =1; ?>
              <input type="text" class="form-control" value="{{ $client_name }}"  disabled title="Client Name">
              <input type="hidden" name="client_name" value="{{ $client_name }}">
              </div>
              <div class="form-group">
                  <label for="Client Name">Client Name*</label>
                  <input type="text" class="form-control" id="Client_Name" title="Client Name" name="name" placeholder="Enter Client Name" required>
                    </div>
              <div class="form-group">
                <label for="Street">Street*</label>
                <input type="text" class="form-control" id="Street" title="Street" name="street" placeholder="Enter Street" required>
                  </div>
              <div class="form-group">
                  <label for="City">City*</label>
                  <input type="text" class="form-control" id="City" title="City" name="city" placeholder="Enter City" required>
                    </div>
                <div class="form-group">
                    <label for="Tin">Tin*</label>
                    <input type="text" class="form-control" id="Tin" title="Street" name="tin" placeholder="Enter Tin" required>
                      </div>
                  <div class="form-group">
                      <label for="Phone1">Phone1*</label>
                      <input type="text" class="form-control" id="Phone1" title="Phone1" name="phone1" placeholder="Enter Phone1" required>
                        </div>
                  <div class="form-group">
                        <label for="Phone2">Phone2*</label>
                        <input type="text" class="form-control" id="Phone2" title="Phone2" name="phone2" placeholder="Enter Phone2" >
                  </div>
              <div class="card-footer">
                <button type="submit" id="add_client" class="btn btn-primary">Add Client</button>
              </div>
          </form>
          </div>
        </div>
  </section>
  </div>
</body>
<script src="{{asset('website/plugins/jquery/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset('website/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('website/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('website/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('website/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('website/dist/js/adminlte.js')}}"></script>
<script src="{{asset('website/dist/js/demo.js')}}"></script>
<script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
</html>