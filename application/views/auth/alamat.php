<div class="container mx-auto">
    <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-6">
        <?php echo form_open_multipart('profile/alamat', 'class="space-y-3"') ?>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="name">Nama Penerima</label>
                    <?php echo form_input($nama_penerima, '', 'class="w-full rounded-lg border border-orange-400 p-3 text-sm focus:border-white outline-0 focus:ring focus:ring-neutral-skin transition-all duration-200" autocomplete="off" placeholder="Masukkan Nama Penerima" required') ?>
                </div>
                <div>
                    <label for="phone">Nomor Telephone</label>
                    <?php echo form_input($nomor_hp, '', 'class="w-full rounded-lg border border-orange-400 p-3 text-sm focus:border-white outline-0 focus:ring focus:ring-neutral-skin transition-all duration-200" autocomplete="off" minlength="8" placeholder="Masukkan Nomor Telephone" required') ?>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div>
                    <label for="name">Kota</label>
                    <?php echo form_input($kota, '', 'class="w-full rounded-lg border border-orange-400 p-3 text-sm focus:border-white outline-0 focus:ring focus:ring-neutral-skin transition-all duration-200" autocomplete="off" placeholder="Masukkan Kota" required') ?>
                </div>
                <div>
                    <label for="kode_pos">Kode Pos</label>
                    <?php echo form_input($kode_pos, '', 'class="w-full rounded-lg border border-orange-400 p-3 text-sm focus:border-white outline-0 focus:ring focus:ring-neutral-skin transition-all duration-200" autocomplete="off" placeholder="Masukkan Kode Pos" required') ?>
                </div>
            </div>

            <div>
                <label for="message">Alamat</label>
                <?php echo
                    form_textarea($alamat, '', 'class="w-full rounded-lg border border-orange-400 p-3 text-sm focus:border-white outline-0 focus:ring focus:ring-neutral-skin transition-all duration-200" placeholder="Masukan Alamat"');
                ?>
            </div>

            <div class="mt-4">
                <button
                    type="submit"
                    class="inline-block w-full rounded-lg bg-orange-400 px-5 py-2 font-medium text-amber-50 hover:bg-amber-50 hover:text-orange-400 border-2 border-orange-400 sm:w-auto transition-all duration-200"
                >
                    Simpan
                </button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>