<?php
header('Content-Type: application/json');

// Include the database connection file
require_once("dbConnection.php");

// Fetch products data
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE Availability = 1 ORDER BY id ASC");

$products = array();

while ($res = mysqli_fetch_assoc($result)) {
    $products[] = $res;
}

echo json_encode($products);
?>
