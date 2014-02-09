<?php

function display_test_form($row){
?>
<p>THIS IS A test FORM</p>


<form name="input" action="#.php" method="POST">

title:<br />
<textarea name="title" rows="1" cols="40"><?php echo $row['SPARE']; ?></textarea><br />


<input type="submit" value="Create page">
</form>
<?php
}
?>