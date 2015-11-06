<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Pulling in an RSS Feed</title>
<link href="../styles/newsfeed.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<?php 
$missing = array();
?>
<form id="form1" name="form1" method="post" action="">
<label for="select">How did you hear of Japan Journey?
                <?php if ($missing && in_array('howhear', $missing)) { ?>
                 <span class="warning">Please make a selection</span>
                <?php } ?>
                </label>
				<select name="howhear" id="howhear">
					<option value=""
					<?php
					if (!$_POST || $_POST['howhear'] == '') {
					  echo 'selected';
					} ?>>Select one</option>
					<option value="foED"
					<?php
					if ($_POST && $_POST['howhear'] == 'foED') {
					  echo 'selected';
					} ?>>friends of ED</option>
					<option value="recommended by friend"
					<?php
					if ($_POST && $_POST['howhear'] == 'recommended by friend') {
					  echo 'selected';
					} ?>>Recommended by a friend</option>
					<option value="search engine"
					<?php
					if ($_POST && $_POST['howhear'] == 'search engine') {
					  echo 'selected';
					} ?>>Search engine</option>
				</select>
</form>

<pre>
<?php 
		if ($_POST) {
		   echo 'Missing:';
		   print_r($missing);
		   echo 'howhear: ' . $_POST['howhear'];
		}
		?>
        </pre>

</body>
</html>