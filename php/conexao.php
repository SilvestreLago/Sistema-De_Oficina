<?php 
#CONEXÃO COM O BD
$host = "localhost";
$usuario = "root";
$senha = "";
$dbname = "SistemaOficina";

try{
    $conn = new mysqli($host, $usuario, $senha, $dbname);
}
catch (PDOException $e){
    die("Falha na conexão: " . $conn->connect_error . $e);
}
?>