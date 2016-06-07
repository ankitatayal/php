
<html>
<head>
	<title></title>
</head>
<body>
  <?php
include ('db_con.php');
session_start();
$sql11= "SELECT EV_ID,EV_NAME FROM taxonomy";
$sql6= "SELECT USERNAME,U_ID from users";
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
//$role_id=1;
$con_id=$_GET['value'];
   if($role_id==2 || $role_id==1)       //show content only if the logged in user is content manager      
	   {  echo "WELCOME $content_name";
	   $sql15= "SELECT con_name, description, img from event where con_id='$con_id'";
	   $ret=mysql_query($sql15,$conn);
	   $row5=mysql_fetch_array($ret);
	   $img1=$row5['img'];
	   	?>
	  <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
	  <p> ENTER EVENT'S NAME</p>
	    <input type="text" name="name1" value="<?php echo $row5['con_name'];?>"></input>
	    <p> ENTER EVENT'S DESCRIPTION</p>
		<textarea rows="10" cols="50" name="description1"><?php echo $row5['description'];?></textarea>
	    <?php
	    //dropdown for event type
	    $retval=mysql_query($sql11,$conn);
	    echo '<br><select name="drpdown">';
	while($row = mysql_fetch_array($retval )) {
	    
	    $ev_name=$row['EV_NAME'];
	    $ev_id=$row['EV_ID'];
	  
	   echo '<option value="'.$ev_id.'"> '.$ev_name.' </option>';
	  
	    }
	    echo '</select><br>';
	    //dropdown for user reference
	      $y=mysql_query($sql6,$conn);
	    echo '<br><select name="drpdown1">';
	while($row3 = mysql_fetch_array($y )) {
	    
	    $u_name=$row3['USERNAME'];
	    $u_id=$row3['U_ID'];
	  
	   echo '<option value="'.$u_id.'"> '.$u_name.' </option>';
	    }
	    echo '</select><br>';

        echo "image:&nbsp&nbsp <img src='../imgs/$img1' width='100px' height='100px' ><br>";
	    ?>

		<input type="file" name="image">
		<input type="Submit" name="sub" value="submit"></input>
	  </form>
      <?php

	//This is the directory where images will be saved
	//print_r( $_FILES['image']['name']);
	//print_r(basename( $_FILES['image']['name']));
	$target = "../imgs";
	$target = $target .'/'. basename( $_FILES['image']['name']);
	//echo "<br>$target";

	// This gets all the other information from the form

	  $file_name = ($_FILES['image']['name']);
	  $name1 = $_POST['name1'];
	  $description1 = $_POST['description1'];
	  $drpdown = $_POST['drpdown'];
	  $drpdown1 = $_POST['drpdown1'];



	//Writes the information to the database
	// $sql1= "INSERT INTO event(con_name,brief,img,description,EV_ID,U_ID) VALUES('$name1','$content_name','$file_name','$description1',$drpdown,$drpdown1)";
	$sql20="UPDATE event
          SET con_name='$name1', brief='$content_name' , img='$file_name' , description='$description1' , EV_ID=$drpdown, U_ID=$drpdown1
           WHERE con_id='$con_id'";

	      if(isset($_POST['sub']))
	      {
	         mysql_query($sql20,$conn);
	     

	// //Writes the photo to the server
	         if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
	         {

	//Tells you if its all ok
	           echo "The file ". basename( $_FILES['image']['name']). " has been uploaded, and your event's information has been added to the directory";
	         }
	        else {

	//Gives and error if its not
	             echo "Sorry, there was a problem uploading your file.";
	              }
	       
	echo "you have uploaded the image<br>";
    header("Location: http://localhost/php_project/php/ev_details.php?value=$con_id");
           }
 
}
//if logged in user isn't content manager or admin
else
{
	echo "YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}

?>

	</body>
	</html>

	
    
