<?php
 $title = "Vendors"; 
$id = $vendor->id;
foreach ($vendortiming as $vendortime) {
    if($id == $vendortime->vendor_id){
        $from[]=$vendortime->from;
        $to[]=$vendortime->to;
        $day[]=$vendortime->day;
    }
}
$o =0;
foreach ($vendorpicture as $vendorpic) {
    if($id == $vendorpic->vendor_id){
        $o++;
        $vendorpictures[]=$vendorpic->image;
    }
}
$r = 1 ;
foreach ($vendorcontact as $vendorcon) {
    if($id == $vendorcon->vendor_id){
        $r++;
        $name[]=$vendorcon->name;
        $phone[]=$vendorcon->phone;
        $email[]=$vendorcon->email;
        $is_primary[]=$vendorcon->is_primary;
    }
}
?>



























    
@extends('../adminpanel/layouts/index') @push('css')

    <link rel="stylesheet" href="{{asset('adminpanel/plugins/datatables/jquery.dataTables.min.css')}}"> 
@endpush 
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Vendors</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/vendors')}}">Vendor</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                </div>
                <!-- /.container-fluid -->
        </section>
        <!-- Main content -->

        <section class="content">
            <div class="row">
                <div class="col-7">
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input disabled type="text" title="Name" class="form-control" value="{{ $vendor['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address*</label>
                        <textarea title="Address" rows="4" class="form-control" disabled>{{ $vendor['address'] }}</textarea>
                        <textarea title="Address" id="lat" class="form-control block">{{ $vendor['lat'] }}</textarea>
                        <textarea title="Address" id="lng" class="form-control block">{{ $vendor['lng'] }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="area">Area*</label>
                        <input disabled type="text" title="Area" class="form-control" value="{{ $vendor['area'] }}">
                    </div>
                    <div class="form-group">
                        <label for="city">City*</label>
                        <input disabled type="text" title="City" class="form-control" value="{{ $vendor['city'] }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_num">Phone Number*</label>
                        <input disabled type="text" title="phone_num" class="form-control" value="{{ $vendor['phone'] }}">
                    </div>
                    <div class="form-group">
                        <label for="points_cost">Points*</label>
                        <input disabled type="text" title="Points cost" class="form-control" value="{{ $vendor['points_cost'] }}">
                    </div>
                    <div class="form-group">
                        <label for="slot_capacity">Slot Capacity*</label>
                        <input disabled type="text" title="Slot capacity" class="form-control" value="{{ $vendor['slot_capacity'] }}">
                    </div>
                    <div class="form-group">
                        <label for="session_price">Session Price*</label>
                        <input disabled type="text" title="Session Price" class="form-control" value="{{ $vendor['session_price'] }}">
                    </div>
                    <div class="form-group">
                        <label for="session_count">Session Count*</label>
                        <input disabled type="text" title="Session Count" class="form-control" value="{{ $vendor['session_count'] }}">
                    </div>
                    <div class="form-group">
                        <label for="wallet_balance">Wallet Balance*</label>
                        <input disabled type="text" title="Wallet Balance" class="form-control" value="{{ $vendor['wallet_balance'] }}">
                    </div>
                    <div class="form-group">
                        <label for="restriction">Restriction</label>
                        <input disabled type="text" title="Restriction" class="form-control" value="{{ $vendor['restriction'] }}">
                    </div>
                    <div class="form-group">
                        <label for="slot_capacity">Is  active*</label><br>
                        <label class="switch">
                                    <input disabled   type="checkbox" id="active" <?php if($vendor['is_active'] == 1) { echo "checked"; } ?>>
                                    <span class="slider round"></span>
                                  </label>
                    </div>
                </div>
                <div class="col-4">
                    <div style="width:400px;height:400px;" id="map_canvas"></div><br><br>
                    <center>
                        <label for="logo">Logo*</label><br>
                        <img style="width: 300px;height: 300px;" src=" {{ $vendor['logo'] }} ">
                    </center>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <label class="control-label">From :</label>
                </div>
                <div class="col-md-3">
                    <label class="control-label">To :</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="sundayf">Sunday :</label>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="input-group">
                            <input disabled type="text" class="form-control timepicker" value="{{$from['0']}}" name="timing[0]" id="sundayf">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="input-group">
                            <input disabled type="text" class="form-control timepicker" value="{{$to['0']}}" name="timing1[0]" id="sundayt">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="mondayf">Monday :</label>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="input-group">
                            <input disabled type="text" class="form-control timepicker" value="{{$from['1']}}" id="mondayf" name="timing[1]">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="input-group">
                            <input disabled type="text" class="form-control timepicker" id="mondayt" value="{{$to['1']}}" name="timing1[1]">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="tuesdayf">Tuesday :</label>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="input-group">
                            <input disabled type="text" class="form-control timepicker" id="tuesdayf" value="{{$from['2']}}" name="timing[2]">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="input-group">
                            <input disabled type="text" class="form-control timepicker" name="timing1[2]" value="{{$to['2']}}" id="tuesdayt">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="wednesdayf">Wednesday :</label>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$from['3']}}" name="timing[3]" id="wednesdayf">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$to['3']}}" name="timing1[3]" id="wednesdayt">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="thursdayf">Thursday :</label>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$from['4']}}" name="timing[4]" id="thursdayf">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$to['4']}}" name="timing1[4]" id="thursdayt">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="fridayf">Friday :</label>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$from['5']}}" name="timing[5]" id="fridayf">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$to['5']}}" name="timing1[5]" id="fridayyt">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label class="control-label" for="saturdayf">Satuday :</label>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$from['6']}}" name="timing[6]" id="saturdayf">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <div class="input-group">
                                <input disabled type="text" class="form-control timepicker" value="{{$to['6']}}" name="timing1[6]" id="saturdayt">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <div class="row">
                <div class="col-md-10">
                    <h3>Pictures</h3>
                </div>
            </div>
            <div class="row">
                <?php 
                    for($kk=0;$kk<$o;$kk++){
                      ?>
                <div class="col-md-3">
                    <img class="pic" src="{{ $vendorpictures[$kk] }}">
                </div>
                <?php 
                    }
                ?>
            </div>
            <br>
            <hr>
            <div class="row">
                <div class="col-md-10">
                    <h3>Contact Person</h3>
                </div>
            </div>
            <br>
            <?php
                for($g=1;$g<$r;$g++){
                ?>
                <div class="row">
                    <hr>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name'+c+'">Name*</label>
                            <input disabled type="text" title="Name" class="form-control" value="{{ $name[ $g-1 ] }}" name="cname[{{ $g }}]" id="cname{{ $g }}"
                                placeholder="Name *">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="email'+c+'">Email-Id*</label>
                            <input disabled type="email" title="Email" value="{{ $email[ $g-1 ] }}" class="form-control" id="email{{ $g }}" name="email[{{ $g }}]"
                                placeholder="Email-Id*">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="phone'+c+'">Phone Number*</label><input disabled type="phone" title="Phone" class="form-control"
                                id="phone{{ $g }}" name="phone[{{ $g }}]" value="{{ $phone[ $g-1 ] }}" placeholder="Phone Number*">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <div class="form-check">
                                <label for="is_primary" class="form-check-label"><b>&nbsp;Primary Contact*</b></label><br>
                                <input disabled id="is_primary{{ $g }}" type="checkbox" <?php if($is_primary[$g-1]==1 ){ echo "checked"; }?>>
                                <textarea class="block" class="is_primary{{ $g }}" value="{{$is_primary[$g-1] }}" name="is_primary[{{ $g }}]">{{$is_primary[$g-1] }}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php }
                ?>
                <hr>
                <div class="row">
                    <div class="col-md-10">
                        <h3>Bookings</h3>
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
                                            <th>User</th>
                                            <th>Slot Date</th>
                                            <th>Slot Time</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookings as $booking)
                                        <?php $j=1;  if($booking['vendor_id'] == $vendor['id']){ ?>

                                        <tr>
                                            <td>{{ $j }}</td>
                                            <td>{{ $booking['user_name']}}</td>
                                            <td>{{ $booking['slot_date'] }}</td>
                                            <td>{{ $booking['slot_time'] }}</td>
                                            <td>
                                                <div class="append1verify{{ $j }} option">
                                                    <div class="appendverify{{ $j }}">
                                                        {{ $booking['status'] }}
                                                    </div>
                                                </div>
                                            </td>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFsZbvXbph5bOV4Mf_uaPbnL5zoA8fbE8&sensor=false&libraries=geometry,places&ext=.js"></script>
        <script src="{{asset('adminpanel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script>
            $(document).ready(function(){
              $("#example1").DataTable();   
            });
            window.onload = function () {
var map;
var lat = $("#lat").val();
var lng = $("#lng").val();
function initialize() {
    var myLatlng = new google.maps.LatLng(lat, lng);
    var myOptions = {
        zoom: 18,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    var marker = new google.maps.Marker({
        draggable: true,
        position: myLatlng,
        map: map,
        title: "Your location"
    });
    google.maps.event.addListener(marker, 'dragend', function (event) {
        document.getElementById("lat").value = event.latLng.lat();
        document.getElementById("lng").value = event.latLng.lng();
        infoWindow.open(map, marker);
    });
}
google.maps.event.addDomListener(window, "load", initialize());
}
        </script>














































        
@endpush