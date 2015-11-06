<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Pulling in an RSS Feed</title>
<link href="../styles/newsfeed.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<h1>Highsnobiety</h1>
<?php
$url = 'http://feeds.feedburner.com/highsnobiety/rss';
$feed = simplexml_load_file($url, 'SimpleXMLIterator');
$filtered = new LimitIterator($feed->channel->item, 0, 4);

foreach ($filtered as $item) { ?>
  <h2><a href="<?php echo $item->link; ?>"><?php echo $item->title;?></a></h2>
  <p class="datetime"><?php $date= new DateTime($item->pubDate); echo $date->format('M j, Y, g:ia') ?></p>
  <p><?php echo $item->description;?></p>
<?php } ?>
</body>
</html>
