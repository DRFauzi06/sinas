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
                                        <form action="<?= base_url('user/update') ?>" method="post">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="review-content-section">
                                                    <h1 class="text-center text-primary ">Data Debitur</h1>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" placeholder="" name="namaDebitur" required value="<?= $debitur['nama_debitur'] ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-edit" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="nikDebitur" required value="<?= $debitur['nik_debitur'] ?>">
                                                    </div>
                                                    <input type="hidden" name="idDebitur" value="<?= $debitur['id_debitur'] ?>">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
                                                        <input type="date" class="form-control" name="tglLahir" required value="<?= $debitur['tgl_lahir'] ?>">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                    <select name="kelaminDebitur" class="form-control pro-edt-select form-control-primary">
															<option value="<?= $debitur['jenis_kelamin'] ?>"><?= $debitur['jenis_kelamin'] ?></option>
															<option value="Laki-laki">Laki-laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
                                                        </div>
                                                        <!-- <?= $rekening ?> -->
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-new-file" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control" name="alamatDebitur" required value="<?= $debitur['alamat'] ?>">
                                                    </div>
                                                    
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"></i></span>
                                                        <input type="text" class="form-control " name="cif" value="<?= $debitur['cif'] ?>" required readonly style="background-color: #152036;">
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <h1 class="text-center text-primary ">Data Akun Debitur</h1>
                                            <table class="table  text-info">
                                <tr>
                                    <th>Nama Akun</th>
                                    <th>Nomor Rekening</th>
                                    <th>Saldo</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    
                                    
                                </tr>



                                <?php 
                                 $i =1;
                                foreach ($rekening as $item) : ?>
                                <tr>
                                    <td><?= $item->nama_akun?></td>
                                    <td><?= $item->no_rekening?></td>
                                    
                                    <td><?= $item->saldo?></td>
                                    <td><?php if($item->status==1){
                                        echo "Aktif";
                                    }else{
                                        echo "Tidak Aktif";
                                    }
                                        ?></td>
                                    
                                    <td>
                                <a href="<?php echo base_url('user/editakun/'.$item->id) ?>" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Edit</a>
                                <!-- <a class="btn btn-danger neu-brutalism hapus"><i class="fas fa-trash"></i> Hapus</a> -->
                            </td>

                                </tr>
                                <?php endforeach ?>
                            </table>



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