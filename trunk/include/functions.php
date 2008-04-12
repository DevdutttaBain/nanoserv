<?php
//
// NanoServ: Home Server
// | Include -> PHP Functions
//
require("include/config.php"); 

class nanoServ {

    function nanoServ(){  
    }
	
	function trim_array($totrim) {
		if (is_array($totrim)) {
			$totrim = array_map(array($this,'trim_array'), $totrim);
		} else {
			$totrim = trim($totrim);
		}
    	return $totrim;
	}
} 

$nanoServ = new nanoServ();
?>