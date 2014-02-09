<?php
$content = file_get_contents("editme.txt", "r+");
$notes = file_get_contents("notes.txt", "r+");
?>

<form name="input" action="save.php" method="POST">

content: <textarea name="content" rows="4" cols="50"><?php echo $content?></textarea></br>
notes: <textarea name="notes" rows="4" cols="50"><?php echo $notes ?></textarea>

<input type="submit" value="Submit">
</form>
