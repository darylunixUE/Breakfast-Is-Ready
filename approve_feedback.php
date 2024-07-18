<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

// Approve the feedback
$sql = "UPDATE reviews SET approved = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    
}

$stmt->close();
$conn->close();

// Redirect back to admin.php after approval
header("Location: admin.php");
exit;
?>
