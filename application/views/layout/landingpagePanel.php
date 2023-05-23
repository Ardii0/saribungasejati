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
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/tailwind/post/app.css'); ?>">
  <script src="<?php echo base_url('assets/plugins/tailwind/post/app.js'); ?>"></script>
  <?php echo (isset($additional_head) ? $additional_head : ''); ?>
  <style type="text/css">

    .user {
      display: inline-block;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin: 0 2px;

      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

  </style>
</head>

<body>
  <?php $this->load->view('alert'); ?>
  <header class="p-4 dark:bg-gray-800 dark:text-gray-100 border-b-2 shadow-md">
    <div class="flex justify-between h-14">
      <a rel="noopener noreferrer" href="<?php echo base_url() ?>" class="flex items-center p-2">
        <img src="<?php echo base_url('assets/honey.png') ?>" class="w-10 h-10" alt="Logo">
      </a>
      <div class="flex items-center md:space-x-4">
        <div class="relative">
          <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
            <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 dark:text-gray-100">
              <path d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z"></path>
            </svg>
          </div>
          <input type="search" name="Search" placeholder="Search..." class="w-full border py-2 pl-10 pr-4 text-sm rounded-md sm:w-auto focus:outline-none">
        </div>
      </div>
      <?php if($this->session->userdata('is_Logged') == TRUE) { ?>
        <div class="flex items-end">
          <a class="flex" href="<?php echo base_urL('profile') ?>">
            <?php if (!$this->db->select('foto')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('users')->row()->foto) { ?>
              <img class="user" src="<?php echo base_url('assets/DefaultProfile.jpg'); ?>" alt="PP"/>
            <?php } else { ?>
              <img class="user" src="<?php echo site_url('uploads/foto-profil/'.$this->db->select('foto')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('users')->row()->foto);?>" class="img-responsive" style="max-width: 258px; max-height: 258px; margin: auto;" alt="">
            <?php } ?>
            <div class="mdmax:hidden my-auto">
              <p class="">
                <?php echo $this->session->userdata('username')?>
              </p>
            </div>
          </a>
          
          <a class="nav-link" href="<?php echo base_urL('auth/logout') ?>">
            <i class="fas fa-arrow-right pr-1"></i>
          </a>
        </div>
      <?php } else {?>
        <a class="my-auto px-6 font-semibold rounded lg:block dark:bg-sky-400 dark:text-gray-900 text-right" href="<?php echo base_urL('auth/login') ?>">
          Login
        </a>
      <?php } ?>
    </div>
  </header>

  <div class="bg-slate-700 h-screen mx-auto">
    <?php
      if (isset($content) && $content) {
        $this->load->view($content);
      }
    ?>
  </div>
    
  <div class="bg-white text-gray p-12 mdmax:p-6 bottom-0 border-t-2 border-orange-400">
    <div class="justify-between mdmin:flex">
      <div class="lg:w-[630px] lg:pr-16">
        <div class="flex">
          <img src="<?php echo base_url('assets/honey.png') ?>" alt="social_media" class="w-10" />
          <h1 class="my-auto ml-2 text-2xl font-bold" style="font-family: Open Sauce One, Nunito Sans, -apple-system, sans-serif;"><?php echo $_app_name; ?></h1>
        </div>
        <p class="mt-6 mb-8"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        <div class="flex pl-2 gap-4 fill-orange-400">
          <img src="<?php echo base_url('assets/icons/whatsapp.svg') ?>" alt="social_media" class="cursor-pointer w-8 h-8 fill-orange-400" />
          <img src="<?php echo base_url('assets/icons/facebook.svg') ?>" alt="social_media" class="cursor-pointer w-8 h-8" />
          <img src="<?php echo base_url('assets/icons/instagram.svg') ?>" alt="social_media" class="cursor-pointer w-8 h-8" />
        </div>
      </div>
      <div class="mdmax:mt-8">
        <h1 class="text-orange-400 font-bold mb-8">Terhubung</h1>
        <p class="font-medium">
          <a href="#">FAQ</a>
        </p>
        <p class="font-medium mt-3">
          <a href="#">Kontak Kami</a>
        </p>
      </div>
    </div>
  </div>
    
  <!-- <footer class="page-footer indigo darken-3 text-center text-md-left pt-5">
    <div class="container mb-3">
      <div class="row">
        <div class="col-md-4 mt-1 mb-1">
          <h5 class="title mb-4 font-weight-bold">Tentang <?php echo $_app_name; ?></h5>
          <p align="justify">
            <?php echo $_app_name; ?> merupakan aplikasi Belanja online berbasis web untuk memesan makanan yang berupa olahan ikan 
            yang dapat dipesan melalui Online.
          </p>
          <p align="justify">
            Dimana Pengguna dapat melakukan order terlebih dahulu melalui aplikasi ini, dan pesanan akan dikirim setelah melakukan Pembayaran.
          </p>
        </div>
        <hr class="w-100 clearfix d-md-none">
        <div class="col-lg-3 ml-lg-auto col-md-4 mt-1 mb-1">
          <h5 class="text-uppercase mb-4 font-weight-bold">Hubungi Kami</h5>
          <p><i class="fas fa-home pr-1"></i> <?php echo (!empty($kontak['alamat']) ? $kontak['alamat'] : 'New York, NY 10012, US'); ?></p>
          <p><i class="fas fa-envelope pr-1"></i> <?php echo (!empty($kontak['email']) ? $kontak['email'] : 'info@example.com'); ?></p>
          <p><i class="fas fa-phone pr-1"></i> <?php echo (!empty($kontak['no_telp']) ? $kontak['no_telp'] : '+ 01 234 567 88'); ?></p>
        </div>
        <hr class="w-100 clearfix d-md-none">
        <div class="col-lg-3 ml-lg-auto col-md-4 mt-1 mb-1">
          <h5 class="text-uppercase mb-4 font-weight-bold">Peta Lokasi</h5>
          <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
            <?php echo (!empty($kontak['maps_iframe']) ? $kontak['maps_iframe'] : '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.339226425949!2d110.39981325068287!3d-6.969247694940433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4ca0f066c6b%3A0x418ec7cc043f575f!2sSMK%20Pelayaran%20Wira%20Samudera!5e0!3m2!1sid!2sid!4v1662432807416!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          '); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © <?php echo date('Y'); ?> Copyright: <a> <?php echo $_app_name; ?> </a>
      </div>
    </div>
  </footer> -->
  <!--/Footer-->

  <?php echo (isset($additional_body) ? $additional_body : ''); ?>
  <?php if (isset($kontak['whatsapp_number'])) { ?>
    <script type="text/javascript">
      (function() {
        var options = {
          whatsapp: "<?php echo $kontak['whatsapp_number']; ?>",
          call_to_action: "Butuh Bantuan?",
          position: "right",
        };
        var proto = document.location.protocol,
          host = "getbutton.io",
          url = proto + "//static." + host;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
          WhWidgetSendButton.init(host, proto, options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
      })();
    </script>
  <?php } ?>
</body>

</html>