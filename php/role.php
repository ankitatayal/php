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
$check = $_POST['checkbox'];
if(isset($_POST['delete']))
  {
    foreach ($check as $chk) 
    {
      $sql14 = "DELETE FROM roles WHERE USER_ID=" . $chk;
      mysql_query($sql14);
    }

      
      header("Location: http://localhost/php_project/php/role.php");
  }
?>



<?php
   $sql1= "SELECT USER_ID,USER_ROLE FROM roles";
   $sql2= "SELECT U_ID,USERNAME,USER_ID FROM users";
   $retval=mysql_query($sql1,$conn);
   echo '<form method = "post" action ="role.php">';
   echo "<table>";
   echo "<tr> <th>ROLE ID</th> <th>ROLE NAME</th> </tr>";
   while($row = mysql_fetch_array($retval )) 
   { 
   $u_id= $row['U_ID'];
   $user_id=$row['USER_ID'];
   $u_user=$row['USERNAME'];
   $u_mail=$row['EMAILID'];
   $u_role=$row['USER_ROLE'];
    
    echo "<tr>";
    echo '<td>' . $user_id . '</td>';
    echo '<td><br><a href="user_details.php?value='.$user_id.'">'.$u_role.'</a></td>';
    echo '<td> <a href="edit_role.php?value='.$user_id. '">Edit</a> </td>';
    echo '<td><input type="Checkbox" name="checkbox[]" value="'.$user_id.'"></input></td>';
    echo "</tr>"; 
  } 
    
    echo "</table>";
    echo '<input type="submit" id="del" name="delete" value="delete"></input>';
    echo '<input type="text" name="new"></input>';
  echo '<input type="submit" name="add_role" value="ADD"></input>';

echo '</form>';
// '<a href="new_role.php"><button name="add" id="add">ADD NEW ROLE</button></a>';
   if(isset($_POST['add_role']))
  { $new = $_POST['new'];
    $sql12= "INSERT INTO roles(USER_ROLE) VALUES('$new')";
    mysql_query($sql12,$conn);
    header("Location: http://localhost/php_project/php/role.php");
  }
  }

  else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
?>

      </body>

      </html>