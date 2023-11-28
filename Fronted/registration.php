<?php
require_once "vistas/parte_superior.php"
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aliviari2";
if (isset($_GET['update'])) {
    try{
        $dni = $_GET['dni'];
        $nombre_apellido = $_GET['nombre_apellido'];
        $edad = $_GET['edad'];
        $sexo = $_GET['sexo'];
        $estado_civil = $_GET['estado_civil'];
        $fecha_nacimiento = $_GET['fecha_nacimiento'];
        $fecha_registro = $_GET['fecha_registro'];
        $direccion = $_GET['direccion'];
        $ubigeo = $_GET['ubigeo'];
        $grado_instruccion = $_GET['grado_instruccion'];
        $ocupacion = $_GET['ocupacion'];
        $telefono = $_GET['telefono'];
        $apoderado = $_GET['apoderado'];
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn->prepare("CALL SP_ingresar_paciente(
        '$dni',
        '$nombre_apellido',
        '$edad',
        '$sexo',
        '$estado_civil',
        '$fecha_nacimiento',
        '$fecha_registro',
        '$direccion',
        '$ubigeo',
        '$grado_instruccion',
        '$ocupacion',
        '$telefono',
        '$apoderado'
        )");
        $query->execute();
        $exists = mysqli_trigger_exists($GLOBALS['aliviari2'], 'tr_InsertPacientes');       
    }
    catch(PDOException $e) {
        echo "<h5>Mensaje: " . $e->getMessage() . "</h5>";
    }
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
        <h1>Registrar un nuevo Paciente</h1>
    </Center>
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <div aria-labelledby="exampleModalLabel" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <a type="button" class="close" data-dismiss="modal" onclick="history.back()" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                                    </div>
                                    <form action="" method="GET">
                                        <div class="modal-body">
                                            <div class="form-group" action="../BD/register.php" method="POST">
                                                <label for="dni" class="col-form-label">Dni :</label>
                                                <input type="text" class="form-control" placeholder="" name="dni" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre_apellido" class="col-form-label">Nombres y Apellidos :</label>
                                                <input type="text" class="form-control" placeholder="" name="nombre_apellido" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="edad" class="col-form-label">Edad :</label>
                                                <input type="number" class="form-control" placeholder="" name="edad" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="sexo" class="col-form-label">Sexo :</label>
                                                <input type="text" class="form-control" placeholder="" name="sexo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="estado_civil" class="col-form-label">Estado Civil :</label>
                                                <input type="text" class="form-control" placeholder="" name="estado_civil" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_nacimiento" class="col-form-label">Fecha de Nacimiento :</label>
                                                <input type="date" class="form-control" placeholder="" name="fecha_nacimiento" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_registro" class="col-form-label">Fecha de Registro :</label>
                                                <input type="date" class="form-control" placeholder="" name="fecha_registro" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="direccion" class="col-form-label">Dirección :</label>
                                                <input type="text" class="form-control" placeholder="" name="direccion" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ubigeo" class="col-form-label">Ubigeo :</label>
                                                <input type="number" class="form-control" placeholder="" name="ubigeo" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="grado_instruccion" class="col-form-label">Grado de Instrucción :</label>
                                                <input type="text" class="form-control" placeholder="" name="grado_instruccion" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ocupacion" class="col-form-label">Ocupación :</label>
                                                <input type="text" class="form-control" placeholder="" name="ocupacion" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono" class="col-form-label">Teléfono :</label>
                                                <input type="text" class="form-control" placeholder="" name="telefono" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="apoderado" class="col-form-label">Apoderado :</label>
                                                <input type="text" class="form-control" placeholder="" name="apoderado">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a type="button" class="btn btn-light" onclick="history.back()" data-dismiss="modal">Cancelar</a>
                                            <button type="submit" id="btnGuardar" name="update" class="btn btn-dark">Guardar</button>
                                            <a  type='button' id='btn-editar-popup-user'class='btn btn-success'  href='pacientes.php'>Volver</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FIN del cont principal-->
    <?php require_once "vistas/parte_inferior.php" ?>