<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class="container py-5">
<p class ="lead mb-4 fw-bold display-1 text-center">In-Game Asset Gallery</p>
<div class="row" data-masonry="{&quot;percentPosition&quot;: true }" style="position: relative; height: 690px;">
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 0px;">
      <div class="card">
        <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'Main Character - Concept Art.png'; ?>" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Main Character (Male/Female)</h5>
          <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 33.3333%; top: 0px;">
      <div class="card p-3">
        <figure class="p-3 mb-0">
          <blockquote class="blockquote">
            <p>A well-known quote, contained in a blockquote element.</p>
          </blockquote>
          <figcaption class="blockquote-footer mb-0 text-body-secondary">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </figcaption>
        </figure>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 66.6667%; top: 0px;">
      <div class="card">
        <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'VillagerNPC-ConceptArt.png'; ?>" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Villager NPCs</h5>
          <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 33.3333%; top: 171px;">
      <div class="card text-bg-primary text-center p-3">
        <figure class="mb-0">
          <blockquote class="blockquote">
            <p>A well-known quote, contained in a blockquote element.</p>
          </blockquote>
          <figcaption class="blockquote-footer mb-0 text-white">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </figcaption>
        </figure>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 33.3333%; top: 310px;">
      <div class="card text-center">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'Main House - Concept Art.png'; ?>" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Main House</h5>
          <p class="card-text">This card has a regular title and short paragraph of text below it.</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 0%; top: 362px;">
      <div class="card">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'482231496_2416748458674498_109483186446443634_n.png'; ?>" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 66.6667%; top: 378px;">
      <div class="card p-3 text-end">
        <figure class="mb-0">
          <blockquote class="blockquote">
            <p>A well-known quote, contained in a blockquote element.</p>
          </blockquote>
          <figcaption class="blockquote-footer mb-0 text-body-secondary">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </figcaption>
        </figure>
      </div>
    </div>
    <div class="col-sm-6 col-lg-4 mb-4" style="position: absolute; left: 33.3333%; top: 488px;">
      <div class="card">
      <img class="bd-placeholder-img card-img-top" width="100%" height="100%" src="<?php echo IMG.'Resource Buildings - Concept Art.png'; ?>" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
        <div class="card-body">
          <h5 class="card-title">Concept Art Resource Buildings</h5>
          <p class="card-text">This is another card with title and supporting text below. This card has some additional content to make it slightly taller overall.</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
        </div>
      </div>
    </div>
  </div>
</div>
</main>
<?= $this->endSection('pageContents') ?>