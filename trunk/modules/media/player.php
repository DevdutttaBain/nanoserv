<?php $isincluded = true; include('xmoov.php');
$height = optional($_GET["height"],$cfg["media-player"]["default-height"]);
$width = optional($_GET["width"],$cfg["media-player"]["default-width"]);
?>
<div id="player" class="media">Please turn on JavaScript</div>

<script type='text/javascript'>
	var s1 = new SWFObject('modules/media/player.swf','theswf','<?php echo $width;?>','<?php echo $height;?>','9', '#ffffff');
	s1.addParam('allowfullscreen','true');
	s1.addParam('allowscriptaccess','always');
	s1.addParam('flashvars','file=<?php echo $_GET['file']; ?>&skin=<?php echo BASE_URL;?>modules/media/schoon.swf&enablejs=true&autostart=true&bufferlength=1');
	s1.write('player');
</script><!--&streamer=<?php echo BASE_URL;?>modules/media/xmoov.php&token=<?php echo $token; ?>-->
