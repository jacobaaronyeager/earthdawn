<?php
  require_once("includes/app.php");
  $page = setPage();
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
  <div id="wrapper">
    <?php echo $page; ?>
  </div>
</body>
</html>