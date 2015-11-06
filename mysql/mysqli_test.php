<?php
require_once ('../includes/connection.inc.php');
// connect to MySQL
$conn = dbConnect('read');
// prepare the SQL query
$sql = 'SELECT image_id FROM images WHERE filename = "menu.jpg"';
// submit the query and capturethe result
$result = $conn->query($sql) or die(mysqli_error());

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Connecting with MySQLi</title>
</head>

<body>
<?php 
$row = $result->fetch_assoc(); 
$id = $row['image_id'];
echo $id;
?>

</body>
</html>