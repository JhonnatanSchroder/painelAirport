<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="<?=$base?>/assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="<?=$base?>/assets/img/favicon.png" />
    <title>Argon Dashboard 2 by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"
      rel="stylesheet"
    />
    <!-- Nucleo Icons -->
    <link href="<?=$base?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?=$base?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/e51c76ee7f.js"
      crossorigin="anonymous"
    ></script>
    <link href="<?=$base?>/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="<?=$base?>/assets/css/argon-dashboard.css?v=2.0.4"
      rel="stylesheet"
    />
  </head>

  <body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <?=$render('aside')?>
    <main class="main-content position-relative border-radius-lg">
      <!-- Navbar -->
      <nav
        class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
        id="navbarBlur"
        data-scroll="false"
      >
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol
              class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5"
            >
              <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-white" href="javascript:;">Pages</a>
              </li>
              <li
                class="breadcrumb-item text-sm text-white active"
                aria-current="page"
              >
                Dashboard
              </li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
          </nav>
          <div
            class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4"
            id="navbar"
          >
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav justify-content-end">
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a
                  href="javascript:;"
                  class="nav-link text-white p-0"
                  id="iconNavbarSidenav"
                >
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0">
                  <i
                    class="fa fa-cog fixed-plugin-button-nav cursor-pointer"
                  ></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
        <div class="row mt-4 ">
          <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <div class="d-flex justify-content-between">
                  <h6 class="mb-2">Pedidos recentes</h6>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table align-items-center">
                  <tbody>
                    <?php if(!empty($ordersAirport)):?>
                        <?php foreach($ordersAirport->list as $order):?>                 
                            <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                <i class="fa-solid fa-plane-circle-check mr-2 text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">
                                    Service:
                                    </p>
                                    <h6 class="text-sm mb-0"><?=$order->service_type?></h6>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Date Final:</p>
                                <h6 class="text-sm mb-0"><?=$order->date?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0"></p>
                                <a href='<?=$base?>/edit/<?=$order->id?>/<?=$order->service_type?>' class="text-sm mb-0 btn btn-success">Ver Mais</a>
                                </div>
                            </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>

                    <?php if(!empty($ordersBus)):?>
                        <?php foreach($ordersBus->list as $order):?>                 
                            <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                <i class="fa-solid fa-bus mr-2 text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">
                                    Service:
                                    </p>
                                    <h6 class="text-sm mb-0"><?=$order->service_type?></h6>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Date Final:</p>
                                <h6 class="text-sm mb-0"><?=$order->date?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0"></p>
                                <a href='<?=$base?>/edit/<?=$order->id?>/<?=$order->service_type?>' class="text-sm mb-0 btn btn-success">Ver Mais</a>
                                </div>
                            </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                    <?php if(!empty($ordersLimousine)):?>
                        <?php foreach($ordersLimousine->list as $order):?>                 
                            <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                <i class="fa-solid fa-user-tie mr-2 text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">
                                    Service:
                                    </p>
                                    <h6 class="text-sm mb-0"><?=$order->service_type?></h6>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Date Final:</p>
                                <h6 class="text-sm mb-0"><?=$order->date?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0"></p>
                                <a href='<?=$base?>/edit/<?=$order->id?>/<?=$order->service_type?>' class="text-sm mb-0 btn btn-success">Ver Mais</a>
                                </div>
                            </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                    <?php if(!empty($ordersTaxi)):?>
                        <?php foreach($ordersTaxi->list as $order):?>                 
                            <tr>
                            <td class="w-30">
                                <div class="d-flex px-2 py-1 align-items-center">
                                <div>
                                <i class="fa-solid fa-taxi mr-2 text-primary"></i>
                                </div>
                                <div class="ms-4">
                                    <p class="text-xs font-weight-bold mb-0">
                                    Service:
                                    </p>
                                    <h6 class="text-sm mb-0"><?=$order->service_type?></h6>
                                </div>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0">Date Final:</p>
                                <h6 class="text-sm mb-0"><?=$order->date?></h6>
                                </div>
                            </td>
                            <td>
                                <div class="text-center">
                                <p class="text-xs font-weight-bold mb-0"></p>
                                <a href='<?=$base?>/edit/<?=$order->id?>/<?=$order->service_type?>' class="text-sm mb-0 btn btn-success">Ver Mais</a>
                                </div>
                            </td>
                            </tr>
                        <?php endforeach;?>
                    <?php endif;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
      </a>
      <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Argon Configurator</h5>
            <p>See our dashboard options.</p>
          </div>
          <div class="float-end mt-4">
            <button
              class="btn btn-link text-dark p-0 fixed-plugin-close-button"
            >
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1" />
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
              <span
                class="badge filter bg-gradient-primary active"
                data-color="primary"
                onclick="sidebarColor(this)"
              ></span>
              <span
                class="badge filter bg-gradient-dark"
                data-color="dark"
                onclick="sidebarColor(this)"
              ></span>
              <span
                class="badge filter bg-gradient-info"
                data-color="info"
                onclick="sidebarColor(this)"
              ></span>
              <span
                class="badge filter bg-gradient-success"
                data-color="success"
                onclick="sidebarColor(this)"
              ></span>
              <span
                class="badge filter bg-gradient-warning"
                data-color="warning"
                onclick="sidebarColor(this)"
              ></span>
              <span
                class="badge filter bg-gradient-danger"
                data-color="danger"
                onclick="sidebarColor(this)"
              ></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button
              class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2"
              data-class="bg-white"
              onclick="sidebarType(this)"
            >
              White
            </button>
            <button
              class="btn bg-gradient-primary w-100 px-3 mb-2"
              data-class="bg-default"
              onclick="sidebarType(this)"
            >
              Dark
            </button>
          </div>
          <p class="text-sm d-xl-none d-block mt-2">
            You can change the sidenav type just on desktop view.
          </p>
          <!-- Navbar Fixed -->
          <div class="d-flex my-3">
            <h6 class="mb-0">Navbar Fixed</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input
                class="form-check-input mt-1 ms-auto"
                type="checkbox"
                id="navbarFixed"
                onclick="navbarFixed(this)"
              />
            </div>
          </div>
          <hr class="horizontal dark my-sm-4" />
          <div class="mt-2 mb-5 d-flex">
            <h6 class="mb-0">Light / Dark</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input
                class="form-check-input mt-1 ms-auto"
                type="checkbox"
                id="dark-version"
                onclick="darkMode(this)"
              />
            </div>
          </div>
          <div class="mt-2 mb-5 d-flex">
            <h6 class="mb-0">Logout</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <a href='<?=$base?>/logout' class='btn btn-info'>Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?=$base?>/assets/js/core/popper.min.js"></script>
    <script src="<?=$base?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?=$base?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?=$base?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?=$base?>/assets/js/plugins/chartjs.min.js"></script>
    <script>
      var ctx1 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, "rgba(94, 114, 228, 0.2)");
      gradientStroke1.addColorStop(0.2, "rgba(94, 114, 228, 0.0)");
      gradientStroke1.addColorStop(0, "rgba(94, 114, 228, 0)");
      new Chart(ctx1, {
        type: "line",
        data: {
          labels: [
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
          ],
          datasets: [
            {
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#5e72e4",
              backgroundColor: gradientStroke1,
              borderWidth: 3,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
          },
          interaction: {
            intersect: false,
            mode: "index",
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
              },
              ticks: {
                display: true,
                padding: 10,
                color: "#fbfbfb",
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: "normal",
                  lineHeight: 2,
                },
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5],
              },
              ticks: {
                display: true,
                color: "#ccc",
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: "normal",
                  lineHeight: 2,
                },
              },
            },
          },
        },
      });
    </script>
    <script>
      var win = navigator.platform.indexOf("Win") > -1;
      if (win && document.querySelector("#sidenav-scrollbar")) {
        var options = {
          damping: "0.5",
        };
        Scrollbar.init(document.querySelector("#sidenav-scrollbar"), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?=$base?>/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  </body>
</html>
