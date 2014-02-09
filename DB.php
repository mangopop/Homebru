<?php 
class MyDB extends SQLite3
{
	function __construct()
	{
		$this->open('company.db');
	}
}

$db = new MyDB();
if(!$db){
	echo $db->lastErrorMsg();
} else {
	echo "Opened database from db.php successfully.\n";
}

//$db->close();

?>