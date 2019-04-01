<div id="cihazekle" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" class="modal fade bd-example-modal-lg rounded" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header"> <h2 class="modal-title text-dark container-fluid text-center">Navigasyon Cihazı Ekleme</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="container-fluid">
                    <div class="row">
                       
                        <div class="col-md-12 mt-5">
               
                    <form class="form" enctype="multipart/form-data" method="POST">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="urunad">Cihaz Adı</label>
                            <input type="text" class="form-control" name="urunad" placeholder="Ürün Adını Girin" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="cihazmarka">Cihaz Markası</label>
                            <select class="custom-select" name="cihazmarka">
                         <?php 
                         foreach ($db->query("select * from tbl_brands") as $gelen)
                         {
                             echo '
                            <option value="'.$gelen[1].'">'.$gelen[1].'</option>
                             
                             ';                         }
                         ?>

                        </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="text-dark" for="uyumluaraba">Cihaz Uyumlu Araba</label>
                            <select class="custom-select" name="uyumluaraba">
                         <?php 
                         foreach ($db->query("select * from tbl_cars") as $gelen)
                         {
                             echo '
                            <option value="'.$gelen[1].'">'.$gelen[1].'</option>
                             
                             ';                         }
                         ?>

                        </select>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="form-group col-md-5">
                        <label class="text-dark" for="stokadet">Stok Adeti</label>
                        <input type="text" class="form-control" name="stokadet" placeholder="Stok Sayısını Girin" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="text-dark" for="satisdurum">Satış Durumu</label>

                        <select class="custom-select" name="satisdurum">
                            <option value='1'>Satışta</option>
                            <option value='0'>Satışta Değiş</option>
                           

                        </select>
                  
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-12  text-center">
     
                        <label class="custom-file-label" for="upload[]" >Ürün Resimleri(Max 3 Adet)</label>

                        <input name="upload[]" class="custom-file-input" type="file" multiple="multiple" />
                    
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-4 form-group">
                        <label class="text-dark" for="ekranboyut">Ekran Boyutu</label>

                        <select class="custom-select" name="ekranboyut">
                            <option value='5"'>5"</option>
                            <option value='7"'>7"</option>
                            <option value='8"'>8"</option>
                            <option value='10"'>10"</option>

                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="text-dark" for="sistem">İşletim Sistemi</label>

                        <select class="custom-select" name="sistem">
                            <option value="Windows CE">Windows CE</option>
                            <option value="Android">Android</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="text-dark" for="depolama">Depolama Seçeneği</label>

                        <select class="custom-select" name="depolama">
                            <option value="4 GB">4 GB</option>
                            <option value="8 GB">8 GB</option>
                            <option value="16 GB">16 GB</option>
                            <option value="32 GB">32 GB</option>
                        </select>
                    </div>
                </div>     <div class="row">
                    <div class="col-md-4 form-group">
                        <label class="text-dark" for="islemci">İşlemci</label>

                        <select class="custom-select" name="islemci">
                            <option value="Dual Core">Dual Core</option>
                            <option value="Quad Core">Quad Core</option>
                            <option value="Octa Core">Octa Core</option>
                        </select>
                    </div>

                    <div class="col-md-4 form-group">
                        <label class="text-dark" for="ram">Ram Kapasitesi</label>

                        <select class="custom-select" name="ram">
                            <option value="512 MB">512 MB</option>
                            <option value="1 GB">1 GB</option>
                            <option value="2 GB">2 GB</option>
                            <option value="4 GB">4 GB</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="text-dark" for="detay">Detay</label>

                        <textarea class="form-control" name="detay" id="detay" rows="3"></textarea>
                    </div>
                </div>


                          
                            











<!-- col12 son-->
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="submit" name="submit" value="EKLE" class="btn btn-info float-right"></input>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>











