<?php
include("session.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aliviari2";
if (isset($_GET['idregistro'])) {
    try {
        $idregistro = $_GET['idregistro'];
        $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn2->prepare("CALL sp_eliminar_sangre($idregistro)"); 
        $query->execute();
        echo '<script language="javascript">';
        echo 'alert("Registro eliminado");';
        echo 'window.location="../fronted/sangre.php";';
        echo '</script>';
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo '<script language="javascript">';
        echo 'alert("Error en la Eliminación");';
        echo 'window.location="../fronted/sangre.php";';
        echo '</script>';
    }
} 

?>