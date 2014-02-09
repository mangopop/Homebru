<?php
//This page takes values from the TEMPLATES that are used in FORM.php and updates/inserts record to the database
//*TTD*
//Should use INSERT if record doesn't exist
//use the right table

include "db.php";

$title = $_POST["title"];
$content = $_POST["content"];
$instruct = $_POST["instruct"];
$link = $_POST["link"];
$cc = $_POST["cc"];
$offpiste = $_POST["offpiste"];

$template = $_POST["template"];
$newold = $_POST["newold"];

//columns will change depending on TEMPLATE!

if ($newold == "old"){
	$sql =
	"UPDATE mediatext set 
	TITLE = '$title',
	CONTENT = '$content',
	INTRUC = '$instruct', 
	LINK = '$link',
	CC = '$cc',
	OFFPISTE = '$offpiste' where ID=1";
}

//goto last row in page_order as this be the latest ID
if ($newold == "new"){
	$sql =
	"INSERT INTO mediatext VALUES 
	
	(TITLE = '$title',
	CONTENT = '$content',
	INTRUC = '$instruct', 
	LINK = '$link',
	CC = '$cc',
	OFFPISTE = '$offpiste')";
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