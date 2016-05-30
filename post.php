<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="refresh" content="0;url=http://ausrcwa230/esupport/">
  <title>Call Types</title>
  <link rel="stylesheet" type="text/css" href="css/layout.css" media="all" />
</head>
<body>

<?php

  error_reporting(E_ERROR | E_WARNING | E_PARSE);

  $con = mysql_connect("127.0.0.1", "root", "Fedex123");

  if (!$con) {
    $noDatabase = true;
    die('Could not connect: ' . mysql_error());
  }

  $noDatabase = !mysql_select_db("esupport", $con);

  if (isset($_POST['time']) && isset($_POST['rntnum']) && isset($_POST['rnttype'])){
    
    $sql = 'CREATE TABLE IF NOT EXISTS `RNT` (`Agent` text NOT NULL,`Time` text NOT NULL, `RNTNumb` text NOT NULL, `RNTType` text NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8';
    mysql_query($sql, $con);
  }

  $time = $_POST['time'];
  $rntnum = $_POST['rntnum'];
  $rnttype = trim($_POST['rnttype']);
  $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $hostname = strtolower($hostname);

  $agentName = array (
  'ausrclsilva'  => 'Linda Silva',
  'ausrca0122'  => 'Kenneth Whitcomb',
  'ausrca0122.austx.ad.harte-hanks.com'  => 'Kenneth Whitcomb',
  'auswrcb0008'  => 'Marie Hamilton',
  'auswrcb0008.austx.ad.harte-hanks.com'  => 'Marie Hamilton',
  'ausrca0124' => 'Larry Larson',
  'ausrca0124.austx.ad.harte-hanks.com' => 'Larry Larson'
  );

  $sql = "INSERT INTO RNT (Time, RNTNumb, RNTType, Agent) VALUES (
    '" . mysql_real_escape_string($time, $con) . "',
    '" . mysql_real_escape_string($rntnum, $con) . "',
    '" . mysql_real_escape_string($rnttype, $con) . "',
    '" . mysql_real_escape_string($agentName[$hostname], $con) . "'
    )";
  mysql_query($sql, $con);

?>

</body>
</html>