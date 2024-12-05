<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

// L�gica para obtener datos de alumnos por mes
$alumnos_por_mes = [5, 8, 10, 6, 12, 15]; // Ejemplo de datos (por mes de Diciembre a Mayo)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TMA Matr�cula 2025</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="students.php">Gesti�n de Alumnos</a></li>
            <li><a href="users.php">Gesti�n de Usuarios</a></li>
            <li><a href="logout.php">Cerrar Sesi�n</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="chart-container" style="width: 50%; margin: 0 auto;">
            <h2>Gr�fico de Registro de Alumnos</h2>
            <canvas id="studentChart"></canvas>
            <script>
                const ctx = document.getElementById('studentChart').getContext('2d');
                const studentChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Diciembre', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
                        datasets: [{
                            label: 'N�mero de Alumnos Registrados',
                            data: <?php echo json_encode($alumnos_por_mes); ?>,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            fill: false,
                            tension: 0.1
                        }]
                    }
                });
            </script>
        </div>
    </div>
</body>
</html>