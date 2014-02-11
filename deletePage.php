<?php
include 'db.php';

//it is ID not page number
$id = $_POST['id'];
$template = $_POST['template'];

$sql = "DELETE FROM page_order WHERE id = '$id';
		DELETE FROM $template WHERE id = '$id'";
		
$err = $db->exec($sql);

if(!$err){
   echo $db->lastErrorMsg();
} else {
 echo $db->changes(), " Record deleted successfully\n";      
}

//get ID
$sql2 = "SELECT id FROM page_order";
$result = $db->query($sql2);

$numRows = 1;
$i = 0;
while ($row = $result->fetchArray(SQLITE3_ASSOC)){
		$pagenumbers = $db->exec("UPDATE page_order SET page ='$numRows' WHERE id='$row[id]' ");
		echo "<br/>";
		echo "result = ".$numRows;
		echo " id = ".$row['id'];		
		$numRows++;
		$i++;
}


?>
<br/>
<a href="choose.php">home screen</a>