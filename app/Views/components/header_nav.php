<header class="header">
    <!-- MISSING: LOGO -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark " data-bs-theme="dark">
    <div class="container-fluid">
    <img src="<?php echo IMG.'JWS_Logo_Inverted.png'; ?>" alt="Mash" class="logo" width=120px height=120px>
    <div class="collapse navbar-collapse">
        <ul class = "navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item ms-5">
                <a href="<?=base_url() ?>" class="nav-link fs-6">Home</a>
            </li>
            <li class="nav-item ms-5">
                <a href="<?=base_url().'about' ?>" class="nav-link fs-6">About</a>
            </li>
            <li class="nav-item ms-5">
                <a href="<?=base_url().'login' ?>" class="nav-link fs-6">Login</a>
            </li>
        </ul>
        <form role="search">
          <input class="form-control me-5" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
    </div>
    </nav>
    <a href="" class="btn action"></a>
</header>