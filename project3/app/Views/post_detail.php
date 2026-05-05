<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $post['title'] ?> - MyBlog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    <style>
        body { background-color: #f8f9fa; }
        .text-primary-custom { color: #106EBE !important; }
        .post-content { 
            line-height: 1.8; 
            font-size: 1.1rem; 
            color: #333;
        }
        .meta-box {
            border-left: 4px solid #0FFCBE;
            background-color: #e9fdf7;
            padding: 10px 20px;
            border-radius: 0 10px 10px 0;
        }
        .btn-back {
            color: #106EBE;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-back:hover { color: #0FFCBE; }
    </style>
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <!-- Hero Section dengan Judul Artikel -->
    <div class="p-5 mb-5 hero-gradient text-white shadow-sm">
        <div class="container py-5">
            <a href="<?= base_url('post') ?>" class="text-white text-decoration-none small mb-3 d-inline-block">
                ← Kembali ke Daftar Blog
            </a>
            <h1 class="display-4 fw-bold"><?= $post['title'] ?></h1>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <!-- Metadata Artikel -->
                    <div class="meta-box mb-4">
                        <span class="text-dark fw-bold">Oleh: <span class="text-primary-custom"><?= $post['author'] ?></span></span>
                        <span class="mx-2 text-muted">|</span>
                        <span class="text-muted"><?= date('d M Y', strtotime($post['created_at'])) ?></span>
                    </div>

                    <!-- Isi Konten Artikel -->
                    <article class="post-content">
                        <?= $post['content'] ?>
                    </article>

                    <hr class="my-5">

                    <!-- Navigasi Bawah -->
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?= base_url('post') ?>" class="btn-back">
                            <i class="bi bi-arrow-left"></i> Kembali ke Blog
                        </a>
                        <div class="share-links">
                            <span class="small text-muted me-2">Bagikan:</span>
                            <button class="btn btn-sm btn-outline-primary rounded-circle">f</button>
                            <button class="btn btn-sm btn-outline-primary rounded-circle">t</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 bg-dark text-white mt-5">
        <div class="container text-center">
            <small>&copy; <?= date('Y') ?> MyBlog. Happy Reading!</small>
        </div>
    </footer>

    <!-- Jquery dan Bootstrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
