</div></div>
<?php
if($cfg["computer-list"]["enable"] == True) {
	$row = 1;
	$list;
	$handle = fopen($cfg["computer-list"]["list-location"], "r");
	if(empty($cfg)) die($cfg["computer-list"]["list-location"]);
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	    $num = count($data);
		$list[$row] = $data;
	    $row++;
	}
	fclose($handle);
	
	$list = $nanoServ->trim_array($list);
}
?>
<div id="footer">
	<div id="newswrapper"> 
		<div id="news">
			<?php if($cfg["computer-list"]["enable"] == True) { ?>
			<table width="100%"  border="0" cellpadding="0" cellspacing="1">
				<tr>
					<td valign="top">
						<h3>Network</h3>
						<ul class="newst">
							<?php 	foreach($list as $row) 
									echo "<li>".$row[0]." (".$row[1].")</li>"; ?>
						</ul>
					</td>
					<td valign="top">
						<h3>Services</h3>      
						<ul class="newsi">
							<?php 	foreach($list as $row) {
									echo "<li>\n";
									if(!empty($row[2])) echo "<a href=\"vnc://".$row[1]."/\" title=\"Remote Control (VNC)\"><img src=\"images/filetypes/video-display.png\" alt=\"Remote Control (VNC)\" height=\"16\" width=\"16\"/></a>\n";
									if(!empty($row[3])) echo "<a href=\"ftp://".$row[1]."/\" title=\"File Server (FTP)\"><img src=\"images/filetypes/folder-remote.png\" alt=\"File Server (FTP)\" height=\"16\" width=\"16\"/></a>\n";
									if(!empty($row[4])) echo "<a href=\"http://".$row[1]."/\" title=\"Web Site (HTTP)\"><img src=\"images/filetypes/applications-internet.png\" alt=\"Web Site (HTTP)\" height=\"16\" width=\"16\"/></a>\n";
									if(empty($row[2]) && empty($row[3]) && empty($row[4])) echo "-\n";
									echo "</li>\n";
									} ?>
						</ul>
					</td>
					<?php if($cfg["computer-list"]["status"]["enable"] == True) { ?>
					<td valign="top">
						<h3>Status</h3>
						<ul class="newsi">
							<?php 	foreach($list as $row) 
									echo "<li><img src=\"http://my.hamachi.cc/status/image.php?".$row[1]."\" alt=\"".$row[1]."'s Status\"/></li>\n"; ?>
						</ul>
					</td>
					<?php }?>
				</tr>
			</table>
			<?php } else { ?>
			<br/><div align="center"><h2>The computer list is disabled.</h2></div><br/>
			<?php }?>
		</div>
	</div>
	<div id="footbar">
		<div id="license">
			Powered by NanoServ
		</div>
		<div id="statusbar">
			Click this bar to toggle the footer.
		</div>
	</div>
</div>
</body>
</html>
