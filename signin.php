
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

<?php
        include ('db_con.php');
        $username1 = $_POST['username1'];
        $pass = $_POST['password1'];
        $mail1 = $_POST['emailid1'];
        $password = md5($pass);
        $drpdown = $_POST['s1'];

       if( !empty($username1)&& !empty($password) && !empty($mail1) )

   {     $sql12= "SELECT * FROM users WHERE EMAILID='$mail1'";
          $result= mysql_query($sql12,$conn);
          $result1= mysql_fetch_array($result);
        if($result1)
          {
           echo "<p>Your are already registered</p>";
          }
          else
          {
            $sql8 = "INSERT INTO users(USERNAME,EMAILID,PASS,PASSWORD,USER_ID)VALUES('$username1','$mail1','$pass','$password',$drpdown)";
         
             $s = mysql_query($sql8, $conn);
           }
             
          
   }
             if ($s)
             {
             echo"<p>thank you for registering</p>";
             header("Location: http://events.com/index.php");
             }

  ?>


<!-- </body>
</html> -->