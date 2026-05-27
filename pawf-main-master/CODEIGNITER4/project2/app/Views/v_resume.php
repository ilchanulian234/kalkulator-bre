<?= $this->extend('layouts/template-home'); ?>
<?= $this->section('content'); ?>

<main class="main">
  <!-- Resume Section -->
  <section id="resume" class="resume section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>Resume</h2>
      <p>My educational background, work experience, and technical skills that support my career as a UI/UX Designer & Web Developer.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row">
        <!-- Education Column -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <h3 class="resume-title">Education</h3>

          <div class="resume-item">
            <h4>Bachelor of Computer Science</h4>
            <h5>2019 - 2023</h5>
            <p><em>University of Technology, Indonesia</em></p>
            <p>Graduated with GPA 3.78/4.00. Focused on Human-Computer Interaction, Web Development, and Software Engineering.</p>
          </div>

          <div class="resume-item">
            <h4>High School - Science Major</h4>
            <h5>2016 - 2019</h5>
            <p><em>SMAN 1 Jakarta</em></p>
            <p>Active in computer club and web design competition. Won 2nd place in Provincial Web Creativity Contest.</p>
          </div>

          <h3 class="resume-title mt-4">Certifications</h3>

          <div class="resume-item">
            <h4>Google UX Design Professional Certificate</h4>
            <h5>2023</h5>
            <p><em>Coursera - Google</em></p>
            <p>Completed 7-course series covering user research, wireframing, prototyping, and usability testing.</p>
          </div>

          <div class="resume-item">
            <h4>Meta Front-End Developer Certificate</h4>
            <h5>2024</h5>
            <p><em>Coursera - Meta</em></p>
            <p>Mastered React, responsive design, version control with Git, and modern CSS frameworks.</p>
          </div>
        </div>

        <!-- Experience & Skills Column -->
        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
          <h3 class="resume-title">Work Experience</h3>

          <div class="resume-item">
            <h4>Frontend Developer Intern</h4>
            <h5>Jan 2023 - Jun 2023</h5>
            <p><em>TechStart Indonesia</em></p>
            <p>Developed responsive web interfaces using React and Bootstrap. Collaborated with UX team to implement user feedback. Improved page load speed by 40% through code optimization.</p>
          </div>

          <div class="resume-item">
            <h4>Freelance UI/UX Designer</h4>
            <h5>2022 - Present</h5>
            <p><em>Self-Employed</em></p>
            <p>Designed mobile app interfaces for 5+ clients using Figma. Conducted user research and created interactive prototypes. Delivered projects with 100% client satisfaction rate.</p>
          </div>

          <h3 class="resume-title mt-4">Technical Skills</h3>

          <div class="row skills-content">
            <div class="col-lg-6">
              <div class="progress">
                <span class="skill">HTML & CSS <i class="val">95%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">JavaScript <i class="val">85%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">React.js <i class="val">80%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"></div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="progress">
                <span class="skill">Figma & UI Design <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%"></div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">CodeIgniter / PHP <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                </div>
              </div>
              <div class="progress">
                <span class="skill">Git & Version Control <i class="val">85%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

  </section><!-- /Resume Section -->
</main>

<?= $this->endSection(); ?>