<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	header{
		position: fixed;
		top: 0;
		padding: none;
		left: 0;
		width: 100%;
		height: 12%;
		box-shadow: 0 4px #9fa4aa;
		/*background: linear-gradient(to bottom, #7f8d8e, #7d8b8c, #7e8c8d,#7e8c8d, #7e8c8d,#7e8c8d,#819093, #818a8f);*/
		background: linear-gradient(to bottom,#464646, #3d3d3d, #3c3c3c, #3b3b3b,#3a3a3a, #393939,#383838,#373737, #353535,#343434);

		}

.p1{ display: inline-block;
	margin-left: 8%;
	margin-top: 2%;
	font-size: 38px;
	color: white;
	text-shadow: 1px 1px 5px #1b90c2;

}
ul{    
	list-style-type: none;
	padding: 0;
	margin-left: 50%;
	display: inline-block;
}
li{
	display: inline-block;
	margin-left: 20px;


}
li a{ 
	color: #e2ecee;
	text-decoration: none;
		font-size: 13px;
		/*text-shadow: 1px 1px 1px #bda157;*/
}
.active{
	color: #dfc532;
}
li a:hover{
	color: #dfc532;
}
li a:active{
	color: #dfc532;
}

	</style>
</head>
<body>
<header>
	<p class="p1"><?php echo"events.com";?></p>
	<ul>
		<li><a class="active" href="#"><?php echo "HOME1";?></a></li>
		<li><a href="#"><?php echo "HOME1";?></a></li>
		<li><a href="#"><?php echo "HOME1";?></a></li>
		<li><a href="#"><?php echo "HOME1";?></a></li>
		<li><a href="#"><?php echo "HOME1";?></a></li>
	</ul>
</header>

</body>
</html>
<?php
$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'inno';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db('db_event');
   ?>