<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="refresh" content="0;url=http://ausrcwa230/esupport/view.php">
</head>

<body>
<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Database connection starting
$con = mysql_connect("127.0.0.1", "root", "Fedex123");

if (!$con) {
$noDatabase = true;
die('Could not connect: ' . mysql_error());
}

$noDatabase = !mysql_select_db("esupport", $con);

$query = "DROP TABLE rnt";

$result = mysql_query($query);

mysql_close();


?>
</body>
</html>