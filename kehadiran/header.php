<!-- Tajuk sistem. Akan dipaparkan di sebelah atas -->
<div>
    <img src='banner.png' width='100%' height="20%">
    <h4 style="position: absolute; z-index: 10; top: 0.75rem; left: 20rem; color: rgb(255 255 255); font-size: 2rem;"> 
        SISTEM PENGESAHAN KEHADIRAN AHLI 4SC </h4>
</div>
</header>

<div style="background-color: #CF9FFF;">
<hr>
<?PHP if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "ADMIN") { ?>
   <!-- Menu admin : dipaparkan sekiranya admin telah login -->
    | <a href='index.php'                 > Laman Utama </a>
    | <a href='profil.php'                > Profil </a>
    | <a href='kehadiran-rekod.php'       > Kaunter Kehadiran </a>
    | <a href='senarai-ahli.php'          > Senarai Ahli </a>
    | <a href='senarai-aktiviti.php'      > Senarai Aktiviti </a>
    | <a href='kehadiran-laporan.php'     > Laporan Kehadiran </a>
    | <a href='logout.php'                > Logout </a>
<hr>
</div>
<?php } else if (!empty($_SESSION['tahap']) and $_SESSION['tahap'] == "AHLI BIASA"){ ?>
    <!-- Menu ahli biasa : dipaparkan sekiranya ahli telah login -->
    | <a href='index.php'                 > Laman Utama </a>
    | <a href='profil.php'                > Profil </a>
    | <a href='logout.php'                > Logout </a>
<hr>
<div style="background-color: #CF9FFF;">
<?php } else { ?>
    <!-- menu Laman Utama : dipaparkan sekiranya admin atau ahli tidak login -->
    | <a href='index.php'                 > Laman Utama </a>
    | <a href='login-borang.php'          > Daftar Masuk Ahli </a>
<hr>
</div>
<?php } ?>