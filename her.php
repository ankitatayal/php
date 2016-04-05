<form name="login_form" method = "post" action = "<?php $_PHP_SELF ?>">
  <input type="text" class="user1" id="user_id" name="var" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="var1" placeholder="EMAIL ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="p1" name="var2" placeholder="Password"></input>
  <select name="var3">
  <option value="admin">ADMIN</option>
    <option value="content_manager">CONTENT MANAGER</option>
    <option value="user">OTHERS</option>
  </select>
  <input type="submit" id="signup" name="login1" value="LOGIN"></input>
  </form>

<?php
$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('db_event');
   ?>

<?php

       $username = $_POST['var'];
       $emailid = $_POST['var1'];
        $password = $_POST['var2'];
        $user_type = $_POST['var3'];print_r($_POST);

     

if(!empty($username)&& !empty($password)&& !empty($emailid))
{
  $sql2= 'SELECT * FROM users';

  $z = mysql_query($sql2, $conn);
  if(!$z)
    echo "<br>connection ";
  while($row = mysql_fetch_array($z))
  { $a_user=$row['USERNAME'];
   $a_pass=$row['PASS'];
   $a_mail=$row['EMAILID'];
    echo "$a_user";
  if ($username == $a_user && $password == $a_pass && $emailid == $a_mail)
               {
                  
                  echo"admin";
               }

  }



}
?>

