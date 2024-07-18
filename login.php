<?php

require_once("dbConnection.php");


if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    $sql = "select * from users where email_address = '$email'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if($row){
        if(password_verify($password, $row["password"])){
            header("Location: fp2.html");
        }
    }
    else{
        echo '<script>
                alert("Invalid email or password!!");
                window.location.href = "adminL.html";
            </script>';
        }

    if ($mysqli->connect_error) {
        die("Connection Failed: " . $mysqli->connect_error);
    }


    $mysqli->close();
}
?>
