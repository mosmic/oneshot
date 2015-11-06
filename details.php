<?php
require_once ('./includes/utility_funcs.inc.php');
require_once ('./includes/connection.inc.php');
require_once './classes/social/SocialPluginsHelper.php';
require_once './classes/social/PluginFactory.php';
require_once './classes/social/FacebookLike.php';
require_once './classes/social/TwitterButton.php';
require_once './classes/social/Gplus.php';

$socialPlugins = new SocialPluginsHelper(array(
		SocialPluginsHelper::HTML_AFTER_BUTTONS => '<div class="clear"></div>',
		SocialPluginsHelper::HTML_BEFORE_BUTTONS => '<div class="clear"></div>',
		SocialPluginsHelper::STYLE_OF_WRAPPER => 'margin-top:10px;',
		SocialPluginsHelper::CUSTOM_PLUGIN_STYLE => array(
				"TwitterButton" => "width:69px;",
				"FacebookLike" => "width:146px;")
)
);
$socialPlugins->add(PluginFactory::create("FacebookLike", array(FacebookLike::FB_WIDTH => "146")));
$socialPlugins->add(PluginFactory::create("TwitterButton"));
$socialPlugins->add(PluginFactory::create("Gplus"));

// connect to database
$conn = dbConnect('read');
// check for article id in query string
if (isset($_GET['article_id']) && is_numeric($_GET['article_id'])) {
	$article_id = (int) $_GET['article_id'];
} else {
	$article_id = 0;
}
$sql = "SELECT title, article,
DATE_FORMAT(updated, '%W, %M %D, %Y') AS updated, filename, caption
FROM blog LEFT JOIN images USING (image_id)
WHERE blog.article_id = $article_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Oneshot</title>
<link href="styles/journey.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<div id="header">
    <h1>Japan Journey </h1>
</div>
<div id="wrapper">
    <?php include('./includes/menu.inc.php'); ?>
    <div id="maincontent">
        <h2><?php if ($row) {
        	echo $row['title'];
        }	else {
        	echo 'No record found';
        }
     ?>
     	</h2>
         <p><?php if ($row) { echo $row['updated']; } ?></p>
        <?php
        if ($row && !empty($row['filename'])) {
          $filename = "images/{$row['filename']}";
          $imageSize = getimagesize($filename);
        ?>
        <div id="pictureWrapper">
        <img src="<?php echo $filename; ?>" alt="<?php echo $row['caption']; ?>"
        <?php echo $imageSize[3];?>>
        </div>
        <?php } if ($row) { echo convertToParas($row['article']); } ?>
        <p>
        <?php 
			$socialPlugins->renderAllButtons();
			$socialPlugins->renderAllScripts();
		?>
		</p>
        <p><a href="
        <?php
        // check that browser supports $_SERVER variables
        if (isset($_SERVER['HTTP_REFERER']) && isset($_SERVER['HTTP_HOST'])) {
          $url = parse_url($_SERVER['HTTP_REFERER']);
          // find if visitor was referred from a different domain
          if ($url['host'] == $_SERVER['HTTP_HOST']) {
            // if same domain, use referring URL
            echo $_SERVER['HTTP_REFERER'];
          }
        } else {
          // otherwise, send to main page
          echo 'blog.php';
        } ?>">Back to the blog</a></p>
    </div>
    <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'oneshot'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    <?php include('./includes/footer.inc.php'); ?>
    
</div>
</body>
</html>
