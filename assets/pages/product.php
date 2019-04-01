<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="card card-nav-tabs rounded" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)">

                <h4 style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" class="card-header h3 card-header-info text-white rounded">Ürünler</h4>
                <div class="card-body mt-3">

                    <div class="row">

                        <form action="home.php"class="form" role="form" autocomplete="off" id="formAra" method="POST">
                            <div class="row">


                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Aranacak Ürün" name="ara" required>

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-info btn-sm rounded float-left" id="btnAra" name="Ara"><i class="fas fa-search"></i>Ara</button>

                                </div>
                            </div>

                        </form>
                        <div class=" table-responsive">
                            <table class="table text-center table-hover" id="table">
                                <thead>
                                    <tr>
                                        <?php 

                                        $ara = $db->query('SELECT * FROM tbl_product');
                                        for ($i = 0; $i < $ara->columnCount(); $i++) {
                                            $col = $ara->getColumnMeta($i);
                                            $sutun[] = $col['name']; //Kolon isimlerini çekmek için
                                        }
                                        $i = 1;
                                        $sutun[1] = "Cihaz Adı";
                                        $sutun[2] = "Cihaz Markası";
                                        $sutun[3] = "Cihaz Uyumlu Araba Markası";
                                        $sutun[4] = "Stok Durumu";
                                        $sutun[5] = "Satış Durumu";
                                        while ($i <= $ara->columnCount() - 1) {
                                            echo '<th scope="col">' . $sutun[$i] . '</th>';
                                            $i++;
                                        }
                                        echo '<th scope="col">Seçenekler</th>';

                                        echo '</tr>
                                </thead>
                                <tbody>';

                                        $listelenen = 7;
                                        $sayi = $db->query("select count(*) from tbl_product")->fetchColumn();
                                        $toplamsayfa     = ceil($sayi / $listelenen);
                                        $sayfa = isset($_GET['sayfa']) ? (int)$_GET['sayfa'] : 1;
                                        if ($sayfa < 1) $sayfa = 1;
                                        if ($sayfa > $toplamsayfa) $sayfa = $toplamsayfa;
                                        $limit = ($sayfa - 1) * $listelenen;

$arama="";
                                        if (isset($_POST['ara'])) {
                                                $arama = $_POST['ara'];
                                            }

                                        foreach ($db->query("select * from tbl_product where product_name like '%$arama%' LIMIT $limit,$listelenen") as $gelen) {
                                            if ($gelen[5] == 1) {
                                                $satisdurumu = "Satışta";  # code...
                                            } else $satisdurumu = "Satışta Değil";
                                            echo '<tr>
                                    <td>' . $gelen[1] . '</td>
                                    <td>' . $gelen[2] . '</td>
                                    <td>' . $gelen[3] . '</td>
                                    <td>' . $gelen[4] . '</td>'; ?>

                                        <td>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-4"><?php echo $satisdurumu ?> </div>
                                                <div class="col-md-4"> <a onclick=" Swal.fire({
  title: 'Satış Durumunu Değiştirmek İstediğinize Emin Misiniz?',
  text: 'İşlem Geri Alınamayacak!',
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'İptal',
  confirmButtonText: 'Evet, Değiştir!'
}).then((result) => {
    
  if (result.value) {
    
    Swal.fire(
        {
           title: 'Değiştirildi!',
    text:  'Cihaz Satış Durumu Başarıyla Değiştirildi.',
      type: 'success',
      confirmButtonColor: '#3085d6',
  confirmButtonText: 'Kapat'
   
        }
        
      
    ).then(function() {
    window.location = 'home.php?durumdegis=<?php echo $gelen[0];  ?>&<?php echo 'anlik=' . $gelen[5]; ?>';
});
   
  }
})" title="Sil" class="btn btn-sm sweet-3 text-dark" data-toggle="confirmation"><i class="fas fa-exchange-alt"></i></a></div>

                                            </div>
                                            <div class="col-md-2"></div>


                                        </td>
                                        <td>


                                            <a onclick=" Swal.fire({
  title: 'Cihaz Detay Sayfası Açılsın Mı?',
  
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Hayır',
  confirmButtonText: 'Evet'
}).then((result) => {
    
    if (result.value) {
    window.location = 'detaylar.php?detaylar=<?php echo $gelen[0];  ?>';

        }
         });


" title="Detaylar" class="text-dark btn btn-sm ml-2"> <i class="fas fa-info"></i></i></a>



                                            <a onclick=" Swal.fire({
  title: 'Emin Misiniz?',
  text: 'İşlem Geri Alınamayacak!',
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'İptal',
  confirmButtonText: 'Evet, Sil!'
}).then((result) => {
    
  if (result.value) {
    
    Swal.fire(
        {
           title: 'Silindi!',
    text:  'Cihaz Başarıyla Silindi.',
      type: 'success',
      confirmButtonColor: '#3085d6',
  confirmButtonText: 'Kapat'
   
        }
        
      
    ).then(function() {
    window.location = 'home.php?sil=<?php echo $gelen[0];  ?>';
});
   
  }
})" title="Sil" class="btn btn-sm sweet-3 text-dark" data-toggle="confirmation"><i class="fas fa-trash-alt"></i></a>

                                            <a onclick=" Swal.fire({
  title: 'Cihaz Düzenleme Sayfası Açılsın Mı?',
  
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Hayır',
  confirmButtonText: 'Evet'
}).then((result) => {
    
    if (result.value) {
    window.location = 'duzenle.php?duzenle=<?php echo $gelen[0];  ?>';

        }
         });


" title="Düzenle" class="text-dark btn btn-sm ml-2"> <i class="fas fa-edit"></i></i></a>




                                        </td>
                                    </tr>
                                    <?php

                                }
                                include("assets/pages/sil.php");
                                include("assets/pages/degistir.php");
                                include("assets/pages/guncelle.php");

                                //SELECT * FROM complaints
                                //      LIMIT 10 OFFSET " . (intval($_GET['page'])-1) * 10    
                                ?>
                            </table>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php 
                                    for ($s = 1; $s <= $toplamsayfa; $s++) {
                                        if ($sayfa == $s) { // eğer bulunduğumuz sayfa ise link yapma.
                                            echo $s . ' ';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link"href="?sayfa=' . $s . '">' . $s . '</a></li> ';
                                        }
                                    }
                                    ?>


                                </ul>
                            </nav>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
</div> 