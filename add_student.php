<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lógica para guardar los datos del alumno
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $padre = $_POST['padre'];
    $madre = $_POST['madre'];
    $correo_matricula = $_POST['correo_matricula'];
    $correo_institucional = $_POST['correo_institucional'];
    $contraseña_institucional = $_POST['contraseña_institucional'];
    $tipo_sangre = $_POST['tipo_sangre'];
    $numero_documento = $_POST['numero_documento'];
    $tipo_documento = $_POST['tipo_documento'];

    // Lógica para almacenar los datos en la base de datos o Google Sheets

    // Redirigir a la página de gestión de alumnos
    header("Location: students.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Alumno - TMA Matrícula 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Menú -->
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="students.php">Gestión de Alumnos</a></li>
            <li><a href="users.php">Gestión de Usuarios</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
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
                    <input type="email" name="correo_matricula" placeholder="Correo electrónico de matrícula" required>
                    <input type="email" name="correo_institucional" placeholder="Correo institucional" required>
                </div>
                <div class="form-group">
                    <input type="password" name="contraseña_institucional" placeholder="Contraseña institucional" required>
                    <input type="text" name="tipo_sangre" placeholder="Tipo de sangre" required>
                </div>
                <div class="form-group">
                    <input type="text" name="numero_documento" placeholder="Número de documento" required>
                    <select name="tipo_documento" required>
                        <option value="">Selecciona tipo de documento</option>
                        <option value="DNI">DNI</option>
                        <option value="Carnet de extranjería">Carnet de extranjería</option>
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
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Aquí se pueden mostrar los datos de la base de datos o de Google Sheets
                    $alumnos = []; // Ejemplo vacío
                    if (empty($alumnos)) {
                        echo '<tr><td colspan="5" class="no-data">No hay alumnos registrados aún.</td></tr>';
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

    <!-- Notificación de Error (si no se puede agregar el alumno) -->
    <div class="notification" id="errorNotification">
        <p>¡Error! Algo salió mal. Intente de nuevo.</p>
    </div>

</body>
</html>