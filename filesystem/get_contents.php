<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Checking a File Before Displaying the Contents</title>
</head>

<body>
<?php
function getFirstWords($string, $number) {
	$words = explode(' ', $string);
	$first = array_slice($words, 0, $number);
	return implode(' ', $first);
	}
	
$contents = @ file_get_contents('/Users/dimitris/private/filetest_01.txt');


if ($contents === false) {
 	echo 'Sorry, there was a problem reading the file.';
} else {
  	echo getFirstWords($contents, 8);
}
?>
</body>
</html>