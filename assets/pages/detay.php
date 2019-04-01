<!--<div class="modal fade" id="detaylar"tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
   
    </div>
  </div>
</div>-->
<?php
if(isset($x))
{
    $detay_al=$x;
$sorgu= $db->prepare('select * from tbl_product inner join product_features on tbl_product.id=product_features.product_id where tbl_product.id='.$detay_al.'');
  
 $sorgu->execute(array( $detay_al));
 $d = $sorgu->fetchAll(PDO::FETCH_ASSOC);
 foreach($d as $veri)
 {
    echo $veri['id']."<br>";

     echo $veri['product_os']."<br>";
     echo $veri['product_detail']."<br>";
 } 
 
}else
echo "VERİ YOK";
?>