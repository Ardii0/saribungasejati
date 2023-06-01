<section class="content">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                            <a href="<?php echo base_url('produk/kategori_add'); ?>">
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
                                    <th>Nama</th>
                                    <th style="width: 75px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $id=1; foreach($kategori as $data):?>
                                    <tr>
                                        <td><?php echo $id++; ?></td>
                                        <td><?php echo $data->nama_kategori; ?></td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <?php echo anchor('produk/kategori_edit/'.$data->id_kategori, '<i class="fa fa-edit"></i>', 'class="btn btn-warning btn-sm btn-circle waves-effect waves-circle waves-float mr-1"'); ?>
                                                <?php echo anchor('produk/kategori_delete/'.$data->id_kategori, '<i class="fa fa-trash"></i>', 'class="btn btn-danger btn-sm btn-circle waves-effect waves-circle waves-float"'); ?>
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