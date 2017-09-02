<?php
session_start(); //fortæller PHP at jeg vil benytte mig af sessions
?> 

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style_login.css"> <!-- Henviser til stylesheet -->
</head>

<body>

<?php 
	
if(filter_input(INPUT_POST, 'submit')) { //INPUT_POST - "poster" ting
		
	$un = filter_input(INPUT_POST, 'username')
			or die('Wrong username');
		
	$pw = filter_input(INPUT_POST, 'password')
			or die('Wrong password');
	
	require_once('db_con.php');
		
		
	$sql = 'SELECT id, pwhash FROM users WHERE username=?';
	$stmt = $con->prepare($sql);
	$stmt->bind_param('s', $un);	
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);
	
	while($stmt->fetch()) {}
		
	if(password_verify($pw, $pwhash)){
		echo "<script>window.open('basis_side.php','_self')</script>";
		$_SESSION['uid'] = $uid;
		$_SESSION['username'] = $un; //Hvis password er verify, skal den logge ind og føre os til basis siden
		
	}
		else {
				echo '<p> Could not find user.. <br><br> ..Create a user </p>'; //HVis password ikke er verify, skal den komme med denne tekst
		}
	}
	
?>
<p>
<div id="container">
<form action="<?=$_SERVER['PHP_SELF'] ?>" method="post">
    	<h1>Login</h1>
	<div class="udfyld"><input name="username" type="text" placeholder="Username" required/>
    	<br><br>
    	<input name="password" type="text" placeholder="Password" required/></div>
    	<br><br>
    	
    	
    <div class="knap"><input name="submit" type="submit" value="Login" />
		<button> <a href="tilmelding.php">Create a user</a></button>
		
		</div>
</form>
	</div>
</p>




</body>
</html>