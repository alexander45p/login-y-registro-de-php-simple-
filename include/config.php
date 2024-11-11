<!-- config.php -->
<?php
$host = 'localhost';
$data_base = 'comercio';
$user='master';
$password ='master2024';

// Crear la conexion
$conn = new mysqli($host, $user, $password, $data_base);

// Verificar la conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
