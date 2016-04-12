

<html>
<head>
  <title></title>
  <style>
  body{margin: 0;
    background-color: #1bbc9b;}

      .left{ position: relative;
        float: left;
        width: 20%;
        height: 100%;
        background-color: #353b47;
       
      }
      
              .div4{ position: relative;
        background-color: #32ac97;
        width: 40%;
        height: 40%;
        z-index: -1;
       
       }
       form{
        height: 44%;
        width: 30%;
        margin-left: 20%;
        margin-top: 20%;
        display: inline-block;
        background-color: #eeeff1;
        border-radius: 10px;
        border: 5px solid #20af8e;
       }
.user1
{
height:35px;
    width: 60%;
    border: none;
outline: none;
margin-top: 6%;
margin-left: 20%;
border-radius: 6px;
}
 select{
  width: 40%;
  display: inline-block;
  margin-left: 30%;
  margin-top: 5%;
 }
  #signup{ cursor: pointer;
      color: #52789a;
      /*background: linear-gradient(to bottom, #eaf4f8, #e3f0f5, #dbecf3, #d5e9f1, #cde5ef) ;*/
      background-color: #1abc9b;
      border: 1px solid #23a78c;
      width:60%;
      height: 38px;
      box-shadow: none;
        margin-top: 5%;
       outline:none;
       border-radius: 6px;
       color: white;
       margin-left: 20%;
    }
       

        </style>
</head>
<body>
<?php
include ('master.php');
?>

<div class="left">

</div>



<form name="login_form" method = "post" action = "<?php $_PHP_SELF ?>">
  <input type="text" class="user1" id="user_id" name="username" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="emailid" placeholder="EMAIL ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="p1" name="password" placeholder="Password"></input>

  <input type="submit" id="signup" name="login1" value="LOGIN"></input>
  </form>
  
  



<?php
   session_start();
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
  $_SESSION['valid'] = true;
  $_SESSION['timeout'] = time();
  $_SESSION['role_id'] = $role_id;
  $_SESSION['u_id'] = $u_id;
  $_SESSION['user'] = $u_name;
  if ($p) 
  {
   echo  $_SESSION['role_id'];
   echo  $_SESSION['user'];
   header("Location: http://localhost/php_project/events.php#");
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






