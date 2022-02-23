<?php 
  use Illuminate\Support\Str;
  use App\Models\SearchCustomer;
  use App\Models\ReportCopy;


?>
{{-- <body class="hold-transition sidebar-mini layout-fixed"> --}}
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin_dash" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ujjal Dry Cleaner</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{Str::ucfirst(Session::get('user')['name'])}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin_dash" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Invoice Print
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            @php
                SearchCustomer::truncate();
            @endphp
            <a href="/search_id" class="nav-link">
              <i class="nav-icon fas fa-glasses"></i>
              <p>
                Invoice Search
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            @php
                SearchCustomer::truncate();
            @endphp
            <a href="/search_customer" class="nav-link">
              <i class="nav-icon fas fa-mobile"></i>
              <p>
                Mobile Search
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            @php
                SearchCustomer::truncate();
            @endphp
            <a href="delete_invoice" class="nav-link">
              <i class="nav-icon fas fa-trash-alt"></i>
              <p>
                Invoice Delete
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            <a href="iron_wash_add" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Worker Add
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            @php
                ReportCopy::truncate();
            @endphp
            <a href="iron_worker" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Iron Worker
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            @php
                ReportCopy::truncate();
            @endphp
            <a href="wash_worker" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Wash Worker
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item menu-close">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="daily_report" class="nav-link">
                  <i class="nav-icon far fa-list-alt"></i>
                  <p>
                    Daily Report
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="due_reports" class="nav-link">
                  <i class="nav-icon far fa-list-alt"></i>
                  <p>
                    Due Reports
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="paid_reports" class="nav-link">
                  <i class="nav-icon far fa-list-alt"></i>
                  <p>
                    Paid Reports
                  </p>
                </a>
              </li>
              <li class="paid_nav-item">
                <a href="reports" class="nav-link">
                  <i class="nav-icon far fa-list-alt"></i>
                  <p>
                    All Reports
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <br>
          <li class="nav-item">
            <a href="/change_rate" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Change Rate
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            <a href="/add_utility" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Add Utility
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            <a href="mobile_report" class="nav-link">
              <i class="nav-icon far fa-list-alt"></i>
              <p>
                Mobile Report
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            <a href="shares" class="nav-link">
              <i class="nav-icon fas fa-cut"></i>
              <p>
                Shares
              </p>
            </a>
          </li>
          <br>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


