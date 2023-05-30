<section class="container mx-auto">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>History Pembayaran</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="row clearfix">  
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="">
                <div class="body">
                    <table class="table table-bordered table-striped table-hover" id="data">
                        <thead>
                            <tr> 
                                <th style="width: 2%;">No</th>
                                <th>Nama Produk</th>
                                <th>Kode Pembayaran</th>
                                <th>Bukti Pembayaran</th>
                                <th>Total</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $id=1; foreach($history as $data):?>
                                <tr>
                                    <td><?php echo $id++; ?></td>
                                    <td><?php echo Produk($data->id_produk, 'nama_produk'); ?></td>
                                    <td><?php echo $data->kode_pembayaran; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('uploads/bukti_pembayaran/'.$data->bukti_pembayaran); ?>" class="thumbnail">
                                            <img src="<?php echo site_url('uploads/bukti_pembayaran/'.$data->bukti_pembayaran); ?>" class="img-responsive" style="max-width: 125px; max-height: 125px;">
                                        </a>
                                    </td>
                                    <td><?php echo IDR($data->subtotal); ?></td>
                                    <td><?php echo $data->status; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('components/link')?>