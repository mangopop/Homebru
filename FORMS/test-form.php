<?php

function display_test_form($id,$row,$createOrUpdate,$template){
if($createOrUpdate == "updatePage.php"){
	$update = "update page";
}else{
	$new = TRUE;
	$update = "create page";
}
?>
<p>THIS IS A test FORM</p>
<form name="input" action="<?php echo $createOrUpdate ?>" method="POST">
title:<br />
<textarea name="title" rows="1" cols="40"><?php if(!$new) echo $row['title']; ?></textarea><br />
content:<br/>
<textarea name="title" rows="1" cols="40"><?php if(!$new) echo $row['content']; ?></textarea><br />
<input type="hidden" name="id" value="<?php echo $id ?>" />
<input type="hidden" name="template" value="<?php echo $template ?>" />
<input type="submit" value="<?php echo $update ?>">
</form>
<?php
}
?>