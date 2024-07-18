<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
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
    input[type="text"], select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
    }
    select {
      appearance: none;
      padding-right: 30px;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23333"><path d="M7 10l5 5 5-5z"/></svg>');
      background-repeat: no-repeat;
      background-position: right 10px top 50%;
      background-size: 20px;
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
  <h2>Edit Product</h2>

  <?php
  // Database connection
  require_once("dbConnection.php");

  // Check if ID parameter is provided in the URL
  if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);

    // Retrieve product details from database
    $query = "SELECT * FROM products WHERE Id = '$id'";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      $name = $row['Name'];
      $price = $row['Price'];
      $category = $row['Category'];
      $availability = $row['Availability'];

      // Display edit form
      echo '
      <form action="' . $_SERVER['PHP_SELF'] . '?id=' . $id . '" method="POST">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="' . htmlspecialchars($name) . '" required>

        <label for="price">Price (₱):</label>
        <input type="text" id="price" name="price" value="' . htmlspecialchars($price) . '" required>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
          <option value="Beverage" ' . ($category == 'Beverage' ? 'selected' : '') . '>Beverage</option>
          <option value="Pastry" ' . ($category == 'Pastry' ? 'selected' : '') . '>Pastry</option>
        </select>

        <label for="availability">Availability:</label>
        <select id="availability" name="availability" required>
          <option value="1" ' . ($availability == 1 ? 'selected' : '') . '>Available</option>
          <option value="0" ' . ($availability == 0 ? 'selected' : '') . '>Not Available</option>
        </select>

        <input type="submit" value="Update Product">
      </form>
      ';

      // Update product in database upon form submission
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $price = mysqli_real_escape_string($mysqli, $_POST['price']);
        $category = mysqli_real_escape_string($mysqli, $_POST['category']);
        $availability = mysqli_real_escape_string($mysqli, $_POST['availability']);

        // Validate and update query
        if (!is_numeric($price) || $price <= 0) {
          echo "<p class='error-message'>Error: Price must be a valid positive number.</p>";
        } else {
          // Check if the updated product name already exists (excluding current product)
          $check_query = "SELECT * FROM products WHERE Name = '$name' AND Id != '$id'";
          $result = mysqli_query($mysqli, $check_query);
          
          if (mysqli_num_rows($result) > 0) {
              // Product name already exists
              echo "<p class='error-message'>Error: Product with name '$name' already exists.</p>";
          } else {
              $update_query = "UPDATE products SET Name = '$name', Price = '$price', Category = '$category', Availability = '$availability' WHERE Id = '$id'";

              if (mysqli_query($mysqli, $update_query)) {
                echo "<p class='success-message'>Product updated successfully.</p>";
                // Redirect to product.php after update
                echo '<script>window.location.href = "product.php";</script>';
              } else {
                echo "<p class='error-message'>Error updating product: " . mysqli_error($mysqli) . "</p>";
              }
          }
        }
      }
    } else {
      echo "<p>No product found with ID: " . htmlspecialchars($id) . "</p>";
    }
  } else {
    echo "<p>Invalid request. Please provide a valid product ID.</p>";
  }
  ?>

  <a href="product.php">Back to Products Dashboard</a>
</div>

</body>
</html>
