<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>eSupport</title>
  <link rel="stylesheet" type="text/css" href="css/fonts.css" media="all" />
  <link rel="stylesheet" type="text/css" href="css/layout.css" media="all" />
  <link rel="icon" type="image/gif" href="img/fx-favicon.ico">

  <meta http-equiv="refresh" content="300" >

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>

<!-- <div class="bgstuff">
</div> -->

<fieldset>

      <legend>RNT Info</legend>

      <form action="post.php" method="post">

        <section>
          <h2>Time</h2>
          <textarea name="time" class="textarea time" maxlength="8" required></textarea>
        </section>

        <section>
          <h2>RNT #</h2>

          <textarea name="rntnum" class="textarea number" maxlength="20" required></textarea>
        </section>

        <section>
          <h2>RNT Type</h2>

          <select name="rnttype">
            <option value="Sent request for validation information">Sent request for validation information</option>
            <option value="Successful validation">Successful validation</option>
            <option value="CIC Work Request">CIC Work Request</option>
            <option value="No meter">No meter</option>
            <option value="Software download incident">Software download incident</option>
            <option value="Validated and sent URL and Key to download software">Validated and sent URL & Key to download software</option>
            <option value="Failed Validation">Failed Validation</option>
            <option value="Web Form">Web Form</option>
            <option value="Contact name and phone number requested">Contact name & phone number requested</option>
            <option value="Account number, contact name and phone number requested">Account number, contact name & phone number requested</option>
          </select>
        </section>

        <input type="submit" value="Send">

      </form>
</fieldset>

      <div class="testMessage">

        <?php
        
          error_reporting(E_ALL ^ E_DEPRECATED);

          $con = mysql_connect("127.0.0.1", "root", "Fedex123");

          if (!$con) {
            $noDatabase = true;
            die('Could not connect: ' . mysql_error());
          }

          $noDatabase = !mysql_select_db("esupport", $con);

          $query = "SELECT * FROM RNT ORDER BY Agent DESC";
          $result = mysql_query($query);

          if($result === FALSE) {
              die('<h3>No Current Data</h3>');
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

      </div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<script>
  $('textarea').keypress(function(event) {

if ((event.keyCode || event.which) == 13) {

    event.preventDefault();
    return false;

  }

});

$('textarea').keyup(function() {

    var keyed = $(this).val().replace(/\n/g, '<br/>');
    $(this).html(keyed);


});
</script>
</body>
</html>