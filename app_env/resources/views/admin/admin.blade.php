<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@ViewData["Title"]</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  @*
  <link rel="stylesheet" href="~/plugins/fontawesome-free/css/all.min.css">*@
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  @*
  <link rel="stylesheet" href="~/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">*@
  @*
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>*@
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
  <!-- iCheck -->
  @*
  <link rel="stylesheet" href="~/plugins/icheck-bootstrap/icheck-bootstrap.min.css">*@
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="~/plugins/jqvmap/jqvmap.min.css"> @*ko nhung online dc*@
  <!-- Theme style -->
  @*
  <link rel="stylesheet" type="text/css" href="~/dist/css/adminlte.min.css">*@
  @*
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>*@
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="~/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> @*ko nhung online dc*@
  <!-- Daterange picker -->
  <link rel="stylesheet" href="~/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  @*xoa den day an toan*@
  @*
  <link rel="stylesheet" href="~/plugins/summernote/summernote-bs4.min.css">*@
  @*
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>*@
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    @RenderBody()
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="~/img/logo.png" alt="Logo" height="60" width="60">
        </div>


        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="~/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin page</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="~/dist/img/user-icon-trendy-flat-style-isolated-grey-background-user-symbol-user-icon-trendy-flat-style-isolated-grey-background-123663211.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    @using Microsoft.AspNetCore.Http
                    @inject Microsoft.AspNetCore.Http.IHttpContextAccessor HttpContextAccessor
                <div class="info">
                    <a href="#" class="d-block">Chào @HttpContextAccessor.HttpContext.Session.GetString("NameQuanLy")</a>
                    
                    <a href="@Url.Action("LogOut","Admin")" class="d-block">LogOut</a>
                </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
    with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "FoodManage")">
                                <i class="fas fa-concierge-bell"></i>
                                <p> Thực phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "TypeManage")">
                                <i class="fas fa-hamburger"></i>
                                <p> Loại Thực phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "ConsignmentManage")">
                                <i class="fas fa-boxes"></i>
                                <p> Lô Hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "EmployeeManage")">
                                <i class="fas fa-user-tie"></i>
                                <p> Nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "RecipesManage")">
                                <i class="fas fa-utensils"></i>
                                <p> Công Thức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "UserManage")">
                                <i class="fas fa-users"></i>
                                <p> Người dùng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "SupplierManage")">
                                <i class="fas fa-industry"></i>
                                <p> Nhà Sản Xuất</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "SaleManage")">
                                <i class="fas fa-industry"></i>
                                <p> Khuyến mãi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "InvoiceManage")">
                                <i class="fas fa-industry"></i>
                                <p> Hóa đơn </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "TittleRecipesManage")">
                                <i class="fas fa-industry"></i>
                                <p> Chủ đề </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "CTTittleRecipes")">
                                <i class="fas fa-industry"></i>
                                <p> Chọn chủ đề cho công thức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "CTRecipes")">
                                <i class="fas fa-industry"></i>
                                <p> Chọn thực phẩm cho công thức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "FoodFollowedManage")">
                                <i class="fas fa-industry"></i>
                                <p> Theo dõi thực phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "CTInvoiceManage")">
                                <i class="fas fa-industry"></i>
                                <p> Chi tiết hóa đơn </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "PermissionManage")">
                                <i class="fas fa-industry"></i>
                                <p> Quyền </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "KhoBepManage")">
                                <i class="fas fa-industry"></i>
                                <p> Kho bếp online </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="@Url.Action( "Index", "CTKhoBepManage")">
                                <i class="fas fa-industry"></i>
                                <p> Chi tiết kho bếp </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    @*
        <script src="~/plugins/jquery/jquery.min.js"></script>*@
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- jQuery UI 1.11.4 -->
    @*
        <script src="~/plugins/jquery-ui/jquery-ui.min.js"></script>*@
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <!-- Bootstrap 4 -->
    @*
        <script src="~/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>*@
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    @*
        <script src="~/plugins/chart.js/Chart.min.js"></script>*@
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Sparkline -->
    <script src="~/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="~/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="~/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="~/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    @*
        <script src="~/plugins/moment/moment.min.js"></script>
        <script src="~/plugins/daterangepicker/daterangepicker.js"></script>*@
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.1/daterangepicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    @*
        <script src="~/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>*@
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
    <!-- Summernote -->
    <script src="~/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    @*
        <script src="~/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>*@
    <script src="https://unpkg.com/overlayscrollbars@1.13.0/js/OverlayScrollbars.js"></script>
    <!-- AdminLTE App -->
    @*
        <script src="~/dist/js/adminlte.js"></script>*@
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="~/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="~/dist/js/pages/dashboard.js"></script>
    @RenderSection("Scripts", required: false)
</body>
 </html>
