
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="style_login.css"> 
</head>

<body>

<?php
	
require_once('db_con.php');
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
// Unset all of the session variables.
$_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Finally, destroy the session.
session_destroy();
?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Logout</title>
</head>

<body>

	<h1>You are now logged out!!!</h1>
<button> <a href="startside.php">Login again</a></button>

</body>
</html>
</body>
</html>