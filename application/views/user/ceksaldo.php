<div class="single-pro-review-area mt-t-30 mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTab4" class="tab-review-design">
                                <li class="active"><a href="#description">Cek Saldo</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="demo-container">
                                                    <div class="card-wrapper"></div>
                                                    <form class="payment-form mg-t-30">

                                                        <div class="form-group">
                                                            <input name="name" type="text" class="form-control" value="<?= $debitur['nama_debitur'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="number" type="tel" class="form-control" value="<?= $rekening['nama_akun'] ?>">
                                                        </div>
                                                        
                                                        
                                                        <div class="form-group">
                                                            <input name="cvc" type="number" class="form-control" value="<?= $rekening['saldo'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="expiry" type="tel" class="form-control" value="<?php 
                                                            if($rekening['status']==1){
                                                                echo "Aktif";
                                                            }else{
                                                                echo "dibekukan";
                                                            } ?>">
                                                        </div>
                                                        <div class="text-center credit-card-custom">
                                                            <a href="#!" class="btn bg-btn-cl waves-effect waves-light">Submit</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3"></div>
                                    </div>
                                </div>