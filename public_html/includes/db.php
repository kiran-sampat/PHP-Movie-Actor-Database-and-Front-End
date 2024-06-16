<?php
  $db_host = 'mysql.cs.nott.ac.uk';
  $db_user = 'psyks11';
  $db_pass = 'pass101';
  $db_name = 'psyks11';

  $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
  if ($conn->connect_errno) 
  {    
    die("<div class='error'>\n<br><hr><br>
    \n<p class='failure'>Failed to connect to the database.
    <br>Please return <a href='./index.php'><b>Home</b></a></p>
    \n<br><hr>\n<div>\n</body>\n</html>"); 
  }
?>
