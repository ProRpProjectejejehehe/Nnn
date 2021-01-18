<?php
error_reporting(0);
include "crypt.php";
require_once 'packer.php';
require_once 'config.php';
$domain_server = $base_url;

if($_GET['url'] != ""){
	$b_url = my_simple_crypt($base_url);
	$url = $_GET['url'];
	$sub = $_GET['sub'];
	$poster = $_GET['poster'];
        $title = $_GET["title"];
	$s_api = my_simple_crypt($api);
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Google Photos - GDrive-X Premium Streaming Tool</title>
<link rel="icon" href="<?php echo $domain_server?>/assets/favicon.ico">	
<style>body,html {background-color: #000;margin:0px;padding:0;width:100%;height:100%;border:none;}</style>
</head>
<body>
<iframe src="https://gdxpapi.herokuapp.com/embed_free.php?url=<?php echo $url;?>&poster=<?php echo $poster;?>&sub=<?php echo $sub;?>&title=<?php echo $title;?>&api=<?php echo $s_api;?>&req=<?php echo $b_url;?>" width="100%" height="100%" frameborder="0" scrolling="no" allowfullscreen></iframe>
<script src='secure.js'></script>
</body>
</html>
