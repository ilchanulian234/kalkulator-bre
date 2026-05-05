<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog - Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    
    <style>
        body { background-color: #f8f9fa; }
        /* Menggunakan warna Biru spesifikmu untuk teks primer */
        .text-primary-custom { color: #106EBE !important; }
        /* Tombol dengan hover warna Mint */
        .btn-custom {
            background-color: #106EBE;
            color: white;
            border: none;
        }
        .btn-custom:hover {
            background-color: #0FFCBE;
            color: #000;
        }
        /* Efek garis Mint di atas kartu */
        .card-accent { border-top: 5px solid #0FFCBE !important; }
    </style>
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <!-- Bagian Hero: Menggunakan hero-gradient agar Biru-Mint menyatu -->
    <div class="container-fluid hero-gradient text-white p-5 shadow-sm mb-5">
        <div class="container py-5 text-center">
            <h1 class="display-3 fw-bold">Selamat Datang</h1>
            <p class="lead fs-4">Di blog pribadi saya. Mari belajar PHP, CSS, dan CodeIgniter bersama!</p>
            <hr class="my-4 border-white opacity-25" style="width: 50%; margin: auto;">
            <a href="<?= base_url('post') ?>" class="btn btn-outline-light btn-lg rounded-pill px-5">Lihat Semua Artikel</a>
        </div>
    </div>

    <div class="container my-5">
        <div class="row text-center mb-4">
            <div class="col">
                <h2 class="fw-bold text-primary-custom">Materi Terpopuler</h2>
                <p class="text-muted">Pilih topik yang ingin kamu pelajari hari ini</p>
            </div>
        </div>

        <div class="row">
            <!-- Kartu 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 card-accent">
                    <div class="card-body p-4">
                        <div class="mb-3 text-primary-custom">
                            <i class="bi bi-code-slash fs-1"></i> <!-- Jika pakai Bootstrap Icons -->
                        </div>
                        <h5 class="card-title fw-bold text-primary-custom">Mulai ngoding PHP</h5>
                        <p class="card-text text-muted">Pelajari dasar-dasar bahasa pemrograman server-side yang paling populer di dunia.</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4">
                        <a href="#" class="btn btn-sm btn-custom rounded-pill px-4">Baca Materi</a>
                    </div>
                </div>
            </div>

            <!-- Kartu 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 card-accent">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-primary-custom">Jadi paham CSS dan JS</h5>
                        <p class="card-text text-muted">Bikin tampilan websitemu makin cantik dan interaktif dengan kombinasi CSS modern dan JavaScript.</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4">
                        <a href="#" class="btn btn-sm btn-custom rounded-pill px-4">Baca Materi</a>
                    </div>
                </div>
            </div>

            <!-- Kartu 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 card-accent">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-bold text-primary-custom">Codeigniter asyik juga kok</h5>
                        <p class="card-text text-muted">Percepat proses pembuatan websitemu dengan Framework CodeIgniter yang ringan dan powerful.</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4">
                        <a href="#" class="btn btn-sm btn-custom rounded-pill px-4">Baca Materi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
