<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IoT Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">

  <style>
    .link-active {
        background-color: #f3801f;
    }

    .link-active p {
        color: #fff;
    }

    .link-active i {
        color: #fff;
    }

    .back-image {
        background-image: url(teab-1.0.0/images/river1-1.jpg);
    }

    .back-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url(teab-1.0.0/images/river1.jpg);
        filter: blur(2px);
    }
  </style>

  <!-- Koneksi ke server MQTT -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.1.0/paho-mqtt.min.js" type="text/javascript"></script>
  <script src="https://www.gstatic.com/charts/loader.js" type="text/javascript"></script>

  <script src="mqtt_client.js" type="text/javascript"></script>

  <script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChartGraph);

    var temperatureDataGraphsA;
    var temperatureDataGraphsB;
    var optionGraphA;
    var optionGraphB;
    var maxDataPoints = 3;

    function drawChartGraph() {
      temperatureDataGraphsA = new google.visualization.DataTable();
      temperatureDataGraphsA.addColumn('datetime', 'Time');
      temperatureDataGraphsA.addColumn('number', 'Temperature');
      temperatureDataGraphsA.addRow([new Date(), 0]);

      temperatureDataGraphsB = new google.visualization.DataTable();
      temperatureDataGraphsB.addColumn('datetime', 'Time');
      temperatureDataGraphsB.addColumn('number', 'Temperature');
      temperatureDataGraphsB.addRow([new Date(), 0]);

      optionsGraphA = {
        title: 'Grafik Ketinggian Air',
        curveType: 'function',
        legend: { position: 'top' }
      };

      optionsGraphB = {
        title: 'Grafik Warna Air',
        curveType: 'function',
        legend: { position: 'top' }
      };

      chartA = new google.visualization.LineChart(document.getElementById('curve_chart'));
      chartB = new google.visualization.LineChart(document.getElementById('secondCurveChart'));

      chartA.draw(temperatureDataGraphsA, optionGraphA);
      chartB.draw(temperatureDataGraphsB, optionGraphB);
    }
  </script>

  <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChartGauge);

      var dataHeightA;
      var dataColorA;
      var dataHeightB;
      var dataColorB;
      var optionGauge;

      function drawChartGauge() {

        dataHeightA = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Height', 0]
        ]);

        dataColorA = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Color', 0]
        ]);

        dataHeightB = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Height', 0]
        ]);

        dataColorB = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Color', 0]
        ]);

        optionGauge = {
          width: 260, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5,
        };

        chartHeightA = new google.visualization.Gauge(document.getElementById('chartHeight_A'));
        chartColorA = new google.visualization.Gauge(document.getElementById('chartColor_A'));
        chartHeightB = new google.visualization.Gauge(document.getElementById('chartHeight_B'));
        chartColorB = new google.visualization.Gauge(document.getElementById('chartColor_B'));

        google.visualization.events.addListener(chartHeightA, 'ready', function() {
          var chartContainer = document.getElementById('chartHeight_A');
          var tableElement = chartContainer.querySelector('table');
          if (tableElement){
            tableElement.style.margin = "auto";
          } else {
            console.error('Table not found');
          }
        });

        google.visualization.events.addListener(chartColorA, 'ready', function() {
          var chartContainer = document.getElementById('chartColor_A');
          var tableElement = chartContainer.querySelector('table');
          if (tableElement){
            tableElement.style.margin = "auto";
          } else {
            console.error('Table not found');
          }
        });

        google.visualization.events.addListener(chartHeightB, 'ready', function() {
          var chartContainer = document.getElementById('chartHeight_B');
          var tableElement = chartContainer.querySelector('table');
          if (tableElement){
            tableElement.style.margin = "auto";
          } else {
            console.error('Table not found');
          }
        });

        google.visualization.events.addListener(chartColorB, 'ready', function() {
          var chartContainer = document.getElementById('chartColor_B');
          var tableElement = chartContainer.querySelector('table');
          if (tableElement){
            tableElement.style.margin = "auto";
          } else {
            console.error('Table not found');
          }
        });

        chartHeightA.draw(dataHeightA, optionGauge);
        chartColorA.draw(dataColorA, optionGauge);
        chartHeightB.draw(dataHeightB, optionGauge);
        chartColorB.draw(dataColorB, optionGauge);
      }
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="AdminLTE-3.2.0/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EmbeddedSystem</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link link-active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Alat dan Bahan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tentang Kami
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper back-image">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: #fff">Dashboard</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 connectedSortable">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sungai A</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm" style="background-color: #f3801f; border-color: #f3801f" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                        <td>Lokasi Sungai :</td>
                                        <td>Kec. Palu Selatan</td>
                                        </tr>
                                        <tr>
                                        <td>Lokasi Perangkat :</td>
                                        <td>0.4894824892, -0.323932932</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6 text-center">
                                <div id="chartHeight_A" style="width: 100%; height: 120px;"></div>
                                <div class="knob-label">Ketinggian Air</div>
                            </div>
                            <div class="col-6 text-center">
                                <div id="chartColor_A" style="width: 100%; height: 120px;"></div>
                                <div class="knob-label">Warna Air</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sungai B</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm" style="background-color: #f3801f; border-color: #f3801f" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                <td>Lokasi Sungai :</td>
                                <td>Kec. Palu Barat</td>
                                </tr>
                                <tr>
                                <td>Lokasi Perangkat :</td>
                                <td>0.284928492, -0.424984942</td>
                                </tr>
                            </tbody>
                        </table>

                        <hr>

                        <div class="row">
                            <div class="col-6 text-center">
                                <div id="chartHeight_B" style="width: 100%; height: 120px;"></div>
                                <div class="knob-label">Ketinggian Air</div>
                            </div>
                            <div class="col-6 text-center">
                                <div id="chartColor_B" style="width: 100%; height: 120px;"></div>
                                <div class="knob-label">Warna Air</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 connectedSortable">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Grafik Ketinggian Air Sungai A
                        </h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm" style="background-color: #f3801f; border-color: #f3801f" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body" style="overflow: auto;">
                        <div id="curve_chart" style="width: 100%; height: 300px"></div>
                    </div>
                </div>

                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Grafik Ketinggian Air Sungai B
                        </h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-success btn-sm" style="background-color: #f3801f; border-color: #f3801f" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    </div>
                    <div class="card-body" style="overflow: auto;">
                        <div id="secondCurveChart" style="width: 100%; height: 300px"></div>
                    </div>
                </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
<script src="AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE-3.2.0/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>
<!-- FLOT CHARTS -->
<script src="AdminLTE-3.2.0/plugins/flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="AdminLTE-3.2.0/plugins/flot/plugins/jquery.flot.resize.js"></script>
</body>
</html>