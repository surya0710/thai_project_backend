      <!-- Page body Start -->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
          <div>
            <div class="logo-wrapper">
              <a href="{{ route('dashboard') }}">
                <img class="img-fluid for-light" src="{{ asset('assets/images/logo/paytmicon-png.png') }}" alt="" style="width: 160px;">
                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/paytmicon-png.png') }}" alt="" style="width: 160px;">
              </a>
              <div class="toggle-sidebar">
                <i class="fa-solid fa-bars"></i>
              </div>
            </div>
            <div class="logo-icon-wrapper" style="padding: 10px;">
              <a href="{{ route('dashboard') }}">
                <img class="img-fluid" src="{{  asset('assets/images/logo/paytm-favicon.png')}}" alt="" style="    width: 40px;">
              </a>
            </div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
              </div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn">
                    <a href="{{ route('dashboard') }}">
                      <img class="img-fluid" src="{{ asset('assets/admin/images/logo/logo-icon.png') }}" alt="">
                    </a>
                    <div class="mobile-back text-end">
                      <span>Back</span>
                      <i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                    </div>
                  </li>
                  <li class="sidebar-main-title">
                    <div class="d-flex align-items-center profile-media">
                      <img class="b-r-25" src="assets/images/dashboard/profile.png" alt="">
                      <span style="color: black;" class="ms-2">Online</span>
                    </div>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                      <i class="fa-solid fa-users"></i>
                      <span class="">User Management</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <li>
                        <a class="" href="{{ route('admin.list') }}">
                          <i class="fa-solid fa-user"></i> Admin List </a>
                      </li>
                      <li>
                        <a class="" href="{{ route('user.list') }}">
                          <i class="fa-solid fa-user"></i> User List </a>
                      </li>
                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                      <i class="fa-solid fa-money-bill-1"></i>
                      <span class="">Order Management</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <!-- <li><a href="lazda-order-list.php"><i class="fa-brands fa-amazon"></i> lazda Order list</a></li><li><a href="douyin-order-management.php"><i class="fa-regular fa-circle"></i> Douyin Order
                  Management</a></li><li><a href="tik-tok-task-management.php"><i class="fa-regular fa-circle"></i> Tik Tok Task
                  Management</a></li> -->
                      <li>
                        <a href="{{ route('lazada.list') }}">
                          <i class="fa-regular fa-circle"></i> lazada Product Library </a>
                      </li>
                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                      <i class="fa-solid fa-euro-sign"></i>
                      <span class="">Financial Management</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <li>
                        <a href="{{ route('withdrawal.list') }}">
                          <i class="fa-solid fa-money-bill-1"></i> Withdrawal Management </a>
                      </li>
                      <li>
                        <a href="{{ route('recharge.list') }}">
                          <i class="fa-brands fa-cc-discover"></i> Recharge Management </a>
                      </li>
                    </ul>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title" href="#">
                      <i class="fa-solid fa-gears"></i>
                      <span class=""> General</span>
                    </a>
                    <ul class="sidebar-submenu">
                      <li>
                        <a href="{{ route('profile') }}">
                          <i class="fa-solid fa-user"></i> Profile </a>
                      </li>
                  </li>
              </div>
              <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
              </div>
            </nav>
          </div>
        </div>