<?php
function dbConnect($usertype, $connectionType = 'mysqli') {
  $host = 'localhost';
  $db = 'vythou8_database';
  if ($usertype  == 'read') {
	$user = 'vythou8_read';
	$pwd = 'd10101999';
  } elseif ($usertype == 'write') {
	$user = 'vythou8_write';
	$pwd = '10101999';
  } else {
	exit('Unrecognized connection type');
  }
  if ($connectionType == 'mysqli') {
	$conn = new mysqli($host, $user, $pwd, $db);
	if ($conn->connect_error) {
		die ('Cannot open database');
	}
	return $conn;
  } else {
    try {
      return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
    } catch (PDOException $e) {
      echo 'Cannot connect to database';
      exit;
    }
  }
}