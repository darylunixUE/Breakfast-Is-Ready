<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$fullname = mysqli_real_escape_string($mysqli, $_POST['full_name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email_address']);
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$phoneno = mysqli_real_escape_string($mysqli, $_POST['phone_number']);
	$birthdate = mysqli_real_escape_string($mysqli, $_POST['birth_date']);
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
			echo "<font color='red'>Phone Number field is empty.</font><br/>";
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

		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO users (full_name,email_address,username,password,phone_number,birth_date,address,gender) VALUES ('$fullname', '$email', '$username','$password','$phoneno','$birthdate','$address','$gender')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>