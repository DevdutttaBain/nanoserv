</div></div>
if($cfg["computer-list"]["enable"] == True) {
	$row = 1;
}
			<?php if($cfg["computer-list"]["enable"] == True) { ?>
					<?php if($cfg["computer-list"]["status"]["enable"] == True) { ?>
					<?php }?>
			<?php } else { ?>
			<br/><div align="center"><h2>The computer list is disabled.</h2></div><br/>
			<?php }?>