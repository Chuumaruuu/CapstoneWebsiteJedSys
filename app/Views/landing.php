<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class = "text-center">
<header class="text-center py-5 px-5 container-fluid position-relative overflow-hidden p-3 text-center">
    <img src="<?php echo IMG.'Eden Island Frontier - Logo.png'; ?>" alt="GameLogo" class="mb-4 img-fluid">
    <div class="mx-auto">
        <p class ="lead mb-4 fw-bold fs-1 text-light">A 3D Strategy Simulation Game about the Implications of Climate Change and Economic Empowerment</p>
    </div>
    <a href="<?=base_url().'about' ?>" class="btn px-5 fs-4 fw-bold hvr-grow" style="background-image: url('<?php echo IMG.'Button.png'; ?>');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
        color: white;">About</a>
</header>
</div>
<div class="container-fluid px-4 py-5 my-5">
<div class="row featurette align-items-center">
      <div class="col-md-7 text-light">
        <h2 class="featurette-heading fw-normal lh-1 display-1">Eden Island Frontier</h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <video class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="<?php echo IMG.'483282794_9019928211448947_6254525023304408926_n.mp4'; ?>" controls></video>
      </div>
    </div>
</div>
<div id="custom-cards" class="container-fluid px-4 py-5 text-center text-bg-light">
    <h2 class="lead mb-4 fw-bold fs-1 border-bottom">Gallery</h2>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3 text-center">
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg hvr-grow" style="background-image: url('<?php echo IMG.'Screenshot 2025-03-07 002058.jpg'; ?>'">
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
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg hvr-grow" style="background-image: url('<?php echo IMG.'Screenshot 2025-03-20 161821.jpg'; ?>'">
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
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg hvr-grow" style="background-image: url('<?php echo IMG.'Screenshot 2025-03-20 162137.jpg'; ?>');">
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
    <a href="<?=base_url().'gallery' ?>" class="btn px-5 my-2 fs-4 fw-bold hvr-grow" style="background-image: url('<?php echo IMG.'Button.png'; ?>');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
        color: white;">See More</a>
</div>
</main>
<?= $this->endSection('pageContents') ?>