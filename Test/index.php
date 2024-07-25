<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing MySQL</title>
</head>
<body>
    <fieldset>
        <legend>Registro de Usuario</legend>
        <form action="logon.php" method="post">
            <label><input type="text" name="username"> Nombre</label>
            <br><br>
            <label><input type="email" name="email"> E-mail</label>
            <br><br>
            <input type="submit" value="Me Registro!">
        </form>
    </fieldset>
</body>
</html>