<?php 
  include '../inc/datebase.php';
  session_start();
  if(!isset($_SESSION['username'])) {
    header("Location:login.php");
  }
?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Anasayfa</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" href="../assets/img/Letter_R_Concept.jpeg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include '../inc/kullanici/menu.php';?>
        <!-- Layout container -->
        <div class="layout-page">
          
          <?php include '../inc/kullanici/navbar.php';?>
          <?php
            $mesaj = @$_POST['sifre'];
            $message = 0;
            $kisi = @$_POST['sifret'];
            if(isset($_POST["btn"]))
            {
                if(isset($mesaj) || isset($kisi))
                {
                    if($mesaj == $kisi) {
                        $sql = $db->query("UPDATE kullanicilar SET email='$kisi' WHERE kullaniciadi = '{$_SESSION['username']}'");
                        if ($sql) {
                            $message = 1;
                        }
                    }
                    else
                    {
                        $message = 2;
                    }
                }
            }
          ?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-md col-sm-12">
                            <form action="" method="post">
                                <div class="card mt-4">
                                    <div class="card-body p-3">
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text h-100">
                                                        <i class="fa-regular fa-envelope text-info"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="sifre" placeholder="Yeni email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text h-100">
                                                        <i class="fa fa-tag text-info"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="sifret" placeholder="Email tekrarı" required>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                        <input type="submit" value="GÖNDER" name="btn" class="btn btn-info btn-block w-100">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js ../assets/vendor/js/core.js -->

    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
    if ($message == 1) {
        ?>
        <script>
            swal({
                text: "Emailiniz değiştirildi!",
                icon: "success",
                button: "Tamam",
            });
        </script>
        <?php
    }
    if ($message == 2) {
        ?>
        <script>
            swal({
                text: "Emailler aynı olmalıdır!",
                icon: "error",
                button: "Tamam",
            });
        </script>
        <?php
    }
    ?>
  </body>
</html>