<?php
//session_start();
error_reporting(0);
include('include/lenguajes.php');
?>

<!-- index.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="login-container">
        <h2><?php echo $lang['title_login']; ?></h2>

        <?php
        // Mostrar error si existe un parametro de error en la URL
        if (isset($_GET['error'])) {
            echo '<div class="error">Invalid username or password</div>';
        }
        ?>

        <form action="include/login.php" method="POST">
            <input type="text" name="username" placeholder=<?php echo $lang['placeholder_username']; ?>
                required>
            <input type="password" name="password" placeholder="<?php echo $lang['placeholder_password']; ?>
" required>
            <button type="submit"><?php echo $lang['botton_login']; ?>
            </button>
        </form>

        <h2><?php echo $lang['title_register']; ?>
        </h2>
        <form action="include/register.php" method="POST"> <!-- Cambiado a POST -->
            <input type="text" name="username" placeholder=<?php echo $lang['placeholder_username']; ?>
                required>
            <input type="password" name="password" placeholder="<?php echo $lang['placeholder_password']; ?>
" required>
            <button type="submit"><?php echo $lang['botton_registrarse']; ?>
            </button>
        </form>

        <div style="margin-top: 20px;">
            <a href="index.php?lang=es"><?php echo $lang['es']; ?> </a> |
            <a href="index.php?lang=en"><?php echo $lang['en']; ?> </a>
        </div>
    </div>
</body>

</html>