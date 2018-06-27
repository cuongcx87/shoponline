<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Multiauth - @yield('title')</title>
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('css/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('css/admin/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="{{ asset('css/admin/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/admin/css/sb-admin.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('home') }}">Laravel Multiauth</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="overflow-y: scroll;">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categories">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProvince" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Danh sách địa phương</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProvince">
            <li>
              <a href="{{ route('admin.province') }}">Danh sách tỉnh (thành phố)</a>
            </li>
            <li>
              <a href="{{ route('admin.district') }}">Danh sách quận (huyện)</a>
            </li>
            <li>
              <a href="{{ route('admin.ward') }}">Danh sách xã (phường)</a>
            </li>
            <li>
              <a href="{{ route('admin.province.create') }}">Thêm tỉnh (TP) mới</a>
            </li>
            <li>
              <a href="{{ route('admin.district.create') }}">Thêm quận (huyện) mới</a>
            </li>
            <li>
              <a href="{{ route('admin.ward.create') }}">Thêm xã (phường) mới</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categories">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCategory" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Categories</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseCategory">
            <li>
              <a href="{{ route('admin.category') }}">Xem danh mục</a>
            </li>
            <li>
              <a href="{{ route('admin.category.create') }}">Thêm danh mục mới</a>
            </li>
          </ul>
        </li>
    
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProduct" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Products</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProduct">
            <li>
              <a href="{{ route('admin.product') }}">Xem danh sách Product</a>
            </li>
            <li>
              <a href="{{ route('admin.product.create') }}">Thêm Product mới</a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Companies">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCompany" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Companies</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseCompany">
            <li>
              <a href="{{ route('admin.company') }}">Xem danh sách company</a>
            </li>
            <li>
              <a href="{{ route('admin.company.create') }}">Thêm company mới</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Comments">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComment" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Comments</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComment">
            <li>
              <a href="{{ route('admin.comment') }}">Xem comments</a>
            </li>
            <li>
              <a href="{{ route('admin.comment.create') }}">Thêm comment mới</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Coupons">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCoupon" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Coupons</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseCoupon">
            <li>
              <a href="{{ route('admin.coupon') }}"">Xem danh sách coupon</a>
            </li>
            <li>
              <a href="{{ route('admin.coupon.create') }}">Thêm coupon mới</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Coupons">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBill" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Hóa đơn đặt hàng</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseBill">
            <li>
              <a href="{{ route('admin.bill') }}"">Xem danh sách hóa đơn</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Orders">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseOrder" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Orders</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseOrder">
            <li>
              <a href="{{ route('admin.order') }}">Xem danh sách Order</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customers">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCustomer" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Customers</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseCustomer">
            <li>
              <a href="{{ route('admin.customer') }}">Xem danh sách khách hàng</a>
            </li>
            {{-- <li>
              <a href="{{ route('admin.user.create') }}">Thêm user mới</a>
            </li> --}}
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Employees">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEmployee" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Employees</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseEmployee">
            <li>
              <a href="{{ route('admin.admin') }}">Xem danh sách nhân viên</a>
            </li>
            <li>
              <a href="{{ route('admin.admin.create') }}">Thêm nhân viên mới</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Payments">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePayment" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Payments</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePayment">
            <li>
              <a href="{{ route('admin.payment') }}">Xem danh sách Payment</a>
            </li>
            <li>
              <a href="{{ route('admin.payment.create') }}">Thêm Payment mới</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profile">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProfile">
            <li>
              <a href="">Thông tin cá nhân</a>
            </li>
            <li>
              <a href="">Thay đổi thông tin cá nhân</a>
            </li>
            <li>
              <a href="">Thay đổi mật khẩu</a>
            </li>
            <li>
              <a href="{{ route('admin.logout') }}">Thoát</a>
            </li>
          </ul>
        </li>       
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link">
            Xin chào <strong>admin</strong></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  {{-- content --}}
  <div class="">
      @yield('content')
  </div>
  
  {{-- footer --}}
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright © Your Website 2018</small>
      </div>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('admin.logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('js/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('js/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('js/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Page level plugin JavaScript-->
  
  <script src="{{ asset('js/admin/vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('js/admin/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/admin/js/sb-admin.min.js') }}"></script>
  <!-- Custom scripts for this page-->
  <script src="{{ asset('/js/admin/js/sb-admin-datatables.min.js') }}"></script>
  @yield('scripts')
  <script>
    $(document).ready(function() {
      $(".status").delay(5000).slideUp(400);
    });
  </script>

  
</body>

</html>
