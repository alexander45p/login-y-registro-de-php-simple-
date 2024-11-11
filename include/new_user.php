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
require_once("config.php");

if (isset($_POST['username'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);

    // Consulta para verificar si el usuario ya existe
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user'");

    if (mysqli_num_rows($query) > 0) {
        // El usuario ya existe - mostrar SweetAlert2
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'El usuario \"$user\" ya existe.',
                    text: 'Serás redirigido a la página principal.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'register.php'; // Redirigir a index.php
                });
              </script>";
    } else {
        if (isset($_POST['password'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Inserción de nuevo usuario
            $insert_query = "INSERT INTO user (username, password) VALUES ('$user', '$hashed_password')";
            if (mysqli_query($conn, $insert_query)) {
                echo "<script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario \"$user\" creado exitosamente.',
                            text: 'Serás redirigido a la página principal.',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = '../index.php'; // Redirigir a index.php
                        });
                      </script>";
            } else {
                echo "Error al crear el usuario: " . mysqli_error($conn);
            }
        } else {
            echo "Por favor, ingresa una contraseña.";
        }
    }
} else {
    echo "Por favor, ingresa un nombre de usuario.";
}

?>

</body>
</html>
