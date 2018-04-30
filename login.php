<?php
session_start();
      include("konekcija.php");
   $error= NULL;
   if(isset($_POST['username'])) {
      // username and password sent from form 
      
      $myusername = htmlentities(($_POST['username']));
      $mypassword = htmlentities(($_POST['password'])); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = $result->fetch_assoc();
    
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
    
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("location: user_stranica.php");
      }else {
          $error = "Vasa korisnicko ime i sifra nisu dobri";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
  
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
        
            <div style = "margin:30px">
               
               <form action = "#" method = "POST">
                  <label>Korisnicko ime:</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Sifra:</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>