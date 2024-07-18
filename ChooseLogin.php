<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Login</title>
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
        .ChooseLogin-container {
            width: 100%;
            max-width: 400px;
        }
        .card {
            border-color: #ffc107;
        }
        .btn-primary {
            background-color: #ffc107;
            border-color: #ffc107;
            margin-top: 20px;
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
        a{
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header-image">
        <img src="logo.jpg" alt="Logo" width="150" height="150">
    </div>
    <div class="ChooseLogin-container">
        <div class="card">
            <div class="card-body">
                <header>
                    <center>
                        <img src="logo.jpg" alt="Company Logo" style="max-width: 100px; height: auto;">
                    </center>
                    <br>
                    <h5 class="card-title text-center">Choose Your Login</h5>
                </header>

                    <button type="submit" class="btn btn-primary btn-block" id="btn" name="submit"><a href="AdminLogin.php" style="text-decoration:none;">Admin Login</a></button>
                    <button type="submit" class="btn btn-primary btn-block" id="btn" name="submit"><a href="UserLogin.php" style="text-decoration:none;">User Login</a></button>

            </div>
        </div>
    </div>
</body>
</html>