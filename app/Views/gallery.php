<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class="container py-5">
<p class ="lead mb-4 fw-bold display-1 text-center">In-Game Asset Gallery</p>
<?php if (!empty($gallery) && is_array($gallery)): ?>
<div class="row g-2" data-masonry='{"percentPosition": true }' style="position: relative;">
    <?php foreach ($gallery as $item): ?>
        <div class="col-sm-6 col-lg-4" style="position: absolute;">
          <div class="card">
            <div class="d-flex justify-content-end pb-2">
              <button type="button" class="btn btn-outline-secondary border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
              </button>
              <button type="button" class="btn btn-outline-danger border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
              </button>
            </div>
            <?php $imgSrc = !empty($item['Filename']) ? IMG . $item['Filename'] : IMG . 'Default-Profile.jpg'; ?>
            <img class="card-img-top" src="<?= esc($imgSrc) ?>" alt="<?= esc($item['Title'] ?? 'Artwork') ?>">
            <div class="card-body">
              <h5 class="card-title"><?= esc($item['Title'] ?? 'Untitled') ?></h5>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
</div>
<?php else: ?>
  <div class="row">
    <div class="col-12">
      <p class="lead text-center">No gallery items found.</p>
    </div>
  </div>
<?php endif; ?>
</div>
</main>
<?= $this->endSection('pageContents') ?>