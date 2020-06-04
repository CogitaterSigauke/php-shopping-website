<?php
require_once('conn.php');

session_start();

if(isset($_SESSION['login_user']) && isset($_SESSION['login_uid']) && isset($_SESSION['login_name'])){
  header("location: ./home.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

  // When the user clicks "Sign In"
  if(isset($_POST['act']) && $_POST['act'] == 'login'){
    // Get username and password from the login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Send a query to validate the user
    $query = "SELECT * FROM user WHERE uname = '$username' and pwd = '$password'";
    $result = $conn->query($query);

    // If no result has been found, no such user exists
    // Otherwise, redirect the user to whomephp
    if($result->num_rows == 0){
      $message = "Please check your ID and Password!";
      echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
      $result->data_seek(0);
      $row = $result->fetch_assoc();
      $_SESSION['login_user'] = $row['uname'];
      $_SESSION['login_uid'] = $row['uid'];
      $_SESSION['login_name'] = $row['name'];
      
      header("location: ./whomephp");
    }

  // When the user clicks "Register"
}
else if($_POST['act'] == 'register'){
    header("location: register.php");
    Get username and password from the login form
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    
    // Send a query to check if the same uname already exists
    $query = "SELECT * FROM user WHERE uname = '$id'";
    $result = $conn->query($query);
    $message = "";
    
    if($result->num_rows != 0){
      $message = "ID already exists. Please try with new ID!";
    } else {
      $query = "INSERT user(uname, pwd) VALUES ('$id','$pw')";
      $result = $conn->query($query);
      $message = "Register Succesful!";
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
 }
?>


<html>
  <head>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
  
    form.a {padding-top: 16px; padding-right: 16px; padding-left: 16px; margin: 0}
    form.b {padding-right: 16px; padding-left: 16px; margin: 0}
    .topnav {
      background-color: #333;
      overflow: hidden;
    }
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    input[type=text], input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }

    button.a {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    button.b {
      background-color: blue;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      opacity: 0.8;
    }

    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }


    .container {
      padding: 16px;
      border: 3px solid #f1f1f1; width: 40%; margin: auto;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }
    </style>

  </head>
  <body>
   

    <div class="container">
      <form class="a" action="" method = "post" id="login">
      <input type="hidden" name="act" value="login">

         <label for="uname"><b>Username</b></label>
         <input type="text" placeholder="Enter Username" pattern="[A-Za-z0-9]{5,20}" name="username" required>

         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" pattern="[A-Za-z0-9]{5,20}" name="password" required>

         <button class="a" type="submit" value="Sign In">Login</button>
       </form>
       <form class="b" action="createAccount.php" method = "post" id="login">
           <button class="b" type="submit" value="createAccount">Don't have account? createAccount Here!</button>
       </form>
      </div>



  </body>
</html>
