<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Profile</title>
<link rel="stylesheet" href="style_login.css"> 
</head>

<body>

       <ul>
  <li><a href="x">Home</a></li>
  <li><a href="x">News</a></li>
  <li><a href="x">Contact</a></li>
  <li><a href="x">About</a></li>
  <button class="hej"><a href="logout.php">Logout</a></button>
</ul>
       
<?php
	require_once('db_con.php');
	
	if(empty($_SESSION['uid'])){
		echo 'You have to login to see your personal profile';
	?>
	<br><br>
	<button><a href="startside.php">Login</a></button>
	<?php	
	}
	else {
		echo '<h1><b>Welcome '.$_SESSION['username'],'<br>You are now logged in!</b></h1>';
	}
?>

	
	
	
	
	
	
</body>
</html>







