<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Payment</title>
       
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="jamal/vertical-layout-light/style.css">
  <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo mr-5 " ><img src="jamal/ikon.jpg" class=" rounded-circle" alt="logo"/></a>
              <a class="navbar-brand brand-logo-mini "><img src="jamal/ikon.jpg" alt="logo" class="rounded-circle"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
              </button>
              <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                  <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <span class="input-group-text" id="search">
                        <i class="icon-search"></i>
                      </span>
                    </div>
                    <input type="search" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
                    <script type="text/javascript">
                      var path = "{{ route('autocomplete') }}";
                      $('input.search').typeahead({
                          source:  function (str, process) 
                          {
                            return $.get(path, { str: str }, function (data) {
                                  return process(data);
                              });
                          }
                      });
                  </script>  
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img src="jamal/profile.png" alt="profile"/>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    {{-- <a class="dropdown-item">
                      <i class="ti-settings text-primary"></i>
                      Settings
                    </a> --}}
                    <a class="dropdown-item" href="logout">
                      <i class="ti-power-off text-primary"></i>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
              </button>
            </div>
          </nav>


          <div class="container-fluid page-body-wrapper">
            <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
            <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
                <div class="tiles success"></div>
                <div class="tiles warning"></div>
                <div class="tiles danger"></div>
                <div class="tiles info"></div>
                <div class="tiles dark"></div>
                <div class="tiles default"></div>
            </div>
            </div>
        </div>

        <!-- Naviation Bar-->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">

              @if(Auth::user()->id_level == 1)

              <li class="nav-item">
                <a class="nav-link" href="index">
                  <i class="icon-grid menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link collapsed" href="pelanggan" data-target="#data" aria-expanded="false" aria-controls="data">
                  <i class="icon-head menu-icon"></i>
                  <span class="menu-title">Data Pelanggan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="tagihan" data-target="#data" aria-expanded="false" aria-controls="data">
                  <i class="icon-contract menu-icon"></i>
                  <span class="menu-title">Tagihan</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="tarif" data-target="#data" aria-expanded="false" aria-controls="data">
                  <i class="icon-columns menu-icon"></i>
                  <span class="menu-title">Tarif</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="konfirmasi-pembayaran" data-target="#data" aria-expanded="false" aria-controls="data">
                  <i class="icon-columns menu-icon"></i>
                  <span class="menu-title">Konfirmasi</span>
                </a>
              </li>
              
                  
              @else
              <li class="nav-item">
                <a class="nav-link collapsed" href="bank" data-target="#data" aria-expanded="false" aria-controls="data">
                  <i class="icon menu-icon"></i>
                  <span class="menu-title">Pembayaran</span>
                </a>
              </li>
              @endif
              
              
            </ul>
          </nav>

          <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                  

                          <div class="container-fluid">
                            @yield('navbar')
                        </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>


      <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="adminjs/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="adminjs/off-canvas.js"></script>
  <script src="adminjs/hoverable-collapse.js"></script>
  <script src="adminjs/template.js"></script>
  <script src="adminjs/settings.js"></script>
  <script src="adminjs/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="adminjs/dashboard.js"></script>
  <script src="adminjs/Chart.roundedBarCharts.js"></script>

  

</body>
</html>
