<?php
$error = '';
if (isset($_POST['login'])) {
	session_start();
	$username = trim($_POST['username']);
	$password = sha1($username . $_POST['pwd']);
	//location of username and passwords
	$userlist = '/Users/dimitris/private/encrypted.txt';
	//location to redirect on successful login
	$redirect = 'http://blog/sessions/menu.php';
	require_once '../includes/authenticate.inc.php';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<?php
if ($error) {
echo "<p>$error</p>";
}
?>
<form id="form1" method="post" action="">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd">
    </p>
    <p>
        <input name="login" type="submit" id="login" value="Log in">
    </p>
</form>
</body>