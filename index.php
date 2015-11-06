<?php
include('./includes/title.inc.php');
require_once('./includes/connection.inc.php');
require_once('./includes/utility_funcs.inc.php');
// create database connection
$conn = dbConnect('read');
$sql = 'SELECT * FROM blog ORDER BY created DESC';
$result = $conn->query($sql);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Oneshot<?php if (isset($title)) {echo "&#8212;{$title}";} ?></title>
<link href="styles/journey.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=154297184670073";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="header">
    <h1>Japan Journey </h1>
</div>
<div id="wrapper">
<div id="logo">
logo
</div>
    <?php include('./includes/menu.inc.php'); ?>
    <div id=fb-box>
   		<div class="fb-like-box" data-href="https://www.facebook.com/pages/Oneshotgr/168826386513105" data-width="136" data-height="409" data-show-faces="true" data-stream="false" data-header="false"></div>
    </div>
    <div id="maincontent">
      <?php
      while ($row = $result->fetch_assoc()) {
      ?>
        <h2><?php echo '<a href="details.php?article_id=' . $row['article_id'] . '"> '.$row['title'].'</a>';?></h2>
          <p><?php $extract = getFirst($row['article']);
            echo $extract[0];
            if ($extract[1]) {
              echo '<a href="details.php?article_id=' . $row['article_id'] . '"> More</a>';
              } ?></p>
      <?php } ?>
    </div>
    <?php include('./includes/footer.inc.php'); ?>
</div>
</body>
</html>
