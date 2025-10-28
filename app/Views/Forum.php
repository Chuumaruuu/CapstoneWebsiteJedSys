<?php
// Start the session at the very top, before ANY HTML
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App Reviews</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <main>
    <div class="container">
      <section class="review-section">
        <h2>Rate this App</h2>
        <p>Tell others what you think!</p>

        <?php if ($username): ?>
          <form action="submit_review.php" method="POST" class="rating-form">
            <div class="stars">
              <input type="radio" id="star5" name="rating" value="5" required><label for="star5">★</label>
              <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
              <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
              <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
              <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
            </div>

            <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
            <p class="welcome-text">Reviewing as <strong><?php echo htmlspecialchars($username); ?></strong></p>

            <textarea name="comment" placeholder="Write your review..." required></textarea>
            <button type="submit">Submit Review</button>
          </form>
        <?php else: ?>
          <p>Please <a href="login.php">log in</a> to leave a review.</p>
        <?php endif; ?>

        <hr>

        <div id="reviews">
          <?php include 'load_reviews.php'; ?>
        </div>
      </section>
    </div>
  </main>
</body>

</html>
