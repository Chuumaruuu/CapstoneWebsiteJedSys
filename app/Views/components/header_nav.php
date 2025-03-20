<header class="header">
    <!-- MISSING: LOGO -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
    <a href="<?=base_url() ?>">
        <img src="<?php echo IMG.'JS&D-Logo.png'; ?>" alt="Mash" class="logo" width=120px height=120px>
    </a>
    <div class="collapse navbar-collapse">
        <ul class = "navbar-nav me-auto mb-2">
            <li class="nav-item ms-5">
                <a href="<?=base_url() ?>" class="nav-link fs-3">Home</a>
            </li>
            <li class="nav-item ms-5">
                <a href="<?=base_url().'about' ?>" class="nav-link fs-3">About</a>
            </li>
            <li class="nav-item ms-5">
                <a href="<?=base_url().'gallery' ?>" class="nav-link fs-3">Gallery</a>
            </li>
            <li class="nav-item ms-5">
                <a href="<?=base_url().'gameplay' ?>" class="nav-link fs-3">Gameplay</a>
            </li>
        </ul>
        <ul class = "navbar-nav me-5 mb-2">
            <li class="nav-item ms-5">
                <a href="<?=base_url().'login' ?>" class="nav-link fs-3">Login</a>
            </li>
        </ul>
    </div>
    </div>
    </nav>
    <a href="" class="btn action"></a>
</header>