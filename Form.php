<?php
//Depending on what slide it chosen, will load DB TABLE(important differentiation) and populate form, must load correct form though!
include "db.php";

include "FORMS/media-text-form.php";
include "FORMS/test-form.php";

$id = $_POST['id'];
$template = $_POST['template'];

//is it worth moving this into seperate pages? 

if($_POST['new']){
	//$new = $_POST['new'];
	echo "I'm a create new";
	$createOrUpdate = "createPage.php";
}
if($_POST['edit']){
	//$old = $_POST['old'];
	echo "I'm an edit";
	$createOrUpdate = "updatePage.php";
}


function getDataForForm($db,$id,$template,$row,$createOrUpdate){
	$sql = "SELECT * FROM $template WHERE id = '$id'";		
	$ret = $db->query($sql);
	$row = $ret->fetchArray(SQLITE3_ASSOC);
	//echo "Operation done successfully\n";
	$db->close();
	display_media_text_form($id,$row,$createOrUpdate,$template);
}

switch ($template){
	case 'mediatext':
		getDataForForm($db,$id,$template,$row,$createOrUpdate);
	break;
		
	case 'testscreen':
		getDataForForm($db,$id,$template,$row,$createOrUpdate);
	break;
	//plus another 5 or so!
}


?>

