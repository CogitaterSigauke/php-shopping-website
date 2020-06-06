<?php
      require_once "render.php";

        require_once "pdo.php";
        session_start();
        
        if($_SERVER['REQUEST_METHOD'] == "POST") {
          if(isset($_POST['act'])&& $_POST['act'] == 'insertProduct'){
            echo " I am here";

            $_SESSION['TEST'] = "===========TEST IS HERE==========";
            echo "<br/> SID FROM SESSION";
            echo $_SESSION['login_sid'];
            


            header("location: ./insertClothing.php");
        
              // echo "<script type='text/javascript'>alert('Password and ID, don't match; Please check your ID and Password!');</script>";
          }

          elseif(isset($_POST['act'])&& $_POST['act'] == 'insertshoes'){
            echo " I am here";

            $_SESSION['TEST'] = "===========TEST IS HERE==========";
            echo "<br/> SID FROM SESSION";
            echo $_SESSION['login_sid'];
            


            header("location: ./insertShoes.php");
        
              // echo "<script type='text/javascript'>alert('Password and ID, don't match; Please check your ID and Password!');</script>";
          }
          elseif(isset($_POST['act'])&& $_POST['act'] == 'insertaccessories'){
            echo " I am here";

            $_SESSION['TEST'] = "===========TEST IS HERE==========";
            echo "<br/> SID FROM SESSION";
            echo $_SESSION['login_sid'];
            


            header("location: ./insertAccessories.php");
        
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
      button.c {
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
        <h1>Insert Product</h1>
        <form class="a" action="" method = "post" >
            <input type="hidden" name="act" value="insertProduct" id="insertProduct">

            <label for="insert"><b>Want to insert Product? Select the type of product that you want to insert</b></label>
            <button class="a" type="submit" value="Seller Account">Clothing</button>
          
        </form>
       
        <form class="b" action="" method = "post" >
          <input type="hidden" name="act" value="insertshoes" id="insertshoes">

          <button class="b" type="submit" value="register">Shoes</button>
        </form>
           
        <form class="b" action="insertAccessories.php" method = "">
          <input type="hidden" name="act" value="insertaccessories" id="insertaccessories">

          <button class="c" type="submit" value="register">Accessories </button>
       </form>
    </div>
    
</div>


  </body>
</html>
