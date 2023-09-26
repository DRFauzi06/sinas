
<!-- Single pro tab start-->
<div class="single-product-tab-area mg-b-30">
            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-tab-pro-inner">
                                <ul id="myTab3" class="tab-review-design">
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> Registrasi</a></li>
                                    <li><a href="#INFORMATION"><i class="icon nalika-chat" aria-hidden="true"></i> Rekening Baru</a></li>
                                </ul>

                                
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                <?= $this->session->flashdata('message') ?>
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <div class="row">
                                        <form action="<?= base_url('user/daftar') ?>" method="post">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="Nama Pendaftar" required name="namaPendaftar">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="nikPendaftar" placeholder="NIK" required>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input type="date" class="form-control" name="tglLahir" placeholder="Tanggal lahir(DD-MM-YYYY)" required>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                    <select name="kelaminPendaftar" class="form-control pro-edt-select form-control-primary" required>
															<option value="">Jenis Kelamin</option>
															<option value="Laki-laki">Laki-laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
                                                        </div>
                                                        <!-- <?= $rekening ?> -->
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="alamatPendaftar" placeholder="Alamat" required>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control " name="cifBaru" value="<?= $CIF ?>" style="background-color: #152036;" required>
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

                                    <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="card-block">
                                                        
                                                        <form action="<?= base_url('user/cekcif') ?>" method="POST">
                                                        <div class="input-group mg-b-15 mg-t-15">
                                                            <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" name="namaPendaftar" placeholder="Nama Pendaftar" required>
                                                        </div>
                                                        <div class="input-group mg-b-15">
                                                            <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                            <input type="text" class="form-control" name="nikPendaftar" placeholder="NIK Pendaftar" required>
                                                        </div>
                                                        <div class="form-group review-pro-edt mg-b-0-pt">
                                                            <button type="submit" class="btn btn-ctl-bt waves-effect waves-light">Submit
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
            </div>
        </div>