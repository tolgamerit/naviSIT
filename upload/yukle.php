<?php session_start(); if (isset($_SESSION['kullanici'], $_SESSION['parola'])){ 

$kaynak    = $_FILES["dosya"]["tmp_name"];
$dosyaadi   = $_FILES["dosya"]["name"];
$dosyatipi = $_FILES["dosya"]["type"];
$dboyut    = $_FILES["dosya"]["size"];
$hedef     = "pictures";

$uzanti        = substr($dosyaadi, -4);

$yeniad        = substr(md5(uniqid(rand())), 0,10);

$yeniresimadi  = $yeniad.$uzanti;


  $yukle = move_uploaded_file($kaynak,$hedef.'/'.$yeniresimadi);
 
  
  echo "<center><b>Resiminiz yuklenmistir!</b><br></center><br>";
  echo "<center><img src='$hedef/$yeniresimadi' width='150' height='150'></center><br>";
  echo "<center><b>Link</b><br> <label>https://".$_SERVER['HTTP_HOST']."/upload/$hedef/$yeniresimadi</label></center>";	
 echo "<br><center><a href='javascript:window.close()'>Pencereyi Kapat</a></center>";

}else{ echo '<meta http-equiv="refresh" content="0;URL=http://www.google.com.tr">'; } ?>
