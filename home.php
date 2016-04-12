


<html>
<head>
	<title></title>
	<style>
	body{margin: 0;}

      .div1{ position: relative;
      	margin-top: 4.5%;
      	width: 100%;
      	height: 40%;
      	background-color: #353b47;
      	z-index: -1;
      }
      .div2{ position: relative;
      	background-color: #f17c72;
      	width: 100%;
      	height: 11%;
      	z-index: -1;
      	padding-top: 2%;
      }
       .div3{ position: relative;
       	background-color: #ebf1ef;
      	width: 100%;
      	height: 70%;
      	z-index: -1;
       
       }
              .div4{ position: relative;
       	background-color: #32ac97;
      	width: 100%;
      	height: 50%;
      	z-index: -1;
       
       }


      	</style>
</head>
<body>
<?php
include ('master.php');
?>
<div class="div1">

</div>
<div class="div2">
<?php
$content_name=$_SESSION['user']; 
$role_id=$_SESSION['role_id'];
    echo "WELCOME $content_name $role_id";
    ?>
		<center><p style="color: white; font-size: 18px; margin: 0;"><b><?php echo"A COLLECTION OF AMAZING IDEAS READY TO SERVE YOU";?></b></p></center>
	<center><p style="color: white; font-size: 12px;"><?php echo"asdhsfjkfjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj";?></p></center>
</div>
<div class="div3">
	
</div>
<div class="div4">
	
</div>
</body>
</html>