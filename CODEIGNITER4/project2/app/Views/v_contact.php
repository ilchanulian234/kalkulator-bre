<?= $this->extend('layouts/template-home'); ?>
<?= $this->section('content'); ?>

<main class="main">
  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Contact</h2>
      <p>Have a project in mind or just want to say hello? Feel free to reach out. I'm always open to new opportunities and collaborations.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <!-- Contact Info Column -->
        <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Location</h3>
              <p>Jakarta, Indonesia</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Phone</h3>
              <p>+62 812 3456 7890</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email</h3>
              <p>ilchanul.yaasin@example.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="600">
            <i class="bi bi-clock flex-shrink-0"></i>
            <div>
              <h3>Working Hours</h3>
              <p>Mon - Fri: 09:00 - 18:00 WIB<br>Sat: By Appointment</p>
            </div>
          </div><!-- End Info Item -->

          <!-- Social Links -->
          <div class="social-links d-flex mt-4" data-aos="fade-up" data-aos-delay="700">
            <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>

        </div><!-- End Contact Info Column -->

        <!-- Contact Form Column -->
        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
          <form action="#" method="post" class="php-email-form">
            
            <div class="row gy-4">

              <div class="col-md-6">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="John Doe">
              </div>

              <div class="col-md-6">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" required placeholder="john@example.com">
              </div>

              <div class="col-md-12">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required placeholder="Project Inquiry">
              </div>

              <div class="col-md-12">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="6" required placeholder="Tell me about your project..."></textarea>
              </div>

              <div class="col-md-12 text-center">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>

            </div>
          </form>
        </div><!-- End Contact Form Column -->

      </div>

    </div>

  </section><!-- /Contact Section -->
</main>

<?= $this->endSection(); ?>