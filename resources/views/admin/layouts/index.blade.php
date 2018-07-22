<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{asset('website/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/main.css')}}">
    <link rel="stylesheet" href="{{asset('website/plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> @stack('css')

</head>

<body>
    @include('../admin/layouts/header') @yield('content')
    @include('../admin/layouts/footer')
</body>
<script src="{{asset('website/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);

</script>
<!-- Bootstrap 4 -->
<script src="{{asset('website/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Morris.js charts -->
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> --}} {{--
<script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script> --}}
<!-- Sparkline -->
{{--
<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script> --}}
<!-- jvectormap -->
{{--
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script> --}}
<!-- jQuery Knob Chart -->
{{--
<script src="{{asset('admin/plugins/knob/jquery.knob.js')}}"></script> --}}
<!-- InputMask -->
{{--
<script src="{{asset('admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script> --}}
<!-- Select2 -->
{{--
<script src="{{asset('admin/plugins/select2/select2.full.min.js')}}"></script> --}}
<!-- daterangepicker -->
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> --}} {{--
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}
<!-- datepicker -->
{{--
<script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script> --}}
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('website/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- bootstrap time picker -->
{{--
<script src="{{asset('admin/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script> --}}
<!-- Slimscroll -->
<script src="{{asset('website/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('website/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('website/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--
<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script> --}}
<!-- AdminLTE for demo purposes -->

<script src="{{asset('website/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('website/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<!-- iCheck 1.0.1 -->
{{--
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script> --}} {{--
<script src="{{asset('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script> --}} @stack('js')
<script>
    $(document).ready(function(){
     var str = $(location).attr("href");
    var id = str.substring(str.lastIndexOf("/") + 1, str.length);
    var sid = str.substring(0, str.lastIndexOf("/") + 0);
    var sid1= sid.substring(sid.lastIndexOf("/") + 1);
    var eid1 = str.substring(0, str.lastIndexOf("/") + 0);
    var eid2 = eid1.substring(0, eid1.lastIndexOf("/") + 0);
    var eid3 = eid2.substring(eid2.lastIndexOf("/") + 1);
                 if(id == "passes" || sid1 == "passes" || eid3 == "passes"){
                          $(".load").removeClass("active");
                          $("#passes").addClass("active");
                     }
                     else if(id == "client"){
                          $(".load").removeClass("active");
                          $("#client").addClass("active");
                     }
                     else if(id == "product_stock"){
                          $(".load").removeClass("active");
                          $("#product_stock").addClass("active");
                     }
                    else if(id == "product"){ 
                        $(".load").removeClass("active"); 
                        $("#product").addClass("active");
                    }
                    else if(id == "hsn"){ 
                        $(".load").removeClass("active"); 
                        $("#hsn").addClass("active");
                    }
                     else{
                      //  alert(id);
                     }
    });

</script>

</html>