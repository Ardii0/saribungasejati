<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="Muhammad Ardi Setiawan">
    <title><?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('assets/WebIcon.jpg'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tailwind/post/app.css'); ?>">
</head>

<body>
    <div class="flex min-h-[100vh] flex-col justify-center px-6 py-12 lg:px-8">
    <?php $this->load->view('alert'); ?>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="<?php echo base_url('assets/honey.png') ?>" alt="Sari Bunga Sejati Icon">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Daftar Akun</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            <?php echo form_open('auth/register', 'class="space-y-6" id="sign_in"'); ?>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <?php echo form_input($username, '', 'class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="username" required'); ?>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
                    <div class="mt-2">
                        <?php echo form_input($email, '', 'class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="your@email.com" autocomplete="email" required'); ?>
                    </div>
                </div>

                <div>
                    <div class="">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    </div>
                    <div class="mt-2">
                        <?php echo form_input($password, '', 'class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="*******" required'); ?>
                    </div>
                </div>

                <div>
                    <div class="">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password</label>
                    </div>
                    <div class="mt-2">
                        <?php echo form_input($passconf, '', 'class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="*******" required'); ?>
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Daftar</button>
                </div>
            <?php echo form_close(); ?>

            <p class="mt-10 text-center text-sm text-gray-500">
                Sudah Punya Akun?
            <a href="login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Masuk</a>
            </p>
        </div>
    </div>
    <!-- <div class="signup-box">
        <div class="logo">
            <a href="<?php echo base_url()?>"><?php echo $_app_name; ?></a>
        </div>
        <div>
            
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open('auth/register', 'id="sign_up"') ?>
                <div class="msg">
                    <h4 class="">Register</h4>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <?php echo form_input($username, '', 'class="form-control" placeholder="Nama" required autofocus') ?>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <?php echo form_input($email, '', 'class="form-control" placeholder="Email" required') ?>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <?php echo form_input($password, '', 'class="form-control" minlength="5" placeholder="Kata Sandi" required') ?>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <?php echo form_input($passconf, '', 'class="form-control" minlength="5" placeholder="Konfirmasi Kata Sandi" required') ?>
                    </div>
                </div>
                <?php echo form_submit('submit', 'Registrasi Sekarang', 'class="btn btn-block btn-lg bg-pink waves-effect"') ?>
                <div class="m-t-25 m-b--5 align-right">
                    Sudah Punya Akun? <a href="login">Login</a>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div> -->

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/admin-page'); ?>/js/admin.js"></script>
    <script src="<?php echo base_url('assets/admin-page'); ?>/js/pages/examples/sign-up.js"></script>
</body>

</html>