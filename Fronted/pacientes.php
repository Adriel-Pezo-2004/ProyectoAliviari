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

if (isset($_GET['consulta1'])) {
    try{
        $dni = $_GET['dni'];
        $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn3->prepare("CALL con_donadores()"); 
        $query->execute();
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['consulta2'])) {
    try{
        $dni = $_GET['dni'];
        $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn3->prepare("CALL con_jovenes()"); 
        $query->execute();
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

if (isset($_GET['consulta3'])) {
    try{
        $dni = $_GET['dni'];
        $conn3 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn3->prepare("CALL con_universitario()"); 
        $query->execute(); 
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
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
        <input type="submit" class="btn btn-success" name="execute" value="Buscar">
        <input type="submit" class="btn btn-success" name="consulta1" value="Buscar donadores universales">
        <input type="submit" class="btn btn-success" name="consulta2" value="Pacientes Jovenes">
        <input type="submit" class="btn btn-success" name="consulta3" value="Pacientes Universitarios">
                   
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