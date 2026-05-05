<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyBlog - Blog</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <div class="p-5 mb-5 hero-gradient text-white shadow-sm">
        <div class="container py-5">
            <h1 class="display-4 fw-bold">Daftar Artikel</h1>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow border-0" style="border-top: 5px solid #0FFCBE !important;">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold">
                                <a href="/post/<?= $post['slug'] ?>" class="text-decoration-none text-primary">
                                    <?= $post['title'] ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted"><?= substr(strip_tags($post['content']), 0, 100) ?>...</p>
                        </div>
                        <div class="card-footer bg-white border-0 pb-4">
                            <a href="/post/<?= $post['slug'] ?>" class="btn btn-sm btn-outline-primary rounded-pill">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
