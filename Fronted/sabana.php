<?php
require_once "vistas/parte_superior.php"
?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aliviari2";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("CALL con_sabana()");
        $query->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;


?>

<div class="container">
    <Center>
        <h1>Sábana de Datos</h1>
    </Center>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
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
<th>Codigo de Atencion</th> 	
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
<th>id_registro</th>
<th>FechaExamen</th>
<th>GrupoSanguineo</th>
<th>Hemoglobina</th>
<th>PerfilLipidicoColesterol</th>
<th>PerfilLipidicoHDL</th>
<th>PerfilLipidicoLDL</th>
<th>Trigliceridos</th>
</tr></thead>"
;

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
    echo "<td>" . $row['CodigoAtencion'] . "</td>";
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
    echo "<td>" . $row['id_registro'] . "</td>";
    echo "<td>" . $row['FechaExamen'] . "</td>";
    echo "<td>" . $row['GrupoSanguineo'] . "</td>";
    echo "<td>" . $row['Hemoglobina'] . "</td>";
    echo "<td>" . $row['PerfilLipidicoColesterol'] . "</td>";
    echo "<td>" . $row['PerfilLipidicoHDL'] . "</td>";
    echo "<td>" . $row['PerfilLipidicoLDL'] . "</td>";
    echo "<td>" . $row['Trigliceridos'] . "</td>";
    echo "<td >";
    echo "<div class='text-center'>";
    echo "<div class='btn-group'>";
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