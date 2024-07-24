<?php
if (isset($_POST["username"]))
{
    $name = $_POST["username"];
    $email = $_POST["email"];

    $sql = "INSERT INTO user VALUES(:id, :name, :email);";
    $stmt = $conn->prepare($sql);
    $stmt-execute([':id' => NULL, ':name' => $name, ':email' => $email]);
    if ($stmt->rowCount() > 0)
    {
        echo '<script>alert("Registrado Mostroso.");</script>';
    }
}
?>