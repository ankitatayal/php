
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/common_forms.css">
</head>
<body>
   <?php
include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];

if ($role_id == 1) {
  include('navigation.php');

?>

<div class="container">
<form name="signup_form" method = "post" action = "<?php $_PHP_SELF ?>" class="user">
<div class="inpt"><input type="text" class="user1" name="username1" autofocus placeholder="Username"></input></div>
  <div class="inpt"><input type="email" class="user1"  name="emailid1" placeholder="Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input></div>
  
  <div class="inpt"><input type="password" class="user1" name="password1" placeholder="Password"></input></div>
  
  <div class="inpt">
      <label class="lab_role">Role:</label>
   <?php
   $sql7 = "SELECT USER_ID,USER_ROLE FROM roles WHERE USER_ID != 1";
    $r=mysql_query($sql7,$conn);
    echo '<select name="s1" class="drp_role">';
while($row = mysql_fetch_array($r)) 
   {
    
   $u_role=$row['USER_ROLE'];
   $role_id=$row['USER_ID'];
   echo '<option value="'.$role_id.'"> '.$u_role.' </option>';

    }
    echo '</select>';
    ?>
    </div>
    <div class="inpt"><input type="submit" name="signup" id="edit" value="ADD USER"></input></div>
  
  </form>
  </div>

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
            $sql8 = "INSERT INTO users(USERNAME,EMAILID,PASS,PASSWORD,USER_ID)VALUES('$username1','$mail1','$pass','$password',$drpdown)";
         
             $z = mysql_query($sql8, $conn);
            
             if ($z)
             {
             echo "<p>USER HAS BEEN ADDED</p>";
             header("Location: http://events.com/user_list.php");
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