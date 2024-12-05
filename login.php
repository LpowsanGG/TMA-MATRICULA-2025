<?php
session_start();
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['username'];
    $contrasena = $_POST['password'];

    if ($usuario === 'ADMINISTRADOR' && $contrasena === 'Agrarios+2010') {
        $_SESSION['usuario'] = $usuario;
        header('Location: dashboard.php');
        exit();
    } else {
        $mensaje = 'Inicio de Sesi�n incorrecto, intente de nuevo';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesi�n - TMA Matr�cula 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>TMA Matr�cula 2025</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contrase�a" required>
            <button type="submit">Iniciar Sesi�n</button>
        </form>
        <?php if ($mensaje): ?>
            <div class="error"><?php echo $mensaje; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
