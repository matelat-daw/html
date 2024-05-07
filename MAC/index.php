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
                        <legend>Por Favor Ingresa los Datos</legend>
                        <form action="review.php" method="post">
                        <label><input id="ip" type="text" name="ip" maxlength="15" required> Dirección IP</label>
                        <br><br>
                        <label><input id="mac" type="text" name="mac" oninput="addColon()" placeholder="No Escribas los :" maxlength="17" required> Dirección MAC</label>
                        <br><br>
                        <label><input type="text" name="host" required> Nombre del Dispositvo</label>
                        <br><br>
                        <label><input type="text" name="local_port" min="1" max="65535" required> Puerto Local</label>
                        <br><br>
                        <label><input type="text" name="remote_port" min="1" max="1024" required> Puerto Remoto</label>
                        <br><br>
                        <label><input type="text" name="protocol" required> Protocolo de Conexión</label>
                        <br><br>
                        <label><input type="number" name="packet" required> Tamaño del Paquete</label>
                        <br><br>
                        <input type="submit" value="Verifica" class="btn btn-primary btn-lg">
                        </form>
                    </fieldset>
                </div>
                <div id="view2">
                    <br><br><br><br>
                    <h3>Lista de datos en InfluxDB:</h3>
                    <br><br>
                    <?php
                    $query = "from(bucket: \"$bucket\") |> range(start: -6d) |> filter(fn: (r) => r._measurement == \"intruder\")"; // Consulta a InfluxDB.
                    $tables = $client->createQueryApi()->query($query, $org); // Ejecuta la Consulta Asignado el Resutlado a la Variable $tables.
                    $records = []; // $records Contendrá todos los Resultados de la Tabla intruder de la Base de Datos MACDB.
                    foreach ($tables as $table) // Obtiene cada Tabla de las Tablas de la Variable $tables(Solo Obtiene la Tabla intruder).
                    {
                        foreach ($table->records as $record) // De la Tabla intruder Obtiene cada Campo Almacenado en la Varaible $record.
                        {
                            $tag = ["ip" => $record->getRecordValue("ip"), "mac" => $record->getRecordValue("mac"), "host" => $record->getRecordValue("host"), "l_port" => $record->getRecordValue("localPort"), "r_port" => $record->getRecordValue("remotePort"), "protocol" => $record->getRecordValue("protocol"), "oui" => $record->getRecordValue("oui"), "time" => $record->getTime()]; // En la Varible de tipo array $tag, pusimos todos los tags y sus valores.
                            $row = key_exists($record->getTime(), $records) ? $records[$record->getTime()] : []; // Este operador ternario asigna a $row los datos en InfluxDB.
                            $records[$record->getTime()] = array_merge($row, $tag, [$record->getField() => $record->getValue()]); // Hacemos un array_merge con los datos de toda la Tupla y los Tags.
                        }
                    }

                    if (count($records) > 0) // Si hay Datos.
                    {
                        $time = array_column($records, 'time'); // Obtengo la KEY time del Array $records.

                        array_multisort($time, SORT_DESC, $records); // Ordena el Array $records por la Columna time, en Orden Descendiente.

                        $i = 0; // Índice de Todos los Datos de Todas las Tuplas.
                        $z = 0; // Se usa para almacenar los Tags Solo una Vez.
                        echo "<script>var array_key = [];
                                    var array_value = [];</script>"; // Creo las Variables de Tipo Array de Javascript.
                        foreach($records as $key) // Bucle para Obtener las Keys.
                        {
                            $z++; // Incremento $z.
                            foreach ($key as $value) // Bucle para Obtener los Valores de cada Clave.
                            {
                                if ($z == 1) // Si $z es 1.
                                {
                                    echo "<script>array_key[" . $i . "] = '" . key($key) . "';</script>"; // Almaceno Las Tags en el Array de Tags de Javascript.
                                }
                                echo "<script>array_value[" . $i . "] = '" . $value . "';</script>"; // Almaceno Los Valores en el Array de Valores de Javascript.
                                next($key); // Siguiente Clave.
                                $i++; // Siguiente Índice.
                            }
                        }
                    }
                    else // Si No Hay Datos.
                    {
                        echo "<script>toast(0, 'Sin Datos Aun', 'No Hay Datos de la Última Hora.');</script>"; // Mensaje No Hay Datos.
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