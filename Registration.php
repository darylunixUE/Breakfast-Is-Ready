<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f6d85e;
      margin: 0;
      padding: 20px;
    }
    h2 {
      color: #333;
      text-align: center;
    }
    p {
      text-align: center;
    }
    form {
      max-width: 400px;
      margin: 0 auto;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    input[type="text"], input[type="password"], input[type="number"], input[type="date"] {
      width: calc(100% - 20px);
      padding: 8px 10px;
      margin-top: 5px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      box-sizing: border-box;
    }
    input[type="submit"] {
      background-color: #f6d85e;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    input[type="submit"]:hover {
      background-color: #e0c45f;
    }
    .container {
      position: relative;
      max-width: 700px;
      width: 100%;
      background: #fff;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      margin: 0 auto;
      font-family: 'Poppins', sans-serif;
    }
    .container header {
      font-size: 1.5rem;
      color: #333;
      font-weight: 500;
      text-align: center;
      margin-bottom: 20px;
    }
    .container .form {
      margin-top: 30px;
    }
    .form .input-box {
      width: 100%;
      margin-top: 20px;
    }
    .input-box label {
      color: #333;
    }
    .form :where(.input-box input, .select-box) {
      position: relative;
      height: 50px;
      width: 100%;
      outline: none;
      font-size: 1rem;
      color: #707070;
      margin-top: 8px;
      border: 1px solid #ddd;
      border-radius: 6px;
      padding: 0 15px;
    }
    .input-box input:focus {
      box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }
    .form .column {
      display: flex;
      column-gap: 15px;
    }
    .form .gender-box {
      margin-top: 20px;
    }
    .gender-box h3 {
      color: #333;
      font-size: 1rem;
      font-weight: 400;
      margin-bottom: 8px;
    }
    .form :where(.gender-option, .gender) {
      display: flex;
      align-items: center;
      column-gap: 50px;
      flex-wrap: wrap;
    }
    .form .gender {
      column-gap: 5px;
    }
    .gender input {
      accent-color: rgb(130, 106, 251);
    }
    .form :where(.gender input, .gender label) {
      cursor: pointer;
    }
    .gender label {
      color: #707070;
    }
    .address :where(input, .select-box) {
      margin-top: 15px;
    }
    .select-box select {
      height: 100%;
      width: 100%;
      outline: none;
      border: none;
      color: #707070;
      font-size: 1rem;
    }
    .form button {
      height: 55px;
      width: 100%;
      color: #fff;
      font-size: 1rem;
      font-weight: 400;
      margin-top: 30px;
      border: none;
      cursor: pointer;
      transition: all 0.2s ease;
      background: #f6d85e;
    }
    .form button:hover {
      background: #e0c45f;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      border-radius: 8px;
    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    .agree-checkbox {
      display: inline-block;
      margin-top: 10px;
    }
    .agree-checkbox input[type="checkbox"] {
      transform: scale(0.8);
      margin-right: 5px;
    }
    .agree-checkbox label {
      display: inline-block;
      font-size: 0.9rem;
      color: #555;
    }
    @media screen and (max-width: 500px) {
      .form .column {
        flex-wrap: wrap;
      }
      .form :where(.gender-option, .gender) {
        row-gap: 15px;
      }
    }
    #message{
      position: absolute;
      bottom: -30px;
      color: #fff;
      font-size: 15px;
      display: none;
    }
    #message1{
      position: absolute;
      bottom: -30px;
      color: #fff;
      font-size: 15px;
      display: none;
    }
    ::placeholder{
      font-size: 15px;
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
      column-gap: 50px;
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
<div class="container">
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
      echo "<a href='ChooseLogin.php'><button class='btn'>Login Now</button></a>";
    }
  } else {
?>
  <header>
    <img src="logo.jpg" alt="Company Logo" style="max-width: 100px; height: auto;">
    <br>
    Registration Form
  </header>
  <form action="Registration.php" method="post" name="add" class="form" onsubmit="return validateForm()">
    <div class="input-box">
      <label>Full Name*</label>
      <input type="text" name="fullname" placeholder="Enter full name" required maxlength="70"/>
    </div>
    <div class="input-box">
      <label>Email Address*</label>
      <input type="email" name="email" placeholder="Enter email address" required maxlength="50"/>
    </div>
    <div class="input-box">
      <label>Username*</label>
      <input type="text" name="username" placeholder="Enter username" required maxlength="15"/>
    </div>
    <div class="input-box">
      <label>Password*</label>
      <input type="password" name="password" id="password" placeholder="Enter password" required maxlength="25"/>
      <p id="message">Password is<span id="strength"></span></p>
    </div>
    <div class="input-box">
      <label>Confirm Password*</label>
      <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm password" required maxlength="25"/>
      <p id="message">Password is<span id="strength"></span></p>
    </div>
    <div class="column">
      <div class="input-box">
        <label>Phone Number*</label>
        <input type="number" name="phone" placeholder="Enter phone number" required maxlength="11"/>
      </div>
      <div class="input-box">
        <label>Birth Date*</label>
        <input type="date" name="birthdate" id="birthdate" placeholder="Enter birth date" required maxlength="20"/>
      </div>
    </div>
    <div class="input-box address">
      <label>Address*</label>
      <input type="text" name="address" placeholder="Enter street address" required maxlength="100"/>
    </div>
    <div class="gender-box">
      <h3>Gender*</h3>
      <div class="gender-option">
        <div class="gender">
          <input type="radio" id="check-male" name="gender" value="male" checked />
          <label for="check-male">Male</label>
        </div>
        <div class="gender">
          <input type="radio" id="check-female" name="gender" value="female" />
          <label for="check-female">Female</label>
        </div>
        <div class="gender">
          <input type="radio" id="check-other" name="gender" value="other" />
          <label for="check-other">Prefer not to say</label>
        </div>
      </div>
    </div>
    <div class="agree-checkbox">
      <input type="checkbox" id="agree" required>
      <label for="agree">I agree to the <a href="#" id="terms-link">Terms and Conditions</a></label>
    </div>
    <button type="submit" name="submit">Submit</button>
  </form>

  <!-- Modal HTML -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Terms and Conditions</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
      <p>By clicking 'Agree', you accept our Terms and Conditions.</p>
    </div>
  </div>
  <?php } ?>
