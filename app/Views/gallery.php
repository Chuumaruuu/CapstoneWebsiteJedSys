<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class="container py-5">
<p class ="lead mb-4 fw-bold display-1 text-center">In-Game Asset Gallery</p>
<?php if (!empty($gallery) && is_array($gallery)): ?>
  <div class="row">
    <?php foreach ($gallery as $item): ?>
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card">
          <div class="d-flex justify-content-end">
            <button type="button" style="height: 25px; width: 25px;" class="btn btn-outline-danger">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
              </svg>
            </button>
          </div>
          <?php $imgSrc = !empty($item['Filename']) ? IMG . $item['Filename'] : IMG . 'Default-Profile.jpg'; ?>
          <img class="card-img-top img-fluid gallery-img" src="<?= esc($imgSrc) ?>" alt="<?= esc($item['Title'] ?? 'Artwork') ?>">
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