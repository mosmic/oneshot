<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Pulling in an RSS Feed</title>
<link href="../styles/newsfeed.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<h2>Please choose an RSS feed from the menu above</h2><p>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<select name="RssSelector" onchange='this.form.submit()'>
<option value="">Please, select</option>
<option value="HighSnobiety">HighSnobiety</option>
<option value="BBC">BBC</option>
<option value="DVD Player">DVD Player</option>
<option value="Laptop">Laptop</option>
<option value="Media Player">Media Player</option>
<option value="Monitor">Monitor</option>
</select>
</form>

<?php
require_once('../classes/Rss/RssLoader.php');
if (isset($_POST['RssSelector'])) {
	$value = $_POST['RssSelector'];
	if ($value == 'HighSnobiety') {
		$url = 'http://feeds.feedburner.com/highsnobiety/rss';
		//RssViewer($url);
	} else {
		if ($value == 'BBC') {
			$url = 'http://feeds.bbci.co.uk/news/world/rss.xml';
			//RssViewer($url);
		}
	}
	$rss = new RssLoader($url);
//	$title = $rss->getTitle();
//	$link = $rss->getLink();
//	$description = $rss->getDescription();
	
	$results = $rss->RssViewer($url);
	echo $results;
}
?>


