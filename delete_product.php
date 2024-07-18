<?php
// Database connection
require_once("dbConnection.php");

// Check if ID parameter is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // Delete product from database
    $delete_query = "DELETE FROM products WHERE Id = '$id'";

    if (mysqli_query($mysqli, $delete_query)) {
        // Redirect to product.php after deletion
        header("Location: product.php");
        exit();
    } else {
        echo "Error deleting product: " . mysqli_error($mysqli);
    }
} else {
    echo "Invalid request. Please provide a valid product ID.";
}
?>
