<?php

require_once('connection.php');
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // When the user clicks "create Account"
  if(isset($_POST['act']) && $_POST['act'] == 'register'){
    //Get sellername and password from the login form
    $id = $_POST['sellername'];
    $pw = $_POST['password'];
    $name = $_POST['name'];


    // Send a query to check if the same uname already exists

    // $query = "SELECT * FROM buyer WHERE uname = '$id'";
    $result = $conn->query($query);
    $message = "";

    if($result->num_rows != 0){
      $message = "A buyer with that ID already exists. Please try with new ID!";
    } else {
      $query = "INSERT Seller(uname, pwd, name) VALUES ('$id','$pw', '$name')";
      $result = $conn->query($query);
      $message = "Registered Succesful!";
      echo "<script type='text/javascript'>alert('$message');</script>";
      header("location: login_seller.php");
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
 }
?>


<html>
  <head>
    <style>
    body {font-family: Arial, Helvetica, sans-serif;}
    /* form {border: 3px solid #f1f1f1; width: 1000px; margin: auto} */
    form.a {padding-top: 16px; padding-right: 16px; padding-left: 16px; margin: 0}
    form.b {padding-right: 16px; padding-left: 16px; margin: 0}


    input[type=text],[type=email],  input[type=password] {
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
      background-color: red;
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
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
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
      <input type="hidden" name="act" value="register" >

      <label for="name"><b> Name</b></label>
      <input type="text" placeholder="enter your name here" name="name" required>

      <label for="email"><b> Email</b></label>
      <input type="email" placeholder="enter your email here" pattern = "[a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}" name="email" required>

      <label for="uname"><b>sellername</b></label>
      <!--  A combination of at least five letters and numbers-->
      <input type="text" placeholder="enter sellername" pattern="[A-Za-z0-9]{5,20}" name="sellername" required>
      
      <!--A combination of at least five letters and numbers  -->
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="enter password" pattern="[A-Za-z0-9]{5,20}" name="password" required>
      <button class="a" type="submit" value="register">Create Account</button>

    </form>
    <form class="b" action="login.php" method = "post" id="login">
        <button class="b" type="submit" value="cancel">Cancel</button>
    </form>
  </div>

  </body>
</html>
