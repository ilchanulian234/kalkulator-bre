<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog - Blog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- Custom CSS (PENTING: Agar warna biru/mint muncul) -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    
    <style>
        /* Tambahan sedikit agar background tidak terlalu putih polos */
        body {
            background-color: #f8f9fa; 
        }
        .card-title a {
            color: #106EBE; /* Warna Biru sesuai keinginanmu */
        }
        .btn-outline-primary {
            color: #106EBE;
            border-color: #106EBE;
        }
        .btn-outline-primary:hover {
            background-color: #0FFCBE; /* Warna Mint saat tombol dihover */
            border-color: #0FFCBE;
            color: #000;
        }
    </style>
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <!-- Bagian Header tetap pakai hero-gradient agar konsisten -->
    <div class="p-5 mb-5 hero-gradient text-white shadow-sm">
        <div class="container py-5">
            <h1 class="display-4 fw-bold">Daftar Artikel</h1>
            <p class="lead">Temukan berbagai tutorial ngoding menarik di sini.</p>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <!-- Menambahkan border-top warna mint agar lebih berwarna -->
                    <div class="card h-100 shadow border-0" style="border-top: 5px solid #0FFCBE !important;">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold">
                                <a href="/post/<?= $post['slug'] ?>" class="text-decoration-none">
                                    <?= $post['title'] ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted">
                                <?= substr(strip_tags($post['content']), 0, 100) ?>...
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-4">
                            <a href="/post/<?= $post['slug'] ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Footer sederhana agar bawah tidak kosong -->
    <footer class="py-4 bg-dark text-white mt-auto">
        <div class="container text-center">
            <small>&copy; <?= date('Y') ?> MyBlog. Built with CodeIgniter & Bootstrap.</small>
        </div>
    </footer>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
