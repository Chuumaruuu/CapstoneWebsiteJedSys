<?= $this->extend('layout/main_layout') ?>
<?= $this->section('pageContents') ?>
<main>
<div class="container py-5">
<p class ="lead mb-4 fw-bold display-1 text-center">In-Game Asset Gallery</p>
<?php
  // determine if current user is admin (check session first, then users table)
  $session = session();
  $isAdmin = false;
  if ($session->has('ID')) {
    $uModel = new \App\Models\UserModel();
    $user = $uModel->find($session->get('ID'));
    if ($user) {
      $access = is_array($user) ? ($user['Accesslevel'] ?? null) : ($user->Accesslevel ?? null);
      if (! empty($access) && strtolower($access) === 'admin') {
        $isAdmin = true;
      }
    }
  }
 ?>
<?php if (!empty($gallery) && is_array($gallery)): ?>
<div class="row g-2" data-masonry='{"percentPosition": true }' style="position: relative;">
    <?php foreach ($gallery as $item): ?>
        <div class="col-sm-6 col-lg-4" style="position: absolute;">
          <div class="card">
            <?php if ($isAdmin): ?>
            <div class="d-flex justify-content-end pb-2">
              <button type="button" class="btn btn-outline-secondary border-0 btn-edit" data-id="<?= esc($item['ID']) ?>" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg>
              </button>
              <button type="button" class="btn btn-outline-danger border-0 btn-delete" data-id="<?= esc($item['ID']) ?>" title="Delete">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
              </button>
            </div>
            <?php endif; ?>
            <?php $imgSrc = !empty($item['Filename']) ? IMG . $item['Filename'] : IMG . 'Default-Profile.jpg'; ?>
            <img class="card-img-top p-2" src="<?= esc($imgSrc) ?>" alt="<?= esc($item['Title'] ?? 'Artwork') ?>">
            <div class="card-body">
              <h5 class="card-title" data-gallery-id="<?= esc($item['ID']) ?>"><?= esc($item['Title'] ?? 'Untitled') ?></h5>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
    <!-- Add card button at the end (admin only) -->
    <?php if ($isAdmin): ?>
    <div class="col-sm-6 col-lg-4" style="position: absolute;">
      <div class="card h-100 d-flex align-items-center justify-content-center" style="min-height:220px;">
        <div class="card-body text-center">
          <button type="button" class="btn btn-outline-success btn-lg btn-add" title="Add new item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zM8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0z"/>
              <path d="M8 4a.5.5 0 0 1 .5.5V7.5H11a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V8.5H5a.5.5 0 0 1 0-1h2.5V4.5A.5.5 0 0 1 8 4z"/>
            </svg>
            <div class="mt-2">Add Item</div>
          </button>
        </div>
      </div>
    </div>
    <?php endif; ?>
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

