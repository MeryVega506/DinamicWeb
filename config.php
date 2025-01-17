<?php
$host = 'localhost';
$dbname = 'task_manager'; 
$username = 'root';       
$password = '';           

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
