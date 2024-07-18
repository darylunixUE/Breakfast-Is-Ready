<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM transactions WHERE transactionID = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$email = $resultData['email'];
$phoneno = $resultData['phone'];
$products = $resultData['products'];
$total = $resultData['total'];
$payment = $resultData['payment'];
$status = $resultData['status'];
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <p>
	    <a href="transaction.php">Home</a>
    </p>
	
	<form name="edit" method="post" action="editAction1.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>Phone No.</td>
				<td><input type="text" name="phone" value="<?php echo $phoneno; ?>"></td>
			</tr>
			<tr> 
				<td>Products</td>
				<td><input type="text" name="products" value="<?php echo $products; ?>"></td>
			</tr>
			<tr> 
				<td>Total</td>
				<td><input type="text" name="total" value="<?php echo $total; ?>"></td>
			</tr>
			<tr> 
				<td>Payment</td>
				<td><input type="text" name="payment" value="<?php echo $payment; ?>"></td>
			</tr>
			<tr> 
				<td>Status</td>
				<td><input type="text" name="status" value="<?php echo $status; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>