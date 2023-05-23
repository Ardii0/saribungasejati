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
    <script src="<?php echo base_url('assets/plugins/tailwind/post/app.js'); ?>"></script>
</head>

<body>
    <div class="flex min-h-[100vh] flex-col justify-center px-6 py-12 lg:px-8">
    <?php $this->load->view('alert'); ?>
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="<?php echo base_url('assets/honey.png') ?>" alt="Sari Bunga Sejati Icon">
            <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Masuk ke Akun anda</h2>
        </div>

        <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
            <?php echo form_open('auth/login', 'class="space-y-6" id="sign_in"'); ?>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
                    <div class="mt-2">
                        <?php echo form_input($email, '', 'class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="your@email.com" type="email" autocomplete="email" required'); ?>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <!-- <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa password?</a>
                        </div> -->
                        </div>
                        <div class="mt-2">
                        <?php echo form_input($password, '', 'class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="*******" required'); ?>
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
                </div>
            <?php echo form_close(); ?>

            <p class="mt-10 text-center text-sm text-gray-500">
                Belum Punya Akun?
            <a href="register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar</a>
            </p>
        </div>
    </div>
</body>

</html>