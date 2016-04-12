<?php
$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('db_event');

   ?>
   <form name="signup_form" method = "post" action = "<?php $_PHP_SELF ?>">
  <input type="text" class="user1" id="user_id" name="username1" placeholder="Username"></input>
  <input type="email" class="user1" id="email_id" name="emailid1" placeholder="Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" ></input>
  <input type="password" class="user1" id="pass" name="password1" placeholder="Password"></input>
  <?php

    $sql7= "SELECT USER_ID,USER_ROLE FROM roles";
    $r=mysql_query($sql7,$conn);
    echo '<br><select name="s1">';
while($row = mysql_fetch_array($r)) {
    
   $u_role=$row['USER_ROLE'];
  
   echo '<option value="'.$u_role.'"> '.$u_role.' </option>';

    }
    echo '</select>';



  ?>
  </form>