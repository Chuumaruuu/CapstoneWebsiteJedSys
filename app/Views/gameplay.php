<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class="container py-5">
    <p class ="lead mb-4 fw-bold display-1 text-center text-white">Controls</p>
    <div class="text-center mt-4">
        <div class="row align-items-center">
            <div class="col-md-5 text-center">
                <img src="<?php echo IMG.'Controls.jpg'; ?>" alt="Game controls table" class="img-fluid" style="max-width:420px;width:90%;height:auto;border:2px solid #ddd;border-radius:6px;background:#fff;padding:6px;" />
            </div>
            <div class="col-md-7 mh-100">
                <div class="mt-3 text-start" style="color:#eee;">
                    <ul class="fs-4">
                        <li><strong>Base Controls:</strong> general camera and selection controls used in the main game</li>
                        <li><strong>Minigame Controls:</strong> specific inputs for the minigames — move with W/A/S/D (or arrow keys), use Left Mouse Button to select/trigger actions</li>
                        <li><strong>Per-minigame notes:</strong> Farming uses WASD + Left Click to plant; Woodcutting requires timing with Space/Left Click; Mining is a Minesweeper-style grid with movement and left/right click actions; Fishing shows letters to press on the keyboard quickly.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
      .minigame-card { position: relative; cursor: pointer; overflow: hidden; border-radius:6px; }
      .minigame-card img { display:block; width:100%; height:auto; transition: transform .3s ease; }
      .minigame-card:hover img { transform: scale(1.03); }
      .minigame-card .overlay { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; background: rgba(0,0,0,0.6); color: #fff; font-weight:700; font-size:1.25rem; opacity: 0; transition: opacity .18s ease; }
      .minigame-card:focus .overlay, .minigame-card:hover .overlay { opacity: 1; }
    </style>

    <div style="grid-template-columns: 1fr 1fr;" class="d-grid gap-3 mt-5">
      <div class="p-2">
        <div class="minigame-card" tabindex="0" aria-label="Farming minigame">
          <img src="<?php echo IMG.'Farm.gif'; ?>" class="col-md-12" alt="Farming preview">
          <div class="overlay">Farming Minigame</div>
        </div>
      </div>
      <div class="p-2">
        <div class="minigame-card" tabindex="0" aria-label="Woodcutting minigame">
          <img src="<?php echo IMG.'Wood.gif'; ?>" class="col-md-12" alt="Woodcutting preview">
          <div class="overlay">Woodcutting  Minigame</div>
        </div>
      </div>
      <div class="p-2">
        <div class="minigame-card" tabindex="0" aria-label="Mining minigame">
          <img src="<?php echo IMG.'Mine.gif'; ?>" class="col-md-12" alt="Mining preview">
          <div class="overlay">Mining  Minigame</div>
        </div>
      </div>
      <div class="p-2">
        <div class="minigame-card" tabindex="0" aria-label="Fishing minigame">
          <img src="<?php echo IMG.'Fish.gif'; ?>" class="col-md-12" alt="Fishing preview">
          <div class="overlay">Fishing  Minigame</div>
        </div>
      </div>
    </div>
</main>
<?= $this->endSection('pageContents') ?>