<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog - Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://jsdelivr.net">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    <style>
        html { scroll-behavior: smooth; }
        body { background-color: #f8f9fa; }
        .text-primary-custom { color: #106EBE !important; }
        .btn-custom { background-color: #106EBE; color: white; border: none; }
        .btn-custom:hover { background-color: #0FFCBE; color: #000; transition: 0.3s; }
        .card-accent { border-top: 5px solid #0FFCBE !important; transition: transform 0.3s; }
        .card-accent:hover { transform: translateY(-10px); }
    </style>
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <!-- Bagian Hero -->
    <div class="container-fluid hero-gradient text-white p-5 shadow-sm mb-5">
        <div class="container py-5 text-center">
            <h1 class="display-3 fw-bold">Selamat Datang</h1>
            <p class="lead fs-4">Di blog pribadi saya. Mari belajar PHP, CSS, dan CodeIgniter bersama!</p>
            <hr class="my-4 border-white opacity-25" style="width: 50%; margin: auto;">
            <a href="<?= base_url('post') ?>" class="btn btn-outline-light btn-lg rounded-pill px-5">Lihat Semua Artikel</a>
        </div>
    </div>

    <!-- Bagian Konten -->
    <div class="container my-5" id="konten">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 class="fw-bold text-primary-custom display-5">Jejak yang Tersisa</h2>
                <p class="text-muted fs-5">Setiap sudut blog ini menyimpan cerita. Pilih pintu mana yang ingin kamu buka.</p>
                <div style="width: 60px; height: 4px; background: #0FFCBE; margin: 15px auto; border-radius: 2px;"></div>
            </div>
        </div>

        <div class="row">
            <!-- Kartu 1: Rahasia Logika -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 card-accent">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3 text-primary-custom">
                            <i class="bi bi-cpu fs-1"></i>
                        </div>
                        <h5 class="card-title fw-bold text-primary-custom">Nafas Sang Logika</h5>
                        <p class="card-text text-muted">Pernahkah kamu bertanya-tanya bagaimana sebuah halaman mati bisa mendadak hidup? Intip rahasia di balik 'otak' yang mengatur segalanya.</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4 text-center">
                        <button type="button" class="btn btn-sm btn-custom rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalLogika">
                            Temukan Rahasianya
                        </button>
                    </div>
                </div>
            </div>

            <!-- Kartu 2: Estetika Visual -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 card-accent">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3 text-primary-custom">
                            <i class="bi bi-palette fs-1"></i>
                        </div>
                        <h5 class="card-title fw-bold text-primary-custom">Tarian Pixel & Cahaya</h5>
                        <p class="card-text text-muted">Web bukan sekadar angka, tapi soal rasa. Lihat bagaimana aku memadukan warna dan gerakan untuk menciptakan simfoni visual.</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4 text-center">
                        <button type="button" class="btn btn-sm btn-custom rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalVisual">
                            Lihat Keajaibannya
                        </button>
                    </div>
                </div>
            </div>

            <!-- Kartu 3: Struktur Efisiensi -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 card-accent">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3 text-primary-custom">
                            <i class="bi bi-layers fs-1"></i>
                        </div>
                        <h5 class="card-title fw-bold text-primary-custom">Harmoni dalam Kecepatan</h5>
                        <p class="card-text text-muted">Ada cara untuk membuat yang rumit menjadi sederhana. Ingin tahu alat apa yang membuat segalanya terasa begitu ringan?</p>
                    </div>
                    <div class="card-footer bg-white border-0 pb-4 text-center">
                        <button type="button" class="btn btn-sm btn-custom rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalKecepatan">
                            Intip Alurnya
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 1: Nafas Sang Logika -->
    <div class="modal fade" id="modalLogika" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header hero-gradient text-white border-0 py-4">
                    <h5 class="modal-title fw-bold"><i class="bi bi-cpu me-2"></i> Bagaimana PHP Mendengar Perintahmu?</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-5">
                    <h4 class="text-primary-custom fw-bold mb-3">Seni Menyusun Logika di Balik Layar</h4>
                    <p class="text-muted" style="line-height: 1.8;">
                        Bayangkan PHP sebagai seorang kepala pelayan di restoran mewah. Saat kamu mengklik sebuah tombol, PHP akan berlari ke dapur (Server), memeriksa stok (Database), lalu meraciknya dengan logika presisi. Itulah rahasianya: PHP bukan hanya soal kode, tapi soal memastikan pesanmu tersampaikan tanpa tercecer.
                    </p>
                </div>
                <div class="modal-footer border-0 pb-4 justify-content-center">
                    <a href="<?= base_url('post') ?>" class="btn btn-custom rounded-pill px-5">Eksplorasi Lebih Dalam</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 2: Tarian Pixel & Cahaya -->
    <div class="modal fade" id="modalVisual" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header hero-gradient text-white border-0 py-4">
                    <h5 class="modal-title fw-bold"><i class="bi bi-palette me-2"></i> Estetika di Balik Angka</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-5">
                    <h4 class="text-primary-custom fw-bold mb-3">Simfoni Visual: Saat Kode Bertemu Rasa</h4>
                    <p class="text-muted" style="line-height: 1.8;">
                        Bagiku, sebuah website bukanlah sekadar barisan angka yang dingin. Ia adalah kanvas digital di mana Tarian Pixel terjadi. Perpaduan warna Biru dan Mint ini adalah perwakilan dari ketenangan logika dan kesegaran kreativitas yang menyatu untuk memanjakan mata pengunjung.
                    </p>
                </div>
                <div class="modal-footer border-0 pb-4 justify-content-center">
                    <a href="<?= base_url('post') ?>" class="btn btn-custom rounded-pill px-5">Lihat Portofolio Visual</a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 3: Harmoni dalam Kecepatan -->
    <div class="modal fade" id="modalKecepatan" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header hero-gradient text-white border-0 py-4">
                    <h5 class="modal-title fw-bold"><i class="bi bi-layers me-2"></i> Ketangkasan dalam Struktur</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-5">
                    <h4 class="text-primary-custom fw-bold mb-3">Sederhana di Luar, Bertenaga di Dalam</h4>
                    <p class="text-muted" style="line-height: 1.8;">
                        Dalam Harmoni Kecepatan, aku menggunakan alat yang memungkinkan ide-ide rumit diterjemahkan menjadi sistem yang ringan. Seperti labirin yang memiliki jalan pintas rahasia, setiap baris kode dirancang untuk efisiensi maksimal, memastikan setiap interaksi terasa instan.
                    </p>
                </div>
                <div class="modal-footer border-0 pb-4 justify-content-center">
                    <a href="<?= base_url('about') ?>" class="btn btn-custom rounded-pill px-5">Kenali Alur Kerjaku</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
