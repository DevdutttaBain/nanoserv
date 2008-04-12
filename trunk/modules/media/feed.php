<?php
//
// NanoServ: Home Server
// | Module -> Media -> Playlist Generator
//

require("include/functions.php");
header("Content-Type: text/xml; charset=utf-8");
error_reporting(E_ALL);

//
// Functions
//
function mediaGetList() {
	global $cfg;
	$i = 0;
	$list = array_reverse(array_diff(scandir($cfg["media-player"]["media-store"],1), array('.', '..')));
	while($i < count($list)) { 
		if(is_dir($cfg["media-player"]["media-store"].$list[$i])){ 
			unset($list[$i]);
		}
		$i++;
	}
	$list = array_values($list); 
	$list = array_map('htmlspecialchars', $list);
	return $list;
}

function mediaGetDetails($list) {
	global $cfg;
	$i = 0;
	while($i < count($list)) {
		$ext = strrchr($list[$i],'.');
		$extlen = strlen($ext);
		$gpos = strpos($list[$i],'-');
		$name = substr($list[$i],0,($extlen-$extlen-$extlen));
		$group = substr($name,0,$gpos);
		$list[$i] = array('name' 		=> ucwords(strtr($name,"_"," ")),
						  'filename'	=> $list[$i],
						  'ext'			=> $ext,
						  'size'		=> filesize($cfg["media-player"]["media-store"].$list[$i]));
		$i++;
	}
	return $list;
}

function strplural($str,$value) {
	if($value != 1 && $value != -1) $str = $str.'s';
	return $str;
}

function roundBytes($bytes,$roundto) {
	if($bytes > 1024*1024*1024*1024) {$bytes = (((($bytes/1024)/1024)/1024)/1024).' TB';}
	elseif($bytes > 1024*1024*1024) {$bytes = ((($bytes/1024)/1024)/1024).' GB';}
	elseif($bytes > 1024*1024) {$bytes = (($bytes/1024)/1024).' MB';}
	elseif($bytes > 1024) {$bytes = ($bytes/1024).' kB';}
	elseif($bytes < 1024) {$bytes = $bytes.strplural(' byte',$bytes);}
	$suffix = strrchr($bytes,' ');
	
	return round($bytes,$roundto).$suffix;
}

$list = mediaGetList();
$list = mediaGetDetails($list);
?>
<playlist version="1" xmlns="http://xspf.org/ns/0/">
	<title>NanoServ Playlist</title>
	<trackList>
	<?php
		$i = 0;
		while($i < count($list)) {
			echo '	<track><title>'.$list[$i]['name'].'</title><location>/'.$cfg["media-player"]["media-store"].$list[$i]['filename'].'</location></track>
	';
			$i++;
		}
		?>
</trackList>
</playlist>