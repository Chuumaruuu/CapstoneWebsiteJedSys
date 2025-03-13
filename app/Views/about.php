<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<div class ="container py-4">
<div class="p-5 mb-4 bg-body-tertiary border rounded-3">
    <div class="container-fluid py-5">
            <h1 class = "display-5 fw-bold">About Us</h1>
            <p class="col-md-8 fs-4">Learn more about Jed's Web Systems</p>
    </div>
</div>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class = "h-100 p-5 text-bg-dark rounded-3">
                <h2 class = "fw-bold">Our Mission</h2>
                <p>Our mission is to create high-quality web pages that meet the requirements of our clients and help them achieve their goals.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class ="h-100 p-5 bg-body-tertiary border rounded-3">
                <h2 class = "fw-bold">Our Team</h2>
                <p>We are a team of IT students dedicated to learning and applying web development skills in real-world projects.</p>
            </div>
        </div>
    </div>
</div>
<div class ="container py-4">
    <div class="p-5 mb-4 bg-body-tertiary border rounded-3">
        <div class="container-fluid py-5">
            <h1 class = "display-5 fw-bold">Contact Information</h1>
            <p class = "col-md-8 fs-4">If you have any questions or would like to work with us, please contact us at <a href="mailto:info@jedswebsystems.com">info@jedswebsystems.com</a>.</p>
        </div>
    </div>
</div>
<?= $this->endSection('pageContents') ?>