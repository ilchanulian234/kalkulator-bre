<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $post['title'] ?> - MyBlog</title>
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <div class="p-5 mb-5 hero-gradient text-white shadow-sm">
        <div class="container py-5">
            <h1 class="display-4 fw-bold"><?= $post['title'] ?></h1>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm p-4 p-md-5">
                    <article style="line-height: 1.8; font-size: 1.1rem;">
                        <?= $post['content'] ?>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
