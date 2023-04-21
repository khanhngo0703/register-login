<?php
require_once "./connect.php";
$error = [];

if (isset($_POST['register'])) {
    $fullname = $_POST['FullName'];
    $usersname = $_POST['Username'];
    $email =  $_POST['Email'];
    $phonenumber =  $_POST['PhoneNumber'];
    $password =  $_POST['Password'];
    $pass_sha1 = sha1 ($password);
    if(empty($fullname)){
      $error [] = 'FullName cannot be left blank';
    }
    if(empty($usersname)){
      $error [] = 'UserName cannot be left blank';
    }
    if(empty($email)){
      $error [] = 'Email cannot be left blank';
    }
    if(empty($phonenumber)){
      $error [] = 'PhoneNumber cannot be left blank';
    }
    if(empty( $password)){
      $error [] = 'PassWord cannot be left blank';
    }
    $sql = "select * from users where username='$usersname'";
    $res = $conn->query($sql);
    var_dump($sql);
    if($res -> num_rows >0){
      $erros[]=" Incorrect account or password please login again";
  }
   else {
    $sql = "insert into users (fullname,username,email,phone_number,password) values ('$fullname','$usersname','$email','$phonenumber','$pass_sha1')";
    var_dump($sql);
    $res = $conn->query($sql);
    if ($res) {
        echo " Sign Up Success.";
        header("Location:login.php");
        exit();
    } else {
        $errors="Registration failed";
    }
  }

}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
  <title>Register</title>
</head>

<body>
  <div class="wrapper">
    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
    <div class="form-box register">
      <h2>Registation</h2>
      <form action="#" method="post">
        <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon> Full Name</span>
          <input type="text"name = "FullName" required>
          <label for="Fullname"></label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon> Username</span>
          <input type="text" name = "Username" required>
          <label for="Username"></label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="mail-outline"></ion-icon> Email</span>
          <input type="email" name = "Email" required>
          <label for="Email"></label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="person-outline"></ion-icon> Phone Number</span>
          <input type="number"name = "PhoneNumber" required>
          <label for="Phonenumber"></label>
        </div>
        <div class="input-box">
          <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon> Password</span>
          <input type="password" name = "Password" required>
          <label for="Password"></label>
        </div>
        <div class="remember-forgot">
          <label><input type="checkbox">I agree to the term & conditions</label>
        </div>
        <button type="submit" name = "register" class="btn">Register</button>
      </form>
    </div>
  </div>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</html>