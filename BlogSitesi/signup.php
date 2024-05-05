<?php include 'inc/datebase.php';?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->
    <?php
      $mesagge = 0;
      $name = @$_POST['username'];
      $email = @$_POST['email'];
      $pass = @$_POST['password'];

      if ($name && $email && $pass) {
          $sql = $db->query("INSERT INTO kullanicilar (kullaniciadi, email, sifre,pp) VALUES ('$name', '$email', '$pass','assets/img/pngwing.com.png')");
          $mesagge = 1;
      }
    ?>
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
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
              <h4 class="mb-2">Macera burada başlıyor 🚀</h4>
              <p class="mb-4">Uygulama yönetiminizi kolay ve eğlenceli hale getirin!</p>

              <form id="formAuthentication" class="mb-3" action="" method="post">
                <div class="mb-3">
                  <label for="username" class="form-label">Kullanıcı adı</label>
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="Kullanıcı adı giriniz"
                    autofocus />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="email girniz" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Şifre</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required/>
                    <label class="form-check-label" for="terms-conditions">
                      <a href="javascript:void(0);">Gizlilik politikası & şartlarını</a>
                      kabul ediyorum
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary d-grid w-100">Kayıt ol</button>
              </form>

              <p class="text-center">
                <span>Zaten bir hesabınız varmı?</span>
                <a href="login.php">
                  <span>oturum açın</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
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

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
      if($mesagge == 1){
        ?>
        <script>
          swal({
            title: "Tebrikler!",
            text: "Kayıt işlemi tamamlandı!",
            icon: "success",
            button: "Tamam",
          });
          setTimeout(() => {
            location.href = "login.php";
          }, 1700);
        </script>
        <?php
      }
    ?>
    <!-- Page JS -->
  </body>
</html>