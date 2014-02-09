<?php

function display_test_form($row,$createOrUpdate,$template){
if($createOrUpdate == "updatePage.php"){
	$update = "update page";
}else{
	$update = "create page";
}
?>
<p>THIS IS A test FORM</p>
<form name="input" action="<?php echo $createOrUpdate ?>" method="POST">
title:<br />
<textarea name="title" rows="1" cols="40"><?php echo $row['title']; ?></textarea><br />
content:<br/>
<textarea name="title" rows="1" cols="40"><?php echo $row['content']; ?></textarea><br />
<input type="hidden" name="template" value="<?php echo $template ?>" />
<input type="submit" value="<?php echo $update ?>">
</form>
<?php
}
?>