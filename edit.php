<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$fullname = $resultData['full_name'];
$email = $resultData['email_address'];
$username = $resultData['username'];
$password = $resultData['password'];
$phoneno = $resultData['phone_number'];
$birthdate = $resultData['birth_date'];
$address = $resultData['address'];
$gender = $resultData['gender'];
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <p>
	    <a href="index.php">Home</a>
    </p>
	
	<form name="edit" method="post" action="editAction.php">
		<table border="0">
			<tr> 
				<td>Full Name</td>
				<td><input type="text" name="fullname" value="<?php echo $fullname; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>Username</td>
				<td><input type="text" name="username" value="<?php echo $username; ?>"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="text" name="password" value="<?php echo $password; ?>"></td>
			</tr>
			<tr> 
				<td>Phone No</td>
				<td><input type="text" name="phone" value="<?php echo $phoneno; ?>"></td>
			</tr>
			<tr> 
				<td>Birth Date</td>
				<td><input type="text" name="birthdate" value="<?php echo $birthdate; ?>"></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="address" value="<?php echo $address; ?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="gender" value="<?php echo $gender; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>