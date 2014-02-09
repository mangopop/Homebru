<?php
//to display template I need to know...TEMPLATE, SCREEN.
//reference page order with ID and then check this ID in the TABLE(mediatext)
include "db.php";
//screen [0] type [1]
$data = $_GET['a'];
//print_r($data);

$sql = "SELECT ID from page_order WHERE	page ='$data[0]'";
$result = $db->querySingle($sql);
//echo $result;
//echo "Operation done successfully\n";

$sql = "SELECT * from '$data[1]' WHERE ID ='$result'";
$result2 = $db->query($sql);
$row = $result2->fetchArray(SQLITE3_ASSOC);
//print_r($row);
//echo "Operation done successfully\n";
$db->close();

?>
<html>
	<body>
		<div id="col1">
			<a href="#" class="box">previous</a><br>
	</div>
		
<?php

if ($data[1] == 'mediatext'){
	text($row);
}
if ($data[1] == 'testScreen'){
	video($row);
}

//GOT SCOPE PROBLEMS!!! Then just send in value as arguement
//show mediatext template info
function text($row){	
	//global $row;
?>
	<div id="col2">
		<P>content should appear under here</p>
		<P><?php echo $row['CONTENT']; ?></p>
	</div>
	<div id="col3">
		<a href="#" class="box">next</a>
	</div>
	</body>
	</html>
<?php
}
//show video template info
function video($row){
	//global $row;
?>
	<div id="col2">
		<P>content should appear under here</p>
		<P><?php echo $row['content']; ?></p>
	<div id="col3">
		<a href="#" class="box">next</a>
	</div>
	</body>
	</html>
<?php
}

//////////** Call functions **//////////////


?>

