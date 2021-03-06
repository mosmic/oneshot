<?php
function buildFileList($dir, $extensions) {
  if (!is_dir($dir) || !is_readable($dir)) {
  	echo "wrong";
	return false;
  } else {
	if (is_array($extensions)) {
	  $extensions = implode('|', $extensions);
	}
	$pattern = "/\.(?:{$extensions})$/i";
	$folder = new DirectoryIterator($dir);
	$files = new RegexIterator($folder, $pattern);
	$filenames = array();
	foreach ($files as $file) {
		$filenames[] = $file->getFilename();
	}
	natcasesort($filenames);
	foreach ($filenames as $filename) {
		echo "$filename<br/>";
	}
	}
}
//$destination = '/Users/dimitris/Documents/';
$docs = buildFileList('../documents/', array('doc', 'docx', 'pdf'));
?>
