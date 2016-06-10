

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
  <center><p class="roles">LOGIN TO YOUR ACCOUNT</p></center>
</div>



<center>
<form  method = "post" action = "<?php $_PHP_SELF ?>" id="user">
  <input type="text" class="user1"  name="username" placeholder="Username"></input><hr>
  <input type="email" class="user1"  name="emailid" placeholder="Email Id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input><hr>
  <input type="password" class="user1"  name="password" placeholder="Password"></input><hr>
<br>
  <input type="submit" id="edit" name="login1" value="LOGIN"></input>
  </form>
  </center>
  <!-- <a href="logout.php">LOGOUT</a> -->
  <center>
    <a href="signin.php" class="signup">Not a Member? Create Your Account.</a>
  </center>



<?php
if(isset($_SESSION['user']))
{
print_r($_SESSION['user']);
  header("Location: http://events.com/index.php");

}
else {
         $username = $_POST['username'];
       $emailid = $_POST['emailid'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
       $password = md5($password);

if(!empty($username)&& !empty($password)&& !empty($emailid))
{
  $sql2= "SELECT USERNAME,USER_ID,U_ID FROM users where USERNAME='$username' AND PASSWORD='$password' AND EMAILID='$emailid'";     
}
  $p = mysql_query($sql2, $conn);
  $row4=mysql_fetch_array($p);
  $role_id=$row4['USER_ID'];
  $u_name=$row4['USERNAME'];
  $u_id=$row4['U_ID'];
  // $_SESSION['valid'] = true;
  // $_SESSION['timeout'] = time();
  $_SESSION['role_id'] = $role_id;
  $_SESSION['u_id'] = $u_id;
  $_SESSION['user'] = $u_name;
  if ($p) 
  {
   echo  $_SESSION['role_id'];
   echo  $_SESSION['user'];
   header("Location: http://events.com/user_list.php");
  }

}


    
  // echo  $_SESSION['role_id'];
  // echo  $_SESSION['user'];

    // $temp=0;
  // while($row = mysql_fetch_array($p))
  // { $a_user=$row['USERNAME'];
  //  $a_pass=$row['PASS'];
  //  $a_mail=$row['EMAILID'];
  //   $a_password=md5($a_pass);
  //   $a_role = $row['USER_ID'];
  //   $u_id = $row['U_ID'];
  // if ($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type == $a_role)
          
              
  //              {  $_SESSION['valid'] = true;
  //                 $_SESSION['timeout'] = time();
  //                 $_SESSION['user'] = $username;
  //                // $_SESSION['role_id'] = $a_role;
  //                 $_SESSION['role_id'] = $user_type;
  //                 $_SESSION['u_id'] = $u_id;
  //                 echo  $_SESSION['role_id'];
  //                 echo  $_SESSION['user'];
  //                // header("Location: http://localhost/php_project/home.php#");
  //                $temp=1;

  //              }
       

  //   }
    // if ($temp!=1) {
    //   echo"You have entered wrong information";
    // }
  

?>

</body>
</html>






