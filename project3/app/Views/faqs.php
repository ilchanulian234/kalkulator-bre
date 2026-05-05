<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - MyBlog</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/custom.css') ?>" />
    <style>
        body { background-color: #f8f9fa; }
        .text-primary-custom { color: #106EBE !important; }
        /* Kustomisasi warna Accordion agar sesuai tema */
        .accordion-button:not(.collapsed) {
            background-color: #0FFCBE;
            color: #000;
        }
        .accordion-button:focus {
            border-color: #106EBE;
            box-shadow: 0 0 0 0.25rem rgba(16, 110, 190, 0.25);
        }
    </style>
</head>
<body>
    <?= $this->include('layouts/navbar'); ?>

    <div class="p-5 mb-5 hero-gradient text-white shadow-sm">
        <div class="container py-5 text-center">
            <h1 class="display-4 fw-bold">FAQ</h1>
            <p class="lead">Pertanyaan yang sering diajukan seputar blog ini.</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Komponen Accordion Bootstrap -->
                <div class="accordion shadow-sm" id="accordionFAQ">
                    
                    <!-- Pertanyaan 1 -->
                    <div class="accordion-item border-0 mb-2 overflow-hidden rounded-3">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold text-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                Bagaimana cara mulai belajar koding di blog ini?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body bg-white text-muted">
                                Kamu bisa mulai dengan membaca kategori PHP di halaman artikel, lalu ikuti panduan langkah demi langkah yang sudah kami sediakan.
                            </div>
                        </div>
                    </div>

                    <!-- Pertanyaan 2 -->
                    <div class="accordion-item border-0 mb-2 overflow-hidden rounded-3">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold text-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Apakah materi di sini gratis?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body bg-white text-muted">
                                Ya! Semua materi yang dibagikan di MyBlog dapat diakses secara gratis oleh siapa saja yang ingin belajar.
                            </div>
                        </div>
                    </div>

                    <!-- Pertanyaan 3 -->
                    <div class="accordion-item border-0 mb-2 overflow-hidden rounded-3">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold text-primary-custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Framework apa yang digunakan di blog ini?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                            <div class="accordion-body bg-white text-muted">
                                Kami fokus menggunakan CodeIgniter 4 untuk backend dan Bootstrap 5 untuk tampilan frontend agar website tetap ringan dan responsif.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <footer class="py-4 bg-dark text-white mt-5">
        <div class="container text-center">
            &copy; <?= Date('Y') ?> MyBlog. Knowledge is Power.
        </div>
    </footer>

    <!-- Jquery dan Bootsrap JS -->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
</body>
</html>
