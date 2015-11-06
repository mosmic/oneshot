<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Pulling in an RSS Feed</title>
<link href="../styles/newsfeed.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
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
if (isset($_POST['RssSelector'])) {
	$value = $_POST['RssSelector'];
	if ($value == 'HighSnobiety') {
		$url = 'http://feeds.feedburner.com/highsnobiety/rss';
		RssViewer($url);
	} else {
		if ($value == 'BBC') {
			$url = 'http://feeds.bbci.co.uk/news/world/rss.xml';
			RssViewer($url);
		}
	}
	//echo $url;
}

?>

<?php
function RssViewer($url) {
	$feed = simplexml_load_file($url, 'SimpleXMLIterator');
	$filtered = new LimitIterator($feed->channel->item, 0, 6);

	foreach ($filtered as $item) { 
 		echo "<h2><a href=' $item->link'> $item->title </a></h2>";
		echo"<p> $item->description</p>";
	}
}
?>
</body>