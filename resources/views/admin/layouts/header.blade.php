<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link  back" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Log Out
                        </a>
                    <div class="dropdown-menu width dropdown-menu-right">
                        <ul class="dropdown-user user-header">
                            <p style="margin-left: 20px;">
                            </p>
                            <a href="{{ url('logout') }}" class="btnpic btn-default">Sign out</a> 
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/admin/dashboard') }}" class="brand-link">
                <div class="row">
                    <img src="{{asset('website/img/logo/Getfyt.jpg')}}" alt="AdminLTE Logo" class="ven1 brand-image img-circle">
                </div>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item sidetop has-treeview ">
                            <a href="{{ url('/client') }}" id="client" class="nav-link  load">
                      <i class="nav-icon fa fa-dashboard"></i>
                      <p>
                        Client
                      </p>
                    </a>
                        </li>
                        <li class="nav-item">
                            <a target="_blank" href="{{ url('/') }}"  class="nav-link load">
                    <i class="nav-icon fa fa-angle-double-up"></i>
                      <p>
                        Go To Invoice
                      </p>
                    </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('product/') }}" id="product" class="nav-link load">
                    <i class="nav-icon fa fa-th"></i>
                      <p>
                        Product
                      </p>
                    </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ url('admin/invoice') }}" id="invoice" class="nav-link load">
                    <i class="nav-icon fa fa-file"></i>
                      <p>
                        Invoice  
                   </p>

                    </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('purchase/') }}" id="purchase" class="nav-link load">
                    <i class="nav-icon fa fa-angle-double-down"></i>
                      <p>
                        Purchase
                   </p>

                    </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('hsn/') }}" id="hsn" class="nav-link load">
                    <i class="nav-icon fa fa-codepen"></i>
                      <p>
                        HSN Code  
                   </p>

                    </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('product_stock/') }}" id="product_stock" class="nav-link load">
                    <i class="nav-icon fa fa-product-hunt"></i>
                      <p>
                        Product Stock
                      </p>
                    </a>
                        </li>
                        <li class="nav-item">
                                <a href="{{ url('emptyproduct/') }}" id="emptyproduct" class="nav-link load">
                        <i class="nav-icon fa fa-stop-circle"></i>
                          <p>
                            Empty Product
                       </p>
                        </a>
                            </li>
                            <li class="nav-item">
                                    <a href="{{ url('/taxpay') }}" id="taxpay" class="nav-link load">
                            <i class="nav-icon fa fa-twitch"></i>
                              <p>
                                Tax pay
                           </p>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/invoicereport') }}" id="taxpay" class="nav-link load">
                <i class="nav-icon fa  fa-angle-right"></i>
                  <p>
                    Invoice Report
               </p>
                </a>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>