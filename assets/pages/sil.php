<?php
if(isset($_GET['sil']))
{
    $id=$_GET['sil'];

    $sil = $db->prepare("delete from product_features WHERE product_id = :id"); 
    $sil->execute(array('id' => $id));

    $sil1 = $db->prepare("delete from tbl_product WHERE id = :id"); 
    $sil1->execute(array('id' => $id));
 
   
   if($sil)
   {
    echo"   <meta http-equiv='refresh' content='0;URL=anasayfa.php'>  ";
   }
}
?>