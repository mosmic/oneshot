<?php
// initiate session
session_start();
// check that form has been submitted and that name is not empty
if ($_POST && !empty($_POST['name'])) {
  // set session variable
  $_SESSION['name'] = $_POST['name'];
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sessions</title>
</head>
<body>
<?php 
if (isset($_SESSION['name'])) {
	echo 'Hi, ' . $_SESSION['name'] . '. <a href="session_03.php">Next</a>';
} else {
	echo 'Who the hell are you? <a href="session_01.php">Login</a>';
}
?>
</body>
</html>