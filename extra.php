<?php
    include("dbConnection.php");
    if(isset($_POST['submit'])){
      $fullname = $_POST['fullname'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $phone_no = $_POST['phone'];
      $birthdate = $_POST['birthdate'];
      $address = $_POST['address'];
      $gender = $_POST['gender'];

      $verify_query = mysqli_query($mysqli, "SELECT email_address from users WHERE email_address='$email'");

      if (mysqli_num_rows($verify_query) != 0){
        echo "<div class='message'>
                <p>This email already exists! Try another email.</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
      } else {
        mysqli_query($mysqli, "INSERT INTO users(full_name,email_address,username,password,phone_number,birth_date,address,gender) VALUES ('$fullname','$email','$username','$password','$phone_no','$birthdate','$address','$gender')") or die("Error Occurred");

        echo "<div class='message'>
                <p>Registered Successfully!</p>
              </div> <br>";
        echo "<a href='adminL.php'><button class='btn'>Login Now</button></a>";
      }
    } else {
  ?>

<?php } ?>