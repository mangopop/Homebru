<?php

$content = $_POST["content"];
$notes = $_POST["notes"];

file_put_contents("editme.txt", $content);
file_put_contents("notes.txt", $notes);

echo $content;
echo "</br>";
echo $notes;

?>
</br>
<a href="page1.php">view file</a>