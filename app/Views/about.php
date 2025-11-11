<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class ="container py-4">
<div class="p-5 mb-4 bg-body-tertiary border rounded-3">
    <div class="container-fluid py-5">
            <h1 class = "display-5 fw-bold">About Us</h1>
            <p class="col-md-8 fs-4">Learn more about Jed's System Analysis and Design</p>
    </div>
</div>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class = "h-100 p-5 text-bg-dark rounded-3">
                <h2 class = "fw-bold">Our Mission</h2>
                <p>To create a game based on agriculture to give importance on the implications of agriculture to climate change.</p>
            </div>
        </div>
    </div>
</div>
<div class ="container py-4">
    <div class="col-md-12">
        <h2 class = "fw-bold text-light display-2 border-bottom pb-3 mb-5">The Team</h2>
    </div>
  <div class="row row-cols-6">
    <div class="col">
        <div class="card rounded-4">
          <img src="<?php echo IMG.'476497323_495082740320861_707671110755780640_n.jpg'; ?>" class="card-img-top p-2 rounded-4" alt="VTJG">
          <div class="card-body">
            <h5 class="card-title">Vincent Thomas Jed Gabinete</h5>
            <p class="card-text">Project Manager</p>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
          <img src="<?php echo IMG.'472833236_913016031025682_3154287399021606900_n.jpg'; ?>" class="card-img-top p-2 rounded-4" alt="JNC">
          <div class="card-body">
            <h5 class="card-title">Jon Nathaniel Castañeda</h5>
            <p class="card-text">Lead Developer</p>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
          <img src="<?php echo IMG.'454235249_10225625648456783_3047283924182056320_n.jpg'; ?>" class="card-img-top p-2 rounded-4" alt="LJM">
          <div class="card-body">
            <h5 class="card-title">Luis Javier Montinola</h5>
            <p class="card-text">Web Developer</p>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
          <img src="<?php echo IMG.'481674085_1354612385578793_2475199882742616598_n.jpg'; ?>" class="card-img-top p-2 rounded-4" alt="JLT">
          <div class="card-body">
            <h5 class="card-title">Jose Loranzo Tuazon</h5>
            <p class="card-text">QA Specialist</p>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
          <img src="<?php echo IMG.'EWbLq_t7.jpg'; ?>" class="card-img-top p-2 rounded-4" alt="JLT">
          <div class="card-body">
            <h5 class="card-title">Patrick James Acosta</h5>
            <p class="card-text">Team Member</p>
          </div>
        </div>
    </div>
    <div class="col">
        <div class="card rounded-4">
          <img src="<?php echo IMG.'Default-Profile.jpg'; ?>" class="card-img-top p-2 rounded-4" alt="JLT">
          <div class="card-body">
            <h5 class="card-title">Nhil Patrick Morales</h5>
            <p class="card-text">Team Member</p>
          </div>
        </div>
    </div>
  </div>
</div>
<div class ="container py-4">
    <div class="row g-4">
      <div class="col-12 col-md-4">
        <div class="p-4 bg-body-tertiary border rounded-3 h-100">
          <h3 class="fw-bold">Contact Information</h3>
          <p class="fs-5">If you have any questions or would like to work with us, please contact us at</p>
          <p class="fs-5"><a href="mailto:info@jedsSAD.com">info@jedsSAD.com</a></p>
          <hr>
          <p class="fs-5">Phone: (+63) 992-848-7512<br>Office Hours: Mon–Fri, 9am–5pm</p>
        </div>
      </div>
      <div class="col-12 col-md-8">
        <div class="p-4 bg-body-tertiary border rounded-3 h-100">
          <h3 class="fw-bold">Far Eastern University - Institute of Technology</h3>
          <p class="fs-5">Padre Paredes St, Sampaloc, Manila, 1015 Metro Manila</p>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.9113756070133!2d120.98604977400919!3d14.604124176992594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9f8b14eb259%3A0xad4d12caac9a068e!2sFEU%20Institute%20of%20Technology!5e0!3m2!1sen!2sph!4v1762862789531!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
</div>
</main>
<?= $this->endSection('pageContents') ?>