<?php
//Depending on what slide it chosen, will load DB TABLE(important differentiation) and populate form, must load correct form though!
include "db.php";
include "FORMS/media-text-form.php";
include "FORMS/test-form.php";

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

//form test


//what template was chosen?
switch ($template){
	case 'mediatext':		
		$sql = "SELECT * from mediatext";		
		$ret = $db->query($sql);
		$row = $ret->fetchArray(SQLITE3_ASSOC);
		//echo "Operation done successfully\n";
		$db->close();
		
		//not sure what this if check was for?
		if($_POST['edit']){
			display_media_text_form($row,$createOrUpdate,$template);
		}else{
			display_media_text_form($row,$createOrUpdate,$template);
		}
	break;
		
	case 'testScreen':
		$sql = "SELECT * from testScreen";		
		$ret = $db->query($sql);
		$row = $ret->fetchArray(SQLITE3_ASSOC);
		//cho "Operation done successfully\n";
		$db->close();
		display_test_form($row,$createOrUpdate,$template);
	break;
	//plus another 5 or so!
}


?>

