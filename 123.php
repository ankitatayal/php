<form name="login_form" method = "post" action = "<?php $_PHP_SELF ?>">
  <input type="text" class="user1" id="user_id" name="username" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="emailid" placeholder="EMAIL ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="p1" name="password" placeholder="Password"></input>
  <select name="user_type">
  <option value="admin">ADMIN</option>
    <option value="content_manager">CONTENT MANAGER</option>
    <option value="user">OTHERS</option>
  </select>
  <input type="submit" id="signup" name="login1" value="LOGIN"></input>
  </form>



<?php

       $username = $_POST['username'];
       $emailid = $_POST['emailid'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
     

if(!empty($username)&& !empty($password)&& !empty($emailid))
{
  $sql2= 'SELECT * FROM users';

  $p = mysql_query($sql2, $conn);

  while($row = mysql_fetch_array($p))
  { $a_user=$row['USERNAME'];
   $a_pass=$row['PASSWORD'];
   $a_mail=$row['EMAILID'];
    $a_password=md5($a_pass);
  if ($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type="admin")
               {
                  
                  echo"admin";
               }
               elseif($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type="content_manager")
               {
                
                  echo"ad";
               }
                elseif($username == $a_user && $password == $a_pass && $emailid == $a_mail && $user_type="user")
               {
              
                  echo"admin1";
               }
  }



}
?>

