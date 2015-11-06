<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Ροή RSS</title>
<link href="./styles/newsfeed.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<h2>Παρακαλώ επιλέξτε μία κατήγορία RSS</h2><p>
<a href="index.php">Επιστροφή στην Αρχική</a><p>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
<select name="RssSelector" onchange='this.form.submit()'>
<option value="">Παρακαλώ επιλέξτε</option>
<option value="HighSnobiety">Style</option>
<option value="Design">Design</option>
<option value="Technology">Technology</option>
</select>
</form>

<?php
require_once('./classes/Rss/RssLoader.php');
if (isset($_POST['RssSelector'])) {
	$value = $_POST['RssSelector'];
	if ($value == 'HighSnobiety') {
		$url = 'http://feeds.feedburner.com/highsnobiety/rss';
		//RssViewer($url);
	} 
	if ($value == 'Technology') {
		$url = 'http://www.engadget.com/rss.xml';
			//RssViewer($url);
	}
	if ($value == 'Design') {
		$url = 'http://feeds.feedburner.com/yankodesign';
			//RssViewer($url);
	}
	
	$rss = new RssLoader($url);
//	$title = $rss->getTitle();
//	$link = $rss->getLink();
//	$description = $rss->getDescription();
	
	$results = $rss->RssViewer($url);
	echo $results;
}
?>


</body>
</html>