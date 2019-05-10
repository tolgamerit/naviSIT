<?php
session_start();
define("include", true);
include("assets/config.php");
if (isset($_SESSION['kullanici'], $_SESSION['parola'])) {
    $kullanici = $_SESSION['kullanici'];
    $parola = $_SESSION['parola'];
} else {
    echo '<script language="javascript">location.href="index.php";</script>';
}
?>
<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/material-kit.css" rel="stylesheet" />
    <link href="assets/css/arayuz.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/pictures/favicon.ico" />
    <title>NaviSIT</title>
</head>
<style>
    body {
        background-color: #00bcd4;
    }

    a.page-link:hover,
    a.page-item:hover {
        background-color: #00bcd4 !important;
        border-color: #00bcd4 !important;
    }
</style>

<body>
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="anasayfa.php">NaviSIT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a id="kayiteklehover" class="nav-link" data-toggle="modal" href="#markaekle">Marka Ekleme</a>
                    </li>
                    <li class="nav-item">
                        <a id="kayiteklehover" class="nav-link" data-toggle="modal" href="#aracekle">Araç Ekleme</a>
                    </li>
                    <li class="nav-item">
                        <a id="kayiteklehover" class="nav-link" data-toggle="modal" href="#cihazekle">Cihaz Ekleme</a>
                    </li>
                    <button style="box-shadow: 0px 0px 9px 2px rgba(0,0,0,0.30), 0px 0px 5px 5px rgba(0,0,0,0.22)" type="button" class="btn btn-info rounded mt-2 ml-3" data-toggle="modal" data-target="#stack1">
                        <?php echo $_SESSION['kullanici'] ?>
                    </button>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar-->
    <!-- Marka Ekleme-->
    <?php
    include("assets/pages/ekle.php");
    include("assets/pages/marka_ekle.php");
    include("assets/pages/urun.php");
    ?>
    <!-- Marka Ekleme-->
    <!-- Araç Ekleme-->
    <?php
    include("assets/pages/araba_ekle.php");
    ?>
    <!-- Araç Ekleme-->
    <!-- Cihaz Ekleme-->
    <?php
    include("assets/pages/urun_ekle.php");
    ?>
    <!-- Cihaz Ekleme-->
    <!-- Oturum İşlemleri Modalı-->
    <div id="stack1" class="modal p-5 hide fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">İşlemler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <a href="#" class="btn btn-info btn-round" data-toggle="modal" data-target="#hakkinda">Sistem Hakkında</a>

                    <a href="assets/pages/cikis.php" class="btn btn-info btn-round">Oturumu Kapat</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <div id="hakkinda" class="modal p-5 hide fade" tabindex="-1" data-focus-on="input:first">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">Sistem Hakkında</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="lead">Bu Web Projesi BPP234 Sistem Analizi ve Tasarımı dersi için özel olarak hazırlanmıştır.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                Deniz Bağcı
                            </div>
                            <div class="col-md-6">2017512013</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">Hasan Gürgah</div>
                            <div class="col-md-6">2017512043</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">Tolga Merit Tekin</div>
                            <div class="col-md-6">2017512091</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button onclick="" type="button" class="btn btn-info" data-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Oturum İşlemleri Modalı-->
    <!-- Modal -->
    <script src="assets/js/all.js" type="text/javascript"></script>
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
</body>

</html>