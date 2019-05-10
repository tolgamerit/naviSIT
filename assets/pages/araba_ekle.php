<div id="aracekle" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" class="modal fade bd-example-modal-lg rounded" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="container-fluid">
                    <div class="row">
                        <h2 class="modal-title text-dark  mx-auto">Uyumlu Araba Markası Ekleme</h2>
                        <div class="col-md-12">
                            <img class="img-fluid mx-auto d-block rounded mt-3 mb-3" style="box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22)" id="resim1" width="225" height="150" />
                            <div class="row ">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <form class="form" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <label class="text-dark" for="aracmarka">Araba Markası </label>
                                            <input type="text" class="form-control" name="aracmarka" placeholder="Araba Markasını Girin" required>
                                        </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <input type="file" class="custom-file-input" name="resim1" onchange="$('#resim1')[0].src = window.URL.createObjectURL(this.files[0])" required>
                                    <label class="custom-file-label">Marka Logosunu Seçin</label>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="submit" value="EKLE" class="btn btn-info float-right">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 