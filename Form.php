<?php
//Depending on what slide it chosen, will load DB TABLE(important differentiation) and populate form, must load correct form though!
include "db.php";
include "FORMS/media-text-form.php";
include "FORMS/test-form.php";

$template = $_POST['template'];

if($_POST['new']){
	//$new = $_POST['new'];
	$createOrUpdate = "createPage.php";
}
if($_POST['old']){
	//$old = $_POST['old'];
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
		display_media_text_form($row,$createOrUpdate,$template);
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

