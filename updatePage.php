<?php
//This page takes values from the TEMPLATES that are used in FORM.php and updates/inserts record to the database
//*TTD*
//Should use INSERT if record doesn't exist
//use the right table

include "db.php";

$title = $_POST["title"];
$content = $_POST["content"];
$link = $_POST["link"];
$cc = $_POST["cc"];

$template = $_POST["template"];

//columns will change depending on TEMPLATE!

if($template =='mediatext'){
	$sql =
	"UPDATE mediatext set 
	TITLE = '$title',
	CONTENT = '$content',
	LINK = '$link',
	CC = '$cc'
	where ID = 1";
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
<a href="#">view file</a>