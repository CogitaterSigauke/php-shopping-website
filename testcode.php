<html>
<body>

<div>
<h1>Systems Found</h1>
</div>
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

        // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $row;
        print_r($row);
        $rows = $stmt->fetchAll();
        $count = count($rows);
          
          if($count){
               echo "<table style='border: solid 1px black;'>";
               echo "<tr><th>PC Model</th> <th>PC Speed</th> <th> PC Price</th> <th>Printer Model</th> <th>Printer Speed</th> <th>Printer Price</th></tr>";
               foreach(new TableRows(new RecursiveArrayIterator($rows)) as $k=>$v) {
                    echo $v;
               }
               echo"</table>";
               echo"<br /><br /><br />";
          }else{
               echo "<h3> No Sytem in your Budget Found </h3>";
          }
          
     }

?>
<hr />
<a href="index.php"> Home Page<a>

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
    <!-- <form class="b" action="login_buyer.php" method = "post" id="login_buyer">
        <button class="b" type="submit" value="cancel">Cancel</button>
    </form> -->
  </div>
</body>
</html>

