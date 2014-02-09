<?php
//Can UPDATE or INSERT records - that will solve unique number problem!

$title = $_POST["title"];
$content = $_POST["content"];

class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('test.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
//insert or update will be all in one check
   $sql =<<<EOF
      INSERT INTO mediatext (TITLE,CONTENT,INTRUC,LINK,CC,OFFPISTE)
      VALUES ('$title', '$content','$instruct', '$link', '$cc', '$offpiste');
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();

?>
</br>
<a href="textTMPfile1.php">view file</a>