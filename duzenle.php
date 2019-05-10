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

    .form-control,
    .is-focused,
    .form-control {
        background-image: linear-gradient(to top, #c4bfc5 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
    }

    .dropdown-item:hover {
        background-color: #00bcd4 !important;
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
                    <button type="button" class="btn btn-info rounded-circle mt-2" data-toggle="modal" data-target="#stack1">
                        <?php echo $_SESSION['kullanici'] ?> <span class="badge badge-default">4</span>
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
    <?php
    if (isset($_POST['sistem'])) {
        $id = $_GET['duzenle'];
        $cihazmarka = $_POST['brand'];
        $uyumluaraba = $_POST['car'];
        $stokadet = $_POST['stok'];
        $ekranboyut = $_POST['ekranboyut'];
        $sistem = $_POST['sistem'];
        $depolama = $_POST['depolama'];
        $islemci = $_POST['islemci'];
        $ram = $_POST['ram'];
        $detay = $_POST['detail'];
        $urunad=$_POST['urunadi'];
        try {

            $degis = $db->prepare("update tbl_urun set urun_adi=:urunad,urun_marka=:brand,urun_uyumlu_araba=:car,urun_stok=:stock  WHERE id = :id");
            $degis->execute(array('id' => $id,'urunad' =>$urunad, 'brand' => $cihazmarka, 'car' => $uyumluaraba, 'stock' => $stokadet));
           
            $degis1 = $db->prepare("update urun_ozellikler set  urun_ekran=:ekran,urun_sistem=:sistem,urun_depolama=:depolama,urun_cpu=:cpu,urun_ram=:ram,urun_detay=:detay  WHERE urun_id = :id");
            $degis1->execute(array('id' => $id,'ekran' =>$ekranboyut, 'sistem' => $sistem, 'depolama' => $depolama, 'cpu' => $islemci, 'ram' => $ram, 'detay' => $detay));

            echo "=
  <div class='container'>
  <div class='row'> 
  <div class='col-md-12'>   <div style='box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)' class=' alert alert-success text-center rounded' role='alert'>
  Düzenleme Başarılı!
  </div></div>
   </div>
   </div>
  ";
            echo "   <meta http-equiv='refresh' content='0.85;URL=anasayfa.php'>  ";
        } catch (PDOException $e) {
            echo "   <meta http-equiv='refresh' content='0.85;URL=anasayfa.php'>  ";
        }
    }
    ?>
    <div class="container-fluid pl-5 pr-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-nav-tabs">
                    <h4 class="card-header card-header-info">Cihaz Detayları</h4>
                    <div class="card-body">
                        <form class="form" enctype="multipart/form-data" method="POST">
                            <?php
                            if ($_GET['duzenle']) {
                                $detay_al = $_GET['duzenle'];
                                $sorgu = $db->prepare('select * from tbl_urun inner join urun_ozellikler on tbl_urun.id=urun_ozellikler.urun_id where tbl_urun.id=' . $detay_al . '');
                                $sorgu->execute(array($detay_al));
                                $d = $sorgu->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($d as $veri) {
                                    ?>
                                    
                                    <h4 class="card-title">
                                <input name="urunadi" type="text" class="form-control text-center" value="<?php echo $veri['urun_adi']; ?>" placeholder="   <?php echo $veri['urun_adi']; ?>">
                                        
                                   </h4>
                                    <div class="row">
                                    <div class="form-group col-md-6">
                            <label class="text-dark" for="brand">Cihaz Markası</label>
                            <select class="custom-select" name="brand">
                         <?php 
                         foreach ($db->query("select * from tbl_marka") as $gelen)
                         {
                             if($gelen[1]==$veri['urun_marka'])
                             {
                                 echo '<option value="'.$gelen[1].'" selected>'.$gelen[1].'</option>';
                             }
                             echo '
                            <option value="'.$gelen[1].'">'.$gelen[1].'</option>';
                                                 }
                         ?>
                        </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="text-dark" for="car">Cihaz Uyumlu Araba</label>
                            <select class="custom-select" name="car">
                         <?php 
                         foreach ($db->query("select * from tbl_araba") as $gelen)
                         {
                            if($gelen[1]==$veri['urun_uyumlu_araba'])
                            {
                                echo '<option value="'.$gelen[1].'" selected>'.$gelen[1].'</option>';
                            }
                             echo '
                            <option value="'.$gelen[1].'">'.$gelen[1].'</option>'; 
                                                }
                         ?>
                        </select>
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
                                                                echo '<th scope="col">                                        
                                                    ' . $sutun[$i] . '</th>';
                                                                $i++;
                                                            }
                                                            ?>
                                                    </thead>
                                                    <tbody>
                                                        <td>
                                                            <div class="form-group"> <select class="custom-select" name="ekranboyut">
                                                                    <option value='5"' <?php if ($veri['urun_ekran'] == '5"') echo 'selected'; ?>>5"</option>
                                                                    <option value='7"' <?php if ($veri['urun_ekran'] == '7"') echo 'selected'; ?>>7"</option>
                                                                    <option value='8"' <?php if ($veri['urun_ekran'] == '8"') echo 'selected'; ?>>8"</option>
                                                                    <option value='10"' <?php if ($veri['urun_ekran'] == '10"') echo 'selected'; ?>>10"</option>
                                                                </select></div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group"><select class="custom-select" name="sistem">
                                                                    <option value="Windows CE" <?php if ($veri['urun_sistem'] == 'Windows CE') echo 'selected'; ?>>Windows CE</option>
                                                                    <option value="Android" <?php if ($veri['urun_sistem'] == 'Android') echo 'selected'; ?>>Android</option>
                                                                </select></div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group"> <select class="custom-select" name="depolama">
                                                                    <option value="4 GB" <?php if ($veri['urun_depolama'] == '4 GB') echo 'selected'; ?>>4 GB</option>
                                                                    <option value="8 GB" <?php if ($veri['urun_depolama'] == '8 GB') echo 'selected'; ?>>8 GB</option>
                                                                    <option value="16 GB" <?php if ($veri['urun_depolama'] == '16 GB') echo 'selected'; ?>>16 GB</option>
                                                                    <option value="32 GB" <?php if ($veri['urun_depolama'] == '32 GB') echo 'selected'; ?>>32 GB</option>
                                                                </select></div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="custom-select" name="islemci">
                                                                    <option value="Dual Core" <?php if ($veri['urun_cpu'] == 'Dual Core') echo 'selected'; ?>>Dual Core</option>
                                                                    <option value="Quad Core" <?php if ($veri['urun_cpu'] == 'Quad Core') echo 'selected'; ?>>Quad Core</option>
                                                                    <option value="Octa Core" <?php if ($veri['urun_cpu'] == 'Octa Core') echo 'selected'; ?>>Octa Core</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select class="custom-select" name="ram">
                                                                    <option value="512 MB" <?php if ($veri['urun_ram'] == '512 MB') echo 'selected'; ?>>512 MB</option>
                                                                    <option value="1 GB" <?php if ($veri['urun_ram'] == '1 GB') echo 'selected'; ?>>1 GB</option>
                                                                    <option value="2 GB" <?php if ($veri['urun_ram'] == '2 GB') echo 'selected'; ?>>2 GB</option>
                                                                    <option value="4 GB" <?php if ($veri['urun_ram'] == '4 GB') echo 'selected'; ?>>4 GB</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tbody>
                                </form>
                                </table>
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
                            <textarea name="detail" class=" form-control  mt-2" rows="10"><?php echo $veri['urun_detay'] ?></textarea>
                        </div>
                        <div class="col-md-6 text-center">
                            <i class="lead">Stok Miktari</i>
                            <p class="mt-2">
                                <input name="stok" type="text" class="form-control text-center" value="<?php echo $veri['urun_stok']; ?>" placeholder="   <?php echo $veri['urun_stok']; ?>">
                                <p>
                                    <div class="mt-5">
                                        <i class="lead">Satış Durumu</i>
                                        <p class="border-bottom border-info mt-2">
                                            <?php $durum = $veri['urun_durum'];
                                            if ($durum == 1) echo "Satışta";
                                            else echo "Satışta Değiş"; ?>
                                            <p>

                                                <input class="btn btn-success rounded" type="submit" value="KAYDET">
                                                <a href="anasayfa.php" class=" ml-3 btn btn-info rounded float-right">Geri</a>
                                                </form>
                                    </div>
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
    <script>
    </script>
    <script src="assets/js/all.js" type="text/javascript"></script>
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
</body>

</html>