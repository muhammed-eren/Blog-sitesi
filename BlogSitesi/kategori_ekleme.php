<?php include 'inc/datebase.php'; session_start();?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Anasayfa</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" href="assets/img/Letter_R_Concept.jpeg" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php include 'inc/menu.php';?>
        <!-- Layout container -->
        <div class="layout-page">
          
          <?php include 'inc/navbar.php';?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <?php
                if (isset($_POST['ekle'])) {
                    $sql = $db->query("INSERT INTO kategoriler (kategori) VALUES ('$_POST[kategori]')");
                }
                else if(isset($_POST['sil'])) {
                    $sql = $db->query("DELETE FROM kategoriler WHERE id = '$_POST[sil]'");
                }
            ?>
            <div class="container mt-5">
                <form action="" method="post">
                    <div class="d-flex gap-2">
                        <input type="text" name="kategori" class="form-control" placeholder="Kategori İsmi">
                        <button type="submit" class="btn btn-primary" name="ekle">Ekle</button>
                    </div>
                </form>
                <form action="" method="post">
                    <ul class="list-group mt-3">
                        <?php
                            $sql = $db->query("SELECT * FROM kategoriler ORDER BY id DESC");
                            if (!$sql->rowCount()) {
                                ?>
                                    <center><h1><i class="fa-solid fa-magnifying-glass mt-4"></i></h1></center>
                                    <center><p>Kategori bulunamadı...</p></center>
                                <?php  
                            }
                            else
                            {
                                while ($kategoriler = $sql->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"><h6><?= $kategoriler['kategori'] ?></h6> <button type="submit" class="ms-auto btn btn-danger" name="sil" value="<?= $kategoriler['id'] ?>">Sil</button></li>
                                    <?php
                                }
                            }
                        ?>
                    </ul>
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
    <!-- build:js assets/vendor/js/core.js -->

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
  </body>
</html>
