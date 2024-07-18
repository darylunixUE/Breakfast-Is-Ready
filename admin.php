<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Feedback Review</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      background-color: #f0f0f0;
    }

    header {
      background-color: #F7DA57;
      color: #333;
      text-align: center;
      padding: 1rem;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid #ccc;
    }

    th, td {
      padding: 1rem;
      text-align: left;
    }

    th {
      background-color: #F7DA57;
      color: #333;
    }

    form {
      display: inline;
    }

    input[type="submit"] {
      padding: 0.5rem 1rem;
      background-color: #F7DA57;
      color: #333;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    input[type="submit"]:hover {
      background-color: #e0c054;
    }

    .approved {
      background-color: #28a745;
      color: #fff;
    }

    .approved:hover {
      background-color: #218838;
    }

    .deleted {
      background-color: #dc3545;
      color: #fff;
    }

    .deleted:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
<header>
  <h1>Admin Feedback Review</h1>
</header>

<div class="container">
  <h2>Pending Feedback</h2>
  <table>
    <tr>
      <th>Rating</th>
      <th>Feedback</th>
      <th>Actions</th>
    </tr>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, rating, feedback FROM reviews WHERE approved = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                        <td>" . $row['rating'] . "</td>
                        <td>" . $row['feedback'] . "</td>
                        <td>
                            <form action='approve_feedback.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='submit' value='Approve' class='approved'>
                            </form>
                            <form action='delete_feedback.php' method='POST'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='submit' value='Delete' class='deleted'>
                            </form>
                        </td>
                    </tr>";
      }
    } else {
      echo "<tr><td colspan='3'>No feedback found.</td></tr>";
    }

    $conn->close();
    ?>
  </table>
</div>
</body>
</html>
