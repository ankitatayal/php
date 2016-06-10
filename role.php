<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/role.css">
     <script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.1.js"></script>
<script src="js/a.js"></script>
      </head>
      <body>
        <?php
  include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
$role_id = 1;
   
 if($role_id==1)
 {

  include('menu.php');
  ?>
  <div class="div_role">
  <center><p class="roles">ROLES</p></center>
</div>
  <?php
$check = $_POST['checkbox'];
if(isset($_POST['delete']))
  {
    foreach ($check as $chk) 
    {
      $sql14 = "DELETE FROM roles WHERE USER_ID=" . $chk;
      mysql_query($sql14);
    }

      
      header("Location: http://events.com/role.php");
  }
?>



<?php
   $sql1= "SELECT USER_ID,USER_ROLE FROM roles";
   $sql2= "SELECT U_ID,USERNAME,USER_ID FROM users";
   $retval=mysql_query($sql1,$conn);
   
   // echo "<table>";
   // echo "<tr> <th>ROLE ID</th> <th>ROLE NAME</th> </tr>";
   ?>

   <?php
   echo '<form method = "post" action ="role.php">';
    
  ?>
  <center>
  <div class="del_add">
    <p style="display: inline-block;">Select the roles you want to delete and then press DELETE button.</p>
    <?php    echo '<input type="submit" id="del" name="delete" value="DELETE"></input>';  ?>
    <br>
    <p>Enter a role name if you want to add a new role</p>
    <?php echo '<input type="text" id="new" name="new"></input>';
      echo '<input type="submit" id="add" name="add_role" value="ADD"></input>'; ?>
  </div>
  </center>
  <center>
  <div class="view">
    <div class="tab">TABLE VIEW</div>
  <div class="grid">GRID VIEW</div>
  </div>
  
   <div class="container">
  <?php
 
   while($row = mysql_fetch_array($retval )) 
   { 
   $u_id= $row['U_ID'];
   $user_id=$row['USER_ID'];
   $u_user=$row['USERNAME'];
   $u_mail=$row['EMAILID'];
   $u_role=$row['USER_ROLE'];
   ?>
    <div class="box">
  <h3> <?php echo '<a href="user_details.php?value='.$user_id.'">'.$u_role.'</a>'; ?></h3>
  <hr>
  <p>ROLE ID: <?php echo $user_id; ?></p>
<?php
  
  echo ' <a href="edit_role.php?value='.$user_id. '">Edit Role Name</a> ';

    echo '<br><p style="display:inline">Delete This Role</p><input type="Checkbox" id="c1" name="checkbox[]" value="'.$user_id.'"></input>';
    ?>
</div>
 <?php
}
?>
</div>
</center>

<center><div class="tabular">
<?php 
  echo "<table>";
    echo "<tr> <th>ROLE ID</th> <th>ROLE NAME</th> <th>EDIT</th> <th>DELETE</th> </tr>";  
      $retval=mysql_query($sql1,$conn);
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
    echo '<td> <a href="edit_role.php?value='.$user_id. '">Edit This Role</a> </td>';
    echo '<td><input type="Checkbox" name="checkbox[]" value="'.$user_id.'"></input></td>';
    echo "</tr>"; 
  } 
    
    echo "</table>";

   echo "</div></center>";

echo '</form>';
// '<a href="new_role.php"><button name="add" id="add">ADD NEW ROLE</button></a>';
   if(isset($_POST['add_role']))
  { $new = $_POST['new'];
    $sql12= "INSERT INTO roles(USER_ROLE) VALUES('$new')";
    mysql_query($sql12,$conn);
    header("Location: http://events.com/role.php");
  }
  }

  else
{
  echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}
?>

      </body>

      </html>