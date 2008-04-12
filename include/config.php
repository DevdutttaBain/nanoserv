<?php
//
// NanoServ: Home Server
// | Include -> Configuration
//

// Index Page Settings
$cfg["index"]["title"] 		= "NanoServ";
$cfg["index"]["welcome"] 	= "Welcome to NanoServ.";

// Hamachi Computer List
$cfg["computer-list"]["enable"]				= True;
$cfg["computer-list"]["status"]["enable"]	= True;
$cfg["computer-list"]["list-location"]		= "data/computers.txt";

// Media Module Settings
$cfg["media-player"]["default-width"]	= 720;
$cfg["media-player"]["default-height"]	= 480;

$cfg["media-player"]["sync-store"]		= "data/sync-store.txt";
$cfg["media-player"]["media-store"]		= "uploads/";
?>