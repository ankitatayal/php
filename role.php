<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/tables.css">
     <script src="js/jquery.min.js"></script>
<script src="js/jquery-1.12.1.js"></script>
<script src="js/a.js"></script>
      </head>
      <body>
        <?php
  include ('db_con.php');
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];

   
 if($role_id==1)
 {

  include('navigation.php');
  ?>

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
<div class="outer">
<form method = "post" action ="role.php">
  <div class="add">
    <input type="text" class="new" name="new" placeholder="Enter Role Name"></input>
    <input type="submit" class="add_btn" name="add_role" value="ADD NEW ROLE"></input>
  </div>

    <div class="view">
    <div class="tab">TABLE VIEW</div>
  <div class="grid">GRID VIEW</div>
  </div>
  <div class="outer_box">
  <div class="delete">
    
   <input type="submit" class="del_btn" name="delete" value="DELETE ROLES"></input>
    
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
<div class="tabular">
  
<?php 
  echo "<table>";
    echo "<tr> <th>ROLE ID</th> <th>ROLE NAME</th> <th>EDIT</th> <th>SELECT</th> </tr>";  
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
    echo '<td> <a href="edit_role.php?value='.$user_id. '">Edit This</a> </td>';
    echo '<td><input type="Checkbox" name="checkbox[]" value="'.$user_id.'"></input></td>';
    echo "</tr>"; 
  } 
    
    echo "</table>";

   echo "</div></div></form></div>";





  
   


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