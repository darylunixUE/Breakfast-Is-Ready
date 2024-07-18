<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$rating = $_POST['rating'];
$feedback = $_POST['feedback'];
$approved = 0; 

$sql = "INSERT INTO reviews (rating, feedback, approved, created_at) VALUES (?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $rating, $feedback, $approved);

if ($stmt->execute()) {
    $deleteOldestSql = "DELETE FROM reviews WHERE approved = 1 ORDER BY created_at ASC LIMIT 1";
    $conn->query($deleteOldestSql);
}
$stmt->close();
$conn->close();
?>
