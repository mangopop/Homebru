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
 echo $db->changes(), " Record updated successfully\n";      
}
?>