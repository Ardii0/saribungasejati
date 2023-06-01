<section class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="ml-2">
                    <h1>Laporan Pembayaran Belum Dikonfirmasi</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card p-3">
                    <div class="body">
                        <table class="table table-bordered table-striped table-hover" id="data">
                            <thead>
                                <tr>
                                    <th style="width: 2%;">No</th>
                                    <th>Nama User</th>
                                    <th>Kode Pembayaran</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Harga Total</th>
                                    <th style="width: 75px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=1; foreach($notconf as $data):?>
                                    <tr>
                                        <td><?php echo $id++; ?></td>
                                        <td><?php echo Akun($data->id_user, 'username'); ?></td>
                                        <td><?php echo $data->kode_pembayaran; ?></td>
                                        <td><?php echo Produk($data->id_produk, 'nama_produk'); ?></td>
                                        <td><?php echo IDR(Produk($data->id_produk, 'harga')); ?></td>
                                        <td><?php echo $data->jumlah; ?></td>
                                        <td><?php echo IDR($data->subtotal); ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <?php echo anchor('produk/pembayaran_detail/'.$data->id_pembayaran, '<i class="fa fa-eye"></i>', 'class="btn btn-warning btn-circle waves-effect waves-circle waves-float mr-1"'); ?>
                                                <?php echo anchor('produk/konfirmasi/'.$data->id_pembayaran, '<i class="fas fa-check"></i>', 'class="btn btn-danger btn-circle waves-effect waves-circle waves-float"'); ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('components/link')?>