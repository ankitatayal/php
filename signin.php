


<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/edit.css">
</head>
<body>
<?php
include ('db_con.php');
  include('menu.php');
?>

<div class="div_role">
  <center><p class="roles">SIGN UP</p></center>
</div>

<center>
<form name="signup_form" method = "post" action = "<?php $_PHP_SELF ?>" id="user">

  <input type="text" class="user1"  name="username1" placeholder="Username"></input><hr>
  <input type="email" class="user1"  name="emailid1" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input><hr>
  <input type="password" class="user1"  name="password1" placeholder="Password"></input>
  <hr>
  <br>
      <label>Role:</label>
      <select name="s1" class="drp_role">
   <?php
   $sql7= "SELECT USER_ID,USER_ROLE FROM roles WHERE USER_ID!=1";
    $r=mysql_query($sql7,$conn);
    
while($row = mysql_fetch_array($r)) 
   {
    
   $u_role=$row['USER_ROLE'];
   $role_id=$row['USER_ID'];
   echo '<option value="'.$role_id.'"> '.$u_role.' </option>';

    }
    echo '</select>';
    ?>
    <br>
  <input type="submit" id="edit" name="signup" value="SIGN UP"></input>
  </form>
  </center>
  
<?php
        
        $username1 = $_POST['username1'];
        $pass = $_POST['password1'];
        $mail1 = $_POST['emailid1'];
        $password = md5($pass);
        $drpdown = $_POST['s1'];
       if(!empty($username1)&& !empty($password) && !empty($mail1))

   {     $sql12= "SELECT * FROM users WHERE EMAILID='$mail1'";
          $result= mysql_query($sql12,$conn);
          $result1= mysql_fetch_array($result);
        if($result1)
          {
           echo "<p>Your are already registered</p>";
          }
          else
          {
            $sql8= "INSERT INTO users(USERNAME,EMAILID,PASS,PASSWORD,USER_ID)VALUES('$username1','$mail1','$pass','$password',$drpdown)";
         
             $s = mysql_query($sql8, $conn);
           }
             
          
   }
             if ($s)
             {
             echo"<p>thank you for registering</p>";
             header("Location: http://events.com/login.php");
             }

  ?>


</body>
</html>