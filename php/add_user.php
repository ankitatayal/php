
<html>
<head>
	<title></title>
</head>
<body>
   <?php
include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
//$role_id=1;
if($role_id==1)
{

?>
<form name="signup_form" method = "post" action = "<?php $_PHP_SELF ?>">
  <input type="text" class="user1" id="user_id" name="username1" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="emailid1" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="pass" name="password1" placeholder="Password"></input>
   <?php
   $sql7= "SELECT USER_ID,USER_ROLE FROM roles WHERE USER_ID != 1";
    $r=mysql_query($sql7,$conn);
    echo '<br><select name="s1">';
while($row = mysql_fetch_array($r)) 
   {
    
   $u_role=$row['USER_ROLE'];
   $role_id=$row['USER_ID'];
   echo '<option value="'.$role_id.'"> '.$u_role.' </option>';

    }
    echo '</select>';
    ?>
  <input type="submit" id="signup" name="signup" value="ADD USER"></input>
  </form>

  
<?php
        
        $username1 = $_POST['username1'];
        $pass = $_POST['password1'];
        $mail1 = $_POST['emailid1'];
        $password = md5($pass);
        $drpdown = $_POST['s1'];
        echo"$mail1";
       if(!empty($username1)&& !empty($password) && !empty($mail1))

   {     $sql12= "SELECT * FROM users WHERE EMAILID='$mail1' ";
          $result= mysql_query($sql12,$conn);
          $result1= mysql_fetch_array($result);
        if($result1)
          {
           echo "<p>User already exists</p>";
          }
          else
          {
            $sql8= "INSERT INTO users(USERNAME,EMAILID,PASS,PASSWORD,USER_ID)VALUES('$username1','$mail1','$pass','$password',$drpdown)";
         
             $z = mysql_query($sql8, $conn);
            
             if($z)
             {
             echo "<p>USER HAS BEEN ADDED</p>";
             header("Location: http://localhost/php_project/php/user_list.php");
           }
          }
          
   }
}

else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
  ?>
</body>
</html>