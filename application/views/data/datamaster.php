<div class="product-status mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap">
                            <h4>Data Debitur</h4>
                            
                            <div class="add-product">
                                <a href="product-edit.html">Add Product</a>
                            </div>

                            <?= $this->session->flashdata('message') ?>
                            <table>
                                <tr>
                                    <th>Nama Debitur</th>
                                    <th>NIK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <!-- <th>No Rekening</th> -->
                                    
                                    
                                    <th>Aksi</th>
                                    
                                </tr>

                                <?php $i =1;
                                foreach ($debitur as $item) : ?>
                                <tr>
                                    <td><?= $item->nama_debitur?></td>
                                    <td><?= $item->nik_debitur?></td>
                                    <td><?= $item->tgl_lahir?></td>
                                    <td><?= $item->jenis_kelamin?></td>
                                    <td><?= $item->alamat?></td>
                                    
                                    
                                    <td>
                                <a href="<?php echo base_url('user/edit/'.$item->id_debitur) ?>" class="btn btn-warning mr-2 neu-brutalism"><i class="fas fa-edit"></i> Edit</a>
                                <a href="<?php echo base_url('user/hapus/'.$item->id_debitur) ?>"class="btn btn-danger neu-brutalism hapus" onclick="return doconfirm()"><i class="fas fa-trash"></i> Hapus</a>
                            </td>

                                </tr>
                                <?php endforeach ?>
                            </table>
                            <div class="custom-pagination">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">Previous</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
function doconfirm()
{
    job=confirm("Yakin ingin menghapus data debitur?");
    if(job!=true)
    {
        return false;
    }
}
</script>

        