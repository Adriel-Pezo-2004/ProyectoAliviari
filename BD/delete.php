<?php
include("session.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aliviari2";
if (isset($_GET['dni'])) {
    try {
        $dni = $_GET['dni'];
        $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn2->prepare("CALL sp_eliminar_pacientes($dni)"); 
        $query->execute();
        echo '<script language="javascript">';
        echo 'alert("Usuario eliminado");';
        echo 'window.location="../fronted/pacientes.php";';
        echo '</script>';
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo '<script language="javascript">';
        echo 'alert("Error en la Eliminación");';
        echo 'window.location="../fronted/pacientes.php";';
        echo '</script>';
    }
} 
?>