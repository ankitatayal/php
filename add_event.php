
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" type="text/css" href="css/common_forms.css">
</head>
<body>
  <?php
include ('db_con.php');
$sql11= "SELECT EV_ID,EV_NAME FROM taxonomy";
$sql6= "SELECT USERNAME,U_ID from users";
$content_name = $_SESSION['user']; 
$role_id = $_SESSION['role_id'];
$role_id = 1;
   if($role_id == 2 || $role_id == 1)       //show content only if the logged in user is content manager      
	   {  include('navigation.php');
	   	// echo "WELCOME $content_name";

	   	?>

<div class="container">
	  <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data" class="ev_form">
	  <div class="inpt">
	    <input type="text" name="name1" class="user1" placeholder="Event Name"></input></div>
	    <div class="inpt">
		<textarea rows="10" cols="50" name="description1" class="textarea" placeholder="Event Description"></textarea>
		</div>
		<div class="inpt_drop">
		<div class="label">
		<label class="lab_role">Event Type:</label></div>
		<div class="data">
		<select name="drpdown" class="drop_ev">
	    <?php
	    //dropdown for event type
	    $retval=mysql_query($sql11,$conn);

	while($row = mysql_fetch_array($retval )) {
	    
	    $ev_name=$row['EV_NAME'];
	    $ev_id=$row['EV_ID'];
	  
	   echo '<option value="'.$ev_id.'"> '.$ev_name.' </option>';
	  
	    }
	    echo '</select>';
	    ?></div>
	    </div>
	    <div class="inpt_drop">
	    <div class="label">
	      <label class="lab_role">Referred By User:</label> </div>
	      <div class="data">
	    <select name="drpdown1" class="drop_ev">
	    <?php                        //dropdown for user reference
	    $y=mysql_query($sql6,$conn);
	while($row3 = mysql_fetch_array($y )) {
	    
	    $u_name=$row3['USERNAME'];
	    $u_id=$row3['U_ID'];
	  
	   echo '<option value="'.$u_id.'"> '.$u_name.' </option>';
	    }
	    echo '</select>';


        
	    ?></div>
	    </div>
	    <div class="inpt_drop">
	    <div class="label">
        <label class="lab_role">Event Image:</label></div>
        <div class="data">
		<input type="file" name="image" class="img"></div>
		</div>
		<div class="inpt">
		<input type="Submit" name="sub" id= "edit" class="add_ev" value="ADD EVENT"></input>
 		</div>
	  </form>
	  </div>
      <?php

	//This is the directory where images will be saved
	//print_r( $_FILES['image']['name']);
	//print_r(basename( $_FILES['image']['name']));
	$target = "imgs";
	$target = $target .'/'. basename( $_FILES['image']['name']);
	//echo "<br>$target";

	// This gets all the other information from the form

	  $file_name = ($_FILES['image']['name']);
	  $name1 = $_POST['name1'];
	  $description1 = $_POST['description1'];
	  $drpdown = $_POST['drpdown'];
	  $drpdown1 = $_POST['drpdown1'];



	//Writes the information to the database
	$sql1= "INSERT INTO event(con_name,brief,img,description,EV_ID,U_ID) VALUES('$name1','$content_name','$file_name','$description1',$drpdown,$drpdown1)";

	      if(isset($_POST['sub']))
	      {
	         mysql_query($sql1,$conn);
	     

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

    header("Location: http://events.com/ev_display.php");
           }
    
}
//if logged in user isn't content manager or admin
else
{
	echo "SORRY YOU ARE NOT ALLOWED TO ACCESS THIS PAGE";
}

?>
</body>
</html>