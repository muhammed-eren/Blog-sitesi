<?php include 'inc/datebase.php';?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
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
    <!-- Content -->
    <?php
      $message = 1;
      $username = @$_POST['username'];
      $password = @$_POST['Şifre'];

      if ($username && $password) {
        $sql = $db->query("SELECT * FROM kullanicilar WHERE kullaniciadi = '$username' AND sifre = '$password'");
        if ($sql->rowCount()) {
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          session_start();
          $_SESSION['username'] = $username;
          $_SESSION['id'] = $row['id'];
          if($row["kullaniciadi"] == "admin" && $row["sifre"] == "admin")
          header("Location: index.php");
          else
          header("Location: kullanıcı/index.php");
        }
        else
        {
          $message = 0;
        }
      }
    ?>
    <div class="container-xxl mt-5">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                  <img src="assets/img/Letter_R_Concept.jpeg" width="50" class="rounded">
                  <span class="app-brand-text demo text-body fw-bold">ROTA BLOG</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Rota blog'a hoşgediniz! 👋</h4>
              <p class="mb-4">Lütfen hesabınıza giriş yapın ve maceraya başlayın.</p>

              <form id="formAuthentication" class="mb-3" action="" method="post">
                <div class="mb-3">
                  <label for="email" class="form-label">Kullanıcı adı</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    name="username"
                    placeholder="Kullanıcı adı"
                    autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Şifre</label>
                    <a href="resetpwd.php">
                      <small>Şifrenizi mi unuttunuz?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="Şifre"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Giriş yap</button>
                </div>
              </form>

              <p class="text-center">
                <span>Sitemizde yenimisiz?</span>
                <a href="signup.php">
                  <span>bir hesap oluştur</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    <!-- / Content -->

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
    <?php
      if ($message == 0) {
        ?>
          <script>
            swal({
              title: "Hata!",
              text: "Böyle bir kullanıcı bulunamadı!",
              icon: "error",
              button: "Tamam",
            });
          </script>
        <?php
      }
    ?>
  </body>
</html>
