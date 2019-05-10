<?php
if(isset($_GET['durumdegis']))
{
    $id=$_GET['durumdegis'];
    $anlik=$_GET['anlik'];
    if($anlik==1)
    {
        $degis = $db->prepare("update tbl_product set product_enabled=0 WHERE id = :id"); 
        $degis->execute(array('id' => $id));
    }
    else
    {
        $degis = $db->prepare("update tbl_product set product_enabled=1  WHERE id = :id"); 
        $degis->execute(array('id' => $id));  
    }
   if($degis)
   {
    echo"   <meta http-equiv='refresh' content='0;URL=anasayfa.php'>  ";
   }
}
?>