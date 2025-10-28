<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reviews_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch all reviews
$reviews = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");

// Get rating counts
$countQuery = $conn->query("SELECT rating, COUNT(*) as count FROM reviews GROUP BY rating");
$counts = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0];
$total = 0;
$totalScore = 0;

while ($row = $countQuery->fetch_assoc()) {
  $counts[$row['rating']] = $row['count'];
  $total += $row['count'];
  $totalScore += $row['rating'] * $row['count'];
}

$average = $total > 0 ? round($totalScore / $total, 1) : 0;

// Function to calculate percentage for each star
function percentage($count, $total) {
  return $total > 0 ? round(($count / $total) * 100) : 0;
}
?>

<!-- Rating summary -->
<div class="rating-summary">
  <div class="rating-overview">
    <div class="average-rating">
      <span class="avg-number"><?php echo $average; ?></span>
      <div class="avg-stars">
        <?php
        $fullStars = floor($average);
        $halfStar = ($average - $fullStars) >= 0.5 ? 1 : 0;
        for ($i = 1; $i <= 5; $i++) {
          if ($i <= $fullStars) echo "★";
          elseif ($halfStar && $i == $fullStars + 1) echo "☆";
          else echo "☆";
        }
        ?>
      </div>
      <p><?php echo $total; ?> Reviews</p>
    </div>

    <div class="bars-section">
      <?php for ($i = 5; $i >= 1; $i--): ?>
        <div class="bar-row">
          <span class="star-label"><?php echo $i; ?> ★</span>
          <div class="bar">
            <div class="fill" style="width: <?php echo percentage($counts[$i], $total); ?>%;"></div>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>

<hr>

<!-- Reviews list -->
<?php
if ($reviews->num_rows > 0) {
  while ($row = $reviews->fetch_assoc()) {
    $date = date("Y-m-d", strtotime($row['created_at'])); // Format date only

    echo "<div class='review'>";
    echo "<div class='review-header'>";
    echo "<strong>" . htmlspecialchars($row['username']) . "</strong> ";
    echo "<span class='stars'>" . str_repeat("★", $row['rating']) . str_repeat("☆", 5 - $row['rating']) . "</span>";
    echo "</div>";
    echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
    echo "<small>$date</small>";  // 👈 Only date shown here
    echo "</div>";
  }
} else {
  echo "<p>No reviews yet.</p>";
}


$conn->close();
?>
