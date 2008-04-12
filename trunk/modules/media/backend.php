<?php
//
// NanoServ: Home Server
// | Module -> Media -> Backend
//
require("include/functions.php");

function put_contents($file,$content) {
    $f = fopen($file,"w");
    fwrite($f,$content);
    fclose($f);
}

if(isset($_REQUEST["file"])) {
    $file = urldecode($_REQUEST["file"]);
	$xml = "<playlist version=\"1\" xmlns=\"http://xspf.org/ns/0/\"><trackList><track><title>NanoServ Sync Item</title><location>$file</location></track></trackList></playlist>";
    put_contents($cfg["media-player"]["sync-store"], $xml);
}    
	else
{
	$xml = file_get_contents($cfg["media-player"]["sync-store"]);
}

header("Cache-control: public");
header("Content-Disposition: filename=playlist.xspf");
header("Content-Type: text/xml; charset=utf-8");
echo $xml;
?> 