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

<!-- Reviews list -->
<?php
if (! empty($reviews)) {
  foreach ($reviews as $row) {
    $date = date("Y-m-d", strtotime($row['created_at'])); // Format date only

  echo "<div class='review my-5'>";
  echo "<div class='review-header d-flex align-items-center my-2'>";
  // profile image (if available) - use uploads/avatars/<filename> or default image
  $imgSrc = !empty($row['image']) ? base_url('uploads/avatars/' . $row['image']) : IMG . 'Default-Profile.jpg';
  echo "<img src='" . esc($imgSrc) . "' alt='avatar' class='rounded-circle me-2' style='width:40px;height:40px;object-fit:cover;'>";
  echo "<strong class='me-2'>" . htmlspecialchars($row['username']) . "</strong> ";
  echo "</div>";
  echo "<span class='stars'>" . str_repeat("★", $row['rating']) . str_repeat("☆", 5 - $row['rating']) . "</span>";
    echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
    echo "<p>$date</p>";  // Only date shown here
      // if admin, show delete button which opens a modal confirmation
  if ($isAdmin) {
    // the modal form will post to reviews/delete/{id}
    echo "<div class='d-grid gap-2 d-md-flex justify-content-md-end'>";
    echo "<button type='button' class='btn btn-sm btn-danger me-md-2 btn-delete-review' data-id='" . htmlspecialchars($row['id'], ENT_QUOTES) . "'>Delete</button>";
    echo "</div>";
  }
    echo "</div>";
  }
} else {
  echo "<p>No reviews yet.</p>";
}
?>

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

  // attach click handlers to delete buttons
  document.querySelectorAll('.btn-delete-review').forEach(function(btn){
    btn.addEventListener('click', function(){
      var id = this.dataset.id;
      var form = document.getElementById('deleteReviewForm');
      if (form) {
        form.action = baseDeleteUrl + '/' + encodeURIComponent(id);
      }
      if (deleteModal) deleteModal.show();
    });
  });
});
</script>
