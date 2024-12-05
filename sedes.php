<?php
include('header.php');
?>

<main>
    <h1>Gestión de Sedes</h1>
    <form action="procesar_sede.php" method="post">
        <label for="sede">Nombre de la Sede:</label>
        <input type="text" id="sede" name="sede" required>
        <button type="submit">Agregar Sede</button>
    </form>
    
    <h2>Lista de Sedes</h2>
    <!-- Aquí puedes agregar el código PHP para mostrar la lista de sedes -->
</main>

<?php
include('footer.php');
?>
