<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet - TMA Matrícula 2025</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="usuarios.php">Gestión de Usuarios</a></li>
            <li><a href="aulas.php">Gestión de Aulas</a></li>
            <li><a href="sedes.php">Gestión de Sedes</a></li>
            <li class="icon"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>

<!-- Verificar si el usuario está logueado -->
<?php if(!isset($_SESSION['usuario'])): ?>
    <div class="alert">Por favor, inicie sesión.</div>
<?php endif; ?>
