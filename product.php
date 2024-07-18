<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products Dashboard</title>
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
      max-width: 800px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
    .add-link {
      background-color: #4CAF50;
    }
    .edit-link {
      background-color: #2196F3;
    }
    .delete-link {
      background-color: #f44336;
    }
    .availability {
      font-size: 18px;
    }
    .available {
      color: green;
    }
    .not-available {
      color: red;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Products Dashboard</h2>
  <p>
    <a href="add_product.php" class="action-links add-link">Add New Product</a>
  </p>
  <table>
    <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Category</th>
      <th>Availability</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Include the database connection file
    require_once("dbConnection.php");

    // Fetch products data
    $result = mysqli_query($mysqli, "SELECT * FROM products ORDER BY id ASC");

    // Fetch the next row of a result set as an associative array
    while ($res = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$res['Id']."</td>";
      echo "<td>".$res['Name']."</td>";
      echo "<td>₱".$res['Price']."</td>";
      echo "<td>".$res['Category']."</td>";
      echo "<td class=\"Availability\">"; 
      if ($res['Availability']) {
        echo "<span class=\"available\">&#10003;</span>"; // Checkmark
      } else {
        echo "<span class=\"not-available\">X</span>"; // X symbol
      }
      echo "</td>";
      echo "<td>
                <a href=\"edit_product.php?id=$res[Id]\" class=\"action-links edit-link\">Edit</a>
                <a href=\"delete_product.php?id=$res[Id]\" class=\"action-links delete-link\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
              </td>";
      echo "</tr>";
    }
    ?>
    </tbody>
  </table>
</div>

</body>
</html>
