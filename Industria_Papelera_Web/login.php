<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows >= 1) {
        // Redirige a la página de bienvenida
        header("Location: plantilla_reducidisima/plantilla/index.html");
        exit;
    } else {
        // Muestra un mensaje de error
        $error = "Credenciales incorrectas";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="navbar-logo">
                <img src="logo.png" alt="Logo de la empresa">
                <h1><a href="index.php">ZKRANOVIC</a></h1>
            </div>
            <ul class="navbar-links">
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Productos</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Contactos</a></li>
                <li><a href="registro.php">Registrarse</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
            </ul>
        </nav>
    </header>
 <div class="content">
    <div class="background">
        <div class="overlay">
          <div class="form-container">
    <p class="title">Login</p>
    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="input-group">
            <label for="username">Usuario</label>
            <input type="text" name="username" id="username" placeholder="">
        </div>
        <div class="input-group">
            <label for="password">Contraseña<</label>
            <input type="password" name="password" id="password" placeholder="">
            <div class="forgot">
                <a rel="noopener noreferrer" href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
        <button class="sign">Sign in</button>
    </form>

    <p class="signup">¿No tienes una cuenta?
        <a rel="noopener noreferrer" href="registro.php" class="">Registrarse</a>
    </p>
</div>
        </div>
    </div>
</div>
</body>
</html>
