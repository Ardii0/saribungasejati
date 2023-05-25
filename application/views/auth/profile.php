<div class="container mx-auto">
    <div class="grid grid-cols-2 mdmax:grid-cols-1 gap-2 mt-28">
        <div class="flex justify-end mdmax:justify-center">
            <?php echo form_open_multipart('profile/upload_foto', ' id="upload" class="h-80 w-72 border-2 p-4"') ?>
                <?php if (!$user['foto']) { ?>
                    <img src="<?php echo site_url('assets/admin-page/images/500x300.png'); ?>" class="max-w-64 max-h-64 m-auto rounded-full" alt="ProfilePicture">
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
                <h4 class="text-orange-400 text-xl font-semibold">Kontak</h4>
                <?php if(isset($this->db->select('alamat')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('alamat')->row()->alamat)){ ?>
                    <table>
                        <tr>
                            <td style="padding: 20px 0 0 0;">Alamat&ensp;&ensp;</td>
                            <td style="padding: 20px 0 0 40px;">
                                <?php echo $this->db->select('alamat')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('alamat')->row()->alamat;?>
                            </td>
                        </tr>
                    </table>
                <?php } else {?>
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