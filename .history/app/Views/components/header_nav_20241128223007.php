<header class="header">
    <!-- MISSING: LOGO -->
    <nav class="navbar bg-body-tertiary">
        <img src="<?php echo IMG.'logo.png'; ?>" alt="Mash" class="logo" width=100px height=100px>
        <a href="<?=base_url() ?>" class="btn">Home</a>
        <a href="<?=base_url().'about' ?>" class="btn">About</a>
        <a href="<?=base_url().'content' ?>" class="btn">Content</a>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </nav>
    <a href="" class="btn action"></a>
</header>