
<html>
<head>
	<title></title>
</head>
<body>
  <?php
$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('db_event');
session_start();
$role_id=$_SESSION['role_id'];
$content_name=$_SESSION['user']; 

if($role_id==1 || $role_id==2)
{
   ?>
   
   <form method="post" action="<?php $_PHP_SELF ?>">
   <select name="evs">                  
  <?php
  $sql5= "SELECT EV_NAME,EV_ID from taxonomy";

  $z=mysql_query($sql5,$conn);
  echo '<option value="none" selected> None </option>';    //filter for event type
while($row1 = mysql_fetch_array($z)) {
    
   $ev_name=$row1['EV_NAME'];
    $ev_id=$row1['EV_ID'];
    echo '<option value="'.$ev_id.'"> '.$ev_name.' </option>';
 }?>

  </select>
    <select name="user">
<?php  $sql6= "SELECT USERNAME,U_ID from users";           //filter for user reference
  $y=mysql_query($sql6,$conn);
  echo '<option value="none" selected>None</option>';
while($row2 = mysql_fetch_array($y)) {
    
   $name=$row2['USERNAME'];
    $id=$row2['U_ID'];
   echo '<option value="'.$id.'"> '.$name.'</option>';
 }
?>
  </select>
  <input type="submit" name="sub1" value="submit">
</form>
  
<?php
    $sqlimage  = "SELECT con_id,con_name,img,description,brief FROM event";
    $user=$_POST['user'];
    $evs=$_POST['evs'];

   
      
    
 if($evs=='none' && $user=='none')              //if both filters aren't chosen
   {
    $sqlimage  = "SELECT con_id,con_name,img,description,brief FROM event";
   }
  elseif ($user!='none') {                           //if only user reference is chosen
    // $sql  = "SELECT U_ID FROM users where USERNAME=$user";
    // $a=mysql_query($sql);
    // $rel=mysql_fetch_array($a);
    $sqlimage="SELECT con_id,con_name,img,description,brief FROM event,users where event.U_ID=users.U_ID AND users.U_ID=$user ";
  }
  elseif ($evs!='none') {                          //if only event type is chosen
    // $sql = "SELECT EV_ID FROM taxonomy where EV_NAME=$evs";
    // $a=mysql_query($sql);
    // $rel=mysql_fetch_array($a);
    // $sqlimage="SELECT * FROM event where EV_ID=$rel[0]";
    $sqlimage="SELECT con_id,con_name,img,description,brief FROM event,taxonomy where event.EV_ID=taxonomy.EV_ID AND taxonomy.EV_ID=$evs ";
  }
  else
  {
    $sqlimage  = "SELECT con_id,con_name,img,description,brief FROM event";
  }


$imageresult1 = mysql_query($sqlimage);





 echo "<table>";
  echo "<tr> <th>ID</th> <th>EVENT NAME</th> <th>ADDED BY</th><th>DESCRIPTION</th><th>IMAGE</th>";
  // if ($role_id==1) {          //when admin opens the page
    echo "<th>EDIT</th> <th>DELETE</th></tr>";
  // }

 
  while($rows=mysql_fetch_assoc($imageresult1)) {
    $image3 = $rows['img'];
    
   $con_id= $rows['con_id'];
   $description=$rows['description'];
   $brief=$rows['brief'];
   $con_name=$rows['con_name'];
    
    echo "<tr>";
    echo '<td>' . $con_id . '</td>';
    echo '<td>' . $con_name . '</td>';
    echo '<td>' . $brief . '</td>';
    echo '<td>' . $description . '<a href="">See full description</a></td>';
    echo '<td>' . $u_role . '</td>';
    echo "<td><img src='imgs/$image3' width='100px' height='100px' ></td>";
    if ($role_id==1) {
    echo '<td><a href="edit_event.php?value='.$con_id.'">Edit</a></td>';
    echo '<td><a href="delete_event.php?value='.$con_id.'">Delete</a></input></td>';
    }
    if($role_id==2 && $brief==$content_name)
    {
    echo '<td><a href="edit_event.php?value='.$con_id.'">Edit</a></td>';
    echo '<td><a href="delete_event.php?value='.$con_id.'">Delete</a></input></td>';
    }
    echo "</tr>"; 
  } 
    
  echo "</table>";
}

else{
  echo "You are not permitted to access this page";
}
?>

</body>
</html>


    
