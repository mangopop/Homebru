<?php
function display_media_text_form($row,$createOrUpdate,$template){
	if($createOrUpdate == "updatePage.php"){
		$update = "update page";
	}else{
		$update = "create page";
	}
//need to send template
//and wether this came from EDIT link or NEW
?>
<p>THIS IS A MEDIA TEXT FORM</p>

<br />
<form name="input" action="<?php echo $createOrUpdate ?>" method="POST">

title:<br />
<textarea name="title" rows="1" cols="40"><?php echo $row['TITLE']; ?></textarea><br />
content:<br />
<textarea name="content" rows="10" cols="60"><?php echo $row['CONTENT']; ?></textarea><br />
Link:<br />
<textarea name="link" rows="1" cols="20"><?php echo $row['LINK']; ?></textarea><br />
subtitles:</br>
<textarea name="cc" rows="10" cols="60"><?php echo $row['CC']; ?></textarea><br />
<!--<input type="hidden" name="newold" value="<?php $newold ?>" />-->
<input type="hidden" name="template" value="<?php echo $template ?>" />
<input type="submit" value="<?php echo $update ?>">
</form>
<?php
}
?>