<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Movie</title>
  <style type="text/css">
<!--
#error { background-color: #600; border: 1px solid #FF0; color: #FFF;
 text-align: center; margin: 10px; padding: 10px; }
-->
  </style>
 </head>
 <body>
<?php
if (isset($_GET['error']) && $_GET['error'] != '') {
    echo '<div id="error">' . $_GET['error'] . '</div>';
}
?>

<html>
<body>

<form action="ejercicio2.correoValidator.php" method="post">
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>

</body>
</html>