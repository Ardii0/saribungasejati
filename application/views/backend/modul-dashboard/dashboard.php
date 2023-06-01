<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Jumlah Pengguna</p>
                        <h3><?php echo $user;?></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Jumlah Penjualan Hari ini</p>
                        <?php foreach ($totalpday as $pday) { ?>
                            <h3><?php if($pday->subtotal == 0) {
                                echo "Rp. -";
                            } else {
                                echo IDR($pday->subtotal);
                            }
                            ?></h3>
                        <?php } ?>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <p>Jumlah Penjualan Bulan ini</p>
                        <?php foreach ($totalpmth as $pmth) { ?>
                            <h3><?php if($pmth->subtotal == 0) {
                                echo "Rp. -";
                            } else {
                                echo IDR($pmth->subtotal);
                            }
                            ?></h3>
                        <?php } ?>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">LOWKER AKTIF</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo ''; ?></div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>