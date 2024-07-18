<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT rating, feedback FROM reviews WHERE approved = 1 ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

$approvedFeedback = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $approvedFeedback[] = $row;
    }
}

$conn->close();


header('Content-Type: application/json');
echo json_encode($approvedFeedback);
?>
