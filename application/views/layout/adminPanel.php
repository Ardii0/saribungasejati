<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="<?php echo $_meta_deskripsi; ?>">
    <meta name="keywords" content="<?php echo $_meta_keyword; ?>">
    <meta name="author" content="Muhammad Ardi Setiawan">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('assets/WebIcon.jpg'); ?>" type="image/x-icon">
    <?php $this->load->view('components/admin/script'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    <?php $this->load->view('alert'); ?>
    <?php $this->load->view('components/admin/navbar'); ?>
    <?php $this->load->view('components/admin/sidebar'); ?>

        <div class="wrapper">
            <div class="content-wrapper py-3">
            <?php
                if (isset($content) && $content) {
                    $this->load->view($content);
                }
            ?>
            </div>
        </div>
</body>

</html>