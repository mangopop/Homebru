<?php
//FROM Form.php/template
 
include "db.php";

$title = $_POST["title"];
$content = $_POST["content"];
$link = $_POST["link"];
$cc = $_POST["cc"];
$title = SQLite3::escapeString($title);
$content = SQLite3::escapeString($content);
$link = SQLite3::escapeString($link);
$cc = SQLite3::escapeString($cc);

$id = $_POST["id"];
$template = $_POST["template"];

//columns will change depending on TEMPLATE!


//////AAHHHHHHHHH ID is wrong!!!!!! ///////////

if($template =='mediatext'){
	$sql =
	"UPDATE mediatext set 
	title = '$title',
	content = '$content',
	link = '$link',
	cc = '$cc'
	where id = '$id';
	
	UPDATE page_order set 
	title = '$title'
	where id = '$id'";
}

$ret = $db->exec($sql);
if(!$ret){
   echo $db->lastErrorMsg();
} else {
 echo $db->changes(), " Record updated successfully\n";      
}
$db->close();

?>
</br>
<!--echo "<td><a href='pageview.php?a[]=".$row['screen']."&a[]=".$row['type']."'>view</a></td>";-->
<a href="choose.php">home screen</a>