<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$fullname = mysqli_real_escape_string($mysqli, $_POST['fullname']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$phoneno = mysqli_real_escape_string($mysqli, $_POST['phone']);
	$birthdate = mysqli_real_escape_string($mysqli, $_POST['birthdate']);
	$address = mysqli_real_escape_string($mysqli, $_POST['address']);
	$gender = mysqli_real_escape_string($mysqli, $_POST['gender']);	
	
	// Check for empty fields
	if (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($phoneno) || empty($birthdate) || empty($address) || empty($gender)) {
		if (empty($fullname)) {
			echo "<font color='red'>Full Name field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if (empty($username)) {
			echo "<font color='red'>Username field is empty.</font><br/>";
		}
		
		if (empty($password)) {
			echo "<font color='red'>Password field is empty.</font><br/>";
		}
		
		if (empty($phoneno)) {
			echo "<font color='red'>Phone No. field is empty.</font><br/>";
		}

		if (empty($birthdate)) {
			echo "<font color='red'>Birthdate field is empty.</font><br/>";
		}

		if (empty($address)) {
			echo "<font color='red'>Address field is empty.</font><br/>";
		}

		if (empty($gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE users SET full_name = '$fullname', email_address = '$email', username = '$username', password = '$password', phone_number = '$phoneno', birth_date = '$birthdate', address = '$address', gender = '$gender' WHERE id = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}