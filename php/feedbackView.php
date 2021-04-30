<html>

<head>
  <title> Reading Data from the Database </title>
</head>

<body>
  <?php
  $con = mysqli_connect("localhost", "root", "");
  if (!$con) {
    die('Could not connect to localhost' . mysqli_error($con));
  }
  mysqli_select_db($con, "dictDB");
  $result = mysqli_query($con, "SELECT * FROM newDB");
  mysqli_close($con);
  ?>
  <h3>Search Results</h3>
  <table border=1>
    <tr>
      <td> Type of Inquiry </td>
      <td> Email </td>
      <td> Phone </td>
      <td> Feedback </td>
    </tr>
    <?php
    // fetch each record in result set
    for ($counter = 0; $row = mysqli_fetch_row($result); $counter++) {
      print("<tr>");
      foreach ($row as $key => $value)
        print("<td>$value</td>");
      print("</tr>");
    } // end for
    ?>
    <!-- end PHP script -->
  </table>
  <br />Your search yielded
  <strong>
    <?php print("$counter") ?> results.<br />
  </strong>
  <a href="../php/feedback.php"> Back </a>
</body>

</html>