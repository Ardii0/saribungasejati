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
  <?php $this->load->view('components/script'); ?>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">
  <?php echo (isset($additional_head) ? $additional_head : ''); ?>
  <style type="text/css">
    .onhov:hover .dropdown {
      visibility: visible;
      opacity: 1;
      padding: 10px;
      font-size: 14px;
    }

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
        <div class="flex items-center relative onhov">
          <a class="flex" href="<?php echo base_urL('profile') ?>">
            <?php if (!$this->db->select('foto')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('users')->row()->foto) { ?>
              <img class="user" src="<?php echo base_url('assets/DefaultProfile.jpg'); ?>" alt="PP"/>
            <?php } else { ?>
              <img class="user" src="<?php echo site_url('uploads/foto-profil/'.$this->db->select('foto')->where("id_user", $this->session->userdata('id_user'))->limit(1)->get('users')->row()->foto);?>" class="img-responsive" style="max-width: 258px; max-height: 258px; margin: auto;" alt="">
            <?php } ?>
            <div class="mdmax:hidden my-auto pl-2">
              <p class="">
                <?php echo $this->session->userdata('username')?>
              </p>
            </div>
          </a>
          
          <!-- <div class="flex"> -->
            <div class="dropdown invisible absolute top-14 opacity-0 ease-linear transition-all duration-300 cursor-default z-10 w-full border bg-gray-300 transform rounded-lg">
              <div class="text-white divide-y gap-y-1">
                <a href="<?php echo base_url('profile/')?>" class="flex items-center justify-center text-sm font-medium cursor-pointer gap-2">
                  <i class="fas fa-user"></i>
                  Profile
                </a>
                <a href="<?php echo base_urL('auth/logout') ?>"
                  class="flex items-center justify-center text-sm font-medium cursor-pointer gap-2">
                  <i class="fas fa-sign-out-alt pl-1"></i>
                  Logout
                </a>
              </div>
            </div>
          <!-- </div> -->
        </div>
      <?php } else {?>
        <a class="my-auto px-6 font-semibold rounded lg:block dark:bg-sky-400 dark:text-gray-900 text-right" href="<?php echo base_urL('auth/login') ?>">
          Login
        </a>
      <?php } ?>
    </div>
  </header>

  <div class="min-h-screen my-4">
    <?php
      if (isset($content) && $content) {
        $this->load->view($content);
      }
    ?>
  </div>
    
  <footer class="mt-auto bg-white text-gray p-12 mdmax:hidden border-t-2 border-orange-400">
    <div class="justify-between flex">
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
  </footer>

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
  <script>
    tailwind.config = {
      theme: {
        extend: {
          container: {
            screens: {
              sm: '100%',
              md: '100%',
              lg: '1024px',
              xl: '1200px'
            }
          },
          screens: {
            mdmax: {
              max: '767px'
            },
            mdmin: { 
              min: '767px'
            },
          },
          colors: {
            neutral: {
              skin: '#FBE7D0',
            },
          }
        },
      }
    }
  </script>
</body>

</html>