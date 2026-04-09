<?= $this->extend('layouts/template-home'); ?>
<?= $this->section('content'); ?>

<main class="main">
  <!-- Services Section -->
  <section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Services</h2>
      <p>Professional services I offer to help bring your digital ideas to life with clean design and efficient code.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

        <!-- Service 1: UI/UX Design -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-palette" style="font-size: 48px; color: #0d6efd;"></i>
            </div>
            <h3>UI/UX Design</h3>
            <p>Creating intuitive and visually appealing interfaces that enhance user experience and drive engagement.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> User Research & Persona</li>
              <li><i class="bi bi-check-circle"></i> Wireframing & Prototyping</li>
              <li><i class="bi bi-check-circle"></i> Usability Testing</li>
              <li><i class="bi bi-check-circle"></i> Design System Creation</li>
            </ul>
            <a href="#" class="readmore stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <!-- Service 2: Frontend Development -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-code-slash" style="font-size: 48px; color: #198754;"></i>
            </div>
            <h3>Frontend Development</h3>
            <p>Building responsive, performant, and accessible web applications using modern frameworks and best practices.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> React / Vue.js Development</li>
              <li><i class="bi bi-check-circle"></i> Responsive & Mobile-First Design</li>
              <li><i class="bi bi-check-circle"></i> Performance Optimization</li>
              <li><i class="bi bi-check-circle"></i> Cross-Browser Compatibility</li>
            </ul>
            <a href="#" class="readmore stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <!-- Service 3: Full-Stack Integration -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-server" style="font-size: 48px; color: #6f42c1;"></i>
            </div>
            <h3>Full-Stack Integration</h3>
            <p>Connecting frontend interfaces with robust backend systems for seamless data flow and functionality.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> RESTful API Development</li>
              <li><i class="bi bi-check-circle"></i> Database Design (MySQL/PostgreSQL)</li>
              <li><i class="bi bi-check-circle"></i> Authentication & Authorization</li>
              <li><i class="bi bi-check-circle"></i> Deployment & DevOps Support</li>
            </ul>
            <a href="#" class="readmore stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <!-- Service 4: Website Maintenance -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-gear-wide-connected" style="font-size: 48px; color: #fd7e14;"></i>
            </div>
            <h3>Website Maintenance</h3>
            <p>Ongoing support to keep your website secure, updated, and performing at its best.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Bug Fixes & Updates</li>
              <li><i class="bi bi-check-circle"></i> Security Patching</li>
              <li><i class="bi bi-check-circle"></i> Content Updates</li>
              <li><i class="bi bi-check-circle"></i> Performance Monitoring</li>
            </ul>
            <a href="#" class="readmore stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <!-- Service 5: Consultation -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-chat-dots" style="font-size: 48px; color: #20c997;"></i>
            </div>
            <h3>Technical Consultation</h3>
            <p>Expert advice on technology stack, architecture decisions, and project planning.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Tech Stack Recommendation</li>
              <li><i class="bi bi-check-circle"></i> Project Feasibility Analysis</li>
              <li><i class="bi bi-check-circle"></i> Code Review & Best Practices</li>
              <li><i class="bi bi-check-circle"></i> Team Training & Mentoring</li>
            </ul>
            <a href="#" class="readmore stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <!-- Service 6: SEO & Performance -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="bi bi-graph-up-arrow" style="font-size: 48px; color: #dc3545;"></i>
            </div>
            <h3>SEO & Performance</h3>
            <p>Optimizing your website for search engines and lightning-fast loading speeds.</p>
            <ul>
              <li><i class="bi bi-check-circle"></i> On-Page SEO Implementation</li>
              <li><i class="bi bi-check-circle"></i> Core Web Vitals Optimization</li>
              <li><i class="bi bi-check-circle"></i> Image & Asset Optimization</li>
              <li><i class="bi bi-check-circle"></i> Analytics Setup & Reporting</li>
            </ul>
            <a href="#" class="readmore stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>

  </section><!-- /Services Section -->
</main>

<?= $this->endSection(); ?>