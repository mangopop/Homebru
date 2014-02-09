<?php
include = "db.php";

//This page has to be completely automatically created
function mediaText(){
   $sql =<<<EOF
      SELECT * from mediatext;
EOF;

   $ret = $db->query($sql);
	$row = $ret->fetchArray(SQLITE3_ASSOC);
   //echo "Operation done successfully\n";
   $db->close();   
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title><?php echo $row['TITLE'];?></title>
</head>
<body>

	<div id="col1">
		<a href="#" class="box">start</a><br>
	</div>
	
	<div id="col2">
		<p><?php echo $row['TITLE'];?></p>
		<p><?php echo $row['CONTENT'];?></p>
		<audio controls>
			<source src="<?php echo $row['LINK'];?>" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>
	</div>
	
	<div id="col3">
		<a href="page2.html" class="box">next</a>
	</div>
</body>
</html>

<?php
}
?>



