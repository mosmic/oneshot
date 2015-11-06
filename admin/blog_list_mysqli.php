<?php
require_once('../includes/session_timeout_db.inc.php');
require_once '../includes/connection.inc.php';
// create database connection
$conn = dbConnect('read');
if ($_SESSION['username'] == 'admin') {
	$sql = 'SELECT article_id, title,
		DATE_FORMAT(created, "%a, %b %D, %Y") AS date_created 
		FROM blog ORDER BY created DESC';
}
else {
$sql = 'SELECT blog.article_id, blog.title,
		DATE_FORMAT(created, "%a, %b %D, %Y") AS date_created 
		FROM blog, user2article, users WHERE blog.article_id = user2article.article_id AND user2article.user_id = users.user_id AND users.username = "'.$_SESSION['username'].'"
		ORDER BY created DESC';
}
$result = $conn->query($sql) or die(mysqli_error());
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Manage Blog Entries</title>
<link href="../styles/admin.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1><?php echo "Hello ".$_SESSION['username']; ?></h1>
<h1>Manage Blog Entries</h1>
<p><a href="blog_insert_mysqli.php">Insert new entry</a></p>
<table>
  <tr>
    <th scope="col">Created</th>
    <th scope="col">Title</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>
  <?php while($row = $result->fetch_assoc()) { ?>
  <tr>
    <td><?php echo $row['date_created']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><a href="blog_update_mysqli.php?article_id=<?php echo $row['article_id']; ?>">EDIT</a></td>
    <td><a href="blog_delete_mysqli.php?article_id=<?php echo $row['article_id']; ?>">DELETE</a></td>
  </tr>
  <?php } ?>
</table>
<a href="../user_index.php">Αρχική</a>
<?php include('../includes/logout_db.inc.php'); ?>
</body>
</html>