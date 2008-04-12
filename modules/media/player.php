<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Media Player</title>
<style>body {margin:0px;}</style>
<?php
function optional($alt,$default) {
	if(!empty($alt)) return $alt; else return $default;
}
?>
</head>
<body>
<embed 	src="mediaplayer.swf" 
		width="<?php echo optional($_GET["width"],$cfg["media-player"]["default-width"])?>" height="<?php echo optional($_GET["height"],$cfg["media-player"]["default-height"])?>" 
		allowfullscreen="true" 
		allowscriptaccess="always" 
		flashvars="&file=<?php echo $_GET["file"];?>&width=<?php echo optional($_GET["width"],$cfg["media-player"]["default-width"])?>&height=<?php echo optional($_GET["height"],$cfg["media-player"]["default-height"])?>&showdownload=true&showstop=true&thumbsinplaylist=true&autostart=true&enablejs=true" />
</body>
</html>