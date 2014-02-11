<?php
include "db.php";


//create link to page that was made from template (no naming system yet)
function viewCourse(){
	
}

?>

<p>Here you will have already chosen which course you are working on. Maybe a link menu opens the course folder and file?</p>
<p>
	
</p>

<form name="choice" action="Form.php" method="POST">
<h2>The title of the course folder you are in.</h2>	
<p>Choose a template to create a new page</p>
<select name="template">
	<option selected="selected" value="null" disabled>choose a template</option>
	<option value="mediatext">Media text</option>
	<option value="testScreen">testScreen</option>
	<option value="sorting-list">Sorting list</option>
	<option value="MCQ">MCQ</option>
</select>
<input type="hidden" name="new" value="new" />
<input type="submit" value="Submit">
</form>

<p>Or select a page to view / edit</p>

<table border='1' cellpadding="5" id='PositionTable' >
	<tr>
		<th align="left">page</th>
		<th align="left">title</th>
		<th align="left">type</th>
	</tr>
	<tr>
	<?php
	
//-----TABLE OF CURRENT SCREENS--------//
//Can I not just use a session here?

	$sql = "SELECT * from page_order";
	$ret = $db->query($sql);
	$i = 0;
	while($row = $ret->fetchArray(SQLITE3_ASSOC)){
		echo "<td>".$row['page']."</td>";
		echo "<td>".$row['title']."</td>";
		echo "<td>".$row['type']."</td>";
		echo "<td><a href='pageview.php?a[]=".$row['page']."&a[]=".$row['type']."'>view</a></td>";
		?>
		<td>
		<form action='Form.php' method='POST'>
			<input type='hidden' name="template" value='<?php echo $row["type"] ?>' />
			<input type="hidden" name="edit" value="edit" />
			<input type='submit' value='edit'>
		</form>
		</td>
		<td>
		<form action='deletePage.php' method='POST'>
			<input type='hidden' name="id" value='<?php echo $row["id"] ?>' />
			<input type='hidden' name="template" value='<?php echo $row["type"] ?>' />
			<input type='submit' value='delete'>
		</form>
		</td>
		</tr>
		<?php
		
		$i++;
	}
	
	
	$db->close();
	?>
</table>

<form action="Form.php" method="POST">
<input type="hidden" name="form_type" value="<?php echo $type ?>" />
<input type="submit" value="edit">
</form>