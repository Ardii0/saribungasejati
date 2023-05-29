<section class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                            <a href="<?php echo base_url('produk/add_produk'); ?>">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-plus pr-2"></i>Tambah
                                </button>
                            </a>
                    </ol>
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
                                    <th>Foto</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th style="width: 75px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=1; foreach($produk as $data):?>
                                    <tr>
                                        <td><?php echo $id++; ?></td>
                                        <td class="col-xs-6 col-md-2">
                                            <div>
                                                <?php if (!$data->foto) { ?>
                                                    <a href="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="thumbnail">
                                                        <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="img-responsive" style="max-width: 125px; max-height: 125px;">
                                                    </a>
                                                <?php } else { ?>
                                                    <a href="<?php echo site_url('uploads/foto-produk/' . $data->foto); ?>" class="thumbnail">
                                                        <img src="<?php echo site_url('uploads/foto-produk/' . $data->foto); ?>" class="img-responsive" style="max-width: 125px; max-height: 125px;">
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </td>
                                        <td><?php echo $data->kode_produk; ?></td>
                                        <td><?php echo $data->nama_produk; ?></td>
                                        <td><?php echo Kategori($data->id_kategori, 'nama_kategori'); ?></td>
                                        <td><?php echo $data->stok; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <?php echo anchor('produk/produk_edit/'.$data->id_produk, '<i class="fa fa-edit"></i>', 'class="btn btn-warning btn-sm btn-circle waves-effect waves-circle waves-float mr-1"'); ?>
                                                <?php echo anchor('produk/produk_delete/'.$data->id_produk, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm btn-circle waves-effect waves-circle waves-float"'); ?>
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