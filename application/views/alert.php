<script src="<?php echo base_url('assets/admin-page/js/jquery.min.js'); ?>"></script>
<link href="<?php echo base_url('assets/admin-page/css/font-awesome.min.css'); ?>" rel="stylesheet" />
<script src="<?php echo base_url('assets/admin-page/js/toastr.min.js'); ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin-page/css/toastr.min.css'); ?>">

    <?php if ($this->session->flashdata('success')) { ?>
        <!-- toastr.success("<?php echo $this->session->flashdata('success'); ?>"); -->
    <?php } else if ($this->session->flashdata('error') || validation_errors()) {  ?>
        <div className="-mb-20 justify-center items-center justify-items-center transition-all duration-200">
            <div className="border-2 border-red-light rounded-xl w-464 h-20 text-red-light bg-red-smooth flex">
                <div className="m-auto w-full">
                    <div className="font-semibold text-xl pl-4 mdmax:text-smallest">
                        <?php echo (validation_errors()) ? json_encode(validation_errors()) : json_encode($this->session->flashdata('error')); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if ($this->session->flashdata('warning')) {  ?>
        <div className="-mb-20 justify-center items-center justify-items-center transition-all duration-200">
            <div className="border-2 border-red-light rounded-xl w-464 h-20 text-red-light bg-red-smooth flex">
                <div className="m-auto w-full">
                    <div className="font-semibold text-xl pl-4 mdmax:text-smallest">
                        <?php echo $this->session->flashdata('warning'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- toastr.warning(""); -->
    <?php } else if ($this->session->flashdata('info')) {  ?>
        <!-- toastr.info("<?php echo $this->session->flashdata('info'); ?>"); -->
    <?php } ?>