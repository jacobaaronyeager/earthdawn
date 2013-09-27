<?php
  $talents = simplexml_load_file("library/talentstest.xml") or die("Could not open");
  $talents = $talents->xpath("/talents/talent");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Talent list</title>
    <link rel="stylesheet" href="css/jquery-ui-pepper-grinder/jquery-ui-1.10.3.custom.min.css" />
    <link rel="stylesheet" type="text/css" href="css/tipped/tipped.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <!--[if lt IE 9]>
      <script type="text/javascript" src="/js/excanvas/excanvas.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/spinners/spinners.min.js"></script>
    <script type="text/javascript" src="js/tipped/tipped.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">
      preloadLibrary();
      $(document).ready(function() {
        setTooltips();
      });
    </script>
</head>
<body>
  <?php
    foreach ($talents as $talent) {
      $output = "";
      $output .= "<h1>" . $talent->title . "</h1>\n";
      $output .= "<table border='1'>
          <tbody>
            <tr>
              <th>
                <p>Step</p>
              </th>
              <th>
                <p>Action</p>
              </th>
              <th>
                <p>Karma</p>
              </th>
              <th>
                <p>Strain</p>
              </th>
            </tr>
            <tr>
              <td>
                " . trim($talent->step) . "
              </td>
              <td>
                " . trim($talent->action) . "
              </td>
              <td>
                " . trim($talent->karma) . "
              </td>
              <td>
                " . trim($talent->strain) . "
              </td>
            </tr>
          </tbody>
        </table>\n";
      $output .= "<p>" . $talent->description . "</p>\n";
      if ($talent->example) {
        $output .= "<p>" . $talent->example . "</p>\n";
      }
      if ($talent->table) {
        $output .= "<h3>" . $talent->table->title . "</h3>\n";
        $output .= "<table border='1'>
          <tbody>
            <tr>\n";
        foreach ($talent->table->headers as $header) {
          $output .= "<th>" . $header . "</th>\n";
        } 
        $output .= "</tr>\n";
        foreach ($talent->table->row as $row) {
          $output .= "<tr>\n";
          foreach ($row->attributes() as $col) {
            $output .= "<td>" . $col . "</td>\n";
          }
          $output .= "</tr>\n";
        }      
        $output .= "</tr>
          </tbody>
        </table>\n";
      }
      $output .= "<hr>\n";
      echo $output;
    }
  ?>
</body>
</html>
