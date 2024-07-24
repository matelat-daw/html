<?php
require "vendor/autoload.php";
include "includes/conn.php";
$title = "Detección de Intrusión";
include "includes/header.php";
include "includes/modal_index.html";

use InfluxDB2\Model\WritePrecision;

if (isset($_POST["ip"])) // Recibe la IP y los Demás Datos desde el script index.php por POST.
{
    $ip = $_POST['ip']; // Se la Asigna a $ip.
    $mac = $_POST["mac"];
    $host = $_POST["host"]; // Se le Asigna a $host el Contenido del POST host.
    $host = preg_replace('/\s+/', '_', $host); // Se Reemplazan los espacios en la Cadena por _ ya que Influx no adminte Tags con Espacios.
    $local_port = $_POST["local_port"];
    $remote_port = $_POST["remote_port"];
    $protocol = $_POST["protocol"];
    $length = $_POST["packet"];

    $oui = get_device($conn, $mac); // Llama a la Función get_device($conn, $mac), Pasándole la conexión con la base de datos y la MAC.

    $sql = "SELECT vendorName FROM mac WHERE macPrefix='$oui'"; // Obtenemos la Marca del Dispositivo de la Base de Datos MariaDB.
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0)
    {
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $mark = $row->vendorName;
        $private = false;
    }
    else
    {
        $mark = "Android, IOS, Virtual";
        $oui = $mac;
        $private = true;
    }
    $writeApi = $client->createWriteApi();
    $data = "intruder,ip=$ip,mac=$mac,host=$host,protocol=$protocol,localPort=$local_port,remotePort=$remote_port,oui=$oui mark=\"$mark\",length=$length"; // Los Tags en Influx no pueden tener espacios.
    $writeApi->write($data, WritePrecision::S, $bucket, $org);

    $client->close();

    echo "<script>toast(0, 'Datos Agregados', 'Se Han Agregado Datos a InfluxDB.');</script>";
}

function get_device($conn, $mac){
    $ma_s = substr($mac, 0, 13); // Parte la Cadena $mac y Obtiene la OUI de una MAC Pequeña.
    $ma_m = substr($mac, 0, 10); // Parte la Cadena $mac y Obtiene la OUI de una MAC Mediana.
    $ma_l = substr($mac, 0, 8); // Parte la Cadena $mac y Obtiene la OUI de una MAC Grande.
    
    $sql = "SELECT * FROM mac WHERE macPrefix='$ma_s' UNION SELECT * FROM mac WHERE macPrefix='$ma_m' UNION SELECT * FROM mac WHERE macPrefix='$ma_l' LIMIT 1;"; // Reemplazo el Query SQL por un Storage Procedure.
    $stmt = $conn->prepare($sql); // Se prepara la Consulta.
    $stmt->execute(); // Se Ejecuta.
    if ($stmt->rowCount() > 0) // Si se Obtienen Resultados.
    {
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $oui = $row->macPrefix;
        return $oui;
    }
    else
    {
        return null;
    }
}
?>