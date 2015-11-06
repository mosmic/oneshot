<?php
require_once('../includes/session_timeout_db.inc.php');
require_once('../includes/connection.inc.php');
// create database connection
$conn = dbConnect('read');
$sql = 'SELECT user_id FROM users WHERE username = "test1"';
$result = $conn->query($sql) or die(mysqli_error());
$row = $result->fetch_assoc();
$user_id = $row['user_id'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Secret menu</title>
</head>

<body>
<h1>Restricted area</h1>
<?php echo "Hello $user_id"; ?>
<p></p>
<?php include('../includes/logout_db.inc.php'); ?>
</body>
</html>
