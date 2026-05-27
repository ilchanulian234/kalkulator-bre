<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me - MyBlog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    <style>
        body { background-color: #f8f9fa; }
        .text-primary-custom { color: #106EBE !important; }
        .accent-border { border-left: 5px solid #0FFCBE !important; }
        .card-about { transition: transform 0.3s; border: none; }
        .card-about:hover { transform: translateY(-5px); }
        /* Tombol custom dengan warna tema */
        .btn-custom-outline {
            color: #106EBE;
            border-color: #106EBE;
        }
        .btn-custom-outline:hover {
            background-color: #0FFCBE;
            border-color: #0FFCBE;
            color: #000;
        }
    </style>
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <!-- Header Hero -->
    <div class="p-5 mb-5 hero-gradient text-white shadow-sm">
        <div class="container py-5">
            <h1 class="display-4 fw-bold">Tentang Saya</h1>
            <p class="lead">Mengenal lebih dekat siapa di balik layar blog ini.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <!-- Kolom Kiri: Tinggi disesuaikan (h-100) -->
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm text-center p-4 h-100 d-flex flex-column justify-content-center">
                    <div class="rounded-circle bg-light mx-auto mb-4 d-flex align-items-center justify-content-center shadow-sm" style="width: 160px; height: 160px; border: 5px solid #0FFCBE;">
                        <span class="display-1">👤</span> 
                    </div>
                    <h3 class="fw-bold text-primary-custom">ILCHANUL YAASIN</h3>
                    <p class="text-muted fs-5">Web Developer & Enthusiast</p>
                    <hr class="mx-auto" style="width: 70%;">
                    <p class="small text-secondary mb-4">Berfokus pada pengembangan web menggunakan PHP dan framework modern.</p>
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-sm btn-custom-outline rounded-pill px-3">Facebook</button>
                        <button class="btn btn-sm btn-custom-outline rounded-pill px-3">Github</button>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: Tiga Kotak Informasi -->
            <div class="col-lg-8">
                <div class="card card-about shadow-sm mb-4 accent-border">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary-custom">Siapa Aku</h5>
                        <p class="text-muted mb-0">Seorang pengelana di dunia biner yang percaya bahwa di balik setiap baris kode, ada detak jantung yang ingin bercerita. Aku adalah penenun logika yang mencoba menerjemahkan imajinasi menjadi realita di atas kanvas digital.</p>
                    </div>
                </div>

                <div class="card card-about shadow-sm mb-4 accent-border">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary-custom">Bisa Apa Aku</h5>
                        <p class="text-muted mb-0">Bukan sekadar mengetik sintaks, aku merakit jembatan antara kerumitan backend dengan keindahan frontend. Dengan PHP sebagai fondasi dan CSS sebagai warna, aku menghidupkan ruang kosong menjadi pengalaman yang dapat dirasakan oleh pengguna.</p>
                    </div>
                </div>

                <div class="card card-about shadow-sm mb-0 accent-border">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-primary-custom">Bagaimana Aku</h5>
                        <p class="text-muted mb-0">Aku bekerja dalam harmoni antara ketelitian dan rasa. Bagiku, koding bukan hanya soal fungsi yang berjalan, tapi soal bagaimana menciptakan keteraturan di tengah kekacauan, dan memastikan setiap klik membawa kenyamanan bagi siapa pun yang berkunjung.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white mt-5">
        <div class="container text-center">
            <small>&copy; <?= date('Y') ?> MyBlog. Built with Love.</small>
        </div>
    </footer>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
