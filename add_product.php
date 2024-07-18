<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Product</title>
  <style>
    /* Reset and Global Styles */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    body {
      font-family: 'Arial', sans-serif; /* Changed font to Arial */
      background-color: #f6d75e; /* Retained original background color */
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      width: 100%;
      max-width: 600px;
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: #333;
      text-align: center;
      margin-bottom: 30px;
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
    h2 a {
      display: block;
      text-align: center;
      color: #4CAF50;
      text-decoration: none;
      font-size: 18px;
      margin-top: 20px;
    }
    h2 a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Add New Product</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="name">Product Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="price">Price (₱):</label>
    <input type="float" id="price" name="price" required>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
      <option value="Beverage">Beverage</option>
      <option value="Pastry">Pastry</option>
    </select>


    <label for="availability">Availability:</label>
    <select id="availability" name="availability" required>
      <option value="1">Available</option>
      <option value="0">Not Available</option>
    </select>

    <input type="submit" value="Add Product">
  </form>

  <?php
  // Database connection
  require_once("dbConnection.php");

// Form handling and data insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $price = mysqli_real_escape_string($mysqli, $_POST['price']);
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);
    $availability = mysqli_real_escape_string($mysqli, $_POST['availability']);

    // Validate and sanitize inputs (example validations)
    if (!is_numeric($price) || $price <= 0) {
        echo "<p class='error-message'>Error: Price must be a valid positive number.</p>";
    } else {
        // Check if the product name already exists
        $check_query = "SELECT * FROM products WHERE Name = '$name'";
        $result = mysqli_query($mysqli, $check_query);
        
        if (mysqli_num_rows($result) > 0) {
            // Product name already exists
            echo "<p class='error-message'>Error: Product with name '$name' already exists.</p>";
        } else {
            // Insert query
            $insert_query = "INSERT INTO products (Name, Price, Category, Availability) VALUES ('$name', '$price','$category', '$availability')";

            if (mysqli_query($mysqli, $insert_query)) {
                echo "<p class='success-message'>New product added successfully.</p>";
            } else {
                echo "<p class='error-message'>Error: " . mysqli_error($mysqli) . "</p>";
            }
        }
    }
}
?>

  <h2><a href="product.php">Back to Products Dashboard</a></h2>
</div>

</body>
</html>
