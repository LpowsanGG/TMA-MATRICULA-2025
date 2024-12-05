<?php
include('header.php');
?>

<main>
    <h1>Gestión de Usuarios</h1>
    <form action="procesar_usuario.php" method="post">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required>
        <button type="submit">Agregar Usuario</button>
    </form>
    
    <h2>Lista de Usuarios</h2>
    <!-- Aquí puedes agregar el código PHP para mostrar la lista de usuarios -->
</main>

<?php
include('footer.php');
?>
