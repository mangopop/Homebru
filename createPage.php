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

//columns will change depending on TEMPLATE!

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
$LastRow['id']++;

switch($template){
	case 'mediatext':
		$sql = "INSERT INTO page_order (id,page,title,type) VALUES
		($LastRow[id],$LastRow[page],'$title','$template');

		INSERT INTO $template (id,title,content,link,cc) VALUES
		($LastRow[id],'$title','$content','$link','$cc')";
	break;
	
	case 'testscreen':
		$sql = "INSERT INTO page_order (id,page,title,type) VALUES
		($LastRow[id],$LastRow[page],'$title','$template');

		INSERT INTO $template (id,title,content) VALUES
		($LastRow[id],'$title','$content')";
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