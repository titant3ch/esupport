<!DOCTYPE html>
<html>
<head>
  <title>eSupport : View</title>

  <link rel="stylesheet" type="text/css" href="css/fonts.css" media="all" />
  <link rel="stylesheet" type="text/css" href="css/layout.css" media="all" />
  
  <link rel="icon" type="image/gif" href="img/fx-favicon.ico">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="refresh" content="180" >
</head>
<body>

<div id="results" class="container">

<div tabindex="0" class="onclick-menu">
    <ul class="onclick-menu-content">
        <li>
          <a href="http://ausrcwa230/esupport" title="Home Page">
            <button>Home</button>
          </a>
        </li>
        <li>
          <a href="http://ausrcwa230/esupport/inc/file.php" title="Create File">
            <button>Create File</button>
          </a>
        </li>
        <li>
          <a href="http://ausrcwa230/esupport/log/rnt.txt" title="Download" download>
            <button>Download</button>
          </a>
        </li>
        <li>
          <a href="http://ausrcwa230/esupport/inc/cleanload.php" title="Delete Database">
            <button>Clear Database</button>
          </a>
        </li>
    </ul>
</div>

<?php

  error_reporting(0);

  $con = mysql_connect("127.0.0.1", "root", "Fedex123");

  if (!$con) {
    $noDatabase = true;
    die('Could not connect: ' . mysql_error());
  }

  $noDatabase = !mysql_select_db("esupport", $con);

  $query = "SELECT * FROM RNT ORDER BY Agent ASC";
  $result = mysql_query($query);

  if($result === FALSE) {
      die('<h3>No Data To Report</h3>');
  }

  echo '<h3>Reported Data</h3>';

  echo '<table>
            <tr>
              <th>Agent</th>
              <th>Time</th>
              <th>RNT #</th>
              <th>RNT Type</th>
            </tr>';

  while($row = mysql_fetch_array($result)){ 
    echo '
          
            <tr>
              <td>' . $row['Agent'] . '</td>
              <td>' . $row['Time'] . '</td>
              <td>' . $row['RNTNumb'] . '</td>
              <td>' . $row['RNTType'] . '</td>
            </tr>
      ';
  }

  echo '</table>';

  $result = mysql_query("SELECT * FROM RNT", $con);
  $num_rows = mysql_num_rows($result);

  echo "<h4>Total: " . $num_rows . "</h4>";

  mysql_close();

?>

</body>
</html>