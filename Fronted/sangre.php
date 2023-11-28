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
        $idregistro = $_GET['idregistro'];
        $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn2->prepare("CALL sp_obtener_sangre($idregistro)"); 
        $query->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("CALL sp_mostrar_sangre()");
        $query->execute();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}

function filterRecord($query)
{
    include("../BD/config.php");
    $filter_result = mysqli_query($mysqli, $query);
    return $filter_result;
}

?>
<!--INICIO del cont principal-->
<div class="container">
    <Center>
        <h1>Registro de Laboratorio de Sangre</h1>
    </Center>
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
<br>
<br>
                <form action="" method="GET">
                    <input type="search" name="idregistro" placeholder="Búsqueda" style="
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
<th>id_registro</th>
<th>DNI</th>
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
                        echo "<td>" . $row['id_registro'] . "</td>";
                        echo "<td>" . $row['DNI'] . "</td>";
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
                        echo "<a  type='button' class='btn btn-danger btnBorrar' href='../BD/delete_sangre.php?idregistro=" . $row['id_registro'] . "'>Borrar</a>";
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