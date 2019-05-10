
<?php
if(isset($x))
{
    $detay_al=$x;
$sorgu= $db->prepare('select * from tbl_urun inner join urun_ozellikler on tbl_urun.id=urun_ozellikler.urun_id where tbl_urun.id='.$detay_al.'');
 $sorgu->execute(array( $detay_al));
 $d = $sorgu->fetchAll(PDO::FETCH_ASSOC);
 foreach($d as $veri)
 {
    echo $veri['id']."<br>";

     echo $veri['urun_sistem']."<br>";
     echo $veri['urun_detay']."<br>";
 } 
}else
echo "VERİ YOK";
?>