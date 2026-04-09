<?= $this->extend('layouts/template-home'); ?>
<?= $this->section('content'); ?>

<main class="main">
<!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>UI/UX Designer & Web Developer berpengalaman 4 tahun 
          yang berdedikasi menciptakan produk digital intuitif dan responsif. 
          Ahli dalam menjembatani kesenjangan antara estetika visual (Figma/Adobe XD) dan fungsionalitas teknis (HTML, CSS, JS, React). 
          Berhasil meningkatkan user engagement sebesar 87% melalui pendekatan human-centered design dan optimasi performa web.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/my-profile-img.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 content">
            <h2>UI/UX Designer &amp; Web Developer.</h2>
            <p class="fst-italic py-3">
              Menggabungkan kemampuan riset pengguna dan desain visual dengan keahlian coding 
              untuk menghasilkan produk yang estetis sekaligus fungsional. Berkomitmen menghadirkan solusi digital yang konsisten dan berorientasi pada kebutuhan user.
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>1 May 1995</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>www.example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+123 456 7890</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>New York, USA</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>30</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>CEO</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>YaasinAjaa@example.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
                </ul>
              </div>
            </div>
            <p class="py-3">
              UI/UX Designer & Web Developer berfokus pada User-Centered Design. 
              Berpengalaman dalam mengubah konsep kreatif menjadi website yang responsif, fungsional, dan estetis. Ahli dalam Figma, HTML5, CSS3, dan JavaScript.
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->
</main>

<?= $this->endSection(); ?>