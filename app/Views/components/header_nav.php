<header class="bg-dark p-2 mb-2" data-bs-theme="dark">
<div class="container-fluid">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?=base_url() ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="Mash" class="logo" width=60px height=60px>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li class="nav-item">
                <a href="<?=base_url() ?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">Home</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'about'?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">About</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'gallery'?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">Gallery</a>
            </li>
            <li class="nav-item ms-3">
                <a href="<?=base_url().'gameplay'?>" class="nav-link px-3 link-body-emphasis fs-4 hvr-hang">Gameplay</a>
            </li>
        </ul>
        <div class="text-end">
            <a href="<?=base_url().'login' ?>" class="btn btn-dark me-2 fs-4">Login</a>
        </div>
    </div>
</div>
</header>