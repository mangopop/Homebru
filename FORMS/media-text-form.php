<?php
function display_media_text_form($row,$createOrUpdate,$template){
	if($createOrUpdate == "updatePage.php"){
		$button = "update page";
	}else{
		$new = TRUE;
		$button = "create page";		
	}
//DO NOT NEED TO PULL FROM DB IF IT'S NEW!
?>
<p>THIS IS A MEDIA TEXT FORM</p>

<br />
<form name="input" action="<?php echo $createOrUpdate ?>" method="POST">

title:<br />
<textarea name="title" rows="1" cols="40"><?php if(!$new) echo $row['title']; ?></textarea><br />
content:<br />
<textarea name="content" rows="10" cols="60"><?php if(!$new) echo $row['content']; ?></textarea><br />
Link:<br />
<textarea name="link" rows="1" cols="20"><?php if(!$new) echo $row['link']; ?></textarea><br />
subtitles:</br>
<textarea name="cc" rows="10" cols="60"><?php if(!$new) echo $row['cc']; ?></textarea><br />
<input type="hidden" name="template" value="<?php echo $template ?>" />
<input type="submit" value="<?php echo $button ?>">
</form>
<?php
}
?>