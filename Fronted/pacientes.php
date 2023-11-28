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
        $dni = $_GET['dni'];
        $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn2->prepare("CALL sp_obtener_paciente($dni)"); 
        $query->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("CALL sp_mostrar_pacientes()");
        $query->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;
}



?>
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Registro de Pacientes</h1>
    </Center>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <a id="btnNuevo" class="btn btn-success" type="button"  href="registration.php" data-toggle="modal" >Nuevo</a>
<br>
<br>
                <form action="" method="GET">
                    <input type="search" name="dni" placeholder="Búsqueda" style="
    width: 49%;
    margin-bottom: 15px;
    padding: 5px;
    padding-left: 6px;
    border: 0;
    border-bottom: 1px solid #5cb8ff;
    font-size: 17px;
    border-radius: 3px;
    ">  
        <input type="submit" name="execute" value="Buscar">

                   
    </from>
            </div>
            </div>

    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <?php
                    echo "<table id='pacientes' class='table table-striped table-bordered table-condensed' style='width:100%'>
<thead class='text-center'>
<tr>
<th>DNI</th>
<th>Nombres y Apellidos</th>
<th>Sexo</th>
<th>Estado Civil</th>
<th>Fecha de Nacimiento</th>
<th>Fecha de Registro</th>
<th>Direccion</th>
<th>Ubigeo</th>
<th>Grado de Instruccion</th>
<th>Ocupación</th>
<th>telefono</th>
<th>Apoderado</th>
</tr></thead>";
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['DNI'] . "</td>";
                        echo "<td>" . $row['nombreApellido'] . "</td>";
                        echo "<td>" . $row['sexo'] . "</td>";
                        echo "<td>" . $row['estadoCivil'] . "</td>";
                        echo "<td>" . $row['fechaNacimiento'] . "</td>";
                        echo "<td>" . $row['fechaRegistro'] . "</td>";
                        echo "<td>" . $row['direccion'] . "</td>";
                        echo "<td>" . $row['ubigeo'] . "</td>";
                        echo "<td>" . $row['gradoInstruccion'] . "</td>";
                        echo "<td>" . $row['ocupacion'] . "</td>";
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td>" . $row['Apoderado'] . "</td>";
                        echo "<td >";
                        echo "<div class='text-center'>";
                        echo "<div class='btn-group'>";
                        echo "<a  type='button' class='btn btn-danger btnBorrar' href='../BD/delete.php?dni=" . $row['DNI'] . "'>Borrar</a>";
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