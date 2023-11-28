<?php
include("session.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aliviari2";
if (isset($_GET['codigo'])) {
    try {
        $codigo = $_GET['codigo'];
        $conn2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $conn2->prepare("CALL sp_eliminar_triaje($codigo)"); 
        $query->execute();
        echo '<script language="javascript">';
        echo 'alert("Registro eliminado");';
        echo 'window.location="../fronted/triaje.php";';
        echo '</script>';
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        echo '<script language="javascript">';
        echo 'alert("Error en la eliminación");';
        echo 'window.location="../fronted/triaje.php";';
        echo '</script>';
    }
} 
?>
