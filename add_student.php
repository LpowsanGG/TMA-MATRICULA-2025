<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // L�gica para guardar los datos del alumno
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $padre = $_POST['padre'];
    $madre = $_POST['madre'];
    $correo_matricula = $_POST['correo_matricula'];
    $correo_institucional = $_POST['correo_institucional'];
    $contrase�a_institucional = $_POST['contrase�a_institucional'];
    $tipo_sangre = $_POST['tipo_sangre'];
    $numero_documento = $_POST['numero_documento'];
    $tipo_documento = $_POST['tipo_documento'];

    // L�gica para almacenar los datos en la base de datos o Google Sheets

    // Redirigir a la p�gina de gesti�n de alumnos
    header("Location: students.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno - TMA Matr�cula 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Men� -->
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="students.php">Gesti�n de Alumnos</a></li>
            <li><a href="users.php">Gesti�n de Usuarios</a></li>
            <li><a href="logout.php">Cerrar Sesi�n</a></li>
        </ul>
    </nav>

    <!-- Contenedor principal -->
    <div class="container">
        <div class="form-container">
            <h1>Agregar Alumno</h1>
            <form method="POST" action="add_student.php">
                <div class="form-group">
                    <input type="text" name="nombre" placeholder="Nombre completo" required>
                    <input type="text" name="apellido" placeholder="Apellido completo" required>
                </div>
                <div class="form-group">
                    <input type="text" name="padre" placeholder="Nombre del padre" required>
                    <input type="text" name="madre" placeholder="Nombre de la madre" required>
                </div>
                <div class="form-group">
                    <input type="email" name="correo_matricula" placeholder="Correo electr�nico de matr�cula" required>
                    <input type="email" name="correo_institucional" placeholder="Correo institucional" required>
                </div>
                <div class="form-group">
                    <input type="password" name="contrase�a_institucional" placeholder="Contrase�a institucional" required>
                    <input type="text" name="tipo_sangre" placeholder="Tipo de sangre" required>
                </div>
                <div class="form-group">
                    <input type="text" name="numero_documento" placeholder="N�mero de documento" required>
                    <select name="tipo_documento" required>
                        <option value="">Selecciona tipo de documento</option>
                        <option value="DNI">DNI</option>
                        <option value="Carnet de extranjer�a">Carnet de extranjer�a</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
                <button type="submit">Registrar Alumno</button>
            </form>
        </div>

        <!-- Tabla de alumnos -->
        <div class="table-container">
            <h2>Lista de Alumnos</h2>
            <table class="student-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo Institucional</th>
                        <th>Documento</th>
                        <th>Acci�n</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Aqu� se pueden mostrar los datos de la base de datos o de Google Sheets
                    $alumnos = []; // Ejemplo vac�o
                    if (empty($alumnos)) {
                        echo '<tr><td colspan="5" class="no-data">No hay alumnos registrados a�n.</td></tr>';
                    } else {
                        foreach ($alumnos as $alumno) {
                            echo "<tr>
                                    <td>{$alumno['nombre']}</td>
                                    <td>{$alumno['apellido']}</td>
                                    <td>{$alumno['correo_institucional']}</td>
                                    <td>{$alumno['numero_documento']}</td>
                                    <td><button class='edit-btn'>Editar</button></td>
                                  </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Notificaci�n de Error (si no se puede agregar el alumno) -->
    <div class="notification" id="errorNotification">
        <p>�Error! Algo sali� mal. Intente de nuevo.</p>
    </div>

</body>
</html>