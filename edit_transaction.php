<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Status</title>
  <style>
    /* Reset and Global Styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f6d75e;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      max-width: 600px;
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }
    form {
      display: grid;
      gap: 20px;
    }
    label {
      font-weight: bold;
      color: #555;
    }
    select, input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    input[type="submit"]:hover {
      opacity: 0.8;
    }
    p.error-message {
      color: red;
      margin-top: 10px;
    }
    p.success-message {
      color: green;
      margin-top: 10px;
    }
    a {
      display: block;
      text-align: center;
      color: #4CAF50;
      text-decoration: none;
      font-size: 18px;
      margin-top: 20px;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Edit Status</h2>

  <?php
  // Database connection
  require_once("dbConnection.php");

  // Check if ID parameter is provided in the URL
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // Retrieve transaction details from database
    $query = "SELECT * FROM transactions WHERE transactionID = '$id'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $paymentMode = $row['payment'];
      $status = $row['status'];

      // Display edit form
      echo '
      <form action="' . $_SERVER['PHP_SELF'] . '?id=' . $id . '" method="POST">
        <label for="payment">Payment Mode:</label>
        <select id="payment" name="payment" required>
          <option value="GCASH" ' . ($paymentMode == 'GCASH' ? 'selected' : '') . '>GCASH</option>
          <option value="Cash-on-Delivery" ' . ($paymentMode == 'Cash-on-Delivery' ? 'selected' : '') . '>Cash-on-Delivery</option>
        </select>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
          <option value="Pending" ' . ($status == 'Pending' ? 'selected' : '') . '>Pending</option>
          <option value="Approved" ' . ($status == 'Approved' ? 'selected' : '') . '>Approved</option>
          <option value="Declined" ' . ($status == 'Declined' ? 'selected' : '') . '>Declined</option>
        </select>

        <input type="submit" value="Update Transaction">
      </form>
      ';

      // Update transaction in database upon form submission
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $paymentMode = mysqli_real_escape_string($mysqli, $_POST['payment']);
        $status = mysqli_real_escape_string($mysqli, $_POST['status']);

        // Update query
        $update_query = "UPDATE transactions SET payment = '$paymentMode', status = '$status' WHERE transactionID = '$id'";

        if (mysqli_query($mysqli, $update_query)) {
          echo "<p class='success-message'>Transaction updated successfully.</p>";
          // Redirect to transaction list after update
          echo '<script>window.location.href = "transaction.php";</script>';
        } else {
          echo "<p class='error-message'>Error updating transaction: " . mysqli_error($mysqli) . "</p>";
        }
      }
    } else {
      echo "<p>No transaction found with ID: " . htmlspecialchars($id) . "</p>";
    }
  } else {
    echo "<p>Invalid request. Please provide a valid transaction ID.</p>";
  }
  ?>

  <a href="transaction.php">Back to Transaction List</a>
</div>

</body>
</html>
