<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class="container py-5">
<p class ="lead mb-4 fw-bold display-1 text-center">In-Game Asset Gallery</p>
<div class="row">
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card">
        <img class="card-img-top img-fluid gallery-img" src="<?php echo IMG.'Main Character - Concept Art.png'; ?>" role="img"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Main Character (Male/Female)</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card text-end">
        <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'VillagerNPC-ConceptArt.png'; ?>" role="img"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Villager NPCs</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card text-end">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'Main House - Concept Art.png'; ?>" role="img"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Main House</h5>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card text-center">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'482231496_2416748458674498_109483186446443634_n.png'; ?>" role="img"></img>
      <div class="card-body">
          <h5 class="card-title">Concept Art Resources</h5>
        </div>
    </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4">
      <div class="card text-center">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'Resource Buildings - Concept Art.png'; ?>" role="img"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Resource Buildings</h5>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<?= $this->endSection('pageContents') ?>