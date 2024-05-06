<?php
require "vendor/autoload.php";
include "includes/conn.php";
$title = "Verificador de Direcciones MAC Intrusas.";
include "includes/header.php";
include "includes/modal.html";
include "includes/nav_index.html";
?>
<section class="container-fluid pt-3">
    <div class="row" id="pc">
        <div class="col-md-1" id="mobile"></div>
            <div class="col-md-10">
                <div id="view1">
                    <br><br><br><br>
                    <h1>Verificador de MACS</h1>
                    <fieldset>
                        <legend>Por Favor Ingresa la IP</legend>
                        <form action="review.php" method="post">
                        <label><input type="text" name="ip" required> IP Address</label>
                        <br><br>
                        <label><input type="text" name="mac" required> MAC Address</label>
                        <br><br>
                        <label><input type="text" name="local_port" required> Puerto Local</label>
                        <br><br>
                        <label><input type="text" name="remote_port" required> Puerto Remoto</label>
                        <br><br>
                        <label><input type="text" name="protocol" required> Protocolo de Conexión</label>
                        <br><br>
                        <label><input type="number" name="packet" required> Tamaño del Paquete</label>
                        <br><br>
                        <input type="submit" onclick="wait();" value="Verifica" class="btn btn-primary">
                        </form>
                    </fieldset>
                </div>
                <div id="view2">
                    <br><br><br><br>
                    <h3>Lista de datos en InfluxDB:</h3>
                    <br><br>
                    <?php
                    $query = "from(bucket: \"MACDB\") |> range(start: -6d) |> filter(fn: (r) => r._measurement == \"intruder\")"; // Consulta a InfluxDB.
                    // $query = "from(bucket: \"MACDB\") |> range(start: -6d) |> filter(fn: (r) => r._measurement == \"intruder\") |> sort(columns: [\"_time\"])";
                    $tables = $client->createQueryApi()->query($query, $org); // Ejecuta la Consulta.
                    $records = [];
                    foreach ($tables as $table)
                    {
                        foreach ($table->records as $record)
                        {
                            $tag = ["ip" => $record->getRecordValue("ip"), "mac" => $record->getRecordValue("mac"), "l_port" => $record->getRecordValue("localPort"), "r_port" => $record->getRecordValue("remotePort"), "protocol" => $record->getRecordValue("protocol"), "oui" => $record->getRecordValue("oui"), "time" => $record->getTime()]; // En la Varible de tipo array $tag, pusimos todos los tags y sus valores.
                            $row = key_exists($record->getTime(), $records) ? $records[$record->getTime()] : []; // Este operador ternario asigna a $row los datos en InfluxDB.
                            $records[$record->getTime()] = array_merge($row, $tag, [$record->getField() => $record->getValue()]); // Hacemos un array_merge con los datos de toda la tupla.
                        }
                    }

                    if (count($records) > 0) // Si hay Datos.
                    {
                        $time = array_column($records, 'time'); // Obtengo la KEY time del Array $records.

                        array_multisort($time, SORT_DESC, $records); // Ordena el Array $records por la Columna time, en Orden Descendiente.

                        $i = 0;
                        $z = 0;
                        echo "<script>var array_key = [];
                                    var array_value = [];</script>";
                        foreach($records as $key) // Bucle para Obtener las Keys.
                        {
                            $z++;
                            echo "<h5>"; // Formato del texto.
                            foreach ($key as $value) // Bucle para Obtener los Valores.
                            {
                                if ($z == 1)
                                {
                                    echo "<script>array_key[" . $i . "] = '" . key($key) . "';</script>"; // Las Tags.
                                }
                                echo "<script>array_value[" . $i . "] = '" . $value . "';</script>"; // Los Valores.
                                next($key); // Siguiente Clave.
                                $i++; // Siguiente Índice.
                            }
                            echo "</h5>";
                        }
                    }
                    else
                    {
                        echo "<script>toast(0, 'Sin Datos Aun', 'No Hay Datos de la Última Hora.');</script>";
                    }
                    /* for ($j = 0; $j < $i / 9; $j++)
                    {
                        echo "<script>console.log('Las Tags Son: ' + array_key[" . $j . "]);</script>";
                    }
                    for ($j = 0; $j < $i; $j++)
                    {
                        echo "<script>console.log('Los Datos Son: ' + array_value[" . $j . "]);</script>";
                    } */
                    ?>
                    <div id="table"></div>
                    <br>
                    <span id="pages"></span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button onclick="prev()" id="prev_btn" class="btn btn-danger" style="visibility: hidden;">Anteriores Resultados</button>&nbsp;&nbsp;&nbsp;&nbsp;
                    <button onclick="next()" id="next_btn" class="btn btn-primary" style="visibility: hidden;">Siguientes Resultados</button><br>
                    <script>change(1, 8);</script>
                    <br><br><br><br>
                </div>
            </div>
        <div class="col-md-1"></div>
    </div>
</section>
<?php
include "includes/footer.html";
?>