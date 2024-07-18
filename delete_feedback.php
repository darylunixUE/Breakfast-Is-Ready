<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "website_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

// Remove the feedback
$sql = "DELETE FROM reviews WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

$stmt->execute();
$stmt->close();
$conn->close();

header("Location: admin.php");
exit;
?>
