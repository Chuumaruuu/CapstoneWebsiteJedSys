<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reviews_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$username = $conn->real_escape_string($_POST['username']);
$rating = (int) $_POST['rating'];
$comment = $conn->real_escape_string($_POST['comment']);

// Insert review
$sql = "INSERT INTO reviews (username, rating, comment) VALUES ('$username', '$rating', '$comment')";

if ($conn->query($sql) === TRUE) {
    // Redirect back to the reviews page
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
