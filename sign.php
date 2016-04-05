
<html>
<head>
	<title></title>
	<style>
	body{margin: 0;}

      /*.div1{ 
        margin-top: 8%;
        margin-left: 3%;
        width: 45%;
        height: 70%;
        background-color: #f17c72;
        z-index: -1;
        display: inline-block;
        position: relative;
      }
            .div2{ 
        margin-top: 3%;
        margin-bottom: 3%;
        margin-left: 3%;
        width: 93.5%;
        height: 20%;
        background-color: #ebf1ef;
        z-index: -1;
        position: relative;
      }
                  .div3{ 
        margin-top: 8%;
        margin-left: 3%;
        width: 45%;
        height: 70%;
        background-color: #32ac97;
        z-index: -1;
        display: inline-block;
        position: relative;
      }*/

      .div1{ 
        margin-top: 7%;
        margin-left: 2%;
        width: 35.5%;
        height: 80%;
        background-color: #f17c72;
        /*z-index: -1;*/
        display: inline-block;
        position: relative;
      }
            .div2{ 
        margin-top: 7%;
        margin-left: 2%;
        width: 20%;
        height: 80%;
        background-color: #ebf1ef;
        z-index: -1;
        position: relative;
        display: inline-block;
      }
                  .div3{ 
        margin-top: 7%;
        margin-left: 2%;
        width: 35.5%;
        height: 80%;
        background-color: #32ac97;
        z-index: -1;
        display: inline-block;
        position: relative;
      }

.user1
{
height:35px;
    width: 60%;
    border: none;
outline: none;
margin-top: 10%;
margin-left: 20%;
border-radius: 6px;
}
select{
  width:50%;
  margin-left: 30%;
  margin-top: 5%;
}
#signup{ cursor: pointer;
      color: #52789a;
      /*background: linear-gradient(to bottom, #eaf4f8, #e3f0f5, #dbecf3, #d5e9f1, #cde5ef) ;*/
      background-color: #428BCA;
      border: 1px solid #9eb9c2;
      width:60%;
      height: 35px;
      box-shadow: none;
        margin-top: 10%;
       outline:none;
       border:1px solid #357ebd;
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

<div class="div1">
   <form name="login_form" method = "post" action = "sign.php">
    <input type="text" class="user1" id="user_id" name="username" placeholder="Username"></input>
    <input type="email" class="user1" id="email_id" name="emailid" placeholder="EMAIL ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
    <input type="password" class="user1" id="pass" name="password" placeholder="Password"></input>
    <select name="user_type">
    <option value="admin">ADMIN</option>
      <option value="content_manager">CONTENT MANAGER</option>
      <option value="user">USER</option>
    </select>
    <input type="submit" id="signup" name="login1" value="LOGIN"></input>
  </form>
</div>
<div class="div3">
  
</div>
<div class="div2">
  
</div>
<div>  
  
</div>
  <form name="signup_form" method = "post" action = "sign.php">
  <input type="text" class="user1" id="user_id" name="username1" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="emailid1" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="pass" name="password1" placeholder="Password"></input>
  <!-- <select name="user_type">
    <option value="content_manager">CONTENT MANAGER</option>
    <option value="user">USER</option>
  </select> -->
  <select name="s1">
    <option value="con"> CONTENT MANAGER</option>
        <option value="us"> USER</option>
  </select>
  <input type="submit" id="signup" name="signup" value="SIGN UP"></input>
  </form>
</body>
</html>

<?php
if(isset($_POST['login1']))

{
  session_start();
       $username = $_POST['username'];
       $emailid = $_POST['emailid'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
     

if(!empty($username)&& !empty($password)&& !empty($emailid))
{
  $sql2= 'SELECT AD_USERNAME, AD_PASSWORD,AD_MAIL FROM admin';
  $sql3= 'SELECT U_USERNAME, U_PASSWORD,U_MAIL FROM user';
  $sql4= 'SELECT C_USERNAME, C_PASSWORD,C_MAIL FROM content';
  $p = mysql_query($sql2, $conn);
  $q = mysql_query($sql3, $conn);
  $r = mysql_query($sql4, $conn);
  while($row = mysql_fetch_array($p))
  { $a_user=$row['AD_USERNAME'];
   $a_pass=$row['AD_PASSWORD'];
   $a_mail=$row['AD_MAIL'];
  if ($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type="admin")
               {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['user'] = $user;
                  header("Location: http://localhost/new_php/sql_php_project/admin.php");
               }
  }
while($row = mysql_fetch_array($q))
  { $u_user=$row['U_USERNAME'];
   $u_pass=$row['U_PASSWORD'];
   $u_mail=$row['U_MAIL'];
   $u_pass=md5($u_pass);
if ($username == $u_user && $password == $u_pass && $emailid == $u_mail && $user_type=="user") {
  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['user'] = $user;
                  header("Location: http://localhost/new_php/project1.php");
   }
  }
while($row = mysql_fetch_array($r))
  { $c_user=$row['C_USERNAME'];
   $c_pass=$row['C_PASSWORD'];
   $c_mail=$row['C_MAIL'];
   $c_pass= md5($c_pass);
if ($username == $c_user && $password == $c_pass && $emailid == $c_mail && $user_type=="content_manager") 
    {
  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['user'] = $user;
                  header("Location: http://localhost/new_php/sql_php_project/admin.php");
    }
  }


}
}



elseif(isset($_POST['signup']))

{

$username1 = $_POST['username1'];
        $password1 = $_POST['password1'];
        $mail1 = $_POST['emailid1'];
        $user_type1 = $_POST['s1'];

      $password1 = md5($password1);
       if(!empty($username1)&& !empty($password1) && $user_type1=="con")

   {
          $sql8= "INSERT INTO content(C_USERNAME,C_PASSWORD,C_MAIL) VALUES('$username1','$password1','$mail1')";
         
        $retval=mysql_query($sql8, $conn);

   }
   elseif(!empty($username1)&& !empty($password1)&& $user_type1=="us")
 
   {

          $sql9= "INSERT INTO user(U_USERNAME,U_PASSWORD,U_MAIL) VALUES('$username1','$password1','$mail1')";
         
        $retval=mysql_query($sql9, $conn);

   }
  

}
?>