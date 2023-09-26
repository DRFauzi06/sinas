
<div class="payment-cart-pro mg-b-30">
            <div class="container-fluid">
                
                 
                <div class="row ">
                    <?php foreach($mutasi as $item) : ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 " style="margin-bottom: 20px; margin-top: 10px;">
                        <div class="card payment-card responsive-mg-b-30">
                            <div class="payment-inner-pro">
                                <div class="row m-t-10">
                                <!-- <i class="fa fa-cc-paypal" aria-hidden="true"></i> -->
                                <div class="col-sm-6">
                                    <?php if($item->debet=="D"){
                                            echo "<h5 class='text-success'>". $item->nominal ."</h5>";    
                                    }else{
                                        echo "<h5 class='text-danger'>". $item->nominal ."</h5>";    
                                    } ?>
                                <!-- <h5 ><?= $item->nominal ?></h5> -->
                                </div>
                                <div class="col-sm-6 text-right">
                                <h5><?=  $item->jenis_transaksi?></h5>
                                </div>
                                </div>
                                <div class="row m-t-10">
                                    <div class="col-sm-6">
                                        <strong class="m-r-5">Tanggal transaksi :</strong><?= $item->tanggal_transaksi ?>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <strong class="m-r-5">Jam :</strong><?= $item->jam ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>

                    <!-- <table class=" table" style="background-color:white;">
                        <tr>
                            <th>abs</th>
                            <th>abs</th>
                            <th>abs</th>
                            <th>abs</th>
                            <th>Jenis transaksi</th>
                            <th>saldo</th>

                        </tr>
                        <?php $saldo = 0;
                        foreach($mutasi as $item) : 
                             ?>
                             <?php if($item->debet=="D"){
                                            $saldo +=$item->nominal;
                                            
                                    }else{
                                        $saldo -=$item->nominal;
                                        
                                    } ?>
                        <tr>
                            
                            <td><?= $item->jenis_transaksi ?></td>
                            <td><?= $item->tanggal_transaksi ?></td>
                            <td><?= $item->jam ?></td>
                            <td><?= $item->nominal ?></td>
                            <td><?=  $item->debet?></td>
                            <td><?= $saldo  ?></td>

                        </tr>

                        <?php endforeach?>

                    </table> -->


                    
                </div>
            </div>
        </div>