<nav class="navbar navbar-expand-md navbar-dark fixed-top custom-navbar">
    <div class="container">
        <!-- Logo & Nama Blog (Klik untuk kembali ke paling atas) -->
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
            <img src="<?= base_url('img/logo.svg') ?>" alt="Logo" width="35" height="35" class="me-2" style="filter: brightness(0) invert(1);"> 
            MyBlog
        </a>

        <!-- Tombol Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Menu Utama (Kiri) -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Home diarahkan meluncur ke ID konten di halaman utama -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/#konten') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('post') ?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('contact') ?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('faqs') ?>">FAQ</a>
                </li>
            </ul>

            <!-- Area User (Kanan) -->
            <div class="d-flex align-items-center">
                <?php if (logged_in()) : ?>
                    <!-- Ikon Pensil: Shortcut ke Admin Panel -->
                    <a class="nav-link px-3 me-2" href="<?= base_url('admin/post') ?>" title="Ruang Kerja">
                        <i class="bi bi-pencil-square" style="color: #0FFCBE; font-size: 1.2rem;"></i>
                    </a>
                    <!-- Tombol Logout -->
                    <a class="btn btn-outline-light btn-sm rounded-pill px-3" href="<?= base_url('logout') ?>">Logout</a>
                <?php else: ?>
                    <!-- Tombol Login -->
                    <a class="btn btn-outline-info btn-sm rounded-pill px-3" href="<?= base_url('login') ?>">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<main role="main" class="container" style="padding-top: 80px;">
    <?= $this->renderSection('content') ?>
</main>
