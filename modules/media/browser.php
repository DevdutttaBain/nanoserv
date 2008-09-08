<div id="browser">
<?php
	include('php_file_tree/php_file_tree.php');
	// This links the user to http://example.com/?file=filename.ext and only shows media files
	//$allowed_extensions = array("gif", "jpg", "jpeg", "png", "mp3", "flv");
	//echo php_file_tree($_SERVER['DOCUMENT_ROOT'], "http://example.com/?file=[link]/", $allowed_extensions);

	// This displays a JavaScript alert stating which file the user clicked on
	echo 	php_file_tree("uploads/", 
		"javascript:parent.switch_media(\"[link]\");",array(),array("DS_Store","db"));
?>
</div>
