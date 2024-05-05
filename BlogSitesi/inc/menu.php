<!-- Menu -->
<?php include 'inc/datebase.php';?>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
    <a href="index.php" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="assets/img/Letter_R_Concept.jpeg" class="object-fit-cover rounded" style="width: 40px; height: 40px;">
        </span>
        <span class="app-brand-text demo menu-text fw-bold ms-2">ROTA BLOG</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item">
        <a href="index.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Anasayfa">Anasayfa</div>
        </a>
    </li>

    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Bloglar">Bloglar</div>
        </a>

        <ul class="menu-sub">
        <li class="menu-item">
            <a href="blog_ekleme.php" class="menu-link">
            <div data-i18n="Blog paylaş">Blog paylaş</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="blog_listesi.php" class="menu-link">
            <div data-i18n="Bloglarım">Bloglarım</div>
            </a>
        </li>
        </ul>
    </li>
    
    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Katergoriler</span>
    </li>
    <li class="menu-item">
        <a href="kategori_ekleme.php" class="menu-link">
            <i class="menu-icon fa-solid fa-plus"></i>
            <div data-i18n="kategoriekel">Kategori Ekle</div>
        </a>
    </li>
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-solid fa-list"></i>
            <div data-i18n="Bloglar">Kategoriler</div>
        </a>

        <ul class="menu-sub">
            <form action="" method="post">
            <?php
                $sql = $db->query("SELECT * FROM kategoriler ORDER BY id DESC");
                while ($row = $sql->fetch()) {
                    ?>
                        <li class="menu-item">
                            <a type="submit" class="menu-link" name="kategori" href="index.php?kategori=<?=$row["kategori"]?>">
                                <div data-i18n="Blog paylaş" class="me-auto"><?=$row["kategori"]?></div>
                            </a>
                        </li>
                    <?php
                }
            ?>
            </form>
        </ul>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">DİĞER</span>
    </li>

    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon fa-solid fa-gear"></i>
        <div data-i18n="Bloglar">Ayarlar</div>
        </a>

        <ul class="menu-sub">
        <li class="menu-item">
            <a class="menu-link" href="sifre_degistir.php">
                <div data-i18n="Blog paylaş">Şifreni değiştir</div>
            </a>
            <a class="menu-link" href="email_degistir.php">
                <div data-i18n="Blog paylaş">E-posta değiştir</div>
            </a>
        </li>
        </ul>
    </li>
    <li class="menu-item">
        <a href="kullanicilar.php" class="menu-link"><i class="menu-icon fa-solid fa-users"></i><div data-i18n="Cikis">Kullanıcılar</div></a>
    </li>
    <li class="menu-item">
        <a href="bildirim.php" class="menu-link"><i class="menu-icon fa-regular fa-envelope"></i><div data-i18n="Cikis">Bildirimler</div></a>
    </li>
    </ul>
</aside>
<!-- / Menu -->