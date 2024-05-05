<?php include '../inc/datebase.php'; session_start();?>
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

    <title>Bloglarım</title>

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

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container mt-3">
              <?php
                $message="";
                if(isset($_POST["sil"]))
                {
                  $sql = $db->query("DELETE FROM bloglar WHERE id = '$_POST[sil]'");
                  if ($sql) {
                    $message = 1;
                  }
                }
              ?>
              <form action="" method="post">
                <?php
                  $id = $_SESSION['username'];
                  $sql = $db->query("SELECT * FROM bloglar WHERE paylasan = '$id' ORDER BY id DESC");

                  while ($row = $sql->fetch()) {
                    ?>
                      <a href="blog.php?id=<?=$row['id']?>">
                        <div class="card w-100 mb-3">
                          <?php 
                            if($row['resim'] != null){
                              ?>
                                <img src="../<?=$row['resim']?>" class="card-img-top object-fit-cover"  height="300px">
                              <?php
                            }
                          ?>
                          <div class="card-body d-flex justify-content-between">
                            <div>
                              <h5 class="card-title"><?=$row['baslik']?></h5>
                              <?php
                                if(strlen($row['blogYazi']) > 100){
                                  ?>
                                    <p class="card-text"><?=substr($row['blogYazi'],0,100).'...'?></p>
                                  <?php
                                }
                                else
                                {
                                  ?>
                                    <p class="card-text"><?=$row['blogYazi']?></p>
                                  <?php
                                }
                              ?>
                            </div>
                          </a>
                            <div>
                              <a class="btn btn-primary" href="guncele.php?id=<?=$row['id']?>">Güncelle</a>
                              <button class="btn btn-danger" name="sil" value="<?=$row['id']?>">Sil</button>
                            </div>
                          </div>
                        </div>
                    <?php
                  }
                ?>
              </form>
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
    <?php
      if($message == 1)
      {
        ?>
          <script>
            swal({
              title: "Silindi!",
              icon: "success",
              button: "Tamam",
            });
          </script>
        <?php
      }
    ?>
  </body>
</html>