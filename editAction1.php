<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$phoneno = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$products = mysqli_real_escape_string($mysqli, $_POST['products']);
	$total = mysqli_real_escape_string($mysqli, $_POST['total']);
	$payment = mysqli_real_escape_string($mysqli, $_POST['payment']);
	$status = mysqli_real_escape_string($mysqli, $_POST['status']);
	
	// Check for empty fields
	if (empty($name) || empty($email) || empty($phoneno) || empty($products) || empty($total) || empty($payment) || empty($status)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if (empty($phoneno)) {
			echo "<font color='red'>Phone No. field is empty.</font><br/>";
		}
		
		if (empty($products)) {
			echo "<font color='red'>Products field is empty.</font><br/>";
		}
		
		if (empty($total)) {
			echo "<font color='red'>Total field is empty.</font><br/>";
		}

		if (empty($payment)) {
			echo "<font color='red'>Payment field is empty.</font><br/>";
		}

		if (empty($status)) {
			echo "<font color='red'>Status field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE transactions SET name = '$name', email = '$email', phoneno = '$phoneno', products = '$products', total = '$total', payment = '$payment', status = '$status' WHERE id = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}