<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - iPortfolio Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="assets/img/my-profile-img.jpg" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center justify-content-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">Ilchanul Yaasin</h1>
    </a>

    <div class="social-links text-center">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <!-- ✅ NAVIGASI MULTI-PAGE CI4 (Tanpa Dropdown) -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <!-- Home -->
        <li class="<?= uri_string() == '' ? 'active' : '' ?>">
          <a href="<?= base_url('/') ?>">
            <i class="bi bi-house navicon"></i> Home
          </a>
        </li>

        <!-- About -->
        <li class="<?= uri_string() == 'about' ? 'active' : '' ?>">
          <a href="<?= base_url('about') ?>">
            <i class="bi bi-person navicon"></i> About
          </a>
        </li>

        <!-- Resume -->
        <li class="<?= uri_string() == 'resume' ? 'active' : '' ?>">
          <a href="<?= base_url('resume') ?>">
            <i class="bi bi-file-earmark-text navicon"></i> Resume
          </a>
        </li>

        <!-- Portfolio -->
        <li class="<?= uri_string() == 'portofolio' ? 'active' : '' ?>">
          <a href="<?= base_url('portofolio') ?>">
            <i class="bi bi-images navicon"></i> Portofolio
          </a>
        </li>

        <!-- Services -->
        <li class="<?= uri_string() == 'services' ? 'active' : '' ?>">
          <a href="<?= base_url('services') ?>">
            <i class="bi bi-hdd-stack navicon"></i> Services
          </a>
        </li>

        <!-- Contact -->
        <li class="<?= uri_string() == 'contact' ? 'active' : '' ?>">
          <a href="<?= base_url('contact') ?>">
            <i class="bi bi-envelope navicon"></i> Contact
          </a>
        </li>
      </ul>
    </nav>
    <!-- ✅ END NAVIGASI -->

  </header>