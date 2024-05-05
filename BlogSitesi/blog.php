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

    <style>
        a {
        color: #fff;
        text-decoration: none;
        }
        .social {
            position: fixed;
            top: 100px;
            width:100%;
        }
        .social ul {
            padding: 0px;
            transform: translate(100%, 0);
            margin-right: 60px;
        }
        .social ul .si {
            display: block;
            margin: 5px;
            background: rgba(0, 0, 0, 0.36);
            width: 300px;
            text-align: left;
            padding: 10px;
            border-radius: 30px 0px 0px 30px;
            transition: all 1s;
        }
        .social ul .si:hover {
        transform: translate(-110px, 0);
        background: rgba(255, 255, 255, 0.4);
        }
        .social ul .si:hover a {
        color: #000;
        }
        .social ul .si:hover i {
        color: #fff;
        background: rgba(0, 0, 0, 0.36);
        transform: rotate(360deg);
        transition: all 1s;
        }
        .social ul .si i {
        margin-right: 10px;
        color: #000;
        background: #fff;
        padding: 10px;
        border-radius: 50%;
        font-size: 20px;
        background: #ffffff;
        transform: rotate(0deg);
        }
    </style>

  </head>

  <body>
    <nav class="social">
        <ul>
            <li class="si"><a href="#"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
            <li class="si"><a href="#"><i class="fa-brands fa-whatsapp"></i> Whatsapp</a></li>
            <li class="si"><a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a></li>
            <li class="si"><a href="#"><i class="fa-brands fa-facebook"></i>Facebook</a></li>
        </ul>
    </nav>
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
                $sql=$db->query("SELECT * FROM bloglar WHERE id={$_GET['id']}");
                $blog=$sql->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="container my-5">
                <div class="border rounded p-3">
                    <h1 class="text-center mb-2"><?= $blog['baslik'] ?></h1>
                    <hr>
                    <!-- Kullanıcı profili -->
                    <?php 
                        if(isset($blog['resim'])) 
                        {
                            ?> 
                                <img src="<?=$blog['resim']?>" height="500px" class="object-fit-cover w-100"> 
                            <?php
                        }

                        if(isset($_POST['sil']))
                        {
                            $sql = $db->query("DELETE FROM yorumlar WHERE id={$_POST['sil']}");
                        }
                    ?>
                    
                    <p class="mt-5"><?= $blog['blogYazi'] ?></p>
                    <hr>
                    <?php
                        $yorum = @$_POST['yorum'];
                        if(isset($yorum))
                        {
                            $yyapan = @$_SESSION['username'];
                            $id = @$_GET['id'];

                            $sql = $db->query("INSERT INTO yorumlar (yyapan, yorum, blogid) VALUES ('{$yyapan}', '{$yorum}', '{$id}')");
                        }
                    ?>
                    <div class="yorum mt-3">
                        <h4>Yorum Yap</h4>
                        <form action="" method="post">
                            <textarea name="yorum" id="" cols="30" rows="5" class="form-control" placeholder="Yorum Yaz"></textarea>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Yorum Yap</button>
                        </form>
                    </div>

                    <div>
                        <?php
                            $sql = $db->query("SELECT * FROM yorumlar WHERE blogid={$_GET['id']} ORDER BY id DESC");
                            while($yorum = $sql->fetch(PDO::FETCH_ASSOC))
                            {
                              $pp = $db->query("SELECT * FROM kullanicilar WHERE kullaniciadi='{$yorum['yyapan']}'");
                              $rpp = $pp->fetch(PDO::FETCH_ASSOC);
                              ?>
                                  <div class="card mt-3">
                                      <div class="card-header p-3 d-flex align-items-center gap-2"><img src="<?=$rpp['pp']?>" width="50"><h5 class="mb-0"><?= $yorum['yyapan'] ?></h5></div>
                                      <hr class="mt-0">
                                      <div class="card-body d-flex justify-content-between">
                                        <p class="mb-0"><?= $yorum['yorum'] ?></p>

                                        <form action="" method="post">
                                          <button class="btn btn-danger" name="sil" value="<?=$yorum['id']?>"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                      </div>
                                  </div>
                              <?php
                            }
                        ?>
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