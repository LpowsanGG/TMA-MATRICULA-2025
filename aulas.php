<?php
include('header.php');
?>

<main>
    <h1>Gestión de Aulas</h1>
    <form action="procesar_aula.php" method="post">
        <label for="aula">Nombre del Aula:</label>
        <input type="text" id="aula" name="aula" required>
        <button type="submit">Agregar Aula</button>
    </form>
    
    <h2>Lista de Aulas</h2>
    <!-- Aquí puedes agregar el código PHP para mostrar la lista de aulas -->
</main>

<?php
include('footer.php');
?>
