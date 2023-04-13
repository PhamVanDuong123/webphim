
<!DOCTYPE html>
<html>
  <head>
    <title>
      Admin
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta
      name="keywords"
      content="Admin web Phim"
    />
    <script type="application/x-javascript">
      addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);

                      function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('backend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- font-awesome icons CSS -->
    <link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- //font-awesome icons CSS-->
    <!-- side nav css file -->
    <link
      href="{{asset('backend/css/SidebarNav.min.css')}}"
      media="all"
      rel="stylesheet"
      type="text/css"
    />
    <!-- //side nav css file -->
    <!-- js-->
    <script src="{{asset('backend/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('backend/js/modernizr.custom.js')}}"></script>
    <!--webfonts-->
    <link
      href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext"
      rel="stylesheet"
    />
    <!--//webfonts-->
    <!-- chart -->
    <script src="{{asset('backend/js/Chart.js')}}"></script>
    <!-- //chart -->
    <!-- Metis Menu -->
    <script src="{{asset('backend/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <link href="{{asset('backend/css/custom.css')}}" rel="stylesheet" />
    <!--//Metis Menu -->
    <style>
      #chartdiv {
        width: 100%;
        height: 295px;
      }
    </style>
    <!--pie-chart -->
    <!-- index page sales reviews visitors pie chart -->
    <script src="{{asset('backend/js/pie-chart.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        $('#demo-pie-1').pieChart({
          barColor: '#2dde98',
          trackColor: '#eee',
          lineCap: 'round',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element)
              .find('.pie-value')
              .text(Math.round(percent) + '%');
          },
        });

        $('#demo-pie-2').pieChart({
          barColor: '#8e43e7',
          trackColor: '#eee',
          lineCap: 'butt',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element)
              .find('.pie-value')
              .text(Math.round(percent) + '%');
          },
        });

        $('#demo-pie-3').pieChart({
          barColor: '#ffc168',
          trackColor: '#eee',
          lineCap: 'square',
          lineWidth: 8,
          onStep: function (from, to, percent) {
            $(this.element)
              .find('.pie-value')
              .text(Math.round(percent) + '%');
          },
        });
      });
    </script>
    <!-- //pie-chart -->
    <!-- index page sales reviews visitors pie chart -->
    <!-- requried-jsfiles-for owl -->
    <link href="{{asset('backend/css/owl.carousel.css')}}" rel="stylesheet" />
    <script src="{{asset('backend/js/owl.carousel.js')}}"></script>
    <script>
      $(document).ready(function () {
        $('#owl-demo').owlCarousel({
          items: 3,
          lazyLoad: true,
          autoPlay: true,
          pagination: true,
          nav: true,
        });
      });
    </script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
   $(document).ready( function () {
    $('#tablephim').DataTable();
        } );
    </script>
 
  </head>

  <body class="cbp-spmenu-push">
    @if(Auth::check())
    <div class="main-content">
      <div
        class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left"
        id="cbp-spmenu-s1"
      >
        <!--left-fixed -navigation-->
        <aside class="sidebar-left">
          <nav class="navbar navbar-inverse">
            <div class="navbar-header">
              <button
                type="button"
                class="navbar-toggle collapsed"
                data-toggle="collapse"
                data-target=".collapse"
                aria-expanded="false"
              >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <h1>
                <a class="navbar-brand" href="{{url('/home')}}"
                  ><span class="fa fa-area-chart"></span> Glance<span
                    class="dashboard_text"
                    >Design dashboard</span
                  ></a
                >
              </h1>
            </div>
            <div
              class="collapse navbar-collapse"
              id="bs-example-navbar-collapse-1">
              <ul class="sidebar-menu">
                <li class="header">Quản lý webphim</li>
                <li class="treeview">
                  <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                  </a>
                </li>
                @php 
                $segment=Request::segment(1);
                @endphp
                <li class="treeview {{$segment== 'category' ?'active' :''}}">
                  <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Danh mục</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('category.create')}}"
                        ><i class="fa fa-angle-right"></i>Thêm danh mục</a
                      >
                    </li>
                    <li>
                      <a href="{{route('category.index')}}"
                        ><i class="fa fa-angle-right"></i>Liệt kê danh mục</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="treeview {{$segment== 'genre'?'active' :''}}">
                  <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Thể loại phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('genre.create')}}"
                        ><i class="fa fa-angle-right"></i>Thêm thể loại</a
                      >
                    </li>
                    <li>
                      <a href="{{route('genre.index')}}"
                        ><i class="fa fa-angle-right"></i>Liệt kê thể loại</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="treeview {{($segment== 'movie')? 'active' : ''}} ">
                  <a href="#">
                  <i class="fa fa-film" aria-hidden="true"></i>
                    <span>Quản lý phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('movie.create')}}"
                        ><i class="fa fa-angle-right"></i>Thêm phim</a
                      >
                    </li>
                    <li>
                      <a href="{{route('movie.index')}}"
                        ><i class="fa fa-angle-right"></i>Liệt kê phim</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="treeview {{$segment== 'episode'?'active':''}} ">
                  <a href="#">
                  <i class="fa fa-file-video-o" aria-hidden="true"></i>
                    <span>Quản lý tập phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('episode.create')}}"
                        ><i class="fa fa-angle-right"></i>Thêm tập phim</a
                      >
                    </li>
                    <li>
                      <a href="{{route('episode.index')}}"
                        ><i class="fa fa-angle-right"></i>Liệt kê tập phim</a
                      >
                    </li>
                  </ul>
                </li>
                <li class="treeview {{$segment== 'country'?'active':''}} ">
                  <a href="#">
                  <i class="fa fa-globe" aria-hidden="true"></i>
                    <span>Quản lý quốc gia phim</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="{{route('country.create')}}"
                        ><i class="fa fa-angle-right"></i>Thêm quốc gia</a
                      >
                    </li>
                    <li>
                      <a href="{{route('country.index')}}"
                        ><i class="fa fa-angle-right"></i>Liệt kê quốc gia</a
                      >
                    </li>
                  </ul>
                </li>
             
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </nav>
        </aside>
      </div>
      <!--left-fixed -navigation-->
      <!-- header-starts -->
      <div class="sticky-header header-section">
        <div class="header-left">
          <!--toggle button start-->
          <button id="showLeftPush"><i class="fa fa-bars"></i></button>
          <!--toggle button end-->
          <div class="profile_details_left">
            <!--notifications of menu start -->
            <ul class="nofitications-dropdown">
              <li class="dropdown head-dpdn">
                <a
                  href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                  aria-expanded="false"
                  ><i class="fa fa-envelope"></i><span class="badge">4</span></a
                >
                <ul class="dropdown-menu">
                  <li>
                    <div class="notification_header">
                      <h3>You have 3 new messages</h3>
                    </div>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user_img">
                        <img src="images/1.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li class="odd">
                    <a href="#">
                      <div class="user_img">
                        <img src="images/4.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user_img">
                        <img src="images/3.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user_img">
                        <img src="images/2.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#">See all messages</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown head-dpdn">
                <a
                  href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                  aria-expanded="false"
                  ><i class="fa fa-bell"></i
                  ><span class="badge blue">4</span></a
                >
                <ul class="dropdown-menu">
                  <li>
                    <div class="notification_header">
                      <h3>You have 3 new notification</h3>
                    </div>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user_img">
                        <img src="images/4.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li class="odd">
                    <a href="#">
                      <div class="user_img">
                        <img src="images/1.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user_img">
                        <img src="images/3.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="user_img">
                        <img src="images/2.jpg" alt="" />
                      </div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor amet</p>
                        <p><span>1 hour ago</span></p>
                      </div>
                      <div class="clearfix"></div>
                    </a>
                  </li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#">See all notifications</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown head-dpdn">
                <a
                  href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                  aria-expanded="false"
                  ><i class="fa fa-tasks"></i
                  ><span class="badge blue1">8</span></a
                >
                <ul class="dropdown-menu">
                  <li>
                    <div class="notification_header">
                      <h3>You have 8 pending task</h3>
                    </div>
                  </li>
                  <li>
                    <a href="#">
                      <div class="task-info">
                        <span class="task-desc">Database update</span
                        ><span class="percentage">40%</span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="progress progress-striped active">
                        <div class="bar yellow" style="width: 40%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="task-info">
                        <span class="task-desc">Dashboard done</span
                        ><span class="percentage">90%</span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="progress progress-striped active">
                        <div class="bar green" style="width: 90%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="task-info">
                        <span class="task-desc">Mobile App</span
                        ><span class="percentage">33%</span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="progress progress-striped active">
                        <div class="bar red" style="width: 33%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="task-info">
                        <span class="task-desc">Issues fixed</span
                        ><span class="percentage">80%</span>
                        <div class="clearfix"></div>
                      </div>
                      <div class="progress progress-striped active">
                        <div class="bar blue" style="width: 80%"></div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#">See all pending tasks</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <!--notification menu end -->
          <div class="clearfix"></div>
        </div>
        <div class="header-right">
          <!--search-box-->
          <div class="search-box">
            <form class="input">
              <input
                class="sb-search-input input__field--madoka"
                placeholder="Search..."
                type="search"
                id="input-31"
              />
              <label class="input__label" for="input-31">
                <svg
                  class="graphic"
                  width="100%"
                  height="100%"
                  viewBox="0 0 404 77"
                  preserveAspectRatio="none"
                >
                  <path d="m0,0l404,0l0,77l-404,0l0,-77z" />
                </svg>
              </label>
            </form>
          </div>
          <!--//end-search-box-->
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a
                  href="#"
                  class="dropdown-toggle"
                  data-toggle="dropdown"
                  aria-expanded="false"
                >
                  <div class="profile_img">
                    <span class="prfil-img"
                      ><img src="images/2.jpg" alt="" />
                    </span>
                    <div class="user-name">
                      <p>Admin Name</p>
                      <span>Administrator</span>
                    </div>
                    <i class="fa fa-angle-down lnr"></i>
                    <i class="fa fa-angle-up lnr"></i>
                    <div class="clearfix"></div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                  <li>
                    <a href="#"><i class="fa fa-cog"></i> Settings</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-user"></i> My Account</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-suitcase"></i> Profile</a>
                  </li>
                  <li>
                    <form action="{{route('logout')}}" method="POST">
                      @csrf 
                    <a href="#"><i class="fa fa-sign-out"></i> Logout</a>

                      <input type="submit" class="btn btn-danger btn-sm" value="Logout">
                    </form>

                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
      </div>
      <!-- //header-ends -->
      <!-- main content start-->
      <div id="page-wrapper">
        <div class="main-page">
          <div class="col_3">
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-file icon-rounded"></i>
                <div class="stats">
                  <h5><strong>$452</strong></h5>
                  <span>Danh mục phim</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-child user1 icon-rounded"></i>
                <div class="stats">
                  <h5><strong>$1019</strong></h5>
                  <span>Thể loại phim</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-globe user2 icon-rounded"></i>
                <div class="stats">
                  <h5><strong>$1012</strong></h5>
                  <span>Quốc gia phim</span>
                </div>
              </div>
            </div>
            <div class="col-md-3 widget widget1">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                <div class="stats">
                  <h5><strong>$450</strong></h5>
                  <span>Tổng phim</span>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-3 widget">
              <div class="r3_counter_box">
                <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                <div class="stats">
                  <h5><strong>1450</strong></h5>
                  <span>Total Users</span>
                </div>
              </div>
            </div> -->
            <div class="clearfix"></div>
          </div>
       
          <!-- for amcharts js -->
        
        
          <div class="col-md-12">
            @yield('content')
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
   
      <!--footer-->
      <!-- <div class="footer clearfix">
        <p>
          &copy; 2018 Glance Design Dashboard. All Rights Reserved | Design by
          <a href="https://w3layouts.com/" target="_blank">w3layouts</a>
        </p>
      </div> -->
      <!--//footer-->
    </div>
    @else 
     @yield('content_login')
    @endif
    <!-- new added graphs chart js-->
    <script src="{{asset('backend/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('backend/js/utils.js')}}"></script>
    <script>
      var MONTHS = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
      ];
      var color = Chart.helpers.color;
      var barChartData = {
        labels: [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
          'July',
        ],
        datasets: [
          {
            label: 'Dataset 1',
            backgroundColor: color(window.chartColors.red)
              .alpha(0.5)
              .rgbString(),
            borderColor: window.chartColors.red,
            borderWidth: 1,
            data: [
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
            ],
          },
          {
            label: 'Dataset 2',
            backgroundColor: color(window.chartColors.blue)
              .alpha(0.5)
              .rgbString(),
            borderColor: window.chartColors.blue,
            borderWidth: 1,
            data: [
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
              randomScalingFactor(),
            ],
          },
        ],
      };

      window.onload = function () {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myBar = new Chart(ctx, {
          type: 'bar',
          data: barChartData,
          options: {
            responsive: true,
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Chart.js Bar Chart',
            },
          },
        });
      };

      document
        .getElementById('randomizeData')
        .addEventListener('click', function () {
          var zero = Math.random() < 0.2 ? true : false;
          barChartData.datasets.forEach(function (dataset) {
            dataset.data = dataset.data.map(function () {
              return zero ? 0.0 : randomScalingFactor();
            });
          });
          window.myBar.update();
        });

      var colorNames = Object.keys(window.chartColors);
      document
        .getElementById('addDataset')
        .addEventListener('click', function () {
          var colorName =
            colorNames[barChartData.datasets.length % colorNames.length];
          var dsColor = window.chartColors[colorName];
          var newDataset = {
            label: 'Dataset ' + barChartData.datasets.length,
            backgroundColor: color(dsColor).alpha(0.5).rgbString(),
            borderColor: dsColor,
            borderWidth: 1,
            data: [],
          };

          for (var index = 0; index < barChartData.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());
          }

          barChartData.datasets.push(newDataset);
          window.myBar.update();
        });

      document.getElementById('addData').addEventListener('click', function () {
        if (barChartData.datasets.length > 0) {
          var month = MONTHS[barChartData.labels.length % MONTHS.length];
          barChartData.labels.push(month);

          for (var index = 0; index < barChartData.datasets.length; ++index) {
            //window.myBar.addData(randomScalingFactor(), index);
            barChartData.datasets[index].data.push(randomScalingFactor());
          }

          window.myBar.update();
        }
      });

      document
        .getElementById('removeDataset')
        .addEventListener('click', function () {
          barChartData.datasets.splice(0, 1);
          window.myBar.update();
        });

      document
        .getElementById('removeData')
        .addEventListener('click', function () {
          barChartData.labels.splice(-1, 1); // remove the label first

          barChartData.datasets.forEach(function (dataset, datasetIndex) {
            dataset.data.pop();
          });

          window.myBar.update();
        });
    </script>
      <script src="{{asset('backend/js/amcharts.js')}}"></script>
          <script src="{{asset('backend/js/serial.js')}}"></script>
          <script src="{{asset('backend/js/export.min.js')}}"></script>
          <link
            rel="stylesheet"
            href="css/export.css"
            type="text/css"
            media="all"
          />
          <script src="{{asset('backend/js/light.js')}}"></script>
          <!-- for amcharts js -->
          <script src="{{asset('backend/js/index1.js')}}"></script>
    <!-- new added graphs chart js-->
    <!-- Classie -->
    <!-- for toggle left push menu script -->
    <script src="{{asset('backend/js/classie.js')}}"></script>
    <script>
      var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

      showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
      };

      function disableOther(button) {
        if (button !== 'showLeftPush') {
          classie.toggle(showLeftPush, 'disabled');
        }
      }
    </script>
    <!-- //Classie -->
    <!-- //for toggle left push menu script -->
    <!--scrolling js-->
    <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('backend/js/scripts.js')}}"></script>
    <!--//scrolling js-->
    <!-- side nav js -->
    <script src="{{asset('backend/js/SidebarNav.min.js')}}" type="text/javascript"></script>
    <script>
      $('.sidebar-menu').SidebarNav();
    </script>
    <!-- //side nav js -->
    <!-- for index page weekly sales java script -->
    <script src="{{asset('backend/js/SimpleChart.js')}}"></script>
    <script>
      var graphdata1 = {
        linecolor: '#CCA300',
        title: 'Monday',
        values: [
          { X: '6:00', Y: 10.0 },
          { X: '7:00', Y: 20.0 },
          { X: '8:00', Y: 40.0 },
          { X: '9:00', Y: 34.0 },
          { X: '10:00', Y: 40.25 },
          { X: '11:00', Y: 28.56 },
          { X: '12:00', Y: 18.57 },
          { X: '13:00', Y: 34.0 },
          { X: '14:00', Y: 40.89 },
          { X: '15:00', Y: 12.57 },
          { X: '16:00', Y: 28.24 },
          { X: '17:00', Y: 18.0 },
          { X: '18:00', Y: 34.24 },
          { X: '19:00', Y: 40.58 },
          { X: '20:00', Y: 12.54 },
          { X: '21:00', Y: 28.0 },
          { X: '22:00', Y: 18.0 },
          { X: '23:00', Y: 34.89 },
          { X: '0:00', Y: 40.26 },
          { X: '1:00', Y: 28.89 },
          { X: '2:00', Y: 18.87 },
          { X: '3:00', Y: 34.0 },
          { X: '4:00', Y: 40.0 },
        ],
      };
      var graphdata2 = {
        linecolor: '#00CC66',
        title: 'Tuesday',
        values: [
          { X: '6:00', Y: 100.0 },
          { X: '7:00', Y: 120.0 },
          { X: '8:00', Y: 140.0 },
          { X: '9:00', Y: 134.0 },
          { X: '10:00', Y: 140.25 },
          { X: '11:00', Y: 128.56 },
          { X: '12:00', Y: 118.57 },
          { X: '13:00', Y: 134.0 },
          { X: '14:00', Y: 140.89 },
          { X: '15:00', Y: 112.57 },
          { X: '16:00', Y: 128.24 },
          { X: '17:00', Y: 118.0 },
          { X: '18:00', Y: 134.24 },
          { X: '19:00', Y: 140.58 },
          { X: '20:00', Y: 112.54 },
          { X: '21:00', Y: 128.0 },
          { X: '22:00', Y: 118.0 },
          { X: '23:00', Y: 134.89 },
          { X: '0:00', Y: 140.26 },
          { X: '1:00', Y: 128.89 },
          { X: '2:00', Y: 118.87 },
          { X: '3:00', Y: 134.0 },
          { X: '4:00', Y: 180.0 },
        ],
      };
      var graphdata3 = {
        linecolor: '#FF99CC',
        title: 'Wednesday',
        values: [
          { X: '6:00', Y: 230.0 },
          { X: '7:00', Y: 210.0 },
          { X: '8:00', Y: 214.0 },
          { X: '9:00', Y: 234.0 },
          { X: '10:00', Y: 247.25 },
          { X: '11:00', Y: 218.56 },
          { X: '12:00', Y: 268.57 },
          { X: '13:00', Y: 274.0 },
          { X: '14:00', Y: 280.89 },
          { X: '15:00', Y: 242.57 },
          { X: '16:00', Y: 298.24 },
          { X: '17:00', Y: 208.0 },
          { X: '18:00', Y: 214.24 },
          { X: '19:00', Y: 214.58 },
          { X: '20:00', Y: 211.54 },
          { X: '21:00', Y: 248.0 },
          { X: '22:00', Y: 258.0 },
          { X: '23:00', Y: 234.89 },
          { X: '0:00', Y: 210.26 },
          { X: '1:00', Y: 248.89 },
          { X: '2:00', Y: 238.87 },
          { X: '3:00', Y: 264.0 },
          { X: '4:00', Y: 270.0 },
        ],
      };
      var graphdata4 = {
        linecolor: 'Random',
        title: 'Thursday',
        values: [
          { X: '6:00', Y: 300.0 },
          { X: '7:00', Y: 410.98 },
          { X: '8:00', Y: 310.0 },
          { X: '9:00', Y: 314.0 },
          { X: '10:00', Y: 310.25 },
          { X: '11:00', Y: 318.56 },
          { X: '12:00', Y: 318.57 },
          { X: '13:00', Y: 314.0 },
          { X: '14:00', Y: 310.89 },
          { X: '15:00', Y: 512.57 },
          { X: '16:00', Y: 318.24 },
          { X: '17:00', Y: 318.0 },
          { X: '18:00', Y: 314.24 },
          { X: '19:00', Y: 310.58 },
          { X: '20:00', Y: 312.54 },
          { X: '21:00', Y: 318.0 },
          { X: '22:00', Y: 318.0 },
          { X: '23:00', Y: 314.89 },
          { X: '0:00', Y: 310.26 },
          { X: '1:00', Y: 318.89 },
          { X: '2:00', Y: 518.87 },
          { X: '3:00', Y: 314.0 },
          { X: '4:00', Y: 310.0 },
        ],
      };
      var Piedata = {
        linecolor: 'Random',
        title: 'Profit',
        values: [
          { X: 'Monday', Y: 50.0 },
          { X: 'Tuesday', Y: 110.98 },
          { X: 'Wednesday', Y: 70.0 },
          { X: 'Thursday', Y: 204.0 },
          { X: 'Friday', Y: 80.25 },
          { X: 'Saturday', Y: 38.56 },
          { X: 'Sunday', Y: 98.57 },
        ],
      };
      $(function () {
        $('#Bargraph').SimpleChart({
          ChartType: 'Bar',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: true,
          data: [graphdata4, graphdata3, graphdata2, graphdata1],
          legendsize: '140',
          legendposition: 'bottom',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });
        $('#sltchartype').on('change', function () {
          $('#Bargraph').SimpleChart('ChartType', $(this).val());
          $('#Bargraph').SimpleChart('reload', 'true');
        });
        $('#Hybridgraph').SimpleChart({
          ChartType: 'Hybrid',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: true,
          data: [graphdata4],
          legendsize: '140',
          legendposition: 'bottom',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });
        $('#Linegraph').SimpleChart({
          ChartType: 'Line',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: false,
          data: [graphdata4, graphdata3, graphdata2, graphdata1],
          legendsize: '140',
          legendposition: 'bottom',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });
        $('#Areagraph').SimpleChart({
          ChartType: 'Area',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: true,
          data: [graphdata4, graphdata3, graphdata2, graphdata1],
          legendsize: '140',
          legendposition: 'bottom',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });
        $('#Scatterredgraph').SimpleChart({
          ChartType: 'Scattered',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: true,
          data: [graphdata4, graphdata3, graphdata2, graphdata1],
          legendsize: '140',
          legendposition: 'bottom',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });
        $('#Piegraph').SimpleChart({
          ChartType: 'Pie',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: true,
          showpielables: true,
          data: [Piedata],
          legendsize: '250',
          legendposition: 'right',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });

        $('#Stackedbargraph').SimpleChart({
          ChartType: 'Stacked',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: true,
          data: [graphdata3, graphdata2, graphdata1],
          legendsize: '140',
          legendposition: 'bottom',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });

        $('#StackedHybridbargraph').SimpleChart({
          ChartType: 'StackedHybrid',
          toolwidth: '50',
          toolheight: '25',
          axiscolor: '#E6E6E6',
          textcolor: '#6E6E6E',
          showlegends: true,
          data: [graphdata3, graphdata2, graphdata1],
          legendsize: '140',
          legendposition: 'bottom',
          xaxislabel: 'Hours',
          title: 'Weekly Profit',
          yaxislabel: 'Profit in $',
        });
      });
    </script>
    <!-- //for index page weekly sales java script -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <!-- //  chọn năm -->
    <script type="text/javascript">
        $('.select-year').change(function() {
            var year = $(this).find(':selected').val();
            var id_phim = $(this).attr('id');
           
            $.ajax({
                url: "{{ url('/update-year-phim') }}",
                method: "GET",
                data: {
                    year: year,
                    id_phim: id_phim
                },
                success: function() {
                    alert('Thay đổi phim năm theo năm ' + year + ' thành công');
                }
            });
        })
    </script>
    
    <script type="text/javascript">
        $('.select-season').change(function() {
            var season = $(this).find(':selected').val();
            var id_phim = $(this).attr('id');
            var _token = $('input[name=_token]').val();
            // alert(season);
            // alert(id_phim);
            $.ajax({
                url: "{{ url('/update-season-phim') }}",
                method: "GET",
                data: {
                    season: season,
                    id_phim: id_phim,
                    _token: _token
                },
                success: function() {
                    alert('Thay đổi season ' + season + ' thành công');
                }
            });
        })
    </script>
      <!--Thay đổi danh muc ajax -->
    <script type="text/javascript">
        $('.category_choose').change(function()
        {
             var category_id=$(this).val();
             var movie_id= $(this).attr('id');
             $.ajax({
                url: "{{ route('category-choose') }}",
                method: "GET",
                data: {
                    category_id: category_id,
                    movie_id: movie_id
                },
                success: function(data) {
                    alert('Thay đổi thành công');
                }
            });
             
        })
    </script>  
      <!--Thay đổi quốc gia ajax -->
    <script type="text/javascript">
        $('.country_choose').change(function()
        {
             var country_id=$(this).val();
             var movie_id= $(this).attr('id');
            
             $.ajax({
                url: "{{ route('country-choose') }}",
                method: "GET",
                data: {
                    country_id: country_id,
                    movie_id: movie_id,
                },
                success: function(data) {
                    alert('Thay đổi thành công');
                }
            });
        })
    </script>  
        <!--Thay đổi trang thái ajax --> 
     <script type="text/javascript">
        $('.trangthai_choose').change(function()
        {
             var trangthai_id=$(this).val();
             var movie_id= $(this).attr('id');
           
            
             $.ajax({
                url: "{{ route('trangthai-choose') }}",
                method: "GET",
                data: {
                    trangthai_id: trangthai_id,
                    movie_id: movie_id,
                },
                success: function(data) {
                    alert('Thay đổi thành công');
                }
            });
        })
        $('.thuocphim_choose').change(function()
        {
             var thuocphim_val=$(this).val();
             var movie_id= $(this).attr('id');
         
        
             $.ajax({
                url: "{{ route('thuocphim-choose') }}",
                method: "GET",
                data: {
                 
                    movie_id: movie_id,
                    thuocphim_val:thuocphim_val,
                },
                success: function(data) {
                    alert('Thay đổi thành công');
                }
            });
        })
        $('.phimhot_choose').change(function()
        {
             var phimhot_val=$(this).val();
             var movie_id= $(this).attr('id');
       
        
             $.ajax({
                url: "{{ route('phimhot-choose') }}",
                method: "GET",
                data: {
                 
                    phimhot_val: phimhot_val,
                    movie_id:movie_id,
                },
                success: function(data) {
                    alert('Thay đổi thành công');
                }
            });
        })
        $('.phude_choose').change(function()
        {
             var phude_val=$(this).val();
             var movie_id= $(this).attr('id');
       
        
             $.ajax({
                url: "{{ route('phude-choose') }}",
                method: "GET",
                data: {
                 
                    phude_val: phude_val,
                    movie_id:movie_id,
                },
                success: function(data) {
                    alert('Thay đổi thành công');
                }
            });
        })
        $('.resolution_choose').change(function()
        {
             var resolution_val=$(this).val();
             var movie_id= $(this).attr('id');
       
        
             $.ajax({
                url: "{{ route('resolution-choose') }}",
                method: "GET",
                data: {
                 
                    resolution_val: resolution_val,
                    movie_id:movie_id,
                },
                success: function(data) {
                    alert('Thay đổi thành công');
                }
            });
        })
     </script>  
  
     <!-- thay đổi hình ảnh ajax -->
     <script type="text/javascript">
        $(document).on('change','.file_image', function()
        {
            var movie_id= $(this).data('movie_id');
            var files= $("#file-"+movie_id)[0].files;
            var image= document.getElementById("file-"+movie_id).files[0];
            // console.log(files);
            var form_data= new FormData();
         form_data.append("file",document.getElementById("file-"+movie_id).files[0]);
         form_data.append("movie_id",movie_id);      
         $.ajax({
            url:"{{route('update-image-movie-ajax')}}",
            method:"POST",
            headers:{
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function()
            {
                location.reload();
                $('#success_image').html('<span class="text-success">Cập nhật hình ảnh thành công</span>')
            }
         })

        });
     </script>
    
     <!-- thay đổi topview  -->
    <script type="text/javascript">
        $('.select-topview').change(function() {
            var topview = $(this).find(':selected').val();
            var id_phim = $(this).attr('id');
            if (topview == 0) {
                var text = 'Ngày';


            } else if (topview == 1) {
                var text = 'Tuần';

            } else {
                var text = 'Tháng';

            }

            $.ajax({
                url: "{{ url('/update-topview-phim') }}",
                method: "GET",
                data: {
                    topview: topview,
                    id_phim: id_phim
                },
                success: function() {
                    alert('Thay đổi phim theo topview ' + text + ' thành công');
                }
            });
        })
    </script>
    <!-- Trailer -->
    <script type="text/javascript">
        $(".watch_trailer").click(function(e) {
            e.preventDefault();
            var aid = $(this).attr("href");
            $('html,body').animate({
                scrollTop: $(aid).offset().top
            }, 'slow');
        });
    </script>
    <!-- Chọn phim -->
    <script type="text/javascript">
        $('.select_movie').change(function() {



         var id=$(this).find(':selected').val();
     
         $.ajax({
                url: "{{ url('select_movie') }}",
                method: "GET",
                data: {
                    id: id,
              
                },
                success: function(data) {
                    $('#show_movie').html(data);
                }
            });
        })
    </script>
  
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tablephim').DataTable();
        });

        function ChangeToSlug() {

            var slug;

            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '-');
            //Đổi khoảng trắng thành ký tự gạch ngang
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>
    <script type="text/javascript">
        $('.order_position').sortable({
            placeholder: 'ui-state-highlight',
            update: function(event, ui) {
                var array_id = [];
                $('.order_position tr').each(function() {
                    array_id.push($(this).attr('id'));
                })
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{route('resorting')}}",
                    method: "POST",
                    data: {
                        array_id: array_id
                    },
                    success: function(data) {
                        alert('sắp xếp thứ tự thành công');
                    }
                })
            }
        })
    </script>
 
    
    <script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
   
    </script>
    <!-- //Bootstrap Core JavaScript -->
  </body>
</html>
