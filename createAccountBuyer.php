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

     <?php
     //  require_once "render.php";

          require_once "pdo.php";
          session_start();
          $userName = $pw = $name = $email ="";

          if($_SERVER['REQUEST_METHOD'] == "POST") {
               $userName = $_POST['username'];
               $pw = $_POST['password'];
               $name = $_POST['name'];
               $email = $_POST['email'];

               $sql = "SELECT EXISTS(SELECT * FROM Buyer WHERE uname=:userName)";
               $stmt = $conn->prepare($sql);
               $stmt->execute(array(":userName" => $userName));
                    
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
               echo $row;


               print_r($row);
             
               $count = $row["EXISTS(SELECT * FROM Buyer WHERE uname='$userName')"];
               echo $count;  

               if($count){
                    $message = "A buyer with that ID already exists. Please try with new ID!";
                    echo  $message;
               }
               else{
                    $sql = "INSERT INTO Buyer(uname, pwd, name, email) VALUES (:userName,:pw, :name, :email)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute(array(
                         ":userName" => $userName,
                         ":pw" => $pw,
                         ":name" => $name,
                         ":email" => $email
                    ));
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo $row;
                    echo  $message;
                    $message = "Registered Succesfully!";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    header("location: login_buyer.php");
               }
               echo "<script type='text/javascript'>alert('$message');</script>";
          }
     ?>

          <div class="container">
               <form class="a" action="" method = "post" id="register">

                    <input type="hidden" name="act" value="register" >

                    <label for="name"><b> Name</b></label>
                    <input type="text" placeholder="enter your name here" name="name" required>

                    <label for="email"><b> Email</b></label>
                    <input type="email" placeholder="enter your email here" pattern = "[a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}" name="email" required>

                    <label for="uname"><b>Username</b></label>
                    <!--  A combination of at least five letters and numbers-->
                    <input type="text" placeholder="enter username"  name="username" required>
                    
                    <!--A combination of at least five letters and numbers  -->
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="must contain letter, number, no longer than 6 digit" pattern="(?=.*[0-9]+.*)(?=.*[a-zA-Z]+.*)[0-9a-zA-Z]{6,}" name="password" required>
                    <button class="a" type="submit" value="register">Create Account</button>

               </form>
               <form class="b" action="login_buyer.php" method = "post" id="login_buyer">
                    <button class="b" type="submit" value="cancel">Cancel</button>
               </form>
          </div>
     </body>
</html>
