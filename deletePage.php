<?php
include 'db.php';

$page = $_POST['page'];
$template = $_POST['template'];

$sql = "DELETE FROM allTemplates WHERE page = '$page'";
		
$report = $db->exec($sql);

if(!$report){
   echo $db->lastErrorMsg();
} else {
 echo $db->changes(), " Record deleted successfully\n";      
}

//get page number for re-ordering
$sql2 = "SELECT page FROM allTemplates";
$result = $db->query($sql2);

$numRows = 1;
$i = 0;
while ($row = $result->fetchArray(SQLITE3_ASSOC)){
		$pagenumbers = $db->exec("UPDATE allTemplates SET page ='$numRows' WHERE page='$row[page]' ");
		echo "<br/>";
		echo "result = ".$numRows;
		echo " id = ".$row['page'];		
		$numRows++;
		$i++;
}


?>
<br/>
<a href="choose.php">home screen</a>