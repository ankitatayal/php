<?php
include ('db_con.php');

// if(isset($_SESSION['user']))
// {
// print_r($_SESSION['user']);
//   header("Location: http://events.com/index.php");

// }
// else {
         $username = $_POST['username'];
       $emailid = $_POST['emailid'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
       $password = md5($password);

if(!empty($username)&& !empty($password)&& !empty($emailid))
{
  $sql2= "SELECT USERNAME,USER_ID,U_ID FROM users where USERNAME='$username' AND PASSWORD = '$password' AND EMAILID = '$emailid'";     
}
  $p = mysql_query($sql2, $conn);
  $row4 = mysql_fetch_array($p);
  $role_id = $row4['USER_ID'];
  $u_name = $row4['USERNAME'];
  $u_id = $row4['U_ID'];
  $_SESSION['role_id'] = $role_id;
  $_SESSION['u_id'] = $u_id;
  $_SESSION['user'] = $u_name;
  if ($p) 
  {
   echo  $_SESSION['role_id'];
   echo  $_SESSION['user'];
   header("Location: http://events.com/index.php");
  }

// }
  
?>








