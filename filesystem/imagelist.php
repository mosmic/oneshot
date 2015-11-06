<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Automaticly generated image menu</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<select name="pix" id="pix">
	<option value="">Select an image</option>
<?php
$files = new DirectoryIterator('../images');
$images = new RegexIterator($files, '/\.(?:jpg|png|gif)$/i');
foreach ($images as $image) {
	?>
	<option value="<?php  echo $image; ?>"><?php echo $image; ?></option>
<?php } ?>
</select>
</form>
</body>
</html>

