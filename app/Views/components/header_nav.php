<header class="bg-dark p-3 mb-3" data-bs-theme="dark">
<div class="container-fluid">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?=base_url() ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="Mash" class="logo" width=60px height=60px>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item">
                <a href="<?=base_url() ?>" class="nav-link px-2 link-body-emphasis fs-4">Home</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'about'?>" class="nav-link px-2 link-body-emphasis fs-4">About</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'gallery'?>" class="nav-link px-2 link-body-emphasis fs-4">Gallery</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'gameplay'?>" class="nav-link px-2 link-body-emphasis fs-4">Gameplay</a>
            </li>
        </ul>
        <div class="text-end">
            <a href="<?=base_url().'login' ?>" class="btn btn-dark me-2 fs-4">Login</a>
        </div>
    </div>
</div>
</header>