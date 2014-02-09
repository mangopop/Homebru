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
// $newold = $_POST["newold"];

//columns will change depending on TEMPLATE!


if($template =='mediatext'){
	//find last ID and PAGE NUMBER from page_order so we can add it to both tables
	$rows = $db->query("SELECT COUNT(*) as count FROM page_order ");
	$row = $rows->fetchArray();
	$numRows = $row['count'];
	$numRows = $numRows-1;	
	
	//get ID and PAGE from the page_order table store it in array
	$IDPage = $db->query("SELECT id,page FROM page_order LIMIT $numRows,1");
	$LastRow = $IDPage->fetchArray(SQLITE3_ASSOC);
	
	//$pageID = $db->querySingle("SELECT ID FROM page_order LIMIT $numRows,1");
	//find out the very last page number and increment it
	//do the same of the ID but this will be something from a ragged sequence i.e. 2,3,5,8 (if delete)
	$LastRow['page']++;
	$LastRow['ID']++;

	//insert into page_order
	$sql1 = "INSERT INTO page_order (ID,page,title,type) VALUES
	($LastRow[ID],$LastRow[page],'$title','$template')";
	$ret1 = $db->exec($sql1);
	if(!$ret1){
	   echo $db->lastErrorMsg();
	} else {
	 echo $db->changes(), " Record updated successfully\n";      
	}
	
	//insert into mediatext
	$sql2 = "INSERT INTO mediatext (ID,TITLE,CONTENT,LINK,CC) VALUES
	($LastRow[ID],'$title','$content','$link','$cc')";
	$ret2 = $db->exec($sql2);
	if(!$ret2){
	   echo $db->lastErrorMsg();
	} else {
	 echo $db->changes(), " Record updated successfully\n";      
	}
}

$db->close();

?>
</br>
<!--echo "<td><a href='pageview.php?a[]=".$row['screen']."&a[]=".$row['type']."'>view</a></td>";-->
<a href="#">view file</a>