<?php
// Include the database connection file
require_once("dbConnection.php");

// Check if form data is sent via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['customerName'];
    $email = $_POST['customerEmail'];
    $phone = $_POST['customerPhone'];
    $products = $_POST['summaryItems'];
    $total = $_POST['summaryTotalPrice'];
    $payment = $_POST['summaryPaymentMethod'];

    $status = 'Pending'; // Set initial status

    // Insert into transactions table
    $insert_query = "INSERT INTO transactions (transactionTime, name, email, phone, products, total, payment, status) 
                     VALUES (CURRENT_TIMESTAMP, '$name', '$email', '$phone', '$products', '$total', '$payment', '$status')";

    if (mysqli_query($mysqli, $insert_query)) { 
        // Success message or redirect to success page
        echo "Order placed successfully!";
    } else {
        // Error handling
        echo "Error: " . $insert_query . "<br>" . mysqli_error($mysqli);
    }
}
?>