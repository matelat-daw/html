<?php
include "includes/conn.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing Things</title>
</head>
<body>
    <?php
        $sql = "INSERT INTO test VALUES(false);";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    ?>
</body>
</html>