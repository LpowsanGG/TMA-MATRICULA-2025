<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

// L�gica para exportar los datos de alumnos a Excel (si se necesita)
if (isset($_GET['export'])) {
    // Aqu� puedes implementar la exportaci�n de datos a Excel (con PHPExcel o bibliotecas similares)
    // Como ejemplo simple, se muestra el m�todo de exportaci�n en CSV

    $filename = "alumnos_" . date("Y-m-d") . ".csv";
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['Nombre', 'Apellido', 'Padre', 'Madre', 'Correo Matr�cula', 'Correo Institucional', 'Tipo de Sangre', 'N�mero de Documento', 'Tipo de Documento']);
    
    // Aqu� ir�a la l�gica para obtener los datos de alumnos de la base de datos o Google Sheets
    // Este es un ejemplo de c�mo se puede agregar un registro

    // Simulaci�n de datos
    $alumnos = [
        ['Juan', 'Perez', 'Carlos Perez', 'Maria Perez', 'juan@mail.com', 'juan@institucional.com', 'O+', '12345678', 'DNI'],
        ['Ana', 'Lopez', 'Luis Lopez', 'Sara Lopez', 'ana@mail.com', 'ana@institucional.com', 'A+', '87654321', 'Carnet de extranjer�a']
    ];

    foreach ($alumnos as $alumno) {
        fputcsv($output, $alumno);
    }

    fclose($output);
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gesti�n de Alumnos - TMA Matr�cula 2025</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="users.php">Gesti�n de Usuarios</a></li>
            <li><a href="students.php">Gesti�n de Alumnos</a></li>
            <li><a href="classrooms.php">Gesti�n de Aulas</a></li>
            <li><a href="campuses.php">Gesti�n de Sedes</a></li>
            <li><a href="logout.php">Cerrar Sesi�n</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="table-container">
            <h1>Alumnos Registrados</h1>
            <button onclick="location.href='add_student.php'"><i class="fa fa-user-plus"></i>Agregar Alumno</button>
            <button onclick="location.href='students.php?export=true'"><i class="fa fa-download"></i>Exportar a Excel</button>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Padre</th>
                        <th>Madre</th>
                        <th>Correo Matr�cula</th>
                        <th>Correo Institucional</th>
                        <th>Tipo de Sangre</th>
                        <th>N�mero Documento</th>
                        <th>Tipo Documento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="10" style="text-align: center;">Ning�n dato disponible en esta tabla</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>