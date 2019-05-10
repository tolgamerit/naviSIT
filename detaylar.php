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
    <!-- İçe Aktarmalar-->
    <?php
include("assets/pages/ekle.php"); //veri ekleme işlemleri
include("assets/pages/marka_ekle.php"); //marka ekleme sayfası
include("assets/pages/araba_ekle.php"); //araba markası ekleme sayfası
include("assets/pages/urun_ekle.php"); //cihaz ekleme sayfası
    ?>
    <!-- İçe Aktarmalar-->
    <!-- Detaylar Başlangıç-->
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Cihaz Detayları</h4>
                    <div class="card-body">
                        <?php
                        if ($_GET['detaylar']) {
                            $detay_al = $_GET['detaylar'];
                            $sorgu = $db->prepare('select * from tbl_urun inner join urun_ozellikler on tbl_urun.id=urun_ozellikler.urun_id where tbl_urun.id=' . $detay_al . '');

                            $sorgu->execute(array($detay_al));
                            $d = $sorgu->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($d as $veri) {
                                ?>
                                <h4 class="card-title"><?php echo $veri['urun_adi'] ?></h4>
                                <div class="row">
                                    <div class="col-md-6"><i class="lead">Üretici Firma </i>
                                        <p class="border-bottom border-info mt-2"><?php echo $veri['urun_marka'] ?><p>
                                    </div>
                                    <div class="col-md-6"><i class="lead">Cihaz ile Uyumlu Araba Markası </i>
                                        <p class="border-bottom border-info mt-2"><?php echo $veri['urun_uyumlu_araba'] ?><p>
                                    </div>
                                </div>
                                <div class="row text-center mt-3">
                                    <div class="col-md-12">
                                        <i class="lead border-bottom border-info ">Teknik Bilgiler</i>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class=" table mt-2">
                                            <table class="table text-center table-hover" id="table">
                                                <thead>
                                                    <tr><?php
                                                        $i = 1;
                                                        $sutun[1] = "Ekran Boyutu";
                                                        $sutun[2] = "İşletim Sistemi";
                                                        $sutun[3] = "Depolama";
                                                        $sutun[4] = "İşlemci";
                                                        $sutun[5] = "Ram";
                                                        while ($i <= 5) {
                                                            echo '<th scope="col">' . $sutun[$i] . '</th>';
                                                            $i++;
                                                        }
                                                        ?>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    echo ' <td>' . $veri["urun_ekran"] . '</td>
                                <td>' . $veri["urun_sistem"] . '</td>
                                <td>' . $veri["urun_depolama"] . '</td>
                                <td>' . $veri["urun_cpu"] . '</td>
                                <td>' . $veri["urun_ram"] . '</td>';
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <i class="lead border-bottom border-info ">Cihaz Resimleri</i>
                                </div>
                            </div>
                            <div class="row m-2">

                                <div class="col-md-4">
                                    <img style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" class="img-fluid mx-auto d-block rounded mt-3 mb-3" src="<?php echo $veri['urun_resim1'] ?>" />

                                </div>
                                <div class="col-md-4">
                                    <img style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" class="img-fluid mx-auto d-block rounded mt-3 mb-3" src="<?php echo $veri['urun_resim2'] ?>"> </div>
                                <div class="col-md-4">
                                    <img style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" class="img-fluid mx-auto d-block rounded mt-3 mb-3" src="<?php echo $veri['urun_resim3'] ?>"> </div>
                            </div>
                            <div class="row m-4">
                                <div class="col-md-6">
                                    <i class="lead">Cihaz Detayları </i>
                                    <textarea class="form-control border-bottom border-info mt-2" rows="10" disabled><?php echo $veri['urun_detay'] ?></textarea>
                                </div>
                                <div class="col-md-6 text-center">
                                    <i class="lead">Stok Miktari</i>
                                    <p class="border-bottom border-info mt-2"><?php echo $veri['urun_stok'] . " Adet"; ?><p>
                                            <div class="mt-5">
                                                <i class="lead">Satış Durumu</i>
                                                <p class="border-bottom border-info mt-2"><?php $durum = $veri['urun_durum'];
                                                                                            if ($durum == 1) echo "Satışta";
                                                                                            else echo "Satışta Değiş"; ?><p>
                                                        <a href="anasayfa.php" class="btn btn-info rounded float-right">Geri</a>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
    } 
    ?>
        <!-- Detaylar Son-->
        <!-- Oturum İşlemleri Modalı-->
        <div id="stack1" class="modal p-5 hide fade" tabindex="-1" data-focus-on="input:first">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">İşlemler</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <a href="#" class="btn btn-info btn-round" data-toggle="modal" data-target="#stack2">Sistem Hakkında</a>
                        <!-- Sistemden Çıkış-->
                        <a href="/assets/pages/cikis.php" class="btn btn-info btn-round">Oturumu Kapat</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Oturum İşlemleri Modalı-->
        <!-- Proje Hakkında Modalı-->
        <div id="stack2" class="modal p-5 hide fade" tabindex="-1" data-focus-on="input:first">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Hakkında</h5>
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
        <!-- Proje Hakkında Modalı-->
        <script src="assets/js/all.js" type="text/javascript"></script>
        <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
        <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
        <script src="assets/js/material-kit.js" type="text/javascript"></script>
        <script src="assets/js/sweetalert2.all.min.js"></script>
        <script src="assets/js/sweetalert2.min.js"></script>
</body>
</html>