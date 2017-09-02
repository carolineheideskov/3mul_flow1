<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Tilmelding</title>
<link rel="stylesheet" href="style_login.css"> 
</head>

<body>




<?php

	if(filter_input(INPUT_POST, 'submit')) {
		
	$un = filter_input(INPUT_POST, 'username')
			or die('Wrong username');
		
	$pw = filter_input(INPUT_POST, 'password')
			or die('Wrong password');
		
	$pw = password_hash($pw, PASSWORD_DEFAULT);
		
	
	require_once('db_con.php');
		
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?,?)';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('ss', $un , $pw);	
	$stmt->execute();
		
	if($stmt->affected_rows > 0){
		echo '<p><br>User '.$un. ' is created..</p>';
		echo '<p><br><br><button> <a href="startside.php">Login</a></button></p>';
	}
		else {
			echo '<p>Could not create user.. <br><br> ..User already exist </p>';
			echo '<p><br><br><button> <a href="startside.php">Login</a></button></p>';
		}
		
			
		
	}
	
	
?>

<p>
<div id="container">
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	
    	<h1>Add account</h1>
    	<div class="knap">
    	<input name="username" type="text" placeholder="Username" required />
    	<br><br>
			<input name="password" type="text" placeholder="Password" required /></div>
    	<br><br>
		<div class="knap"><input name="submit" type="submit" value="Create" /></div>
    
</form>
	</div>
</p>
</body>
</html>