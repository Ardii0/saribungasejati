<div class="container mx-auto">
    <div class="grid grid-cols-2 mdmax:grid-cols-1 gap-2 mt-28">
        <div class="flex justify-end mdmax:justify-center">
            <?php echo form_open_multipart('profile/upload_foto', ' id="upload" class="h-80 w-72 border-2 p-4"') ?>
                <?php if (!$user['foto']) { ?>
                    <img src="<?php echo site_url('assets/no_image.png'); ?>" class="max-w-64 max-h-64 m-auto rounded-full" alt="ProfilePicture">
                <?php } else { ?>
                    <img src="<?php echo site_url('uploads/foto-profil/'.$user['foto']);?>" class="max-w-64 max-h-64 m-auto rounded-full" alt="ProfilePicture">
                <?php } ?>
                    <div class="flex justify-center mt-2 bg-orange-400 group hover:bg-amber-50 rounded-lg border-2 border-orange-400">
                        <?php echo form_upload($foto, '', 'accept="image/*" onchange="getFile(); upload();"
                                class="text-[0px]
                                file:w-full file:py-2 file:px-6
                                file:rounded-full file:border-0
                                file:text-sm file:font-medium
                                file:bg-transparent file:text-amber-50
                                hover:file:cursor-pointer group-hover:file:bg-amber-50
                                group-hover:file:text-amber-700
                        " '); ?>
                    </div>
                    <button type="submit" id="upfile" hidden=""></button>
            <?php echo form_close(); ?>
        </div>
        <div class="mt-2 text-lg font-semibold" style="font-family: 'Open Sauce One', 'Nunito Sans', -apple-system, sans-serif; font-weight: 500; color: #6D7588">
            <div>
                <h4 class="text-orange-400 text-xl font-semibold">Biodata Diri</h4>
                <table>
                    <tr>
                        <td style="padding: 20px 0 0 0;">Username&ensp;&ensp;</td>
                        <td style="padding: 20px 0 0 40px;"><?php echo $user['username'] ?></td>
                    </tr>
                    <tr>
                        <td style="padding: 20px 0 0 0;">Email</td>
                        <td style="padding: 20px 0 0 40px;"><?php echo $user['email'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="mt-5">
                <?php if($this->session->userdata('role') == 'Admin') { ?>
                    <a
                        href="<?php echo base_url('dashboard')?>"
                        class="inline-block mt-6 w-full rounded-lg bg-orange-400 px-5 py-2 font-medium text-amber-50 hover:bg-amber-50 hover:text-orange-400 border-2 border-orange-400 sm:w-auto transition-all duration-200"
                    >
                        Kembali ke Dashboard Admin
                    </a>
                <?php } else { ?>
                    <?php $alamat = $this->db->select('*')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('alamat')->row();?>
                    <?php if(isset($alamat->alamat)){ ?>
                        <div class="flex justify-between w-fit gap-12">
                            <h4 class="text-orange-400 text-xl font-semibold">Kontak</h4>
                            <a href="<?php echo base_url('profile/alamat')?>" class="flex items-center">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                        <table>
                            <tr>
                                <td style="padding: 20px 0 0 0;">Alamat&ensp;&ensp;</td>
                                <td style="padding: 20px 0 0 40px;">
                                    <?php echo $alamat->alamat;?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0 0 0;">Penerima&ensp;&ensp;</td>
                                <td style="padding: 20px 0 0 40px;">
                                    <?php echo $alamat->nama_penerima;?>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 0 0 0;">Nomor Telephone&ensp;&ensp;</td>
                                <td style="padding: 20px 0 0 40px;">
                                    <?php echo $alamat->nomor_hp;?>
                                </td>
                            </tr>
                        </table>
                    <?php } else {?>
                    <h4 class="text-orange-400 text-xl font-semibold">Kontak</h4>
                        <table>
                            <tr>
                                <td style="padding: 20px 0 0 0;">Alamat Kosong</td>
                                <td style="padding: 20px 0 0 30px;">
                                    <a href="<?php echo base_url('profile/alamat')?>">
                                    Isi Alamat
                                    </a>
                                </td>
                            </tr>
                        </table>
                    <?php }?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
    function upload() {
        var button = document.getElementById('upload');
        button.submit();
    }

    function getFile(){
     document.getElementById("upfile").click();
    }
</script>