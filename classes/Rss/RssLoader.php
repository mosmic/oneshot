<?php
class RssLoader {
	private $xml;
	
	public function __construct($rss_url) {
		$this->xml = simplexml_load_file($rss_url);
	}
	
	public function RssViewer($url) {
		$feed = simplexml_load_file($url, 'SimpleXMLIterator');
		$filtered = new LimitIterator($feed->channel->item, 0, 6);
	
		foreach ($filtered as $item) {
			echo "<h2><a href=' $item->link'> $item->title </a></h2>";
			echo"<p> $item->description</p>";
		}
	}
}
?>