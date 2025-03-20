<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class = "text-center">
<header class="text-center py-5 px-5 container-fluid position-relative overflow-hidden p-3 text-center">
    <img src="<?php echo IMG.'Eden Island Frontier - Logo.png'; ?>" alt="GameLogo" class="mb-4 img-fluid">
    <div class="mx-auto">
        <p class ="lead mb-4 fw-bold fs-1">A 3D Strategy Simulation Game about the Implications of Climate Change and Economic Empowerment"</p>
    </div>
    <a href="<?=base_url().'about' ?>" class="btn btn-dark px-3 fs-4 fw-bold">About</a>
</header>
</div>
<div id="custom-cards" class="container px-4 py-5 text-center">
    <h2 class="lead mb-4 fw-bold fs-1 border-bottom">Gallery</h2>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3 text-center">
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo IMG.'Screenshot 2025-03-07 002058.jpg'; ?>'">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Main Island, Map Overview</h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="Mash" class="rounded-circle" width="32" height="32">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                            <small>Earth</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                            <small>3d</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo IMG.'Screenshot 2025-03-20 161821.jpg'; ?>'">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Main Character 3D Models</h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="Mash" class="rounded-circle" width="32" height="32">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                            <small>Pakistan</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                            <small>4d</small>
                        </li>
                    </ul>
                </div>
            </div>
      </div>
      <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('<?php echo IMG.'Screenshot 2025-03-20 162137.jpg'; ?>');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Ingame 3D Assets (Buildings/Objects)</h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="Mash" class="rounded-circle" width="32" height="32">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                            <small>California</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#calendar3"></use></svg>
                            <small>5d</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="<?=base_url().'gallery' ?>" class="btn btn-dark px-3 fs-4 fw-bold">See More</a>
</div>
</main>
<?= $this->endSection('pageContents') ?>