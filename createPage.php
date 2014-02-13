<?php
//This page takes values from the TEMPLATES that are used in FORM.php and updates/inserts record to the database
//*TTD*
//need to make sure dont' input into DB if there is any error with anything!

include "db.php";
$title = $_POST["title"];
$content = $_POST["content"];
$link = $_POST["link"];
$cc = $_POST["cc"];
$title = SQLite3::escapeString($title);
$content = SQLite3::escapeString($content);
$link = SQLite3::escapeString($link);
$cc = SQLite3::escapeString($cc);

$template = $_POST["template"];

//find last PAGE NUMBER
$rows = $db->query("SELECT COUNT(*) as count FROM allTemplates ");
$row = $rows->fetchArray();
$numRows = $row['count'];
$numRows = $numRows-1;	

//run PAGE select statement
$IDPage = $db->query("SELECT page FROM allTemplates LIMIT $numRows,1");
//add final result into array (prob can be just one query now not ID and PAGE)
$LastRow = $IDPage->fetchArray(SQLITE3_ASSOC);

//$pageID = $db->querySingle("SELECT ID FROM page_order LIMIT $numRows,1

//increment our last page entry
$LastRow['page']++;

switch($template){
	case 'mediatext':
		$sql = "INSERT INTO allTemplates (page,title,content,link,cc) VALUES
		($LastRow[page],'$title','$content','$link','$cc')";
	break;
	
	//different insert statement
	case 'testscreen':
		$sql = "INSERT INTO allTemplates (page,title,content,link,cc, type) VALUES
		($LastRow[page],'$title','$content','$link','$cc','$template')";
	break;
}

$ret = $db->exec($sql);
if(!$ret){
   echo $db->lastErrorMsg();
} else {
 echo $db->changes(), " Record created successfully\n";      
}

$db->close();

?>
</br>
<!--echo "<td><a href='pageview.php?a[]=".$row['screen']."&a[]=".$row['type']."'>view</a></td>";-->
<a href="choose.php">home screen</a>