<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>


<?php
// Incluir el archivo de configuración para la conexión a la base de datos
require 'config.php';

// Iniciar la sesión para mantener al usuario autenticado
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tomar los datos enviados por el formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta para verificar si el usuario existe
    $sql = "SELECT * FROM user WHERE username = ?";
    
    // Usar declaraciones preparadas para evitar inyecciones SQL
    if ($stmt = $conn->prepare($sql)) {
        // Enlazar parámetros
        $stmt->bind_param("s", $username);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener el resultado
        $result = $stmt->get_result();
        
        // Verificar si se encontró el usuario
        if ($result->num_rows == 1) {
            // Obtener los datos del usuario
            $user = $result->fetch_assoc();
            
            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['username'] = $username;
                //echo "Login exitoso. Bienvenido, " . $username;
                // Redirigir a una página protegida o dashboard
                 header("Location: ../welcome.php");
            } else {
                // Contraseña incorrecta
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        } else {
            // Si no existe el usuario
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'El usuario \"$user\" no existe, o la contraseña es incorecta',
                text: 'Serás redirigido a la página principal.',
                confirmButtonText: 'OK'
            }).then(() => {
                window.location.href = '../index.php'; // Redirigir a index.php
            });
          </script>";
          //  echo "Nombre de usuario o contraseña incorrectos.";
        }
        
        // Cerrar el statement
        $stmt->close();
    }
    
    // Cerrar la conexión
    $conn->close();
}
?>


</body>
</html>

