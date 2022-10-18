<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?=$base?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?=$base?>/assets/img/favicon.png">
  <title>
    Argon Dashboard 2 by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?=$base?>/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="<?=$base?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="<?=$base?>/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?=$base?>/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="">
  <!-- End Navbar -->
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Welcome!</h1>
            <p class="text-lead text-white">Use these awesome forms to login or create new account for admin painel.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Register Account</h5>
            </div>
            <div class="card-body">
              <form novalidate method='POST' action='<?=$base?>/signup' class='needs-validation' role="form">
                <?php if(!empty($flash)):?>
                    <div class="alert alert-danger" role="alert"><?php echo $flash;?></div>
                <?php endif;?>
                <div class="mb-3">
                    <label for="Name" class="form-label">Name:</label>
                  <input type="text" class="form-control" placeholder="Name" aria-label="Name" name='name' required>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email:</label>
                  <input type="email" class="form-control" placeholder="Email" aria-label="Email" name='email' required>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password:</label>
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" name='password' required>
                </div>
                <div class="mb-3">
                    <label for="Password Admin" class="for-label">Admin Password:</label>
                  <input type="password" class="form-control" placeholder="Password" aria-label="Password" name='admPassword' required>
                </div>
                <div class="text-center">
                  <input type="submit" value='Sign Up' class="btn bg-gradient-dark w-100 my-4 mb-2">
                </div>
                <p class="text-sm mt-3 mb-0">Already have an account? <a href="<?=$base?>/login" class="text-dark font-weight-bolder">Sign in</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms).forEach(function (form) {
          form.addEventListener(
            "submit",
            function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>
 
  <script src="<?=$base?>/assets/js/core/popper.min.js"></script>
  <script src="<?=$base?>/assets/js/core/bootstrap.min.js"></script>
  <script src="<?=$base?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=$base?>/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=$base?>/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>