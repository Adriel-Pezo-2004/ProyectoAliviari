<?php
require_once "vistas/parte_superior.php"
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aliviari2";

if (isset($_GET['execute'])) {
    try {
        $codigo = $_GET['codigo'];
        $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn2->prepare("CALL sp_obtener_triaje($codigo)"); 
        $query->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("CALL sp_mostrar_triaje()");
        $query->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
}

if (isset($_GET['consulta3'])) {
    try{
        $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn3->prepare("CALL con_covid()"); 
        $query->execute();
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['consulta4'])) {
    try{
        $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn3->prepare("CALL con_sobre()"); 
        $query->execute();
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['consulta5'])) {
    try{
        $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn3->prepare("CALL con_ICC()"); 
        $query->execute();
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

?>
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Registro de Triaje</h1>
    </Center>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
<br>
<br>
                <form action="" method="GET">
                    <input type="search" name="codigo" placeholder="Búsqueda" style="
    width: 49%;
    margin-bottom: 15px;
    padding: 5px;
    padding-left: 6px;
    border: 0;
    border-bottom: 1px solid #5cb8ff;
    font-size: 17px;
    border-radius: 3px;
">
                    <input type="submit" class="btn btn-success" name="execute" value="Buscar">
                    <input type="submit" class="btn btn-success" name="consulta3" value="Buscar posibles casos COVID">
                    <input type="submit" class="btn btn-success" name="consulta4" value="Buscar casos sobrepeso">
                    <input type="submit" class="btn btn-success" name="consulta5" value="Casos de Riesgo por ICC">
                    </form>
            </div>
            </div>

    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                <?php

echo "<table id='tablaPersonas' class='table table-striped table-bordered table-condensed' style='width:100%'>
<thead class='text-center'>
<tr>
<th>Codigo de Atencion</th> 	
<th>DNI</th>		
<th>Perímetro Abdominal</th>	
<th>Perímetro Cadera</th>
<th>ICC</th>		
<th>Frecuencia Respiratoria</th>		
<th>Frecuencia Cardíaca</th>		
<th>Peso</th>		
<th>Talla</th>		
<th>IMC</th>	
<th>Temperatura</th>		
<th>Saturación</th>		
<th>Presión Arterial</th>
</tr></thead>"
;

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['CodigoAtencion'] . "</td>";
    echo "<td>" . $row['DNI'] . "</td>";
    echo "<td>" . $row['PerimetroAbdominal'] . "</td>";
    echo "<td>" . $row['PerimetroCadera'] . "</td>";
    echo "<td>" . $row['ICC'] . "</td>";
    echo "<td>" . $row['FrecuenciaRespiratoria'] . "</td>";
    echo "<td>" . $row['FrecuenciaCardiaca'] . "</td>";
    echo "<td>" . $row['Peso'] . "</td>";
    echo "<td>" . $row['Talla'] . "</td>";
    echo "<td>" . $row['IMC'] . "</td>";
    echo "<td>" . $row['Temperatura'] . "</td>";
    echo "<td>" . $row['SatO'] . "</td>";
    echo "<td>" . $row['PresionArterial'] . "</td>";
    echo "<td >";
    echo "<div class='text-center'>";
    echo "<div class='btn-group'>";
    echo "<a  type='button' class='btn btn-danger btnBorrar' href='../BD/delete_triaje.php?codigo=" . $row['CodigoAtencion'] . "'>Borrar</a>";
    echo "</div></div></td>";
    echo "</tr>";
}
echo "</table>";

?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php" ?>