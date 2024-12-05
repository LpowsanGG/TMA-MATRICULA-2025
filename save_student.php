<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $email = $_POST['email'];

    // Simula el guardado en un archivo.
    $data = "$name, $grade, $email\n";
    file_put_contents('students.csv', $data, FILE_APPEND);
    echo "Alumno guardado exitosamente.";
    header('Location: dashboard.php');
    exit();
}
?>
