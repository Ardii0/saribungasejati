<div class="container mx-auto mdmax:px-4">
    <?php echo form_open_multipart('belanja/pembayaran', 'class="grid grid-cols-2 mdmax:grid-cols-1"') ?>
        <div class="flex justify-center">
            <div class="grid content-between">
                <div class="">
                    <h2 class="font-bold text-xl mb-2">Barang yang dibeli</h2>
                    <div class="flex gap-4">
                        <?php if (!$foto['value']) { ?>
                            <img src="<?php echo site_url('assets/no_image.png'); ?>" class="max-h-full max-w-full h-20 w-20 rounded-lg border border-orange-400">
                        <?php } else { ?>
                            <img src="<?php echo site_url('uploads/foto-produk/'.$foto['value']); ?>" class="max-h-full max-w-full h-20 w-20 rounded-lg border border-orange-400">
                        <?php } ?>
                        <div class="grid content-between">
                            <p class="truncate"><?php echo $produk['nama_produk']; ?></p>
                            <p class="font-bold"><?php echo IDR($produk['harga']); ?></p>
                            <p class="">Stok: <?php echo $produk['stok']; ?></p>
                        </div>
                    </div>
                    <div class="flex mt-2">
                        <p class="mr-2 pr-2 border-r-2 flex items-center">Atur Jumlah Barang</p>
                        <div class="flex items-center border border-gray-200 rounded h-fit w-fit">
                            <button
                            type="button" <?php if(!empty($produk['stok'])) {echo 'onclick="decrement()"';}?>
                            class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
                            >
                            &minus;
                            </button>
            
                            <?php if(!empty($produk['stok'])) { ?>
                                <?php echo form_input($jumlah, '', 'class="h-10 w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none focus:outline-none" onkeyup="total()" id="jumlah" min="1" max="'.$produk['stok'].'" required autocomplete="off"'); ?>
                            <?php } else {?>
                                <?php echo form_input($jumlah, '', 'class="h-10 w-16 border-transparent text-center [-moz-appearance:_textfield] sm:text-sm [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none bg-white" onkeyup="total()" id="jumlah" min="1" max="'.$produk['stok'].'" disabled autocomplete="off"'); ?>
                            <?php } ?>
            
                            <button
                            type="button" <?php if(!empty($produk['stok'])) {echo 'onclick="increment()"';}?>
                            class="w-10 h-10 leading-10 text-gray-600 transition hover:opacity-75"
                            >
                            &plus;
                            </button>
                        </div>
                    </div>
                </div>
                <div class="">
                    <?php if(!$alamat) {?>
                        <div>
                            <a href="<?php echo base_url('profile/alamat')?>">
                                Tambahkan Alamat Dahulu Sebelum Melanjutkan
                            </a>
                        </div>
                    <?php } else {?>
                        <div class="bg-white shadow-md p-3 rounded-lg">
                            <h2 class="mt-2 text-orange-400 text-xl font-bold" style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif;">
                                Pengiriman
                            <a href="<?php echo base_url('profile/alamat')?>">
                                <i class="fa fa-edit"></i>
                            </a>
                            </h2>
                            <div class="card-body">
                                <?php echo $alamat['nama_penerima'].' ('.$alamat['nomor_hp'].')'; ?>
                                <br>
                                <?php echo $alamat['alamat'].', '.$alamat['kota']; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="h-fit border-2 rounded-lg p-3 grid content-between space-y-2">
                <h2 class="font-bold">Ringkasan Belanja</h2>
                <div class="flex justify-between">
                    <p>Harga Barang Satuan</p>
                    <p><?php echo IDR($produk['harga']); ?></p>
                </div>
                <div class="flex justify-end border-y py-2 font-bold text-lg">
                    <p>Total Tagihan</p>
                    <div>
                        <input type="text" name="subtotal" class="w-fit text-right bg-white" id="subtotal" value="<?php echo IDR($produk['harga']*$jumlah['value']); ?>" disabled>
                    </div>
                </div>
                <h2 class="font-bold">Unggah Bukti Pembayaran (jpg/png)</h2>
                <div>
                    <div>Lakukan Pembayaran dengan Transfer melalui</div>
                    <div>Bca: 62373828838298</div>
                    <div>Mandiri: 62373828838298</div>
                </div>
                <div class="mt-2 border-b pb-3">
                    <div>Unggah Bukti Pembayaran (jpg/png)*</div>
                    <div>
                        <div class="border border-orange-400 rounded-lg">
                        <?php echo form_upload($bukti_pembayaran, '', 'accept="image/*" class="w-full hover:cursor-pointer
                              file:bg-orange-400 file:border-0 file:w-1/2 file:rounded-s-md file:cursor-pointer
                              file:text-amber-50" required'); ?>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-3">
                    <button 
                    type="submit" <?php if(empty($bukti_pembayaran)){
                        echo 'disabled'.' '.'class="inline-block w-full rounded-lg bg-orange-400 px-5 py-2 font-medium text-amber-50 border-2 border-orange-400"';
                    } else {
                        echo 'class="inline-block w-full rounded-lg bg-orange-400 px-5 py-2 font-medium text-amber-50 hover:bg-amber-50 hover:text-orange-400 border-2 border-orange-400 transition-all duration-200"';
                    }?>>Beli Sekarang</button>
                </div>
            </div>
            <?php echo form_hidden('id_alamat', $alamat['id_alamat']); ?>
            <input type="hidden" id="harga" value="<?php echo $produk['harga']; ?>">
            <input type="hidden" id="stok" value="<?php echo $produk['stok']; ?>">
            <input type="hidden" id="sisa" value="<?php echo $produk['stok']-$jumlah['value']; ?>" name="sisa">
            <?php echo form_hidden('id_produk', $id_produk['value']); ?>
        </div>
    <?php echo form_close(); ?>
</div>
<script>
    const formatRupiah = (money) => {
        return new Intl.NumberFormat('id-ID',
            { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }
        ).format(money);
    }
   function total() {
       var harga = $("#harga").val();
       var jumlah = $("#jumlah").val();
       var stok = $("#stok").val();
       var subtotal = parseInt(harga*jumlah);
       var sisa = parseInt(stok-jumlah);
       $("#subtotal").val(formatRupiah(subtotal));
       $("#sisa").val(sisa);
   }
   function increment() {
      document.getElementById('jumlah').stepUp()
      total()
   }
   function decrement() {
      document.getElementById('jumlah').stepDown();
      total()
   }
</script>