<!-- Edit Modal -->
<div class="modal fade" id="editGalleryModal" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="editGalleryForm" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="editGalleryModalLabel">Edit Gallery Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="galleryId">
          <div class="mb-3">
            <label for="galleryTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="galleryTitle" name="title" required maxlength="255">
          </div>
          <div class="mb-3">
            <label for="galleryImage" class="form-label">Replace Image</label>
            <input class="form-control" type="file" id="galleryImage" name="Image" accept="image/*">
          </div>
          <div class="mb-3 text-center">
            <img id="galleryPreview" src="" alt="Preview" style="max-width:100%;max-height:200px;display:none;border:1px solid #ddd;padding:4px;">
          </div>
          <div id="editError" class="text-danger small" style="display:none"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteGalleryModal" tabindex="-1" aria-labelledby="deleteGalleryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="deleteGalleryForm">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteGalleryModalLabel">Delete Gallery Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <input type="hidden" name="id" id="deleteGalleryId">
          <p id="deleteMessage">Are you sure you want to delete this item?</p>
          <div class="mb-3">
            <img id="deletePreview" src="" alt="Preview" style="max-width:100%;max-height:200px;display:none;border:1px solid #ddd;padding:4px;">
          </div>
          <div id="deleteError" class="text-danger small" style="display:none"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <!-- Add Modal -->
    <div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form id="addGalleryForm" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="addGalleryModalLabel">Add Gallery Item</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="addGalleryTitle" class="form-label">Title</label>
                <input type="text" class="form-control" id="addGalleryTitle" name="title" required maxlength="255">
              </div>
              <div class="mb-3">
                <label for="addGalleryImage" class="form-label">Image</label>
                <input class="form-control" type="file" id="addGalleryImage" name="Image" accept="image/*" required>
              </div>
              <div class="mb-3 text-center">
                <img id="addGalleryPreview" src="" alt="Preview" style="max-width:100%;max-height:200px;display:none;border:1px solid #ddd;padding:4px;">
              </div>
              <div id="addError" class="text-danger small" style="display:none"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // Wait for Masonry to be available (script is loaded async in top_layer)
  function waitForMasonry(cb, timeout) {
    timeout = timeout || 5000;
    var start = Date.now();
    (function poll() {
      if (window.Masonry) return cb(null, window.Masonry);
      if (Date.now() - start > timeout) return cb(new Error('Masonry timeout'));
      setTimeout(poll, 50);
    })();
  }

  // Simple images-loaded fallback: call cb when all images inside el are loaded
  function imagesLoadedFallback(el, cb) {
    var imgs = Array.from(el.querySelectorAll('img'));
    if (imgs.length === 0) return cb();
    var remaining = imgs.length;
    var called = false;
    function finish() { if (called) return; called = true; cb(); }
    imgs.forEach(function(img){
      if (img.complete) {
        remaining--; if (remaining === 0) finish();
      } else {
        img.addEventListener('load', function(){ remaining--; if (remaining === 0) finish(); });
        img.addEventListener('error', function(){ remaining--; if (remaining === 0) finish(); });
      }
    });
    // safety timeout
    setTimeout(function(){ if (!called) finish(); }, 3000);
  }

  // Bootstrap Modal instance
  var editModalEl = document.getElementById('editGalleryModal');
  var editModal = null;
  if (typeof bootstrap !== 'undefined' && editModalEl) {
    editModal = new bootstrap.Modal(editModalEl, { keyboard: true });
  }

  // Elements
  var form = document.getElementById('editGalleryForm');
  var inputId = document.getElementById('galleryId');
  var inputTitle = document.getElementById('galleryTitle');
  var inputImage = document.getElementById('galleryImage');
  var preview = document.getElementById('galleryPreview');
  var errorBox = document.getElementById('editError');

  // Open modal when edit button clicked
  // Helper to bind edit behavior to a specific button
  function bindEditButton(btn) {
    btn.addEventListener('click', function(e){
      var id = this.dataset.id;
      var card = this.closest('.card');
      var titleEl = card.querySelector('.card-title');
      var current = titleEl ? titleEl.textContent.trim() : '';
      var img = card.querySelector('.card-img-top');

      inputId.value = id;
      inputTitle.value = current;
      inputImage.value = null;
      errorBox.style.display = 'none';
      errorBox.textContent = '';

      if (img && img.src) {
        preview.src = img.src;
        preview.style.display = '';
      } else {
        preview.style.display = 'none';
      }

      if (editModal) editModal.show();
    });
  }

  // Attach to existing edit buttons
  document.querySelectorAll('.btn-edit').forEach(function(btn){ bindEditButton(btn); });

  // Preview selected image
  inputImage.addEventListener('change', function(){
    var file = this.files && this.files[0] ? this.files[0] : null;
    if (!file) { preview.style.display = 'none'; preview.src = ''; return; }
    var url = URL.createObjectURL(file);
    preview.src = url;
    preview.style.display = '';
  });

  // Handle form submit
  form.addEventListener('submit', async function(ev){
    ev.preventDefault();
    errorBox.style.display = 'none';
    errorBox.textContent = '';

    var id = inputId.value;
    var title = inputTitle.value.trim();
    if (!title) { errorBox.textContent = 'Title cannot be empty.'; errorBox.style.display = ''; return; }

    var data = new FormData(form);

    try {
      var res = await fetch('<?= base_url('gallery/edit') ?>', { method: 'POST', body: data });
      var json = await res.json();
      if (!json.success) {
        errorBox.textContent = json.message || 'Failed to save changes';
        errorBox.style.display = '';
        return;
      }

      // Update DOM: title and image
      var titleEl = document.querySelector('[data-gallery-id="' + id + '"]');
      if (titleEl) titleEl.textContent = json.title || title;
      if (json.imgSrc) {
        // find card img for this id
        var btn = document.querySelector('.btn-edit[data-id="' + id + '"]');
        if (btn) {
          var card = btn.closest('.card');
          var img = card.querySelector('.card-img-top');
          if (img) {
            img.src = json.imgSrc;
            // when image loads, relayout masonry
            img.addEventListener('load', function(){ if (window._msnry) window._msnry.layout(); });
          }
        }
      }

      if (editModal) editModal.hide();
    } catch (err) {
      console.error(err);
      errorBox.textContent = 'Network error';
      errorBox.style.display = '';
    }
  });

  // Delete buttons: open modal and send POST on confirm
  var deleteModalEl = document.getElementById('deleteGalleryModal');
  var deleteModal = null;
  if (typeof bootstrap !== 'undefined' && deleteModalEl) {
    deleteModal = new bootstrap.Modal(deleteModalEl, { keyboard: true });
  }

  var deleteForm = document.getElementById('deleteGalleryForm');
  var deleteInputId = document.getElementById('deleteGalleryId');
  var deletePreview = document.getElementById('deletePreview');
  var deleteError = document.getElementById('deleteError');

  // Helper to bind delete behavior to a specific button
  function bindDeleteButton(btn) {
    btn.addEventListener('click', function(e){
      var id = this.dataset.id;
      var card = this.closest('.card');
      var titleEl = card.querySelector('.card-title');
      var title = titleEl ? titleEl.textContent.trim() : '';
      var img = card.querySelector('.card-img-top');

      deleteInputId.value = id;
      deleteError.style.display = 'none';
      deleteError.textContent = '';
      if (img && img.src) {
        deletePreview.src = img.src;
        deletePreview.style.display = '';
      } else {
        deletePreview.style.display = 'none';
      }
      if (deleteModal) deleteModal.show();
    });
  }

  // Attach to existing delete buttons
  document.querySelectorAll('.btn-delete').forEach(function(btn){ bindDeleteButton(btn); });

  // Handle delete form submit
  deleteForm.addEventListener('submit', async function(ev){
    ev.preventDefault();
    deleteError.style.display = 'none';
    deleteError.textContent = '';

    var id = deleteInputId.value;
    var body = new URLSearchParams();
    body.append('id', id);

    try {
      var res = await fetch('<?= base_url('gallery/delete') ?>', { method: 'POST', body: body });
      var data = await res.json();
      if (data.success) {
        // remove card from DOM and tell Masonry
        var btn = document.querySelector('.btn-delete[data-id="' + id + '"]');
        if (btn) {
          var col = btn.closest('.col-sm-6');
          if (!col) col = btn.closest('.col-lg-4');
          if (col) {
            if (window._msnry && typeof window._msnry.remove === 'function') {
              window._msnry.remove(col);
              window._msnry.layout();
            } else {
              col.remove();
            }
          }
        }
        if (deleteModal) deleteModal.hide();
      } else {
        deleteError.textContent = data.message || 'Failed to delete item';
        deleteError.style.display = '';
      }
    } catch (err) {
      console.error(err);
      deleteError.textContent = 'Network error';
      deleteError.style.display = '';
    }
  });

  // Add item modal
  var addModalEl = document.getElementById('addGalleryModal');
  var addModal = null;
  if (typeof bootstrap !== 'undefined' && addModalEl) {
    addModal = new bootstrap.Modal(addModalEl, { keyboard: true });
  }

  var addForm = document.getElementById('addGalleryForm');
  var addTitle = document.getElementById('addGalleryTitle');
  var addImage = document.getElementById('addGalleryImage');
  var addPreview = document.getElementById('addGalleryPreview');
  var addError = document.getElementById('addError');

  // Open add modal when clicking add button
  document.querySelectorAll('.btn-add').forEach(function(btn){
    btn.addEventListener('click', function(){
      addTitle.value = '';
      addImage.value = null;
      addPreview.src = '';
      addPreview.style.display = 'none';
      addError.style.display = 'none';
      addError.textContent = '';
      if (addModal) addModal.show();
    });
  });

  addImage.addEventListener('change', function(){
    var file = this.files && this.files[0] ? this.files[0] : null;
    if (!file) { addPreview.style.display = 'none'; addPreview.src = ''; return; }
    addPreview.src = URL.createObjectURL(file);
    addPreview.style.display = '';
  });

  // Helper to escape text for HTML insertion
  function escapeHtml(str) {
    return String(str).replace(/[&<>"']/g, function (s) {
      return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;', "'":"&#39;"})[s];
    });
  }

  // Handle add form submit
  addForm.addEventListener('submit', async function(ev){
    ev.preventDefault();
    addError.style.display = 'none';
    addError.textContent = '';

    var title = addTitle.value.trim();
    if (!title) { addError.textContent = 'Title is required'; addError.style.display = ''; return; }

    var data = new FormData(addForm);

    try {
      var res = await fetch('<?= base_url('gallery/add') ?>', { method: 'POST', body: data });
      var json = await res.json();
      if (!json.success) {
        addError.textContent = json.message || 'Failed to add item';
        addError.style.display = '';
        return;
      }

      // Build new card and append to row
      var row = document.querySelector('.row.g-2');
      if (row) {
        var imgSrc = json.imgSrc ? json.imgSrc : '<?= IMG . "Default-Profile.jpg" ?>';
        var cardHtml = '' +
          '<div class="col-sm-6 col-lg-4" style="position: absolute;">' +
            '<div class="card">' +
              '<div class="d-flex justify-content-end pb-2">' +
                '<button type="button" class="btn btn-outline-secondary border-0 btn-edit" data-id="' + json.id + '" title="Edit">' +
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">' +
                    '<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>' +
                    '<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>' +
                  '</svg>' +
                '</button>' +
                '<button type="button" class="btn btn-outline-danger border-0 btn-delete" data-id="' + json.id + '" title="Delete">' +
                  '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">' +
                    '<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>' +
                  '</svg>' +
                '</button>' +
              '</div>' +
              '<img class="card-img-top" src="' + imgSrc + '" alt="' + (json.title ? json.title.replace(/"/g, '\\"') : 'Artwork') + '">' +
              '<div class="card-body">' +
                '<h5 class="card-title" data-gallery-id="' + json.id + '">' + (json.title ? json.title : '') + '</h5>' +
              '</div>' +
            '</div>' +
          '</div>';
        // insert before the add-card (which is the last col); we'll append at end
        // insert HTML and get the new column element
        var before = row.lastElementChild;
        row.insertAdjacentHTML('beforeend', cardHtml);
        var newBtnEdit = row.querySelector('.btn-edit[data-id="' + json.id + '"]');
        var newBtnDelete = row.querySelector('.btn-delete[data-id="' + json.id + '"]');
        var newCol = null;
        if (newBtnEdit) newCol = newBtnEdit.closest('.col-sm-6') || newBtnEdit.closest('.col-lg-4');
        if (!newCol && newBtnDelete) newCol = newBtnDelete.closest('.col-sm-6') || newBtnDelete.closest('.col-lg-4');

        // bind handlers for new buttons
        if (newBtnEdit) bindEditButton(newBtnEdit);
        if (newBtnDelete) bindDeleteButton(newBtnDelete);

        // If Masonry is available, add the new element and layout after its image loads
        if (window._msnry && newCol) {
          imagesLoadedFallback(newCol, function(){
            try {
              window._msnry.appended(newCol);
              window._msnry.layout();
            } catch (e) {
              // fallback: reload items
              try { window._msnry.reloadItems(); window._msnry.layout(); } catch (e2) {}
            }
          });
        }
      }

      if (addModal) addModal.hide();
    } catch (err) {
      console.error(err);
      addError.textContent = 'Network error';
      addError.style.display = '';
    }
  });

  // Initialize Masonry on the grid after images are loaded
  var grid = document.querySelector('.row.g-2');
  if (grid) {
    waitForMasonry(function(err){
      if (err) return; // masonry not available, nothing else to do
      try {
        // initialize Masonry and store a global reference for other handlers
        window._msnry = new Masonry(grid, {
          itemSelector: '.col-sm-6.col-lg-4',
          percentPosition: true,
          transitionDuration: '0.2s'
        });

        // ensure layout after all images inside grid are ready
        imagesLoadedFallback(grid, function(){ window._msnry.layout(); });
      } catch (e) {
        console.warn('Failed to init Masonry', e);
      }
    });
  }

});
</script>

<?= $this->endSection('pageContents') ?>

