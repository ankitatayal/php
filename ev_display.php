
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/role.css">
</head>
<body>
  <?php

  
   include ('db_con.php');
   // session_start();
   $role_id=$_SESSION['role_id'];
   $content_name=$_SESSION['user'];

    include('menu.php');

   // $user=isset($_POST['user']) ? $_POST['user'] : NULL;
   // $evs=isset($_POST['evs']) ? $_POST['evs'] : NULL;
    $user=$_POST['user'];
    $evs=$_POST['evs'];
     
   ?>
   <div class="div_role">
  <center><p class="roles">OUR EVENTS</p></center>

</div>
   
   <form method="post" action="<?php $_PHP_SELF ?>">
   <center>
   <label>Select Event Type:</label>
   <select name="evs" class="drp_role">                  
  <?php
  $sql5= "SELECT EV_NAME,EV_ID from taxonomy";

  $z=mysql_query($sql5,$conn);
  // if (!isset($evs)) {  
  //   echo '<option value="none"> None </option>';    //filter for event type
  // }
  echo '<option value="none" > None </option>';
  
while($row1 = mysql_fetch_array($z)) 
  {
    
   $ev_name=$row1['EV_NAME'];
    $ev_id=$row1['EV_ID'];
    echo '<option value="'.$ev_id.'"> '.$ev_name.' </option>';
  }  ?>

  </select>
  <label style="margin-left: 5%">Select User Reference:</label>
    <select name="user" class="drp_role">
<?php 

 $sql6= "SELECT USERNAME,U_ID from users";           //filter for user reference
  $y=mysql_query($sql6,$conn);

  echo '<option value="none" >None</option>';

while($row2 = mysql_fetch_array($y))
  {
    
   $name=$row2['USERNAME'];
    $id=$row2['U_ID'];
    if($user == $id) {  
      echo '<option value="'.$id.'" selected> '.$name.'</option>';
    }
    else{
      echo '<option value="'.$id.'"> '.$name.'</option>';
    }
  }
?>
  </select>
  <input type="submit" name="sub1" id = "add" value="submit">
  </center>
</form>
  
<?php
   
    if(isset($_POST['sub1']))
    {
 if($evs=='none' && $user=='none')              //if both filters aren't chosen all events will be displayed
   {
    $sqlimage  = "SELECT con_id,con_name,img,description,brief,EV_NAME,USERNAME FROM event LEFT OUTER JOIN taxonomy ON event.EV_ID=taxonomy.EV_ID LEFT OUTER JOIN users ON event.U_ID=users.U_ID
    ";
      // $sqlimage  = "SELECT con_id,con_name,img,description,brief FROM event,users where ";
   }
  elseif ($user!='none' && $evs=='none') 
   {                           //if only user reference is chosen
    $sqlimage="SELECT con_id,con_name,img,description,brief,EV_NAME,USERNAME FROM event LEFT OUTER JOIN users ON event.U_ID=users.U_ID  LEFT OUTER JOIN taxonomy ON event.EV_ID=taxonomy.EV_ID WHERE event.U_ID=$user";
   }
  elseif ($evs!='none' && $user=='none') 
   {                          //if only event type is chosen
    $sqlimage="SELECT con_id,con_name,img,description,brief,EV_NAME,USERNAME FROM event LEFT OUTER JOIN users ON event.U_ID=users.U_ID  LEFT OUTER JOIN taxonomy ON event.EV_ID=taxonomy.EV_ID WHERE event.EV_ID=$evs";
   }
   elseif($evs!='none' && $user!='none')
   {
    $sqlimage="SELECT con_id,con_name,img,description,brief,EV_NAME,USERNAME FROM event LEFT OUTER JOIN users ON event.U_ID=users.U_ID LEFT OUTER JOIN taxonomy ON event.EV_ID=taxonomy.EV_ID WHERE event.EV_ID=$evs AND event.U_ID=$user";
   }
 }
   else
   {
    $sqlimage  = "SELECT con_id,con_name,img,description,brief,EV_NAME,USERNAME FROM event LEFT OUTER JOIN taxonomy ON event.EV_ID=taxonomy.EV_ID LEFT OUTER JOIN users ON event.U_ID=users.U_ID
    ";
   }
 
$imageresult1 = mysql_query($sqlimage);
?>
<center><div class="ev_tabular">
<table class="ev_table">
<tr> <th>ID</th> <th>EVENT NAME</th> <th>ADDED BY</th> <th>EVENT TYPE</th> <th>REFERRED BY</th> <th>DESCRIPTION</th> <th>IMAGE</th>
  <?php

  if 
  ($role_id == 1 || $role_id == 2) {          //when admin or content manager opens the page 
    echo "<th>EDIT</th> <th>DELETE</th></tr>";
  }

 
  while($rows=mysql_fetch_assoc($imageresult1))
   {
    $image3 = $rows['img'];
    $ev_name=$rows['EV_NAME'];
   $con_id= $rows['con_id'];
   $description=$rows['description'];
   $brief=$rows['brief'];
   $con_name=$rows['con_name'];
   $username=$rows['USERNAME'];
   $description = substr($description, 0, 120); 
    echo "<tr>";
    echo '<td>' . $con_id . '</td>';
    echo '<td>' . $con_name . '</td>';
    echo '<td>' . $brief . '</td>';
    echo '<td>' . $ev_name . '</td>';
    echo '<td>' . $username . '</td>';
    echo '<td width = 30% style = "text-align : justify">' . $description . '&nbsp&nbsp&nbsp<a href="ev_details.php?value='.$con_id.'">..See more</a></td>';
    echo "<td><img src='imgs/$image3' width='100px' height='100px' ></td>";
    if ($role_id == 1) //admin can edit/delete any event
    {
    echo '<td><a href="edit_event.php?value='.$con_id.'">Edit</a></td>';  //sending the id of selected event
    echo '<td><a href="delete_event.php?value='.$con_id.'">Delete</a></td>';
    }
    if($role_id == 2 && $brief == $content_name)   //content manager can add/delete only those vents which were added by him
    {
    echo '<td><a href="edit_event.php?value='.$con_id.'">Edit</a></td>';
    echo '<td><a href="delete_event.php?value='.$con_id.'">Delete</a></input></td>';
    }
    echo "</tr>"; 
  } 
    
  echo "</table>";

?>
</div></center>

</body>
</html>


    
