<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction List</title>
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
    }
    .container {
      max-width: 1000px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow-x: auto; /* Enable horizontal scrolling if necessary */
    }
    h2 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }
    /* Table Styles */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
      white-space: nowrap; /* Prevent text wrapping */
    }
    th {
      background-color: #f6d75e;
      font-weight: bold;
      color: #333;
      text-transform: uppercase;
    }
    td {
      color: #666;
    }
    /* Action Links */
    .action-links {
      display: inline-block;
      padding: 6px 12px;
      margin-right: 6px;
      border-radius: 4px;
      color: #fff;
      text-decoration: none;
      transition: background-color 0.3s;
    }
    .action-links:hover {
      opacity: 0.8;
    }
    .edit-link {
      background-color: #2196F3;
    }
    .delete-link {
      background-color: #f44336;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Transaction List</h2>
  <div style="overflow-x:auto;">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Date & Time</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Products</th>
          <th>Total</th>
          <th>Payment</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Include the database connection file
        require_once("dbConnection.php");

        // Fetch data from the transactions table ordered by TransactionID DESC
        $result = mysqli_query($mysqli, "SELECT * FROM transactions ORDER BY transactionID DESC");

        // Fetch the next row of a result set as an associative array
        while ($res = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>".$res['transactionID']."</td>";
          echo "<td>".$res['transactionTime']."</td>";
          echo "<td>".$res['name']."</td>";
          echo "<td>".$res['email']."</td>";
          echo "<td>".$res['phone']."</td>";
          echo "<td>".$res['products']."</td>";
          echo "<td>".$res['total']."</td>";
          echo "<td>".$res['payment']."</td>";
          echo "<td>".$res['status']."</td>";
          echo "<td>
                <a href=\"edit_transaction.php?id=$res[transactionID]\" class=\"action-links edit-link\">Edit Status</a>
                <a href=\"delete_transaction.php?id=$res[transactionID]\" class=\"action-links delete-link\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
              </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
