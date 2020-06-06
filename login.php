
<?php
     //  require_once "render.php";

          require_once "pdo.php";
          session_start();
          $username = $password ="";

          if(isset($_SESSION['login_user'])&& isset($_SESSION['login_uid']) && isset($_SESSION['login_name'])){
            header("location: ./home.php");
          }

          if($_SERVER['REQUEST_METHOD'] == "POST") {
            if(isset($_POST['act'])&& $_POST['act'] == 'login'){

               $username = $_POST['username'];
               $password = $_POST['password'];
              

               $sql = "SELECT EXISTS(SELECT * FROM Buyer WHERE uname = :username and pwd = :password)";
               $stmt = $conn->prepare($sql);
               $stmt->execute(array(
        
                ":username" => $username,
                ":password" => $password
               
              ));   
              $row = $stmt->fetch(PDO::FETCH_ASSOC);
              $count = $row["EXISTS(SELECT * FROM Buyer WHERE uname = '$username' and pwd = '$password')"];

               echo $count;
               echo "this is count", $count;  

  
               if($count){

                  $sql = "SELECT * FROM Buyer WHERE uname = :username and pwd = :password";
                  $stmt = $conn->prepare($sql);
                  $stmt->execute(array(
           
                   ":username" => $username,
                   ":password" => $password
                  )); 
                  
                  $row = $stmt->fetch(PDO::FETCH_ASSOC);


                  $_SESSION['login_user'] = $row['uname'];
                  $_SESSION['login_uid'] = $row['uid'];
                  $_SESSION['login_name'] = $row['name'];

                  echo $_SESSION['login_user'];
                  echo $_SESSION['login_user'];
                  echo $_SESSION['login_user'];
                  header("location: ./home.php");
              } else{
                $message = "Password and ID, don\'t match\; Please check your ID and Password!";
              }

              echo "<script type='text/javascript'>alert('$message');</script>";
              
              // echo "<script type='text/javascript'>alert('Password and ID, don't match; Please check your ID and Password!');</script>";
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
         <input type="text" placeholder="Enter username"  name="username" required>

         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="password" required>

         <button class="a" type="submit" value="Sign In">Login</button>

       </form>
       <form class="b" action="register.php" method = "" id="register">
           <button class="b" type="submit" value="register">Don't have account? createAccount Here!</button>
       </form>
      </div>



  </body>
</html>
