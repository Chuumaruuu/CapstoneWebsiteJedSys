<?php
use App\Models\ReviewModel;

$model = new ReviewModel();
$reviews = $model->orderBy('created_at', 'DESC')->findAll();

// determine if current user is admin to show delete buttons
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

$counts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
$total = 0;
$totalScore = 0;

foreach ($reviews as $r) {
    $rating = (int) $r['rating'];
    if (isset($counts[$rating])) {
        $counts[$rating]++;
    }
    $total++;
    $totalScore += $rating;
}

$average = $total > 0 ? round($totalScore / $total, 1) : 0;

function percentage($count, $total) {
  return $total > 0 ? round(($count / $total) * 100) : 0;
}
?>

<!-- Rating summary -->
<div class="rating-summary">
  <div class="rating-overview">
    <div class="average-rating pb-3">
      <div class="avg-stars">
        <?php
        echo $average . "  ";
        $fullStars = floor($average);
        $halfStar = ($average - $fullStars) >= 0.5 ? 1 : 0;
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $fullStars) echo "★";
          elseif ($halfStar && $i == $fullStars + 1) echo "☆";
          else echo "☆";
        }
        ?>
      </div>
      <p><?php echo $total; ?> Reviews in Total</p>
    </div>

<hr>

<!-- Reviews list (cards with client-side pagination: 6 per page -> 3 columns x 2 rows) -->
<?php if (! empty($reviews)): ?>
  <div class="row g-4" id="reviewsGrid">
  <?php foreach ($reviews as $row):
    $date = date("Y-m-d", strtotime($row['created_at']));
    $imgSrc = !empty($row['image']) ? base_url('uploads/avatars/' . $row['image']) : IMG . 'Default-Profile.jpg';
  ?>
    <div class="col-md-4 review-card-item" data-id="<?= esc($row['id']) ?>">
      <div class="card h-100">
        <div class="card-body d-flex flex-column">
          <div class="d-flex align-items-center mb-2">
            <img src="<?= esc($imgSrc) ?>" alt="avatar" class="rounded-circle me-2" style="width:48px;height:48px;object-fit:cover;">
            <div>
              <strong><?= htmlspecialchars($row['username']) ?></strong>
              <div class="text-muted small"><?= $date ?></div>
            </div>
          </div>

          <div class="mb-2">
            <span class="text-warning"><?= str_repeat('★', $row['rating']) . str_repeat('☆', 5 - $row['rating']) ?></span>
          </div>

          <p class="card-text flex-grow-1"><?= htmlspecialchars($row['comment']) ?></p>

          <?php if ($isAdmin): ?>
            <div class="mt-2 text-end">
              <button type="button" class="btn btn-sm btn-danger btn-delete-review" data-id="<?= esc($row['id'], ENT_QUOTES) ?>">Delete</button>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

  <!-- Pagination controls -->
  <nav aria-label="Reviews pagination" class="mt-4">
    <ul class="pagination justify-content-center" id="reviewsPagination"></ul>
  </nav>

<?php else: ?>
  <p>No reviews yet.</p>
<?php endif; ?>
<!-- Delete Review Modal -->
<div class="modal fade" id="deleteReviewModal" tabindex="-1" aria-labelledby="deleteReviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="deleteReviewForm" method="post" action="">
        <?= csrf_field() ?>
        <div class="modal-header">
          <h5 class="modal-title" id="deleteReviewModalLabel">Delete Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this review?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // prepare bootstrap modal
  var modalEl = document.getElementById('deleteReviewModal');
  var deleteModal = null;
  if (typeof bootstrap !== 'undefined' && modalEl) {
    deleteModal = new bootstrap.Modal(modalEl, { keyboard: true });
  }

  // base URL for delete action (server-side generated)
  var baseDeleteUrl = '<?= rtrim(base_url('reviews/delete'), '\\/') ?>';

  // attach click handlers to delete buttons (works for current DOM and future shown items)
  function attachDeleteHandlers() {
    document.querySelectorAll('.btn-delete-review').forEach(function(btn){
      btn.removeEventListener('click', btn._delHandler);
      var handler = function(){
        var id = this.dataset.id;
        var form = document.getElementById('deleteReviewForm');
        if (form) {
          form.action = baseDeleteUrl + '/' + encodeURIComponent(id);
        }
        if (deleteModal) deleteModal.show();
      };
      btn.addEventListener('click', handler);
      btn._delHandler = handler;
    });
  }

  attachDeleteHandlers();

  // --- Pagination logic for reviews ---
  (function(){
    var itemsPerPage = 6; // 3 columns x 2 rows
    var container = document.getElementById('reviewsGrid');
    if (!container) return;
    var items = Array.prototype.slice.call(container.querySelectorAll('.review-card-item'));
    var paginationEl = document.getElementById('reviewsPagination');
    var totalItems = items.length;
    var totalPages = Math.max(1, Math.ceil(totalItems / itemsPerPage));
    var currentPage = 1;

    function renderPage(page) {
      currentPage = page;
      var start = (page - 1) * itemsPerPage;
      var end = start + itemsPerPage;
      items.forEach(function(it, idx){
        if (idx >= start && idx < end) it.style.display = '';
        else it.style.display = 'none';
      });
      renderPagination();
    }

    function renderPagination() {
      if (!paginationEl) return;
      paginationEl.innerHTML = '';

      var createPageItem = function(label, page, disabled, active) {
        var li = document.createElement('li');
        li.className = 'page-item' + (disabled ? ' disabled' : '') + (active ? ' active' : '');
        var a = document.createElement('a');
        a.className = 'page-link';
        a.href = '#';
        a.textContent = label;
        a.addEventListener('click', function(e){
          e.preventDefault();
          if (disabled) return;
          renderPage(page);
        });
        li.appendChild(a);
        return li;
      };

      // Prev
      paginationEl.appendChild(createPageItem('Previous', Math.max(1, currentPage - 1), currentPage === 1, false));

      // page numbers (limit displayed count if many pages)
      var maxVisible = 5;
      var startPage = Math.max(1, currentPage - Math.floor(maxVisible / 2));
      var endPage = Math.min(totalPages, startPage + maxVisible - 1);
      if (endPage - startPage < maxVisible - 1) {
        startPage = Math.max(1, endPage - maxVisible + 1);
      }

      for (var p = startPage; p <= endPage; p++) {
        paginationEl.appendChild(createPageItem(p, p, false, p === currentPage));
      }

      // Next
      paginationEl.appendChild(createPageItem('Next', Math.min(totalPages, currentPage + 1), currentPage === totalPages, false));
    }

    // initialize
    renderPage(1);
  })();
});
</script>
