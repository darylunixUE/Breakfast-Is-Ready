<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #FFDB58;
            font-family: "Quicksand", sans-serif;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
        }
        .card {
            border-color: #ffc107;
        }
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-primary:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }
        .header-image {
            position: absolute;
            top: 10px;
            left: 10px;
        }
    .form .usertype-box {
      margin-top: 20px;
    }
    .usertype-box h3 {
      color: #333;
      font-size: 1rem;
      font-weight: 400;
      margin-bottom: 8px;
    }
    .form :where(.usertype-option, .usertype) {
      display: flex;
      align-items: center;
      column-gap: 20px;
      flex-wrap: wrap;
    }
    .form .usertype {
      column-gap: 5px;
    }
    .usertype input {
      accent-color: rgb(130, 106, 251);
    }
    .form :where(.usertype input, .usertype label) {
      cursor: pointer;
    }
    .usertype label {
      color: #707070;
    }
    </style>
</head>
<body>
    <div class="header-image">
        <img src="logo.jpg" alt="Logo" width="150" height="150">
    </div>
    <div class="login-container">
        <div class="card">
            <?php 
            include("dbConnection.php");

            if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($mysqli, $_POST['email']);
                $password = mysqli_real_escape_string($mysqli, $_POST['pass']);

                $sql = "SELECT * FROM admins WHERE admin_email = '$email'";
                $result = mysqli_query($mysqli, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

                if($user){
                    if($user['admin_email'] == $email && $user['admin_pass'] == $password){
                        session_start();
                        $_SESSION["user"] = "yes";
                        header("Location: Admin Portal.html");
                        die();
                    }else{
                        echo "<div class='alert alert-danger'>Password does not match</div> <br>";
                    }
                }
                else{
                    echo "<div class='alert alert-danger'>Email does not match</div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                }
            }
            ?>

            <div class="card-body">
                <h5 class="card-title text-center">Admin Login</h5>
                <div id="alertBox" class="alert alert-warning d-none" role="alert">
                    Please fill in all fields!
                </div>
                <form name="form" action="AdminLogin.php" method="POST">
                    <div class="form-group">
                        <label for="username">Email*</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        <div class="invalid-feedback">Please enter your Email.</div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password*</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter your Password" required>
                        <div class="invalid-feedback">Please enter your Password.</div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" id="btn" name="submit">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
