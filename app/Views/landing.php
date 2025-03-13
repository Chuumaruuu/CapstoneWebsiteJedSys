<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<div class = "px-4 mx-4 text-center">
<header class="text-center py-5 px-5 rounded-3 container-fluid">
        <img src="<?php echo IMG.'Eden Island Frontier - Logo.png'; ?>" alt="GameLogo" class="mb-4 img-fluid">
        <div class="mx-auto">
        <p class ="lead mb-4 fw-bold fs-1">A 3D Strategy Simulation Game about the Implications of Climate Change and Economic Empowerment"</p>
        </div>
        <a href="<?=base_url().'about' ?>" class="btn btn-outline-dark btn-lg px-4 fs-1 fw-bold">About</a>
    </header>
</div>
    <main class="container my-5">

    </main>
<?= $this->endSection('pageContents') ?>