</div>
<script>
  function validateForm() {
    var birthdate = document.getElementById('birthdate').value;
    var today = new Date();
    var birthDate = new Date(birthdate);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    if (age < 18) {
      alert("You must be at least 18 years old to register.");
      return false;
    }

    var email = document.getElementsByName('email')[0].value;
    if (!email.includes('@') || !email.endsWith('.com')) {
      alert("Please enter a valid email address (must contain '@' and end with '.com').");
      return false;
    }

    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmpassword').value;
    if (password !== confirmPassword) {
      alert("Passwords do not match. Please re-enter.");
      return false;
    }

    var agree = document.getElementById('agree');
    if (!agree.checked) {
      alert("Please agree to the Terms and Conditions.");
      return false;
    }

    return true;
  }

  var modal = document.getElementById('myModal');
  var termsLink = document.getElementById('terms-link');
  var closeBtn = document.getElementsByClassName('close')[0];

  termsLink.onclick = function() {
    modal.style.display = "block";
  }

  closeBtn.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<script>
        
        var pass = document.getElementById("password");
        var msg = document.getElementById("message");
        var str = document.getElementById("strength");

        pass.addEventListener('input', () => {
            if(pass.value.length > 0){
                msg.style.display = "block";
            }
            else{
                msg.style.display = "none";
            }
            if(pass.value.length < 4){
                str.innerHTML = "weak";
                pass.style.borderColor = "#ff5925";
                msg.style.color = "#ff5925";
            }
            else if(pass.value.length >=4 && pass.value.length < 8){
                str.innerHTML = "medium";
                pass.style.borderColor = "yellow";
                msg.style.color = "yellow";
            }
            else if(pass.value.length >= 8){
                str.innerHTML = "strong";
                pass.style.borderColor = "#26d730";
                msg.style.color = "#26d730";
            }
        })

    </script>
    <script>
        
        var cpass = document.getElementById("confirmpassword");
        var msg = document.getElementById("message");
        var str = document.getElementById("strength");

        cpass.addEventListener('input', () => {
            if(cpass.value.length > 0){
                msg.style.display = "block";
            }
            else{
                msg.style.display = "none";
            }
            if(cpass.value.length < 4){
                str.innerHTML = "weak";
                cpass.style.borderColor = "#ff5925";
                msg.style.color = "#ff5925";
            }
            else if(cpass.value.length >=4 && pass.value.length < 8){
                str.innerHTML = "medium";
                cpass.style.borderColor = "yellow";
                msg.style.color = "yellow";
            }
            else if(cpass.value.length >= 8){
                str.innerHTML = "strong";
                cpass.style.borderColor = "#26d730";
                msg.style.color = "#26d730";
            }
        })

    </script>
</body>
</html>
