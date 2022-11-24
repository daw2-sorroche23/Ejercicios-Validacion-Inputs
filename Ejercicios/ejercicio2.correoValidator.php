
<?php
$error = array();
$email = $_POST['email'];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

    echo("$email is a valid email address");
}
else{
    $error[] = urlencode('Formato incorrecto');
    echo("error");
}

if (empty($error)) {
} else {
    header('Location:ejercicio2.correo.php?error=' . join(urlencode('<br/>'),$error));
}

?>
<html>
 <head>
  <title>Validar</title>
 </head>
 <body>
  <p>Todo correcto</p>
 </body>
</html>
