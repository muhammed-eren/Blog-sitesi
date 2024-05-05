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

    <title>Blog ekleme</title>

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
            <form action="" method="post" enctype="multipart/form-data">
                <div class="container-xxl mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingInput" placeholder="" name="resim">
                                <label for="floatingInput">Resim</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="" name="baslik">
                                <label for="floatingInput">Başlık</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select name="kategori" class="form-select">
                                <?php
                                    $sql = $db->query("SELECT * FROM kategoriler ORDER BY id DESC");
                                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?=$row["kategori"]?>"><?=$row["kategori"]?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                <label for="floatingInput">Kategori</label>
                            </div>

                            <div class="form-floating mb-3">
                                <textarea name="yazi" id="floatingInput" cols="30" rows="10" class="form-control"></textarea>
                                <label for="floatingInput">Blog Yazısı</label>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary w-100">Paylaş</button>
                        </div>
                    </div>
                </div>
            </form>
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
  </body>
</html>
<?php

if (isset($_POST["submit"])) {
    try {
        // Verileri alın
        $kategori = $_POST['kategori'];
        $baslik = $_POST['baslik'];
        $yazi = $_POST['yazi'];
        $id = $_SESSION['username'];

        // Yüklenecek dosyanın hedef dizini
        $targetDir = "../uploads/";
        // Dosyanın hedef yolu ve adı
        $targetFile = $targetDir . basename($_FILES["resim"]["name"]);
        // Dosya uzantısını al
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Dosyanın gerçekten resim olup olmadığını kontrol et
        if (!empty($_FILES["resim"]["tmp_name"])) {
            $check = getimagesize($_FILES["resim"]["tmp_name"]);
            if ($check === false) {
                throw new Exception("Yüklenen dosya bir resim değil.");
            }

            if (!move_uploaded_file($_FILES["resim"]["tmp_name"], $targetFile)) {
                throw new Exception("Dosya yüklenirken bir hata oluştu.");
            }

            // Dosya başarılı bir şekilde yüklendi
            $resim = "uploads/".basename($_FILES["resim"]["name"]);
        } else {
            // Eğer resim seçilmemişse boş bırakın veya varsayılan bir değer kullanın
            $resim = null;
        }

        // SQL sorgusu için prepare ve bindParam kullanarak güvenli hale getirin
        $stmt = $db->prepare("INSERT INTO bloglar (resim, baslik, kategori, blogYazi, paylasan) VALUES (:resim, :baslik, :kategori, :blogYazi, :paylasan)");
        $stmt->bindParam(':resim', $resim);
        $stmt->bindParam(':baslik', $baslik);
        $stmt->bindParam(':kategori', $kategori);
        $stmt->bindParam(':blogYazi', $yazi);
        $stmt->bindParam(':paylasan', $id);

        // Sorguyu çalıştırın
        $stmt->execute();

        // Başarılı işlem sonrası bildirim
        ?>
        <script>
            swal({
                text: "Blog Eklendi!",
                icon: "success",
                button: "Tamam",
            });
        </script>
        <?php
    } catch (Exception $e) {
        // Hata durumunda bildirim
        echo "Hata: " . $e->getMessage();
    }
}

?>