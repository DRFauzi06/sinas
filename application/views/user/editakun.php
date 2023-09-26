<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> Edit</a></li>
                                    
                                </ul>

                                
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                <?= $this->session->flashdata('message') ?>
                                <!-- <?= var_dump($debitur) ?> -->
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                        <form action="<?= base_url('user/updateAkun') ?>" method="post">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <h1 class="text-center text-primary ">Data Akun</h1>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <!-- <?php var_dump($rekening) ?> -->
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="" name="namaAkun" required value="<?= $rekening['nama_akun'] ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="noRekening" readonly required value="<?= $rekening['no_rekening'] ?>" style="background-color: #152036;">
                                                    </div>
                                                    <input type="hidden" name="idRekening" value="<?= $rekening['id'] ?>">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input type="date" class="form-control" name="tglPembuatan" required readonly  value="<?= $rekening['tanggal_buka'] ?>" style="background-color: #152036;">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                    
                                                        <!-- <?= $rekening ?> -->
                                                    
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control " name="saldo" value="<?= $rekening['saldo'] ?>" required readonly style="background-color: #152036;">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                    <select name="statusAkun" class="form-control pro-edt-select form-control-primary" value>
                                                        <?php if($rekening['status']==1){
                                                            $status = "Aktif";
                                                        }else{
                                                            $status = "Tidak Aktif";
                                                        } ?>
															<option value="<?= $rekening['status'] ?>"><?= $status ?></option>
															<option value="1">Aktif</option>
															<option value="2">Tutup</option>
														</select>
                                                        </div>
                                                </div>
                                            </div>
                                        
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <button type="submit" class="btn btn-ctl-bt waves-effect waves-light m-r-10">Save
														</button>
                                                    <button type="button" class="btn btn-ctl-bt waves-effect waves-light">Discard
														</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>