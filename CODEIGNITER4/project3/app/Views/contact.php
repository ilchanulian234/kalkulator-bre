<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - MyBlog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    <style>
        body { background-color: #f8f9fa; }
        .text-primary-custom { color: #106EBE !important; }
        .accent-border { border-left: 5px solid #0FFCBE !important; }
        .btn-custom { background-color: #106EBE; color: white; border: none; }
        .btn-custom:hover { background-color: #0FFCBE; color: #000; }
    </style>
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <div class="p-5 mb-5 hero-gradient text-white shadow-sm">
        <div class="container py-5">
            <h1 class="display-4 fw-bold">Hubungi Kami</h1>
            <p class="lead">Punya pertanyaan? Kirimkan pesan atau hubungi kontak di bawah.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <!-- Kolom Kiri: Informasi Kontak -->
            <div class="col-lg-5 mb-4">
                <div class="card card-about shadow-sm mb-3 accent-border border-0">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary-custom">📍 Alamat</h5>
                        <p class="text-muted mb-0">Jl. Contoh No. 123, Kota Bekasi, Jawa Barat, Indonesia.</p>
                    </div>
                </div>

                <div class="card card-about shadow-sm mb-3 accent-border border-0">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary-custom">📧 Email</h5>
                        <p class="text-muted mb-0">admin@myblog.com</p>
                    </div>
                </div>

                <div class="card card-about shadow-sm mb-3 accent-border border-0">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary-custom">📞 No.HP / WhatsApp</h5>
                        <p class="text-muted mb-0">+62 812-3456-7890</p>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Form Kontak (Supaya lebih profesional) -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4">
                    <h4 class="fw-bold text-primary-custom mb-4">Kirim Pesan</h4>
                    <form>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama Anda">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Alamat Email</label>
                            <input type="email" class="form-control" placeholder="nama@email.com">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Pesan</label>
                            <textarea class="form-control" rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom rounded-pill px-4">Kirim Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 bg-dark text-white mt-5">
        <div class="container text-center">
            &copy; <?= Date('Y') ?> MyBlog. All Rights Reserved.
        </div>
    </footer>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
