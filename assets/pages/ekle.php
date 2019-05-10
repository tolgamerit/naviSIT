<?php if (isset($_SESSION['kullanici'], $_SESSION['parola'])) {
  if (isset($_POST['submit'])) 
  {
    if (isset($_POST['navimarka'])) 
    {
      $navimarka = $_POST['navimarka'];
      $kaynak    = $_FILES["resim"]["tmp_name"];
      $dosyaadi   = $_FILES["resim"]["name"];
      $dosyatipi = $_FILES["resim"]["type"];
      $dboyut    = $_FILES["resim"]["size"];
      //hedef uzantısı sunucuya göre farklıık gösteriyor
      $hedef     = "upload/pictures";
      $uzanti        = substr($dosyaadi, -4);
      $yeniad        = substr(md5(uniqid(rand())), 0, 10);
      $yeniresimadi  = $yeniad . $uzanti;
      $yukle = move_uploaded_file($kaynak, $hedef . '/' . $yeniresimadi);
      $yeniuzanti = "upload/pictures/" . $yeniresimadi;
      $kayit = $db->prepare("insert into tbl_marka SET baslik=?,resim=?");
      $kayit->execute(array($navimarka, $yeniuzanti));
    }
    if (isset($_POST['aracmarka'])) 
    {
      $aracmarka = $_POST['aracmarka'];
      $kaynak    = $_FILES["resim1"]["tmp_name"];
      $dosyaadi   = $_FILES["resim1"]["name"];
      $dosyatipi = $_FILES["resim1"]["type"];
      $dboyut    = $_FILES["resim1"]["size"];
      //hedef uzantısı sunucuya göre farklıık gösteriyor
      $hedef     = "upload/pictures";
      $uzanti        = substr($dosyaadi, -4);
      $yeniad        = substr(md5(uniqid(rand())), 0, 10);
      $yeniresimadi  = $yeniad . $uzanti;
      $yukle = move_uploaded_file($kaynak, $hedef . '/' . $yeniresimadi);
      $yeniuzanti = "upload/pictures/" . $yeniresimadi;
      $kayit = $db->prepare("insert into tbl_araba SET baslik=?,resim=?");
      $kayit->execute(array($aracmarka, $yeniuzanti));
    }
    if (isset($_POST['urunad'])) 
    {
         $a = 0;
     while($_FILES["upload"]["tmp_name"][$a]!=NULL)
     {
      $kaynak    = $_FILES["upload"]["tmp_name"][$a];
      $dosyaadi   = $_FILES["upload"]["name"][$a];
      $dosyatipi = $_FILES["upload"]["type"][$a];
      $dboyut    = $_FILES["upload"]["size"][$a];
      //hedef uzantısı sunucuya göre farklıık gösteriyor
      $hedef     = "upload/pictures/";
      $uzanti        = substr($dosyaadi, -4);
      $yeniad        = substr(md5(uniqid(rand())), 0, 10);
      $yeniresimadi[$a]  = $yeniad . $uzanti;
      $yukle = move_uploaded_file($kaynak, $hedef . '/' . $yeniresimadi[$a]);
      $yeniuzanti[$a] = "/upload/pictures/" . $yeniresimadi[$a];
      $a++;
     }
      $urunad = $_POST['urunad'];
      $cihazmarka = $_POST['cihazmarka'];
      $uyumluaraba = $_POST['uyumluaraba'];
      $stokadet = $_POST['stokadet'];
      $satisdurum = $_POST['satisdurum'];
      $ekranboyut = $_POST['ekranboyut'];
      $sistem = $_POST['sistem'];
      $depolama = $_POST['depolama'];
      $islemci = $_POST['islemci'];
      $ram = $_POST['ram'];
      $detay = $_POST['detay'];
       error_reporting(0);
      $kayit = $db->prepare("insert into tbl_urun SET urun_adi=?,urun_marka=?,urun_uyumlu_marka=?,urun_stok=?,urun_durum=?");
      $kayit->execute(array($urunad, $cihazmarka, $uyumluaraba, $stokadet, $satisdurum));
          $kayit1 = $db->prepare("insert into urun_ozellikler SET urun_ekran=?,urun_sistem=?,urun_depolama=?,product_cpu=?,product_ram=?,urun_detay=?,urun_resim1=?,urun_resim2=?,urun_resim3=?");     
      $kayit1->execute(array($ekranboyut, $sistem, $depolama, $islemci, $ram, $detay, $yeniuzanti[0], $yeniuzanti[1], $yeniuzanti[2]));
    } 
if (isset($kayit)) {
  echo "
              <div class='container'>
              <div class='row'> 
              <div class='col-md-12'>   <div style='box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)' class='p-5 mt-5 mb-5 alert alert-success text-center rounded' role='alert'>
             Ekleme Başarılı!
            </div></div>
               </div>
               </div>
               <meta http-equiv='refresh' content='1;URL=anasayfa.php'>      
              ";
} else {
  echo "         
                 <div class='container'>
                 <div class='row'> 
                 <div class='col-md-12'>   <div style='box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)' class='p-5 mt-5 mb-5alert alert-danger text-center rounded' role='alert'>
                 Eklemede Hata Oluştu!
               </div></div>
                  </div>
                  </div>   
                  <meta http-equiv='refresh' content='1;URL=anasayfa.php'>            
                 ";
            }
          }
        }
        else 
        {
       echo"<meta http-equiv='refresh' content='1;URL=index.php'>";
        }
 ?>